<?php

include '../Config/Config.php';
include '../Database/Database.php';
include '../Format/Format.php';

$db=new Database;
$fm=new Format;


if(isset($_POST['email']))
{

    $email    =$_POST['email'];
	$email    =mysqli_real_escape_string($db->connection,$_POST['email']);
	$data     =$db->first("user","*","email='$email'");
	if($data->num_rows>0)
	{
		echo "Email Is Already Exist";
	}
}