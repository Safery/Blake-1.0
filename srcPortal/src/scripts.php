
    <?php
    error_reporting(E_ERROR);

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

            function checkAccount($typeUser, $typePassword){
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "db";

                $link = mysql_connect($servername, $username, $password);
                if (!$link) {
                    die('Could not connect: ' . mysql_error());
                }
                if (!mysql_select_db($dbname)) {
                    die('Could not select database: ' . mysql_error());
                }
                // Find user id
                $result = mysql_query('SELECT users.id FROM users WHERE users.username="' . $typeUser . '"');
                if (!$result) {
                    die('Could not query:' . mysql_error());
                }
                $id = mysql_result($result, 0, "id");
                // Find user detail
                $result = mysql_query('SELECT users.id, passwords.id, passwords.passwords, users.username FROM users, passwords WHERE users.id=passwords.id AND users.id="' . $id . '"');
                if (!$result) {
                    die('Could not query:' . mysql_error());
                }

                $user = mysql_result($result, 0, "username");
                $pass = mysql_result($result, 0, "passwords");

                if (strcmp($pass, $typePassword) == 0){
                    echo "portal/portal.php";
                } 
                else {
                    echo "index.html";
                }
                mysql_close($link);

            }
        
        
        checkAccount($_POST['username'], $_POST['password']);
?>