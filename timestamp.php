<html>
<head>
</head>

<body>
<?php

error_reporting(E_ALL);

writeTimestamp();

    function writeTimestamp(){
        dbConnectionEstab();
    }

    function timestamp(){
        $date = date_create();
        //echo date_format($date, 'U = Y-m-d H:i:s') . "\n";
        $help = date_format($date, 'Y-m-d H:i:s') . "\n";
        return $help;
    }

    function dbConnectionEstab (){
        $link = mysqli_connect("localhost", "root", "", "timestamp");
        if (!$link) {
            die('Verbindung schlug fehl: ' . mysqli_connect_error() . PHP_EOL);
            //return $message;
        }
        else {
            echo 'Erfolgreich verbunden';
            //mysql_close($link);
        }
    }

    function dbConnectionClose (){
        mysql_close($link);
    }

?>
</body>
</html>
