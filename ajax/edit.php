<?php

        session_start();

?>   

<html>

<body>     

<?php        

		require_once('../connect.php');

        $id = $_GET['id'];

        $d = $_GET['d'];

        $sql1 = mysql_query("SELECT * FROM firstyr WHERE roll_no =" . $id);

        $sql2 = mysql_query("SELECT * FROM secyr WHERE roll_no =" . $id);

        $sql3 = mysql_query("SELECT * FROM thirdyr WHERE roll_no =" . $id);

        $sql4 = mysql_query("SELECT * FROM fourthyr WHERE roll_no =" . $id);

        $sql5 = mysql_query("SELECT * FROM student WHERE roll_no =" . $id);

        $row1 = mysql_fetch_array($sql1);

        $row2 = mysql_fetch_array($sql2);

        $row3 = mysql_fetch_array($sql3);

        $row4 = mysql_fetch_array($sql4);

        $row5 = mysql_fetch_array($sql5); 

        

        //record deletion code- vishu

        if($d == 1){

          $imgdel = "img_student/" . $id . "." . $row5['imgext'];

          //chmod("/ajax/img_student/" . $id . "." . $row5['imgext'],0750);

          if(!realpath($imgdel)){echo "Error in path";}

          if(is_readable($imgdel)){

          unlink($imgdel);              

          }else {echo "error- not readable";}

          //unlink("ajax/img_student/111111.jpg");

          echo $imgdel;

          if(!mysql_query("DELETE FROM student WHERE roll_no='$id'")){echo "error del:- " . mysql_error();}

          mysql_query("DELETE FROM firstyr WHERE roll_no='$id'"); 

          mysql_query("DELETE FROM secyr WHERE roll_no='$id'");

          mysql_query("DELETE FROM thirdyr WHERE roll_no='$id'");

          mysql_query("DELETE FROM fourthyr WHERE roll_no='$id'");           

  

        }                                             

        

        $v1 = "";

        $v2 = "";

        $v3 = "";

        $v4 = "";

        $v5 = "";

        $v6 = "";

        $v7 = "";

        $v8 = "";

        

        if($row5['program'] == "Diploma.")$v1 = "checked = 'checked'"; 

        if($row5['program'] == "B.Tech.")$v8 = "checked = 'checked'"; 

        if($row5['branch'] == "CS")$v2 = "checked = 'checked'";

        if($row5['branch'] == "EC")$v3 = "checked = 'checked'";

        if($row5['branch'] == "IT")$v4 = "checked = 'checked'";

        if($row5['branch'] == "ME")$v5 = "checked = 'checked'";

        if($row5['branch'] == "EE")$v6 = "checked = 'checked'";

        if($row5['branch'] == "N/A")$v7 = "checked = 'checked'";

        

        /*$ext= mysql_fetch_array(mysql_query("SELECT imgext FROM student WHERE roll_no='$id'"));

        $extension = $ext['imgext'];

        echo ($extension);*/

        

