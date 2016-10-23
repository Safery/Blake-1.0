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
            $sqlUser = "INSERT INTO users (id, username) VALUES ('$id', '$typeUser')";

            // Insert the password into database
            $sqlPass = "INSERT INTO passwords (id, passwords) VALUES ('$id', '$typePassword')";

            mysqli_query($conn, $sqlPass);
            mysqli_query($conn, $sqlUser);
            mysqli_close($conn);
        }
    createAccount($_POST['username'], $_POST['password']);