
1) loop over all paths from the music list 
2) generate an array with all of them
3) find the title for the sql stm in the path
4) generate the path flexible
5)look for the gnere, make own gneres
6) read out the duration
7)look what is artist
8)replace genre number with the name of the genre, the same by album
9) then generate an SQL statement with them
10) then fill them all in the same playlist 
11)genre 'nicht ausgewählt' hinzufügen
12) make this statement open for the frontend(file via navigation, playlist, generate new playlist)
13) überprüfe ob das keine doppelten pfade dan in die Datenbank geladen werden
when you load music playlists from you tube, take care that you can download only max 12 songs at the same time from youtube.
use shazam and then delete all
make button for new genres
"INSERT INTO Songs ('id', 'title', 'artist', 'album', 'genre', 'duration', 'path', 'albumOrder', 'plays') VALUES 
                    ($last_id, $title, $arist, $album, $albugenrem, $time, $path, $albumOrder, 0)"


13) get drag and drop libary 'sortable.js'
14) look for better password decription
15) php-fig.org (php coding standard)


ini_set('display_errors', 1);
error_reporting(E_ALL);