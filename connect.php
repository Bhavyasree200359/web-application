<?php

    // Database connection
    $conn = mysqli_connect('localhost', 'root', '', 'bhavya');

    if ($conn==false) {
        die("Connection failed: " . mysqli_connect_error());
    }

   
?>
