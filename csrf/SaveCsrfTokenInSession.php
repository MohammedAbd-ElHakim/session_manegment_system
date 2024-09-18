<?php
include_once '../SessionOperation.php';

class SaveCsrfTokenInSession implements SessionOperation
{
    // توليد توكن CSRF وتخزينه في الجلسة
    public static function execute($token)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $_SESSION['csrf_token'] = $token;
    }

}
?>