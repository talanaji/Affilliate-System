<?php
 


$user = 'u293020119_affilUSR'; // اسم المستخدم على القاعدة
$password = '4t*&5^m!pXw@'; // كلمة مرور المستحدم
$host = 'localhost'; // السيرفر
$dbname = 'u293020119_affilDB'; // اسم قاعدة البيانات
$path = $_SERVER['REQUEST_URI']; // this gives you /folder1/folder2/THIS_ONE/file.php

$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con) {
 die("Connection failed: " . mysqli_connect_error());
}