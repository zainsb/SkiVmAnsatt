<?php
session_start();
if(!$_SESSION["loggetInn"])
{
    header('location: loggInn.php');
    exit();
}
?>