?>

                <h4>Edit student data </h4>

                    <div id="form">

                    <form enctype="multipart/form-data" id="edit_form" method="post" action="fill_edit.php?id=<?php echo($id)?>">

                        <div><label class="leflabel">Name:</label><input type="text" size="15" class="finput" name="fname" value="<?php echo ($row5['name']); ?>" /></div>

                        <div><label class="leflabel">Roll no:</label><input type="text" size="15" class="finput" name="froll_no" value="<?php echo ($row5['roll_no']); ?>" /></div>

                        <div><label class="leflabel">Phone:</label><input type="text" size="15" class="finput" name="fphone" value="<?php echo ($row5['phone']); ?>"/></div>

                                                

                        <div>

                            <label class="leflabel">Photo:</label><input name="image" type="file" value="<?php echo ("ajax/img_student/".$row5['roll_no']. "." . $row5['imgext']); ?>"/>

                       </div>

                        

                        <div>

                            <label class="leflabel">Program:</label>

                            <input type="radio" name="prog" <?php echo($v1) ?> value="Diploma." /><label>B.Tech.</label>

                            <input type="radio" name="prog" <?php echo($v8) ?> value="B.Tech." /><label>MCA</label>           

                        </div>

                        <div>

                            <label class="leflabel">Branch:</label>

            

                            <input type="radio" name="branch" <?php echo($v7) ?> value="N/A" /><label>N/A</label>

                            <input type="radio" <?php echo($v2) ?> name="branch" value="CS" /><label>CS</label>

                            <input type="radio" <?php echo($v3) ?> name="branch" value="EC" /><label>EC</label>

                            <input type="radio" <?php echo($v4) ?> name="branch" value="IT" /><label>IT</label>

                            <input type="radio" <?php echo($v5) ?> name="branch" value="ME" /><label>ME</label>

                            <input type="radio" <?php echo($v6) ?> name="branch" value="EE" /><label>EN</label>

                                              

                        </div>

                        

                        <div><label class="leflabel">Marks:</label>

                        

                        <div class="grid_4">   

                        <img src="images/marks-top.jpg" width="240" height="8" />                       

                            <div id="marks"><!-- marks -->

                                <a href="#" id="next"><img src="images/mark_rarr.jpg"/></a>

                                <a href="#" id="prev"><img src="images/mark_larr.jpg"/></a>

                                <div id="wrap">

  

                                <div class="slideshow">

                                <div id="slide1">

                                    <h4>First Year</h4><br />

                                    <label>Sub A:</label><input type="text" value="<?php echo ($row1['sub_a']); ?>" name="first_a" size="10" /><br />

                                    <label>Sub B:</label><input type="text" value="<?php echo ($row1['sub_b']); ?>" name="first_b" size="10" /><br />

                                    <label>Sub C:</label><input type="text" value="<?php echo ($row1['sub_c']); ?>" name="first_c" size="10" /><br />

                                    <label>Sub D:</label><input type="text" value="<?php echo ($row1['sub_d']); ?>" name="first_d" size="10" /><br />

                                    <label>Sub E:</label><input type="text" value="<?php echo ($row1['sub_e']); ?>" name="first_e" size="10" /><br />                                    

                                </div><!-- end slide1 -->



                                <div id="slide1_b">

                                    <h4>First Year</h4>

                                    <h4>(Internal)</h4><br />

                                    <label>Sub A:</label><input type="text" value="<?php echo ($row1['sub_a_int']); ?>" name="first_a_int" size="10" /><br />

                                    <label>Sub B:</label><input type="text" value="<?php echo ($row1['sub_b_int']); ?>" name="first_b_int" size="10" /><br />

                                    <label>Sub C:</label><input type="text" value="<?php echo ($row1['sub_c_int']); ?>" name="first_c_int" size="10" /><br />

                                    <label>Sub D:</label><input type="text" value="<?php echo ($row1['sub_d_int']); ?>" name="first_d_int" size="10" /><br />

                                    <label>Sub E:</label><input type="text" value="<?php echo ($row1['sub_e_int']); ?>" name="first_e_int" size="10" /><br />

                                </div><!-- end slide1 -->



                                <div id="slide2">

                                    <h4>Second Year</h4><br />

                                    <label>Sub A:</label><input type="text" value="<?php echo ($row2['sub_a']); ?>" name="sec_a" size="10" /><br />

                                    <label>Sub B:</label><input type="text" value="<?php echo ($row2['sub_b']); ?>" name="sec_b" size="10" /><br />

                                    <label>Sub C:</label><input type="text" value="<?php echo ($row2['sub_c']); ?>" name="sec_c" size="10" /><br />

                                    <label>Sub D:</label><input type="text" value="<?php echo ($row2['sub_d']); ?>" name="sec_d" size="10" /><br />

                                    <label>Sub E:</label><input type="text" value="<?php echo ($row2['sub_e']); ?>" name="sec_e" size="10" /><br />                                    

                                </div><!-- end slide2 -->



                                <div id="slide2_b">

                                    <h4>Second Year</h4>

                                    <h4>(Internal)</h4><br />

                                    <label>Sub A:</label><input type="text" value="<?php echo ($row2['sub_a_int']); ?>" name="sec_a_int" size="10" /><br />

                                    <label>Sub B:</label><input type="text" value="<?php echo ($row2['sub_b_int']); ?>" name="sec_b_int" size="10" /><br />

                                    <label>Sub C:</label><input type="text" value="<?php echo ($row2['sub_c_int']); ?>" name="sec_c_int" size="10" /><br />

                                    <label>Sub D:</label><input type="text" value="<?php echo ($row2['sub_d_int']); ?>" name="sec_d_int" size="10" /><br />

                                    <label>Sub E:</label><input type="text" value="<?php echo ($row2['sub_e_int']); ?>" name="sec_e_int" size="10" /><br />

                                </div><!-- end slide2 -->



                                <div id="slide3">

                                    <h4>Third Year</h4><br />

                                    <label>Sub A:</label><input type="text" value="<?php echo ($row3['sub_a']); ?>" name="third_a" size="10" /><br />

                                    <label>Sub B:</label><input type="text" value="<?php echo ($row3['sub_b']); ?>" name="third_b" size="10" /><br />

                                    <label>Sub C:</label><input type="text" value="<?php echo ($row3['sub_c']); ?>" name="third_c" size="10" /><br />

                                    <label>Sub D:</label><input type="text" value="<?php echo ($row3['sub_d']); ?>" name="third_d" size="10" /><br />

                                    <label>Sub E:</label><input type="text" value="<?php echo ($row3['sub_e']); ?>" name="third_e" size="10" /><br />

                                </div><!-- end slide3 -->



                                <div id="slide3_b">

                                    <h4>Third Year</h4>

                                    <h4>(Internal)</h4><br />

                                    <label>Sub A:</label><input type="text" value="<?php echo ($row3['sub_a_int']); ?>" name="third_a_int" size="10" /><br />

                                    <label>Sub B:</label><input type="text" value="<?php echo ($row3['sub_b_int']); ?>" name="third_b_int" size="10" /><br />

                                    <label>Sub C:</label><input type="text" value="<?php echo ($row3['sub_c_int']); ?>" name="third_c_int" size="10" /><br />

                                    <label>Sub D:</label><input type="text" value="<?php echo ($row3['sub_d_int']); ?>" name="third_d_int" size="10" /><br />

                                    <label>Sub E:</label><input type="text" value="<?php echo ($row3['sub_e_int']); ?>" name="third_e_int" size="10" /><br />

                                </div><!-- end slide3 -->



                                <div id="slide4">

                                    <h4>Fourth Year</h4><br />

                                    <label>Sub A:</label><input type="text" value="<?php echo ($row4['sub_a']); ?>" name="fourth_a" size="10" /><br />

                                    <label>Sub B:</label><input type="text" value="<?php echo ($row4['sub_b']); ?>" name="fourth_b" size="10" /><br />

                                    <label>Sub C:</label><input type="text" value="<?php echo ($row4['sub_c']); ?>" name="fourth_c" size="10" /><br />

                                    <label>Sub D:</label><input type="text" value="<?php echo ($row4['sub_d']); ?>" name="fourth_d" size="10" /><br />

                                    <label>Sub E:</label><input type="text" value="<?php echo ($row4['sub_e']); ?>" name="fourth_e" size="10" /><br />

                                </div><!-- end slide4 -->



                                <div id="slide4">

                                    <h4>Fourth Year</h4>

                                    <h4>(Internal)</h4><br />

                                    <label>Sub A:</label><input type="text" value="<?php echo ($row4['sub_a_int']); ?>" name="fourth_a_int" size="10" /><br />

                                    <label>Sub B:</label><input type="text" value="<?php echo ($row4['sub_b_int']); ?>" name="fourth_b_int" size="10" /><br />

                                    <label>Sub C:</label><input type="text" value="<?php echo ($row4['sub_c_int']); ?>" name="fourth_c_int" size="10" /><br />

                                    <label>Sub D:</label><input type="text" value="<?php echo ($row4['sub_d_int']); ?>" name="fourth_d_int" size="10" /><br />

                                    <label>Sub E:</label><input type="text" value="<?php echo ($row4['sub_e_int']); ?>" name="fourth_e_int" size="10" /><br />

                                </div><!-- end slide4 -->

                                </div><!-- end slideshow -->

                                

                                </div><!-- end wrap -->                                                                

                                <img src="images/marks-bottom.jpg" width="240" height="8" />

                                

                            </div><!-- end marks -->                            

                                

                        </div><!-- end container -->

                       </div><!-- end marks box -->

                       

                       <div><input type="submit" name="submit" value="Submit" id="edit_inp" /></div>

                    </form>

                    </div><!-- end form -->



             

</body>



<script type="text/javascript" src="ajax/main.js"></script>

</html>

