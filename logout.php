<?php

    session_start();

    session_destroy();

    header("location:logout_sucessfull.php");

?>
