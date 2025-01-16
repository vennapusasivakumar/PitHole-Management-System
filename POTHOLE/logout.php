<?php
session_start();
unset($_SESSION['htno']);
$_SESSION['islogin'] = 'N';
header("Location: index.html? = Student Logged out Successfully");
?>