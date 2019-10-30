<?php

    

    //get a files array
    $pfad = scandir(__DIR__ . $dir, 1);

     echo '<pre>';;
     var_dump($pfad);
    echo '</pre>';
    // exit;
    //key=value no need
    // $result = array_combine($files, $files);
    unset($pfad[array_search('.',$pfad)],$pfad[array_search('..',$pfad)]);

    //get an array of filee hashes
    $hashArr = [];
        foreach ($pfad as $datei) {
        $fileHash = md5_file($datei);
        $hashArr[$datei] = $fileHash;
    //    array_push($hashArr, $file);
    }

    //search for duplicates
    $arr_unique = array_unique($hashArr);
    $arr_duplicates = array_diff_assoc($hashArr, $arr_unique);
    //write duplicates in a file
    $fp = fopen('values.txt', 'a+');
    foreach($arr_duplicates as $fileName=>$fileHash) {
        fwrite($fp, $fileName."\r\n"); 
    }
    fclose($fp);