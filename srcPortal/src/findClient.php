<?php

    function findClient($clientLastName){
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
                    $result = mysql_query('SELECT * FROM clients WHERE clients.lastName LIKE "%' . $clientLastName . '%" ');
                    if (!$result) {
                        die('Could not query:' . mysql_error());
                    }
                    $num_rows = mysql_num_rows($result);
                    $count = 0;
                    while ($count < $num_rows){
                        echo '<a href="clientinfo.php?id=' . mysql_result($result, $count, "id") . '>';
                        echo mysql_result($result, $count, "firstName") . " " . mysql_result($result, $count, "lastName");
                        echo "</a><br>";
                        $count++;
                    }
                    mysql_close($link);
    }