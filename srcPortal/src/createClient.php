<?php
        function createAccount($typeUser, $typePassword){
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "db";
            $id = (string)rand(2, 258954057);

            // Create connection
            $conn = mysqli_connect($servername, $username, $password, $dbname);

            // Check connection
            if (!$conn) {
                die(mysqli_connect_error());
            }
            // Insert the username into database
            $sqlReq = "INSERT INTO clients (id, firstName, lastName) VALUES ('$id', '$typeUser', '$typePassword')";

            mysqli_query($conn, $sqlReq);
            mysqli_close($conn);
        }
    createAccount($_POST['username'], $_POST['password']);