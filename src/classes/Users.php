<?php

class Users
{
    public string $id;
    public string $forename;
    public string $surname;
    public string $email;
    protected string $password;

    public function __construct(string $forename, string $surname, string $email)
    {
        $this->id = uniqid();
        $this->forename = strtolower($forename);
        $this->surname = strtolower($surname);
        $this->email = $email;
    }

    public function setPassword(string $password):string
    {
        return $this->password = password_hash($password, PASSWORD_BCRYPT);

    }
}