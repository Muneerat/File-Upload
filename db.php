<?php
    $hostName = 'localhost';
    $hostUser = 'root';
    $hostPass = '';
    $dbName = 'image_upload';

    $connect = new PDO("mysql:host={$hostName};dbname={$dbName}",$hostUser, $hostPass);

?>