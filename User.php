<?php

class User
{
    public $connection;

    public function __construct()
    {
        try {
            $this->connection = new PDO("mysql:host=localhost;dbname=users;charset=utf8",'root','357753');
        } catch (PDOException $e) {
            echo $e->getMessage();

        }
    }

    public function create($users)
    {
        try {
            $user_email = $_POST['email'];
            $user_first_name = $_POST['first_name'];
            $user_last_name = $_POST['last_name'];
            $user_age = $_POST['age'];
            $statement = $this->connection->prepare("INSERT INTO user (email, first_name, last_name, age) VALUE (:email, :first_name, :last_name, :age)");
            $statement->execute(array('email' => $user_email , 'first_name' => $user_first_name , 'last_name' => $user_last_name, 'age' => $user_age));
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function update($users)
    {
        try {
            $user_id = $_POST['id'];
            $user_email = $_POST['email'];
            $user_first_name = $_POST['first_name'];
            $user_last_name = $_POST['last_name'];
            $user_age = $_POST['age'];
            $statement = $this->connection->prepare("UPDATE user SET email = :email, first_name = :first_name, last_name = :last_name, age = :age WHERE id = :id ");
            $statement->execute(array('id'=> $user_id,'email' => $user_email , 'first_name' => $user_first_name, 'last_name' => $user_last_name, 'age' => $user_age));
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function delete($id)
    {
        $user_id = $_POST['id'];
        $statement = $this->connection->prepare('DELETE FROM user WHERE id = :id');
        $statement->execute(['id' => $user_id]);
    }

    public function list()
    {
        $statement = $this->connection->prepare('SELECT * FROM user');
        $statement->execute();
        return $statement->fetchAll();
    }
}