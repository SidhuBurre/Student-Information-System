<?php 

        $con = mysql_connect("localhost", "sidhu", "sidhu");// Simple to understand See this ("server", "username", "password");

        //connecting to server

        if(!$con) 
		{

            die("Could not connect: " . mysql_error()); //mysql_error() will always throw an error if the insert operation fails, so fetching the insert_id is not really necessary as                                                          far as I can see, unless you need it for further processing.

        } 

        if(!mysql_select_db("sidhu", $con)) //selecting the database
	     { 

            echo("Error" . mysql_error()); //If there is an error in Database displays error message

        }

?>

