<?php

class Types
{

    private $dsn;

    public function __construct($dsn)
    {
        $this->dsn = $dsn;
    }

    public function getType($typeId)
    {
        $query = "SELECT * FROM restaurants_types WHERE type_id = :id";
        $pdo = $this->dsn;
        return $pdo->query($query, ['id' => $typeId]);
    }

    public function getAllTypes()
    {
        $query = "SELECT * FROM restaurants_types";
        $pdo = $this->dsn;
        return $pdo->query($query);
    }
}
