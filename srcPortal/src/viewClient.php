<?php
    function findClient($getId){
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
                    $result = mysql_query('SELECT * FROM clientinfo WHERE clientinfo.id="' . $getId . '"');
                    if (!$result) {
                        die('Could not query:' . mysql_error());
                    }
                    $num_rows = mysql_num_rows($result);
                    if ($num_rows == 0){
                        echo "There is no information regarding this client. Please update the database.";
                    } else{
                        echo '<img src="http://s3.amazonaws.com/37assets/svn/765-default-avatar.png">';
                        echo mysql_result($result, 0, "Age");
                    }
                    mysql_close($link);
    }

?>