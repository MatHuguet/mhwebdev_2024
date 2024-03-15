<?php

class Database {

    public mixed $connect;

    function __construct($config, $user) {
        
            $dsn = http_build_query(data: $config, arg_separator: ";");

        try {
            $this->connect = new PDO(dsn: 'mysql:' . $dsn, username: $user['user'], password: $user['password'], options: [

                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);

            #echo 'Connection réussie'

        } catch(PDOException $exception) {
            echo 'Erreur ' . $exception->getMessage();
        }
    }


    public function query(string $query, array $param = []):array {
        $stmt = $this->connect->prepare($query);
        $stmt->execute($param);
        
        return $stmt->fetchAll();
    }


}