<?php
/**
 * This script will search in your iTunes Music folder for duplicate
 * mp3 and aac files, and print them out for inspection. 
 *
 * HOW TO USE:
 * Do a dry run, inspect the output, and if desired, do a delete run.
 * 
 * To do a dry run:
 * 
 * $ php duplicate_music_fixer.php
 * $ php duplicate_music_fixer.php --dry-run
 * 
 * To delete duplicates:
 * 
 * $ php duplicate_music_fixer.php --delete
 *
 * By passing the --delete flag, the script will delete the duplicate files.
 * It will not delete original music files!
 *
 * Uncomment all // echo lines to see extended details.
 * 
 * Tested with PHP 7 on Mac with music backup on a Drobo NAS volume.
 * 
 * This Script provided FREE AS IS with NO WARRANTY *
 */
// Edit to point to your iTunes/Music folder containing artists
$base_path = "..\assets\music";
/*******************************************************************
 * Get list of folders in a folder
 */
function getFoldersInFolder($folder) {
	//echo "Getting files in $folder \n";
	$thefolder = basename($folder);
	$thepath = dirname($folder);
	//echo "Digging into $thefolder inside $thepath \n";
	$foldersInFolder = [];
	$folders1 = scandir($folder);
	//echo "There are ". count($folders1) ." folders in $folder \n";
	foreach ($folders1 as $folder1) {
		if (is_dir($folder .'/'. $folder1)) {
			if ($folder1 != '.' && $folder1 != '..') {
				$foldersInFolder[] = $folder1;
			}
		}
	}
	return $foldersInFolder;
}
/******************************************************************
 * Returns true for MP3 files
 */
function isAnMp3File($file) {
	$mp3matcher = '|^.+\.mp3$|i';
	if (preg_match($mp3matcher, $file)) {
		return true;
	}
	return false;
}
/******************************************************************
 * Returns true for AAC files
 */
function isAnAacFile($file) {
	$aacMatcher = '|^.+\.aac$|i';
	if (preg_match($aacMatcher, $file)) {
		return true;
	}
	return false;
}
/******************************************************************
 * Returns true for AAC or MP3 files
 */
function isAMusicFile($file) {
	return (isAnMp3File($file) || isAnAacFile($file));
}
/******************************************************************
 * Returns true for AAC files
 */
function getMusicFilesInFolder($folder) {
	$musicFilesInFolder = [];
	$files = scandir($folder);
	foreach($files as $file) {
		if (isAMusicFile($file)) {
			$musicFilesInFolder[] = $file;
		}
	}
	return $musicFilesInFolder;
}
/*******************************************************************
 * Checks to see if a song is a duplicate version
 */
function isDuplicateSong($song) {
	$dupeMatcher = '|^.+ \d.mp3$|';
	$folder = dirname($song);
	$file = basename($song);
	$possibleDupe = preg_match($dupeMatcher, $file);
	if ($possibleDupe) {
		// echo "The song $file in $folder is a possible dupe.\n";
		$othersongs = getMusicFilesInFolder($folder);
		if (count($othersongs) == 0) {
			//echo "No other songs found in $folder. $file is not a dupe.\n";
			return false;
		}
		if (isAnMp3File($file)) {
			$ext = '.mp3';
		} else if (isAnAacFile($file)) {
			$ext = '.aac';
		}
		$originalVersionName = preg_replace('| \d'. $ext .'$|i', $ext, $file);
		if (file_exists($folder .'/'. $originalVersionName)) {
			//echo "The file $file is a dupe based on the existence of $originalVersionName \n";
			return true;
		}
	} else {
		//echo "The file $file is probably the original version.\n";
	}
	return false;
}
$filesToDelete = [];
$num['artists'] = 0;
$num['albums'] = 0;
$num['songs'] = 0;
$total['artists'] = 0;
$total['albums'] = 0;
$total['songs'] = 0;
$artists = getFoldersInFolder($base_path);
foreach ($artists as $artist) {
	$num['artists']++;
	$total['artists']++;
	echo str_repeat('=', 80) ."\n";
	echo "ARTIST ". $num['artists'] . ") $artist \n";
	echo str_repeat('=', 80) ."\n";
	
	$artistpath = $base_path .'/'. $artist;
	$albums = getFoldersInFolder($artistpath);
	$files = getMusicFilesInFolder($artistpath);
	if (count($files) > 0) {
		echo "*** Stray files found in $artistpath \n";
	}
	if (count($albums) == 0) {
		echo "No albums found in $artistpath \n";
		continue;
	}
	foreach ($albums as $album) {
		$num['albums']++;
		$total['albums']++;
		echo str_repeat('-', 80)."\n";
		echo "  ALBUM ". $num['albums'] .") $artist > $album \n";
		
		$albumpath = $artistpath .'/'. $album;
		$songs = getMusicFilesInFolder($albumpath);
		foreach ($songs as $song) {
			$num['songs']++;
			$total['songs']++;
			echo "\tSONG ". $num['songs'] .") + $artist -> $album : $song ";
			$songpath = $albumpath .'/'. $song;
			if (isDuplicateSong($songpath)) {
				$filesToDelete[] = $songpath;
				echo " DUPE ";
			} else {
				echo " ORIG ";
			}
			echo "\n";
		}
		$num['songs'] = 0;
	}
	$num['albums'] = 0;
}
// Default to DRY RUN !
if (count($argv) < 2) {
	$argv[1] = '--dry-run';
}
echo "\n";
echo str_repeat('#', 80) ."\n";
echo str_repeat('#', 80) ."\n";
echo "ACTIONS\n";
if (count($filesToDelete) > 0) {
	foreach ($filesToDelete as $dupe) {
		if ($argv[1] == '--dry-run') {
			$comment = "Remove";
		}
		if ($argv[1] == '--delete') {
			$comment = "Deleted";
			unlink($dupe);
		}
		echo $comment ." ". $dupe ."\n";
	}
} else {
	echo "No Duplicates Detected!\n";
}
echo "\n";
echo str_repeat('#', 80) ."\n";
echo str_repeat('#', 80) ."\n";
echo "\n";
echo "Results:\n";
echo "\tTotal Artists: ". $total['artists'] ."\n";
echo "\tTotal Albums: ". $total['albums'] ."\n";
echo "\tTotal Songs: ". $total['songs'] ."\n";
echo "\tTotal Duplicates: ". count($filesToDelete) ."\n";
if ($argv[1] == '--dry-run') {
	echo "Done. Inspect the output above to see what would've been removed.";
} else {
	echo "Done. Your duplicate songs have been removed.";
}
echo "\n\n";
