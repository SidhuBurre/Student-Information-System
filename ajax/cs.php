<html>
<body>
    <?php
		require_once('../connect.php');
        
        $result = mysql_query("SELECT * FROM student WHERE branch = 'CS'");
        echo "<table id='table'><tr>
        <th>Name</th>
        <th>Roll. no.</th>
        <th>Program</th>
        <th>Branch</th>
        <th>Agg. Marks</th>
        <th>Phone no.</th>";
        $varColor = 1;
        while ($row = mysql_fetch_array($result)) {
            if($varColor == 1) {
            //$imagebytes = $row['image'];
            echo "<tr>";
            echo "<td>" . "<a href='#' class='click-me'>" . $row['name'] . "</a>" . "</td>";
            echo "<td>" . $row['roll_no'] . "</td>";
            echo "<td>" . $row['program'] . "</td>";
            echo "<td>" . $row['branch'] . "</td>";
            echo "<td>" . "<a href='#' class='click-me'>" . $row['agg_marks'] . "</a>" . "</td>";
            echo "<td>" . $row['phone'] . "</td>";
            //echo "<td>" . "<img src='" . $imagebytes . "' />" . "</td>";
            echo "</tr>";
            $varColor = 0; //to alter row colors - vishu
            } else {
                //$imagebytes = $row['image'];
            echo "<tr class='alt'>";
            echo "<td>" . "<a href='#' class='click-me'>" . $row['name'] . "</a>" . "</td>";
            echo "<td>" . $row['roll_no'] . "</td>";
            echo "<td>" . $row['program'] . "</td>";
            echo "<td>" . $row['branch'] . "</td>";
            echo "<td>" . "<a href='ajax/test.php'>" . $row['agg_marks'] . "</a>" . "</td>";
            echo "<td>" . $row['phone'] . "</td>";
            //echo "<td>" . "<img src='" . $imagebytes . "' />" . "</td>";
            echo "</tr>";
            $varColor = 1;
            }
            
        }
        echo "</table></br>";
        mysql_close($con);
              
    ?>
    <script type="text/javascript" src="ajax/main.js"></script>
</body>
</html>
