<!doctype html>

<html lang="en">
	<?php include "header.php";?>
	<?php include "nav.php";?>

	<?php
		// Go through /Blogs contents and print the headers alongside the link to each
		$dir = 'Blog';
		$files = scandir($dir);
		print("<p><h1>Blog</h1>\nLinks");
		print("</p>");
		for($i=0; $i < sizeof($files); $i++){
			if($files[$i] != "." && $files[$i] != ".." && $files[$i] != "closer.php" && $files[$i] != "header.php" && $files[$i] != "nav.php" && $files[$i] != "styles.css"){
				print("<p><a href='/practice/template/Blog/$files[$i]'>$files[$i]</a></p>");
			}
			
		}
		//print_r($files);



	?>


	<?php include "closer.php";?>
    </body>

</html>