<?php

class Database
{
    public $connection;
    public function __construct($config, $username = 'sql8645817', $password = 'rzZ9gpFxDc')
    {

        $dsn = 'mysql:' . http_build_query($config, '', ';');
        //$dsn = "mysql:host={$config['host']};port={$config['port']};dbname={$config['dbname']};charset={$config['charset']}";

        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
    }


    
    public function getDb()
    {
        if ($this->connection instanceof PDO) {
            return $this->connection;
        }
    }
}
