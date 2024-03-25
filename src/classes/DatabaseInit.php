<?php

class DatabaseInit
{
    private $sgbd = null;
    private $dsn = null;
    private $user = null;
    private $isDev = true;

    public function initTables($pdo, $queries, $rows): void
    {
        try {
            foreach ($queries as $query) {
                $pdo->query($query);
            }

            foreach ($rows as $row) {
                $pdo->query($row);
            }
        } catch (PDOException $e) {
            var_dump($e->errorInfo);
        }
    }

    public function getDsn(): string
    {
        return $dsn_init = $this->sgbd . ':' . http_build_query($this->dsn, '', ';');
    }

    public function getUser(): string
    {
        return $this->user['user'];
    }

    public function getPass(): string
    {
        return $this->user['pass'];
    }
}
