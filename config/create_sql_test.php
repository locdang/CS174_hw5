<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $database = "SQL_TEST";

    $db = mysqli_connect($host, $user, $pass) or die('Could not connect: ' . mysql_error());
    
   // USER(ID CHAR(9), NAME VARCHAR(20))
   //USER_POST(USER_ID CHAR(9), TWEETS VAR_CHAR(140), WHEN INTEGER)
    
    $query = "";
    $query .= "DROP DATABASE IF EXISTS $database;";
    $query .= "CREATE DATABASE $database;";
    $query .= "USE $database;";
    $query .= "DROP TABLE IF EXISTS USER;";
    $query .= "CREATE TABLE USER (ID CHAR(9) not null, NAME VARCHAR(20) not null, PRIMARY KEY(ID));";
    $query .= "DROP TABLE IF EXISTS USER_POST;";
    $query .= "CREATE TABLE USER_POST (USER_ID CHAR(9) not null, TWEETS VARCHAR(140) not null, TIME INT, PRIMARY KEY(USER_ID), FOREIGN KEY(USER_ID) REFERENCES USER(ID));";
    
    if (mysqli_multi_query($db,$query)) {
        echo "Database and Schemas for $database created successfully.";
    } 
    else {
         echo "Error creating initial database $database " . mysqli_error($db);
    }
?>
