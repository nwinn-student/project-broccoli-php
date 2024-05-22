<!doctype html>

<html lang="en">
	<?php include "header.php";?>
	<?php include "nav.php";?>
	
	<?php
		// Go through /Information contents and print the headers alongside the link to each
		$dir = 'Information';
		$files = scandir($dir);
		print("<p><h1>Information</h1>\n<p>Links</p>");
		
		print("</p>");
		for($i=0; $i < sizeof($files); $i++){
			if($files[$i] != "." && $files[$i] != ".." && $files[$i] != "closer.php" && $files[$i] != "header.php" && $files[$i] != "nav.php" && $files[$i] != "styles.css"){
				$loc = './Information/'.$files[$i];
				print("<p><a href=$loc>$files[$i]</a>\t");
				print(" was last updated: ".date ("F d Y H:i:s.", filemtime($loc))."</p>");
			}
			
		}
		//print_r($files);
		
		
		
		
	?>

	<?php include "closer.php";?>
    </body>

</html>