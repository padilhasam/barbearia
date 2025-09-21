<?php

class SessionHelper
{
    /**
     * Inicia a sessão caso não esteja iniciada
     */
    public static function start()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    /**
     * Destrói a sessão de forma segura
     */
    public static function destroy()
    {
        self::start();

        // Limpa dados da sessão
        $_SESSION = [];

        // Remove cookie de sessão se existir
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }

        // Destrói a sessão
        session_destroy();
    }
}