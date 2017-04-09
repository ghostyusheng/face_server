<?php
namespace Core\Db;

class Pdo {

    public function __construct ($user, $pass) {
        try {
            $dbh = new \PDO('mysql:host=localhost;dbname=face', $user, $pass);
        } catch (\PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    
        $this->conn = $dbh;    
    }
}
