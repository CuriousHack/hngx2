<?php

class PersonController
{
    private $connection;
    private $tableName = "user";
    public $id;
    public $name;

    public function __construct($db)
    {
        $this->connection = $db;

    }

    //create user
    public function create($name)
    {
        $query = "INSERT INTO ". $this->tableName ." SET name = :name";
        //prepare statement
        $stmt = $this->connection->prepare($query);
        //bind parameters
        $stmt->bindParam(":name", $name);
        


        if($stmt->execute()){
            $lastid = $this->connection->lastinsertId();
            return [
                'id' => $lastid,
                'name' => $name,
                'message' => 'Record created successfully!'
            ];
        }
        return ['message' => 'Error creating Record'];
        }

        public function read($user_id)
        {
            $query = "SELECT * FROM ".$this->tableName ." WHERE id = :user_id";
            $stmt = $this->connection->prepare($query);
            $stmt->bindParam(":user_id", $user_id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
            
        }

        public function update($name, $user_id)
        {
            $query = "UPDATE ". $this->tableName ." SET name = :name WHERE id = :user_id";
            $stmt = $this->connection->prepare($query);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam('user_id', $user_id);
            $stmt->execute();

            return [
                'message' => 'Record Updated Successfully'
            ];
        }

        public function delete($user_id)
        {
            $query = "DELETE FROM ". $this->tableName ." WHERE id = :user_id";
            $stmt = $this->connection->prepare($query);
            $stmt->bindParam(':user_id', $user_id);
            $stmt->execute();

            return [
                'message' => 'Record Successfully deleted'
            ];
        }
    }
