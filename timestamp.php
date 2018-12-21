<html>
<head>
</head>

<body>
<?php

error_reporting(E_ALL);
class SimpleClass{

public $stmt;
public $link;

    public function __construct(){
        $this->link = mysqli_connect("localhost", "root", "", "timestamp");
    }

    function writeTimestamp(){
        $this->dbConnectionEstab();
        $this->prepareStatement();
        $this->executeStatement("", $this->timestamp(), "");
        $this->dbConnectionClose();
    }

    function timestamp(){
        $date = date_create();
        //echo date_format($date, 'U = Y-m-d H:i:s') . "\n";
        $help = date_format($date, 'Y-m-d H:i:s');
        return $help;
    }

    function dbConnectionEstab (){

        if (!$this->link) {
            die('Verbindung schlug fehl: ' . mysqli_connect_error(). "<br>" . PHP_EOL);
            //return $message;
        }
        else {
            echo 'Erfolgreich verbunden'. "<br>";
            //mysql_close($link);
            //return $link;
        }
    }

    function dbConnectionClose (){
        $check = mysqli_close($this->link);
        if ($check) {
            echo 'Verbindung erfolgreich geschlossen'. "<br>";
        }
        else {
            echo 'Verbindung konnte nicht geschlossen werden'. "<br>";
            echo $check["connect_error"];
        }
    }

    function prepareStatement(){
        $query = "INSERT INTO zeiten (id, timestamp, comment) VALUES (?,?,?)";
        $this->stmt = $this->link->prepare($query);
        return $this->stmt;
    }

    function executeStatement($val1, $val2, $val3){
        $this->stmt->bind_param("sss", $val1, $val2, $val3);

        //$val1 = 'id';
        //$val2 = 'DEU';
        //$val3 = 'Baden-Wuerttemberg';
        echo 'Schreibe in Datenbank'. "<br>";
        /* Execute the statement */
        $this->stmt->execute();
    }

    //writeTimestamp();
}
$start = new SimpleClass();
$start->writeTimestamp();
?>
</body>
</html>
