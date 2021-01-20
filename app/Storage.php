<?php

declare(strict_types=1);

namespace App;

use PDO;

class Storage    
{
    private PDO $pdo;

    public function __construct()
    {
        $host = 'localhost';
        $db   = 'candidates';
        $user = 'root';
        $pass = '';
        $charset = 'utf8mb4';

        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        try {
            $this->pdo = new PDO( $dsn, $user, $pass, $options );
        } catch ( \PDOException $e ) {
            throw new \PDOException( $e->getMessage(), (int)$e->getCode() );
        }
        
        // //sql to create table
        // try {
        //     $sql = "CREATE TABLE candidates (
        //         id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        //         name VARCHAR(255) NOT NULL,
        //         reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        //     )";
          
        //     $this->pdo->exec( $sql );
        //     echo "Table candidates created successfully";
        // } catch( \PDOException $e ) {
        //     echo $sql . "<br>" . $e->getMessage();
        // }
    }

    public function insert( string $name ) : void
    {
        $sql = "INSERT INTO candidates ( name ) VALUES ( :name )";

        $stmt = $this->pdo->prepare( $sql );
        $stmt->execute( ['name' => $name] );
    }
}
