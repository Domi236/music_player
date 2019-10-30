
    // $sql = "INSERT INTO Songs (id, title, artist, album, genre, duration, path, albumOrder, plays) VALUES
    // ($last_id, $ghetto2, 2, 2, 2, 4, $ghetto, 2, 2 )";

    // $result = mysqli_store_result($con, $sql) or die( mysqli_error($con));

    // mysqli_fetch_array($result, MYSQLI_NUM);
    // $path_sql = mysql_query("SELECT `title` FROM `Songs` WHERE `title` = $title");

    // // $einlesen = mysql_query("SELECT COUNT(*) FROM hotels WHERE ID='123'");
    // $einzeln = mysql_fetch_row($path_sql);
    // echo $einzeln;

        
    //    $stmt = $con->prepare("SELECT `title` FROM `Songs` WHERE title = ? ");
    //     $stmt->bind_param("s", $previewtitle);

    //     var_dump($stmt);
    //     // set parameters and execute
    //     $previewtitle = $files[0][$i];;
    //     $stmt->execute();

    //     $query = mysqli_query($con, "SELECT * FROM `Songs` WHERE title = '$title'");

	// 		if(mysqli_num_rows($query) == 1) {
    //             echo 'djiaföoeiö';
	// 			return true;
    //         } else {
    //             var_dump(mysqli_num_rows($query));
    //         }

    //         var_dump($query->fetch_all());


    //funktioniert aber nur nicht mit title da die duplicate noch eine Zahl anhngen
    // DELETE t1 FROM songs t1
    // INNER JOIN songs t2 
    // WHERE 
    // t1.id < t2.id AND 
    // t1.title = t2.title;
    //   // characters to remove
//   $remove = array('(^A-Za-z0-9)');
 
//   // remove to ugly chars
//   $phrase = str_replace($remove, " ", $phrase);
 
//   // remove all double white-spaces
//   while (strpos($phrase, "  ") !== false) $phrase = str_replace("  ", " ", $phrase);
 
//   return trim($phrase);




    //funktioniert aber nur nicht mit title da die duplicate noch eine Zahl anhngen

        // prepare and bind
        // $stmt = $conn->prepare("INSERT INTO Songs ('id', 'title', 'artist', 'album', 'genre', 'duration', 'path', 'albumOrder', 'plays') VALUES 
        //             (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        // $stmt->bind_param("ssssssss", $last_id, $title, $arist, $album, $albugenrem, $time, $path, $albumOrder, $plays);

        // var_dump($stmt);
        // die;
        // exit;
        // // if ($conn->query($stmt) === TRUE) {
        // //     $last_id = $conn->insert_id;
        // // } else {
        // //     echo "Error: " . $sql . "<br>" . $conn->error;
        // // }

        // // set parameters and execute
        // $last_id = $conn->insert_id;
        // $title = $file;
        // $artist = 2;
        // $album = 2;
        // $genre = 2;
        // $duration = 0;
        // $path = 369;
        // $albumOrder = 2;
        // $plays= 0;
        // $stmt->execute();

        // echo "New records created successfully";



// $dir = '\assets\music'; //look for correct path



// echo '<pre>';
// var_dump(scandir(__DIR__ . $dir, 1));
// // echo '</pre>';
// $files = scandir(__DIR__ . $dir, 1);

// foreach($files as $file) {
//     echo $file;
// }

//     // foreach(glob($dir) as $file)  {  
//         // echo $file;  
      

//         // if (!$fileinfo->isDot()) {
//         //     echo 'fejiuagsuh';
//         //     var_dump($fileinfo->getFilename());
//         //     die;

//         // var_dump($fileinfo->getFilename())
          
//         // }
//         // // echo 'scgueh';
//         // var_dump($fileinfo);
//         // printf($fileinfo->getFilename());
//         // echo $fileinfo->getFilename();
//         // die;
        
//         // $file = $fileinfo->getFilename();

//         // echo '<pre>' . $file . '</pre>';




//         // Create connection
//         $servername = "localhost";
//         $username = "root";
//         $password = "";
//         $dbname = "boss_music";
//         $conn = new mysqli($servername, $username, $password, $dbname);
        
        
//         // Check connection
//         if ($conn->connect_error) {
//             die("Connection failed: " . $conn->connect_error);
//         }




//         // prepare and bind
//         $stmt = $conn->prepare("INSERT INTO Songs ('id', 'title', 'artist', 'album', 'genre', 'duration', 'path', 'albumOrder', 'plays') VALUES 
//                     (?, ?, ?, ?, ?, ?, ?, ?, 0)");
//         $stmt->bind_param("ssssssss", $last_id, $title, $arist, $album, $albugenrem, $time, $path, $albumOrder);

//         // if ($conn->query($stmt) === TRUE) {
//         //     $last_id = $conn->insert_id;
//         // } else {
//         //     echo "Error: " . $sql . "<br>" . $conn->error;
//         // }

//         // set parameters and execute
//         $last_id = $conn->insert_id;
//         $title = $file;
//         $artist = 2;
//         $album = 2;
//         $genre = 'nicht ausgewählt';
//         $duration = '00:00';
//         $path = $default_path . $file;
//         $albumOrder = 2;
//         $stmt->execute();

//         echo "New records created successfully";

 
//     // }
//     $stmt->close();
//     $conn->close();
// ?>


// <?php
//     // var $firstelement;
//     // if($firstelement) {

//     //     $firstelement = false;
//     //     $sql = "INSERT INTO Songs ('id', 'title', 'artist', 'album', 'genre', 'duration', 'path', 'albumOrder', 'plays') VALUES 
//     //     ('', $title, 1, $album, $albugenrem, $time, $default_path . $file, $albumOrder, 0);";

//     // } else {
        
//     //         $sql .= "INSERT INTO Songs ('id', 'title', 'artist', 'album', 'genre', 'duration', 'path', 'albumOrder', 'plays') VALUES 
//     //         ('', $title, 1, $album, $albugenrem, $time, $default_path . $file, $albumOrder, 0);";    
//     //     }
  


//     // if (mysqli_multi_query($con,$sql)) {
//     //     do
//     //       {
//     //       // Store first result set
//     //       if ($result=mysqli_store_result($con)) {
//     //         // Fetch one and one row
//     //         while ($row=mysqli_fetch_row($result))
//     //           {
//     //           printf("%s\n",$row[0]);
//     //           }
//     //         // Free result set
//     //         mysqli_free_result($result);
//     //         }
//     //       }
//     //     while (mysqli_next_result($con));
//     // }







// ?>