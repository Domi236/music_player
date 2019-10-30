-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 30. Okt 2019 um 20:18
-- Server-Version: 10.3.16-MariaDB
-- PHP-Version: 7.1.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `boss_music`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `songs`
--

CREATE TABLE `songs` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `artist` int(11) NOT NULL,
  `album` int(11) NOT NULL,
  `genre` int(11) NOT NULL,
  `duration` varchar(8) NOT NULL,
  `path` varchar(500) NOT NULL,
  `albumOrder` int(11) NOT NULL,
  `plays` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `songs`
--

INSERT INTO `songs` (`id`, `title`, `artist`, `album`, `genre`, `duration`, `path`, `albumOrder`, `plays`) VALUES
(14734, 'ã€ŒNightcoreã€â†’ Calm Down', 2, 2, 2, '00:03:21', 'assets/music/ã€ŒNightcoreã€â†’ Calm Down.mp3', 2, 1),
(14735, 'â™ª Nightcore - Look What You Made Me Do', 2, 2, 2, '00:03:01', 'assets/music/â™ª Nightcore - Look What You Made Me Do.mp3', 2, 0),
(14737, '[Hardtekk] Lennox - Kinder der Stadt ', 2, 2, 2, '00:03:45', 'assets/music/[Hardtekk] Lennox - Kinder der Stadt (2).mp3', 2, 1),
(14740, 'Timmy Trumpet - Oracle (Official Music Video) ', 2, 2, 2, '00:03:05', 'assets/music/Timmy Trumpet - Oracle (Official Music Video) (2).mp3', 2, 0),
(14743, 'Roundtable Rival - Lindsey Stirling ', 2, 2, 2, '00:03:38', 'assets/music/Roundtable Rival - Lindsey Stirling (2).mp3', 2, 2),
(14746, 'Querox & Phaxe - Tripical Moon ', 2, 2, 2, '00:07:18', 'assets/music/Querox & Phaxe - Tripical Moon (2).mp3', 2, 1),
(14749, 'PSY-TRANCE â—‰ ^_^ïŽ¶ïŽµImagine Dragons - Believer....... ', 2, 2, 2, '00:05:44', 'assets/music/PSY-TRANCE â—‰ ^_^ïŽ¶ïŽµImagine Dragons - Believer....... (2).mp3', 2, 2),
(14752, 'PSY-TRANCE â—‰ The White Stripes - Seven Nation Army (Impact Groove, Freak Out, Phantom & Kova Remix) ', 2, 2, 2, '00:06:05', 'assets/music/PSY-TRANCE â—‰ The White Stripes - Seven Nation Army (Impact Groove, Freak Out, Phantom & Kova Remix) (2).mp3', 2, 1),
(14755, 'PSY-TRANCE â—‰ GTA - Red Lips (Aliens & Ghosts Remix) feat. Sam Bruno ', 2, 2, 2, '00:05:38', 'assets/music/PSY-TRANCE â—‰ GTA - Red Lips (Aliens & Ghosts Remix) feat. Sam Bruno (2).mp3', 2, 1),
(14758, 'PSY TRANCE â—‰ Seven Lions Blastoyz feat Fiora After Dark ', 2, 2, 2, '00:03:50', 'assets/music/PSY TRANCE â—‰ Seven Lions Blastoyz feat Fiora After Dark (2).mp3', 2, 0),
(14759, 'Nightcore â†’ Savages (lyrics)', 2, 2, 2, '00:03:55', 'assets/music/Nightcore â†’ Savages (lyrics).mp3', 2, 0),
(14760, 'Nightcore - Zombie', 2, 2, 2, '00:02:28', 'assets/music/Nightcore - Zombie.mp3', 2, 0),
(14761, 'Nightcore - WTF [NMV]', 2, 2, 2, '00:02:18', 'assets/music/Nightcore - WTF [NMV].mp3', 2, 0),
(14765, 'Nightcore - Sweet but Psycho - (Lyrics) ', 2, 2, 2, '00:02:49', 'assets/music/Nightcore - Sweet but Psycho - (Lyrics) (2).mp3', 2, 0),
(14766, 'Nightcore - Soldier', 2, 2, 2, '00:02:55', 'assets/music/Nightcore - Soldier.mp3', 2, 1),
(14768, 'Nightcore - Scared To Be Lonely ', 2, 2, 2, '00:03:28', 'assets/music/Nightcore - Scared To Be Lonely (2).mp3', 2, 0),
(14769, 'Nightcore - Play [NMV]', 2, 2, 2, '00:02:28', 'assets/music/Nightcore - Play [NMV].mp3', 2, 1),
(14770, 'Nightcore - Legends Never Die', 2, 2, 2, '00:03:24', 'assets/music/Nightcore - Legends Never Die.mp3', 2, 1),
(14772, 'Nightcore - In The End (Cover)   Switching Vocals   Lyricsã€ŒLinkin Parkã€ ', 2, 2, 2, '00:03:28', 'assets/music/Nightcore - In The End (Cover)   Switching Vocals   Lyricsã€ŒLinkin Parkã€ (2).mp3', 2, 0),
(14773, 'Nightcore - I Like It Loud [NMV]', 2, 2, 2, '00:03:13', 'assets/music/Nightcore - I Like It Loud [NMV].mp3', 2, 0),
(14774, 'Nightcore - Hate Me [NMV]', 2, 2, 2, '00:02:42', 'assets/music/Nightcore - Hate Me [NMV].mp3', 2, 1),
(14777, 'Nightcore - Go Go Go ', 2, 2, 2, '00:02:41', 'assets/music/Nightcore - Go Go Go (2).mp3', 2, 0),
(14778, 'Nightcore - Candy', 2, 2, 2, '00:03:04', 'assets/music/Nightcore - Candy.mp3', 2, 1),
(14779, 'Nightcore - 911 (Male Version)', 2, 2, 2, '00:02:46', 'assets/music/Nightcore - 911 (Male Version).mp3', 2, 0),
(14780, 'Nightcore - 16 Shots', 2, 2, 2, '00:03:21', 'assets/music/Nightcore - 16 Shots.mp3', 2, 0),
(14783, 'Night Club -  Show It 2 Me  (Official 360 Video) ', 2, 2, 2, '00:04:09', 'assets/music/Night Club -  Show It 2 Me  (Official 360 Video) (2).mp3', 2, 0),
(14786, 'Naturalize - Hard Like A Drum (Rebugs Remix) ', 2, 2, 2, '00:06:12', 'assets/music/Naturalize - Hard Like A Drum (Rebugs Remix) (2).mp3', 2, 0),
(14789, 'Michael Jackson - Beat It (Amir Bootleg) ', 2, 2, 2, '00:07:08', 'assets/music/Michael Jackson - Beat It (Amir Bootleg) (2).mp3', 2, 0),
(14790, 'Lucky Luke - Cooler Than Me (Official Video)', 2, 2, 2, '00:03:27', 'assets/music/Lucky Luke - Cooler Than Me (Official Video).mp3', 2, 1),
(14793, 'Lewis Capaldi - Someone You Loved (Paul Gannon Bootleg) ', 2, 2, 2, '00:04:12', 'assets/music/Lewis Capaldi - Someone You Loved (Paul Gannon Bootleg) (2).mp3', 2, 3),
(14796, 'James Bay - Let It Go [REMIX] ', 2, 2, 2, '00:03:49', 'assets/music/James Bay - Let It Go [REMIX] (2).mp3', 2, 3),
(14799, 'Infected Mushroom - Demons Of Pain (Kova, Impact Groove Remix) ', 2, 2, 2, '00:07:46', 'assets/music/Infected Mushroom - Demons Of Pain (Kova, Impact Groove Remix) (2).mp3', 2, 2),
(14802, 'Gorillaz - Feel Good Inc (Ish K Bootleg) ', 2, 2, 2, '00:06:24', 'assets/music/Gorillaz - Feel Good Inc (Ish K Bootleg) (2).mp3', 2, 2),
(14805, 'GReeeN - KÃ¶nig der LÃ¼gner (REGGAE COVER GENETIKK) Instr. prod. by THELIFE ', 2, 2, 2, '00:03:29', 'assets/music/GReeeN - KÃ¶nig der LÃ¼gner (REGGAE COVER GENETIKK) Instr. prod. by THELIFE (2).mp3', 2, 0),
(14808, 'Far Out - On My Own (feat. Karra) ', 2, 2, 2, '00:04:30', 'assets/music/Far Out - On My Own (feat. Karra) (2).mp3', 2, 0),
(14809, 'Evanescence - Bring Me To Life (Rad!cal Jaay & Nic Spiteri Bootleg)', 2, 2, 2, '00:05:45', 'assets/music/Evanescence - Bring Me To Life (Rad!cal Jaay & Nic Spiteri Bootleg).mp3', 2, 0),
(14812, 'Earphonic - Believe (Original Mix) ', 2, 2, 2, '00:08:50', 'assets/music/Earphonic - Believe (Original Mix) (2).mp3', 2, 1),
(14815, 'Dynoro & Gigi Dâ€™Agostino - In My Mind (Harlie & Charper Bootleg)   FBM ', 2, 2, 2, '00:03:57', 'assets/music/Dynoro & Gigi Dâ€™Agostino - In My Mind (Harlie & Charper Bootleg)   FBM (2).mp3', 2, 4),
(14818, 'Cloud7 - True Life ', 2, 2, 2, '00:06:06', 'assets/music/Cloud7 - True Life (2).mp3', 2, 2),
(14821, 'Caravan Palace - Lone Digger (Phietto Remix) ', 2, 2, 2, '00:03:09', 'assets/music/Caravan Palace - Lone Digger (Phietto Remix) (2).mp3', 2, 1),
(14824, 'CHROMOSOM - Greetings ', 2, 2, 2, '00:06:05', 'assets/music/CHROMOSOM - Greetings (2).mp3', 2, 0),
(14827, 'Blur Everything Expect The Hovered - Pure Html and CSS Image Hover Effects Tutorial ', 2, 2, 2, '00:05:08', 'assets/music/Blur Everything Expect The Hovered - Pure Html and CSS Image Hover Effects Tutorial (2).mp3', 2, 1),
(14828, '3 HOURS of Best Gaming music   No Copyright Sounds   Music for Gaming', 2, 2, 2, '03:03:27', 'assets/music/3 HOURS of Best Gaming music   No Copyright Sounds   Music for Gaming.mp3', 2, 2),
(14829, '..', 2, 2, 2, '00:00:00', 'assets/music/..', 2, 0),
(14830, '.', 2, 2, 2, '00:00:00', 'assets/music/.', 2, 0);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `songs`
--
ALTER TABLE `songs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14831;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
