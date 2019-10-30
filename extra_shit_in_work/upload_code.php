$query = mysqli_query($con, "SELECT `name` FROM `genres`;");
        $genres = array();
        while($row = mysqli_fetch_array($query)) {
            array_push($genres, $row['name']);
        }
        $genre_length = sizeof($genres); 



        $sql = "SELECT `id`, `name` FROM `playlists`";
        $result = mysqli_query($con, $sql);

        var_dump($result);
        die;
        
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
            }
        } else {
            echo "0 results";
        }

        die;

        $query = mysqli_query($con, "SELECT (`id`, `name`) FROM `playlists`;");
        // $playlists = array();
        while($row = mysqli_fetch_array($query) ) {
            $playlists = new Playlist($con, $row);

            // array_push($playlists, $row['id'], $row['name']);
            
            echo "<div value='" . $playlists->getId() . "'>" . $playlists->getName() . "</div>";
            var_dump($playlists->getName());
            // echo "<div value='" . $row['id'] . "'>" .$row['name'] . "</div>";
        }
        // $playlists_length = sizeof($playlists); 
        die;

        $query = mysqli_query($con, "SELECT `title` FROM `albums`;");
        $albums = array();
        while($row = mysqli_fetch_array($query)) {
            array_push($albums, $row['title']);
        }
        $albums_length = sizeof($albums); 

        var_dump( $albums_length);
        var_dump( $albums);
        echo '<br>';
        var_dump( $genre_length);
        var_dump( $genres);
        echo '<br>';
        // var_dump( $playlists_length);
        // var_dump( $playlists);
