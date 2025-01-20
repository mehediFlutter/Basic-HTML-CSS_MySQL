<?php

$conn = mysqli_connect('localhost','root', '', 'finalphpproject');

if($conn->connect_error){
    echo "Database connection failed";
}