<?php

	require_once('./connect.php');

    

	//echo ($_POST['first_a_int']);

    $marks_fyr = "INSERT INTO `stusystem`.`firstyr` (`roll_no`, `sub_a`, `sub_b`, `sub_c`, `sub_d`, `sub_e`, `sub_a_int`, `sub_b_int`, `sub_c_int`, `sub_d_int`, `sub_e_int`) VALUES ('$_POST[froll_no]', '$_POST[first_a]', '$_POST[first_b]', '$_POST[first_c]', '$_POST[first_d]', '$_POST[first_e]', '$_POST[first_a_int]', '$_POST[first_b_int]', '$_POST[first_c_int]', '$_POST[first_d_int]', '$_POST[first_e_int]')";    

    if(!mysql_query($marks_fyr, $con)) {

        echo("Error inserting in marks table: " . mysql_error());

    }

    /*

    $agg_marks = (($_POST[first_a] + $_POST[first_b] + $_POST[first_c] + $_POST[first_d] + $_POST[first_e]

                  + $_POST[sec_a] + $_POST[sec_b] + $_POST[sec_c] + $_POST[sec_d] + $_POST[sec_e]

                  + $_POST[third_a] + $_POST[third_b] + $_POST[third_c] + $_POST[third_d] + $_POST[third_e]

                  + $_POST[fourth_a] + $_POST[fourth_b] + $_POST[fourth_c] + $_POST[fourth_d] + $_POST[fourth_e])/2000)*100;

                  

    $stu = "INSERT INTO student (name, roll_no, program, branch, agg_marks, phone) VALUES ('$_POST[fname]', '$_POST[froll_no]', '$_POST[prog]', '$_POST[branch]', '$agg_marks', '$_POST[fphone]')";

    if(!mysql_query($stu, $con)) {

        die("Error inserting in student table: " . mysql_error());

    }

    

    $marks_syr = "INSERT INTO secyr (roll_no, sub_a, sub_b, sub_c, sub_d, sub_e, sub_a_int, sub_b_int, sub_c_int, sub_d_int, sub_e_int) 

                  VALUES ('$_POST[froll_no]', '$_POST[sec_a]', '$_POST[sec_b]', '$_POST[sec_c]', '$_POST[sec_d]', '$_POST[sec_e]', 

                  '$_POST[sec_a_int]', '$_POST[sec_b_int]', '$_POST[sec_int]', '$_POST[sec_d_int]', '$_POST[sec_e_int]')";    

    if(!mysql_query($marks_syr, $con)) {

        die("Error inserting in marks table: " . mysql_error());

    }  

    

    $marks_tyr = "INSERT INTO thirdyr (roll_no, sub_a, sub_b, sub_c, sub_d, sub_e, sub_a_int, sub_b_int, sub_c_int, sub_d_int, sub_e_int) 

                 VALUES ('$_POST[froll_no]', '$_POST[third_a]', '$_POST[third_b]', '$_POST[third_c]', '$_POST[third_d]', '$_POST[third_e]',

                 '$_POST[third_a_int]', '$_POST[third_b_int]', '$_POST[third_int]', '$_POST[third_d_int]', '$_POST[third_e_int]')";    

    if(!mysql_query($marks_tyr, $con)) {

        die("Error inserting in marks table: " . mysql_error());

    } 

    

    $marks_frthyr = "INSERT INTO fourthyr (roll_no, sub_a, sub_b, sub_c, sub_d, sub_e, sub_a_int, sub_b_int, sub_c_int, sub_d_int, sub_e_int) 

                    VALUES ('$_POST[froll_no]', '$_POST[fourth_a]', '$_POST[fourth_b]', '$_POST[fourth_c]', '$_POST[fourth_d]', '$_POST[fourth_e]'

                    '$_POST[fourth_a_int]', '$_POST[fourth_b_int]', '$_POST[fourth_int]', '$_POST[fourth_d_int]', '$_POST[fourth_e_int]')";    

    if(!mysql_query($marks_frthyr, $con)) {

        die("Error inserting in marks table: " . mysql_error());

    } 

    echo "Fill loaded";

    echo $_POST['first_a_int']; */   

?>
