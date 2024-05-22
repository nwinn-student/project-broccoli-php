<!doctype html>

<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PHP</title>

        <!-- Load external CSS styles -->
	<link rel="stylesheet" href="styles.css">
    </head>

    <body>
	<div style="background-color: rgb(51, 51, 51);">
            <h1>Create Data</h1>
        </div>
	<?php

		//Connect to SQL
		$server='localhost';
		$user='root';
		$pass='';
		$database='userinformation';
		
		//Now connect using the Database
		$conn = new mysqli($server,$user,$pass,$database);
		
		//Error with SQL checker
		$connect = '';
		try{
			$connect = mysqli_connect($server,$user,$pass,$database);
		} catch(Exception $e){
			die("<p>Error: Cannot connect to database $database on server $server using username $user (Error No. ".mysqli_connect_errno().", ".mysqli_connect_error().")</p>");
		}



		//Find data.

		//Q1: Write a query to find the usernames of individuals with a higher level than 350, usernames should be listed only once.  They should then be sorted by level.
		$query = "SELECT DISTINCT username, `level`
FROM userinformation.`user`, userinformation.stats, userinformation.user_stats
WHERE `user`.user_id = user_stats.user_id 
	AND stats.stats_id = user_stats.stats_id 
	AND stats.`level` > 350
ORDER BY `level`
ASC
LIMIT 500";
		
		print("<p>Q1: Write a query to find the usernames of individuals with a higher level than 350, usernames should be listed only once.  They should then be sorted by level.</p>");
		//Check for error in query
		try{
			$result = mysqli_query($connect, $query);
		}
		catch(Exception $e){
			die("<p>Could not successfully run query ($query) from $database:".mysqli_error($connect)."</p>");
		}
		
		//Results checker
		if(mysqli_num_rows($result) == 0){
			print("No records were found with query $query");
		}
		else{
			//What do we expect to get?
			$row; $usernames; $level;
			
			//Output
			print("<table>");
			print("<tr><th>Username</th><th>Level</th></tr>");
			while($row = mysqli_fetch_assoc($result)){
				//Rows of Table
				$username = $row['username'];
				$level = $row['level'];
				print("<tr><td>".$username."</td><td>".$level."</td></tr>");
			}
			print("</table>\n<p></p>");
			
		}
		
		//Q2: Write a query to find the username, level, and health of all users.

		$query = "SELECT username, `level`, health
FROM userinformation.`user`, userinformation.stats, userinformation.user_stats
WHERE `user`.user_id = user_stats.user_id 
	AND stats.stats_id = user_stats.stats_id 
ORDER BY `level`, health
ASC
LIMIT 500";

		print("<p>Q2: Write a query to find the username, level, and health of all users.</p>");
		//Check for error in query
		try{
			$result = mysqli_query($connect, $query);
		}
		catch(Exception $e){
			die("<p>Could not successfully run query ($query) from $database:".mysqli_error($connect)."</p>");
		}
		
		//Results checker
		if(mysqli_num_rows($result) == 0){
			print("No records were found with query $query");
		}
		else{
			//What do we expect to get?
			$row; $usernames; $level; $health;
			
			//Output
			print("<table>");
			print("<tr><th>Username</th><th>Level</th><th>Health</th></tr>");
			while($row = mysqli_fetch_assoc($result)){
				//Rows of Table
				$username = $row['username'];
				$level = $row['level'];
				$health = $row['health'];
				print("<tr><td>".$username."</td><td>".$level."</td><td>$health</td></tr>");
			}
			print("</table>\n<p></p>");
			
		}

		//Q3: Write a query to produce the average level, health, and experience of all users.

		$query = "SELECT AVG(`level`) as `level`, AVG(health) as health, AVG(experience) as experience
FROM userinformation.`user`, userinformation.stats, userinformation.user_stats
WHERE `user`.user_id = user_stats.user_id 
	AND stats.stats_id = user_stats.stats_id 
LIMIT 500";

		print("<p>Q3: Write a query to produce the average level, health, and experience of all users.
</p>");
		//Check for error in query
		try{
			$result = mysqli_query($connect, $query);
		}
		catch(Exception $e){
			die("<p>Could not successfully run query ($query) from $database:".mysqli_error($connect)."</p>");
		}
		
		//Results checker
		if(mysqli_num_rows($result) == 0){
			print("No records were found with query $query");
		}
		else{
			//What do we expect to get?
			$row; $level; $health; $experience;
			
			//Output
			print("<table>");
			print("<tr><th>Level</th><th>Health</th><th>Experience</th></tr>");
			while($row = mysqli_fetch_assoc($result)){
				//Rows of Table
				$level = $row['level'];
				$health = $row['health'];
				$experience = $row['experience'];
				print("<tr><td>".$level."</td><td>".$health."</td><td>$experience</td></tr>");
			}
			print("</table>\n<p></p>");
			
		}

		//Q4: Write a query that finds the username and experience for users that are in between levels 50 and 100.

		$query = "SELECT username, experience
FROM userinformation.`user`, userinformation.stats, userinformation.user_stats
WHERE `user`.user_id = user_stats.user_id 
	AND stats.stats_id = user_stats.stats_id 
	AND (stats.`level` >= 50 AND stats.`level` <= 100)
ORDER BY experience
ASC
LIMIT 500";

		print("<p>Q4: Write a query that finds the username and experience for users that are in between levels 50 and 100.</p>");
		//Check for error in query
		try{
			$result = mysqli_query($connect, $query);
		}
		catch(Exception $e){
			die("<p>Could not successfully run query ($query) from $database:".mysqli_error($connect)."</p>");
		}
		
		//Results checker
		if(mysqli_num_rows($result) == 0){
			print("No records were found with query $query");
		}
		else{
			//What do we expect to get?
			$row; $usernames; $experience;
			
			//Output
			print("<table>");
			print("<tr><th>Username</th><th>Experience</th></tr>");
			while($row = mysqli_fetch_assoc($result)){
				//Rows of Table
				$username = $row['username'];
				$experience = $row['experience'];
				print("<tr><td>".$username."</td><td>".$experience."</td></tr>");
			}
			print("</table>\n<p></p>");
			
		}

		//Querying complete.  Now we must derive, we can derive the difference between the experience and requiredexperience
		//The same can be done for health and basehealth.

		// Now we need to add the columns
		$addCol = "ALTER TABLE stats
ADD COLUMN delta_health int(11),
ADD COLUMN delta_experience int(11);";

		//Check for error in query
		try{
			mysqli_query($connect, $addCol);
		}
		catch(Exception $e){
			die("<p>Could not successfully run query ($addCol) from $database:".mysqli_error($connect)."</p>");
		}


		//Add the values to the column
		$query = "UPDATE userinformation.stats
SET delta_health = health-base_health;";

		//Check for error in query
		try{
			mysqli_query($connect, $query);
		}
		catch(Exception $e){
			die("<p>Could not successfully run query ($query) from $database:".mysqli_error($connect)."</p>");
		}

		$query = "UPDATE userinformation.stats
SET delta_experience = required_experience-experience;";

		
		//Check for error in query
		try{
			mysqli_query($connect, $query);
		}
		catch(Exception $e){
			die("<p>Could not successfully run query ($query) from $database:".mysqli_error($connect)."</p>");
		}


		//Disconnect from SQL
		mysqli_close($connect);

	?>
	<!--reference back to initial html page-->
    </body>