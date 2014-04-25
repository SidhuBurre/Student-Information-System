<?php

    session_start();

    //echo "Search results here";

	require_once('../connect.php');

    

    if ((isset($_POST['n']))) {

	   $search = stripslashes(strip_tags($_REQUEST['n']));

    } else {$search = 'No value entered';}

    

    $n = $_REQUEST['s']; //getting the cat request 'search' - sidhu



    if(strlen($search)<2){

        die("<p>Search term must be longer than 2 characters</p>");

    } else{

        $searchDB = mysql_real_escape_string($search);

    }

    

    $s_result = "SELECT * FROM student WHERE ";

    

    switch ($n){

        case 1:

        $s_result .= "name LIKE '%{$search}%' ORDER BY name";

        break;

        case 2:

        $s_result .= "roll_no LIKE '%{$search}%' ORDER BY roll_no";

        break;

    }

    

    $searchResults = mysql_query($s_result);

    if(mysql_num_rows($searchResults) < 1){

        echo("<p>The search term - <b><font color=\"green\">'" . $search . "' </font></b> No Results in our Database</p>");

    } else {

        echo "<table id='table'><tr>

        <th>Name</th>

        <th>Roll. no.</th>

        <th>Program</th>

        <th>Branch</th>

        <th>Agg. Marks</th>

        <th>Phone no.</th>";

        if(isset($_SESSION['edit'])){

        echo "<th>Edit</th><th>Delete</th></tr>";            

        }

        $varColor = 1;

        while ($row = mysql_fetch_array($searchResults)) {

            if($varColor == 1) {

            //$imagebytes = $row['image'];

            echo "<tr>";

            echo "<td>" . "<a href='#' id='" . $row['roll_no'] . "' class='profile-load'>" . $row['name'] . "</a>" . "</td>";

            echo "<td>" . $row['roll_no'] . "</td>";

            echo "<td>" . $row['program'] . "</td>";

            echo "<td>" . $row['branch'] . "</td>";

            echo "<td>" . "<a href='#' id ='" . $row['roll_no'] . "' class='click-me'>" . $row['agg_marks'] . "</a>" . "</td>";

            echo "<td>" . $row['phone'] . "</td>";

            if(isset($_SESSION['edit'])){

                echo "<td><a href='#' id='" . $row['roll_no'] . "' class='edit-me'><img src='images/edit.png' alt='edit' /></a></td>";

                echo "<td><a href='#' id='" . $row['roll_no'] . "' class='del-me'><img src='images/del.png' alt='edit' /></a></td>";

            }

            //echo "<td>";

            //header('Content-Type:image/jpeg');

            //print $imagebytes;

            //echo "</td>";

            echo "</tr>";

            $varColor = 0; //to alter row colors - vishu

            } else {

            //$imagebytes = $row['image'];

            echo "<tr class='alt'>";

            echo "<td>" . "<a href='#' id='" . $row['roll_no'] . "' class='profile-load'>" . $row['name'] . "</a>" . "</td>";

            echo "<td>" . $row['roll_no'] . "</td>";

            echo "<td>" . $row['program'] . "</td>";

            echo "<td>" . $row['branch'] . "</td>";

            echo "<td>" . "<a href='#' id ='" . $row['roll_no'] . "' class='click-me'>" . $row['agg_marks'] . "</a>" . "</td>";

            echo "<td>" . $row['phone'] . "</td>";

            if(isset($_SESSION['edit'])){

                echo "<td><a href='#' id='" . $row['roll_no'] . "' class='edit-me'><img src='images/edit.png' alt='edit' /></a></td>";

                echo "<td><a href='#' id='" . $row['roll_no'] . "' class='del-me'><img src='images/del.png' alt='edit' /></a></td>";

            }

            //echo "<td>" . "<img src='" . $imagebytes . "' />" . "</td>";

            echo "</tr>";

            $varColor = 1;

            }          

        }

        echo "</table></br>";

        //ob_end_flush();

        mysql_close($con); 

    }

?><script type="text/javascript" src="ajax/main.js"></script>
