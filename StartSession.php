<?php
include_once './SessionOperation.php';
class StartSession implements SessionOperation
{

    public static function execute($para = null)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (!isset($_SESSION['last_activity'])) {
            $_SESSION['last_activity'] = time();
        }
    }
}
?>