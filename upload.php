<?php



// TODOS: 
// add Validation (required conent, error messages)
// remove duplicate content
// get the filesname before they uploaded in the artwork folder
// copy new image in artwork folder and get file with path for artworkpath
// get the filesnames before they uploaded in the music folder
// copy all uploaded files in folder and put only them in the database
// delete all duplicates in image folder and music
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

include("includes/includedFiles.php"); 
require("includes/classes/Duration.php");

?>

    <h1 class="pageHeadingBig" style="font-size: 40px;">Upload Music</h1>
    <div class="gridViewContainer">
        <form id="input_form" class="input_form" action="upload.php" name="input_form" method="POST" enctype="multipart/form-data">
            <h2 class="input_headline--top">Choose your Playlist(s) and/or Album(s):</h2>
            
            <!-- <h4 class="input_subline">Playlist:</h4>
            <select name="playlist" class="input_field" id="input_field--playlist">
                <?php
                $query = mysqli_query($con, "SELECT `name`, `id` FROM `playlists`");
                $playlists = array();

                $createNew = true;
                $i = 0;
                while($row = mysqli_fetch_array($query)) {

                    if($createNew == true) {
                        $createNew = false;
                        $newId = $con->insert_id;
                        echo "<option value='" . $newId . "' class='new-option'>Create new Playlist</option>"; // only for all
                    }
                    $i++;
                    if ($i == 1) {
                        echo "<option value='" . $row['id'] . "' selected >" . $row["name"] . "</option>";
                    } else {
                        echo "<option value='" . $row['id'] . "'>" . $row["name"] . "</option>";
                    }
                    array_push($playlists, json_encode($row['name'], $row['id']));
                }
                ?>
                <script>
                    $('#input_field--playlist').on('change', function() {
                        this.value == 0 ? $('.input_field--new-playlist').css({'display': 'block'}) : $('.input_field--new-playlist').css({'display': 'none'})
                    });
                </script>
            </select> -->

            <!--TODO: create auto a new select stmt after one is choosed(without that one which is choosed)-->
            <!-- <h4 class="input_subline">Create a new Playlist:</h4>
            <input type="text" name="new_playlist" placeholder="name of your playlist" class="input_field input_field--new-playlist"> -->
            <div class="input_container">
                <h2 class="input_headline">Album</h2> 
                <select name="album" class="input_field" id="input_field--album">

                    <?php
                        $query = mysqli_query($con, "SELECT `title`, `id` FROM `albums`");
                        $albums = array();
                        $newId = $con->insert_id;
                        $createNew = true;
                        $i = 0;
                        while($row = mysqli_fetch_array($query)) {
                            if($createNew == true) {
                                $createNew = false;
                                echo "<option value='" . $newId . "'>Create new Album</option>"; // showable for all
                            }

                            array_push($albums, json_encode($row['title'], $row['id']));
                            
                            $i++;
                            if ($i == 1) {
                                echo "<option value='" . $row['id'] . "' selected >" . $row["title"] . "</option>";
                            } else {
                                echo "<option value='" . $row['id'] . "'>" . $row["title"] . "</option>";
                            }
                        }
                    ?>
                    <script>
                        $('#input_field--album').on('change', function() {
                            this.value == 0 ? $('.input_field--new-album').css({'display': 'block'}) && $('.input_subline--new-album').css({'display': 'block'}) && $('.input_field--new-album').prop('required', true) :
                             $('.input_field--new-album').css({'display': 'none'}) && $('.input_subline--new-album').css({'display': 'none'}) && $('.input_field--new-album').prop('required', false)
                        });
                    </script>
                </select>
                <h4 class="input_subline input_subline--new-album">Create a new Album:</h4>
                <input type="text" name="new_album" placeholder="name of your album" class="input_field input_field--new-album">
            </div><br>

            <div class="input_container">
            <h2 class="input_headline">Album Image</h2> 
                <select name="album_image" class="input_field" id="input_field--album-image">
                    <?php
                        $query = mysqli_query($con, "SELECT `artworkPath`, `id` FROM `albums`");
                        $album_images = array();
                        $newId = $con->insert_id;
                        $createNew = true;
                        $i = 0;
                        while($row = mysqli_fetch_array($query)) {
                            if($createNew == true) {
                                $createNew = false;
                                echo "<option value='" . $newId . "'>Choose new Album Image</option>"; // showable for all
                            }

                            array_push($album_images, json_encode($row['artworkPath'], $row['id']));
                            
                            $i++;
                            if ($i == 1) {
                                echo "<option value='" . $row['id'] . "' selected >" . $row["artworkPath"] . "</option>";
                            } else {
                                echo "<option value='" . $row['id'] . "'>" . $row["artworkPath"] . "</option>";
                            }
                        }
                    ?>
                    <script>
                        $('#input_field--album-image').on('change', function() {
                            this.value == 0 ? $('.input_subline--new-album-image').css({'display': 'block'}) && $('.input_field--file-label').css({'display': 'block'}) && $('.input_field--new-album-image').prop('required', true) :
                             $('.input_subline--new-album-image').css({'display': 'none'}) && $('.input_field--file-label').css({'display': 'none'}) && $('.input_field--file-label').prop('required', false)
                        });
                    </script>
                </select>
                <div class="input_container--subline">
                    <h4 class="input_subline input_subline--new-album-image">Upload New Album Image:</h4><br>
                    <input type="file" name="new_album-image" id="input_field--new-album-image" class="input_field input_field--file input_field--new-album-image">
                    <label for="input_field--new-album-image" id="input_field--new-album-image-label" class="input_field--file-label">FILE</label>
                </div>
                
            </div>
                
            <div class="input_container">
                <h2 class="input_headline">Choose your Genre:</h2>
                <select name="genre" class="input_field" id="input_field--genre">
                    <?php
                        $query = mysqli_query($con, "SELECT `name`, `id` FROM `genres`");
                        $genre = array();
                        $createNew = true;
                        $i = 0;
                        while($row = mysqli_fetch_array($query)) {
                            if($createNew == true) {
                                $createNew = false;
                                echo "<option value='" . $newId . "'>Create new Genre</option>"; // showable for all
                            }
                            
                            array_push($genre, json_encode($row['name'], $row['id']));
                            
                            $i++;
                            if ($i == 1) {
                                echo "<option value='" . $row['id'] . "' selected >" . $row["name"] . "</option>";
                            } else {
                                echo "<option value='" . $row['id'] . "'>" . $row["name"] . "</option>";
                            }
                        }
                    ?>
                </select>
                <script>
                    $('#input_field--genre').on('change', function() {
                        this.value == 0 ? $('.input_field--new-genre').css({'display': 'block'}) && $('.input_subline--new-genre').css({'display': 'block'}) && $('.input_field--new-genre').prop('required', true) :
                        $('.input_field--new-genre').css({'display': 'none'}) && $('.input_subline--new-genre').css({'display': 'none'}) && $('.input_field--new-genre').prop('required', false)
                    });
                </script>
                <h4 class="input_subline input_subline--new-genre">Create a new Genre:</h4>
                <input type="text" name="new_genre" placeholder="name of the your genre" class="input_field input_field--new-genre">
            </div><br><br>

            <div class="input_container">
                <div class="input_container--headline">
                    <h2 class="input_headline">Choose the artist</h2>
                    <p class="input_note">(under this name will the music, be find)</p>
                </div>
                <select name="artist" class="input_field" id="input_field--artist">
                    <?php
                        $query = mysqli_query($con, "SELECT `name`, `id` FROM `artists`");
                        $artists = array();
                        $createNew = true;
                        $i = 0;
                        while($row = mysqli_fetch_array($query)) {
                            if($createNew == true) {
                                $createNew = false;
                                echo "<option value='" . $newId . "'>Create new Artist</option>"; // showable for all
                            }

                            array_push($artists, json_encode($row['name'], $row['id']));

                            $i++;
                            if ($i == 1) {
                                echo "<option value='" . $row['id'] . "' selected >" . $row["name"] . "</option>";
                            } else {
                                echo "<option value='" . $row['id'] . "'>" . $row["name"] . "</option>";
                            }
                        }
                    ?>
                <script>
                    $('#input_field--artist').on('change', function() {
                        this.value == 0 ? $('.input_field--new-artist').css({'display': 'block'}) && $('.input_subline--new-artist').css({'display': 'block'}) && $('.input_field--new-artist').prop('required', true) : 
                        $('.input_field--new-artist').css({'display': 'none'}) && $('.input_subline--new-artist').css({'display': 'none'}) && $('.input_field--new-artist').prop('required', false)
                    });
                </script>
                </select>
                <h4 class="input_subline input_subline--new-artist">Create a new Artist:</h4>
                <input type="text" name="new_artist" placeholder="name of the your artist" class="input_field input_field--new-artist">
            </div><br><br>
            
            <div class="input_container">
                <div class="input_container--headline">
                    <h2 class="input_headline">Choose your Music:</h2>
                    <input type="file" name="music_files" multiple="multiple" id="music_files" class="input_field--file" required>
                    <label for="music_files">FILES</label>
                </div>  
                <button type="submit" value="upload" class="input_submit">Upload</button>
            </div>
        </form>

        <?php

        function cleanString($inputText) {
            $inputText = strip_tags($inputText);
            $inputText = ucfirst(strtolower($inputText));
            return $inputText;
        }



        if(isset($_POST['upload'])) {
            echo 'fehkjsrv';

            // $playlist = $_POST['playlist'];
            // $new_playlist = $_POST['new_playlist'];
            // if($playlist == 0) {
            //     //put $new_playlist in the database
            // }
            $artist = cleanString($_POST['artist']); 
            $genre = cleanString($_POST['genre']);
            $album = cleanString($_POST['album']); // album should be only available for vip users (because copyright) nothing from the music should be public available
            $album_images = cleanString($_POST['album_images']);

            // put $new_artist in the database
            if($artist == 0) {
                $stmt = $con->prepare("INSERT INTO `artists` (`id`, `name`) VALUES (?, ?)");
                $stmt->bind_param("is", $last_id, $name);

                $last_id = $con->insert_id;
                $artist = cleanString($_POST['new_artist']);
                $stmt->execute();
                echo '<p>artist chosen</p>';
                printf("Error: %s.\n", $stmt->error);
            }
            // put $new_genre in the database
            if($genre == 0) {
                $stmt = $con->prepare("INSERT INTO `genres` (`id`, `name`) VALUES (?, ?)");
                $stmt->bind_param("is", $last_id, $name);

                $last_id = $con->insert_id;
                $genre = cleanString($_POST['new_genre']);
                $stmt->execute(); 
                echo '<p>genre chosen</p>';
                printf("Error: %s.\n", $stmt->error);
            }

            // put $new_album in the database and get copy new artwork image
            if($album == 0) {
                $target_dir = "/assets/images/artwork/";
                $target_file = $target_dir . basename($_FILES["new_album-image"]["name"]);
                $uploadOk = true;
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                // Check if image file is a actual image or fake image
                $check = getimagesize($_FILES["new_album-image"]["tmp_name"]);
                if(!$check) {
                    echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = true;
                } else {
                    echo "File is not an image.";
                    $uploadOk = false;
                }
                
                // Check if file already exists
                if (file_exists($target_file)) {
                    echo "Sorry, file already exists.";
                    $uploadOk = false;
                }
                // Allow certain file formats
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
                    echo "Sorry, only JPG, JPEG, PNG files are allowed.";
                    $uploadOk = false;
                }
                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == false) {
                    echo "Sorry, your file was not uploaded.";
                // if everything is ok, try to upload file
                } else {
                    if (move_uploaded_file($_FILES["new_album-image"]["tmp_name"], $target_file)) {
                        echo "The file ". basename( $_FILES["new_album-image"]["name"]). " has been uploaded.";
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                }

                $stmt = $con->prepare("INSERT INTO `albums` (`id`, `title`, `artist`, `genre`, `artworkPath`) VALUES (?, ?, ?, ?, ?)");
                $stmt->bind_param("isiis", $last_id, $title, $artist, $genre, $album_images);

                $last_id = $con->insert_id;
                $title = $_POST['title'];
                if($artist == 0) {
                    $artist = $_POST['new_artist']; 
                } else {
                    $artist = $_POST['artist']; 
                }
                if($genre == 0) {
                    $genre = $_POST['new_genre'];
                } else {
                    $genre = $_POST['genre'];
                }
                if($album_images == 0) {
                    if($uploadOk == true) {
                        $album_images = $target_file; 
                    } else {
                        echo 'Something went wrong with the Album Image Upload';
                    }
                } else {
                    $album_images = $_POST['album_images']; 
                }
                $album = $_POST['new_album']; 
                $stmt->execute(); 
                printf("Error: %s.\n", $stmt->error);
            }

            $dir = '\assets\music'; 
            // get file directorys with filenames
            $files = array(scandir(__DIR__ . $dir, 1)); //look for the correct path (this path is maybe incorrect in database)
            $file_length = sizeof($files[0]);
            $image_path = __DIR__ . $dir;

            $file = $_FILES['music_files'];
            $file_length = sizeof($file);

            $fileName = $_FILES['music_files']['name'];
            $fileTmpName = $_FILES['music_files']['tmp_name'];
            $fileError = $_FILES['music_files']['error'];
            $fileType = $_FILES['music_files']['type'];

            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));

            $allowed = array('mp3');

            if(in_array($fileActualExt, $allowed)) {
                if ($fileError === 0) {
                    $fileNameNew = uniqid('', true). ".".$fileActualExt;
                    $fileDestination = '/assets/music/'.$fileNameNew;
                    move_uploaded_file($fileTmpName, $fileDestination);
                } else {
                    echo "There was an error uploading your music!";
                }
            } else {
                echo "You cannot upload music of this type!";
            }
        
            // put all songs in the database
            for($i = 0; $i < $file_length; $i++) {
                
                $stmt = $con->prepare("INSERT INTO `Songs` (`id`, `title`, `artist`, `album`, `genre`, `duration`, `path`, `albumOrder`, `plays`) VALUES 
                            (?, ?, ?, ?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("isiiissii", $last_id, $title, $artist, $album, $genre, $duration, $path, $albumOrder, $plays);
                
                $full_path = $image_path . "\\" . $files[0][$i];
                $path_from_here = 'assets/music/' . $files[0][$i];

                // replace dupliacte and unneccassary strings
                $replaced_title_1 = str_replace(".mp3", "", $files['name'][$i]); //$replaced_title_1 = str_replace(".mp3", "", $files[0][$i]);
                $replaced_title_2 = str_replace("(2)", "", $replaced_title_1);
                $replaced_title_3 = str_replace("(3)", "", $replaced_title_2);
                $replaced_title_4 = str_replace("(4)", "", $replaced_title_3);
                $replaced_title_5 = str_replace("(5)", "", $replaced_title_4);
                $replaced_title_6 = str_replace("(6)", "", $replaced_title_5);
        
                $mp3file = new Duration($path_from_here);//http://www.npr.org/rss/podcast.php?id=510282
                $duration1 = $mp3file->getDurationEstimate();//(faster) for CBR only
                // $duration2 = $mp3file->getDuration();//(slower) for VBR (or CBR)

                $last_id = $con->insert_id;
                $title = $replaced_title_6;
                if($artist == 0) {
                    $artist = $_POST['new_artist']; 
                } else {
                    $artist = $_POST['artist']; 
                }
                if($genre == 0) {
                    $genre = $_POST['new_genre'];
                } else {
                    $genre = $_POST['genre'];
                }
                if($genre == 0) {
                    $genre = $_POST['new_album'];
                } else {
                    $genre = $_POST['album'];
                }
                $duration = Duration::formatTime($duration1); 
                $path = $path_from_here; 
                $albumOrder = 2; // What make this shit????
                $plays = 0;
                $stmt->execute();

                printf("Error: %s.\n", $stmt->error);
            }
            // delete all duplicates in the database (songs)
            // $stmt = $con->prepare("DELETE t1 FROM `Songs` t1 INNER JOIN `Songs` t2 WHERE t1.id < t2.id AND t1.title = t2.title;");
            // $stmt->execute();
        }
        ?>
    </div>

<!--make sure you you have the configuration on-->

<!--
Configure The "php.ini" File
First, ensure that PHP is configured to allow file uploads.
In your "php.ini" file, search for the file_uploads directive, and set it to On:

file_uploads = On
-->