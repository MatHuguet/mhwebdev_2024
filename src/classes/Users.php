<?php

class Users
{
    private string $user_id;
    private string $firstname;
    private string $lastname;
    private string $email;
    private string $password;
    private int $isPseudo;
    private int $isAnonyme;
    private string $pseudo;

    private $dsn;

    public function __construct($dsn)
    {
        $this->dsn = $dsn;
    }

    public function setUser(string $firstname, string $lastname, string $email, string $password, int $isPseudo = 0, int $isAnonyme = 0, string $pseudo = 'pseudo'): void
    {
        $this->user_id          = uniqid();
        $this->firstname        = strtolower($firstname);
        $this->lastname         = strtolower($lastname);
        $this->email            = $email;
        $this->password         = password_hash($password, PASSWORD_BCRYPT);
        $this->isPseudo         = $isPseudo;
        $this->isAnonyme        = $isAnonyme;
        $this->pseudo           = $pseudo;
    }

    public function register(array $datas)
    {
        $query = "INSERT INTO users(user_id, user_firstname, user_lastname, user_email, user_password, is_pseudo, is_anonyme, user_pseudo) VALUES (
            :id,
            :firstname,
            :lastname,
            :email,
            :password,
            :ispseudo,
            :isanonyme,
            :pseudo
        )";
        $conn = $this->dsn;
        $conn->query($query, [
            'id'        => $datas['id'],
            'firstname' => $datas['firstname'],
            'lastname'  => $datas['lastname'],
            'email'     => $datas['email'],
            'password'  => $datas['password'],
            'ispseudo'  => $datas['isPseudo'],
            'isanonyme' => $datas['isAnonyme'],
            'pseudo'    => $datas['pseudo']
        ]);
    }

    public function getUserInputs(): array
    {
        $userDatas = [
            'id'        => $this->user_id,
            'firstname' => $this->firstname,
            'lastname'  => $this->lastname,
            'email'     => $this->email,
            'password'  => $this->password,
            'isPseudo'  => $this->isPseudo,
            'isAnonyme' => $this->isAnonyme,
            'pseudo'    => $this->pseudo,
        ];
        return $userDatas;
    }

    public function getUser($mail)
    {
        $query = "SELECT * FROM users WHERE user_email = :email";
        $conn = $this->dsn;
        return $conn->query($query, ['email' => $mail]);
    }

    public function getAllUsers()
    {
        $query = "SELECT * FROM users";
        $conn = $this->dsn;
        return $conn->query($query);
    }
}
