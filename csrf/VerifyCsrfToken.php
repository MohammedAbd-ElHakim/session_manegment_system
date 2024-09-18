<?php
include_once '../SessionOperation.php';

class VerifyCsrfToken implements SessionOperation
{
    public static function execute($token)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
    }
}
?>