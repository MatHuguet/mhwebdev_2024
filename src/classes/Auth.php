<?php

class Auth
{
    private array $session;

    public function __construct(array $session)
    {
        $this->session = $session;
    }

    public function sessionStart()
    {
    }

    public function logout($session, $isRedirect = true)
    {
        $session = array();

        // Si vous voulez détruire complètement la session, supprimez également
        // le cookie de session.
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params["path"],
                $params["domain"],
                $params["secure"],
                $params["httponly"]
            );
        }

        // Finalement, détruire la session.
        session_destroy();

        if ($isRedirect) {

            newalert('Déconnexion réussie !');
            exit;
        }

        // Rediriger vers la page de connexion.
        //header('Location: /demos/login');
    }
}
