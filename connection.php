<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "code_helix";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{
    die("failed to connect!");

}