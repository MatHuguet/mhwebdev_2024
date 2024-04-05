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
    private mixed $pseudo;

    private $dsn;

    public function __construct($dsn)
    {
        $this->dsn = $dsn;
    }

    public function setUser(array $sanitizedUserDatas): void
    {
        $this->user_id          = uniqid();

        // Getting parameter array :
        $this->firstname        = strtolower($sanitizedUserDatas['firstname']);
        $this->lastname         = strtolower($sanitizedUserDatas['lastname']);
        $this->email            = $sanitizedUserDatas['email'];
        $this->password         = password_hash($sanitizedUserDatas['password'], PASSWORD_BCRYPT);

        $this->isPseudo         = $sanitizedUserDatas['isPseudo'];
        $this->isAnonyme        = $sanitizedUserDatas['isAnonyme'];
        $this->pseudo           = $sanitizedUserDatas['pseudo'];
    }

        public function initUpdateUser(array $sanitizedUserDatas): void
    {
        // Update edited datas :
        $this->email            = $sanitizedUserDatas['email'];
        if (!empty($sanitizedUserDatas['password'])) {
        $this->password         = password_hash($sanitizedUserDatas['password'], PASSWORD_BCRYPT);
        } else {
        $this->password         = $sanitizedUserDatas['password'];
        }
        $this->isAnonyme        = $sanitizedUserDatas['isAnonyme'];
        $this->isPseudo         = $sanitizedUserDatas['isPseudo'];
        $this->pseudo           = $sanitizedUserDatas['pseudo'];
    }

    public function register(array $datas)
    {
        try {

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
            return $conn;
        } catch (PDOException $e) {
            $message = '';
            if ($e->errorInfo[1] === 1062) {
                return 1062;
            } else {
                throw $e;
            }
        }
    }

    public function getUserInputs(): array
    {
        $userDatas = [];
        if (empty($this->user_id)) {
        $userDatas = [
            'email'     => $this->email,
            'password'  => $this->password,
            'isPseudo'  => $this->isPseudo,
            'isAnonyme' => $this->isAnonyme,
            'pseudo'    => $this->pseudo,
        ];
        } else {

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
        }
        return $userDatas;
    }

    public function getUser(string $id = null, string $email = null)
    {
        if (isset($id)) {

            $query = "SELECT * FROM users WHERE user_id = :id";
            $conn = $this->dsn;
            return $conn->query($query, ['id' => $id]);
        } elseif (isset($email)) {
            $query = "SELECT * FROM users WHERE user_email = :email";
            $conn = $this->dsn;
            return $conn->query($query, ['email' => $email]);
        }
    }

    public function getAllUsers()
    {
        $query = "SELECT * FROM users";
        $conn = $this->dsn;
        return $conn->query($query);
    }

    public function updateUser($userId, array $userNewDatas) {
    if (empty($userNewDatas['password'])) {
        $query = "UPDATE users
            SET user_email      = :usermail,
                is_pseudo       = :ispseudo,
                is_anonyme      = :isanonyme,
                user_pseudo     = :pseudo
            WHERE user_id       = :userid
    ";
    $conn = $this->dsn;
    return $conn->query($query, [
            'usermail'      => $userNewDatas['email'],
            'ispseudo'      => $userNewDatas['isPseudo'],
            'isanonyme'     => $userNewDatas['isAnonyme'],
            'pseudo'        => $userNewDatas['pseudo'],
            'userid'        => $userId
        ]);
    } else {
    $query = "UPDATE users
            SET user_email      = :usermail,
                user_password   = :userpassword,
                is_pseudo       = :ispseudo,
                is_anonyme      = :isanonyme,
                user_pseudo     = :pseudo
            WHERE user_id       = :userid
    ";
    $conn = $this->dsn;
    return $conn->query($query, [
            'usermail'      => $userNewDatas['email'],
            'userpassword'  => $userNewDatas['password'],
            'ispseudo'      => $userNewDatas['isPseudo'],
            'isanonyme'     => $userNewDatas['isAnonyme'],
            'pseudo'        => $userNewDatas['pseudo'],
            'userid'        => $userId
        ]);
    }
}

    public function deleteUser($userId) {

    $query = "DELETE FROM users WHERE user_id = :id";
    $conn = $this->dsn;
    $conn->query($query, [
                    'id' => $userId
                ]);

}

}
