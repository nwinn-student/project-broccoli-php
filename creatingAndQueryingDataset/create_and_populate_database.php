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
		
		$conn = new mysqli($server,$user,$pass);
		
		//Error with SQL checker
		if ($conn->connect_error){
			die("<p>Connection failed: ".$conn->connect_error."<\p>");
		}

		//Create Database
		$query = "DROP SCHEMA IF EXISTS `userinformation`;";

		
		if($conn->query($query) === TRUE){
		}
		else{
			echo "<p>Error creating database: ".$conn->error."<\p>";
		}		

		//No error
		print("<p>Removed userinformation database should it exist.</p>");
		
		$query = "CREATE SCHEMA `userinformation`;";

		if($conn->query($query) === TRUE){
		}
		else{
			echo "<p>Error creating database: ".$conn->error."<\p>";
		}		

		//No error
		print("<p>Created userinformation database.</p>");

		//Disconnect from SQL
		$conn->close();

		//Now connect using the Database
		$conn = new mysqli($server,$user,$pass,$database);
		
		//Error with SQL checker
		if ($conn->connect_error){
			die("<p>Connection failed: ".$conn->connect_error."<\p>");
		}


		//Create Tables
		$query = "CREATE TABLE userinformation.user(`user_id` int(11) NOT NULL AUTO_INCREMENT, `username` varchar(100) DEFAULT NULL, PRIMARY KEY (`user_id`)) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;";

		if($conn->query($query) === TRUE){
		}
		else{
			echo "<p>Error creating database: ".$conn->error."<\p>";
		}		
		$query = "CREATE TABLE userinformation.stats(`stats_id` int(11) NOT NULL AUTO_INCREMENT, `level` int(11) DEFAULT NULL, `base_health` int(11) DEFAULT NULL, `health` int(11) DEFAULT NULL, `experience` int(11) DEFAULT NULL, `required_experience` int(11) DEFAULT NULL, PRIMARY KEY (`stats_id`)) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;";
		if($conn->query($query) === TRUE){
		}
		else{
			echo "<p>Error creating database: ".$conn->error."<\p>";
		}


		$query = "CREATE TABLE userinformation.user_stats(`user_id` int(11) DEFAULT NULL, `stats_id` int(11) DEFAULT NULL, KEY `user_stats_FK` (`user_id`), KEY `user_stats_FK_1` (`stats_id`)) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;";
		if($conn->query($query) === TRUE){
		}
		else{
			echo "<p>Error creating database: ".$conn->error."<\p>";
		}
		//No error
		print("<p>Created tables for userinformation database.</p>");

		//Generate Sample Data (hard part) idk if it is possible to do in one take or if I need to create 3 separate ones
		$user="";
		for($i = 0; $i < 150; $i++){
			$username = rand(1000000,9999999);
			
			$starterNode = "INSERT INTO userinformation.user\n\tVALUES\n\t\t";
			if($i == 0) $user = $user . $starterNode;
			if($i != 149) $user = $user ."(". $i+1 .",$username),\n\t\t";
			else $user = $user ."(". $i+1 .",". $username .");\n\t\t";

		}
		
		$stats="";
		for($i = 0; $i < 150; $i++){
			$level = rand(1,500);
			$base_health = rand(150,10000);
			$health = rand(200,35000);
			$experience = rand(100,250000);
			$required_experience =$experience + rand(100, 50000);
			
			$starterNode = "INSERT INTO userinformation.stats\n\tVALUES\n\t\t";
			$insertNode = "(". $i+1 .",$level,$base_health,$health,$experience,$required_experience),\n\t\t";
			$insertNodeEnd = "(". $i+1 .",$level,$base_health,$health,$experience,$required_experience);\n\t\t";
			if($i == 0) $stats = $stats . $starterNode;
			if($i != 149) $stats = $stats . $insertNode;
			else $stats = $stats . $insertNodeEnd;

		}

		$user_stats="";
		for($i = 0; $i < 150; $i++){
			$user_id = rand(1,150);
			$stats_id = rand(1,150);
			
			$starterNode = "INSERT INTO userinformation.user_stats\n\tVALUES\n\t\t";
			if($i == 0) $user_stats = $user_stats . $starterNode;
			if($i != 149) $user_stats = $user_stats ."($user_id, $stats_id),\n\t\t";
			else $user_stats = $user_stats ."($user_id, $stats_id);\n\t\t";

		}		


		//Populate Database
		$query = $user;

		if($conn->query($query) === TRUE){
		}
		else{
			echo "<p>Error creating database: ".$conn->error."<\p>";
		}
		$user = NULL;

		$query = $stats;

		if($conn->query($query) === TRUE){
		}
		else{
			echo "<p>Error creating database: ".$conn->error."<\p>";
		}
		$stats = NULL;

		$query = $user_stats;

		if($conn->query($query) === TRUE){
		}
		else{
			echo "<p>Error creating database: ".$conn->error."<\p>";
		}
		$user_stats = NULL;

		//No error
		print("<p>Successfully populated database.</p>");
		
		//Disconnect from SQL
		$conn->close();

	?>
	<!--reference back to initial html page-->
    </body>