<!DOCTYPE html>
  <html>
    <head>
      <link rel="stylesheet" href="style.css">
      <title>scene-extractor</title>
    </head>
    <body>
      <header>
        <h1>Scenes extractor</h1>
      </header>
      <main>
      	<?php
      	$episode = $_GET["episode"];
      	$episode = $_GET["season"]."x".$episode;

      	$startm = $_GET["start-m"];
      	$starts = $_GET["start-s"];
      	$endm = $_GET["end-m"];
      	$ends = $_GET["end-s"];

      	$start = ((60*$startm)+$starts);
      	$end = (((60*$endm)+$ends)-$start);

      	$pfad = "/source/";

      	$list="cd \"$pfad\" && ls -d */* | grep $episode";
      	$video=exec("$list");
      	$videolink="\"$pfad$video\"";

      	$link_address = "/dl/aos-$episode-$startm.$starts-$endm.$ends.mp4";

      	$cmd = "HandBrakeCLI -q 24 --optimize --encoder x264 --start-at duration:$start --stop-at duration:$end -i $videolink -o /var/www/html$link_address";
      	exec("$cmd");

      	$changetitle = "exiftool -all= -overwrite_original /var/www/html$link_address";
      	exec ("$changetitle");

      	echo "<p>$video</p>";
      	echo "<p>$startm:$starts - $endm:$ends</p>";
      	echo "<a href='$link_address'>aos.de$link_address</a>";
      	?>
      </main>
      <footer>
        <p>For personal use only!</p>
      </footer>
      </body>
  </html>

