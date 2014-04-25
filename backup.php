<?php
    $source_db='sidhu';
    $target_db='sidhu';
     
    $server='127.0.0.1';
    $user='sidhu';
    $password='sidhu';
 
    mysql_connect($server,$user,$password);
    mysql_select_db($source_db);
 
    // Get names of all tables in source database
    $result=mysql_query("show tables");
    while($row=mysql_fetch_array($result)){
        $name=$row[0];
        $this_result=mysql_query("show create table $name");
        $this_row=mysql_fetch_array($this_result);
        $tables[]=array('name'=>$name,'query'=>$this_row[1]);
    }
 
    // Connect target database to create and populate tables
    mysql_select_db($target_db);
 
    $total=count($tables);
    for($i=0;$i < $total;$i++){
        $name=$tables[$i]['name'];
        $q=$tables[$i]['query'];
 
        mysql_query($q);
        mysql_query("insert into $name select * from $source_db.$name");
    }
     
?>