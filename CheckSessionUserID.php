<?php
include_once './SessionOperation.php';

class CheckSessionUserID implements SessionOperation
{

    public static function execute($para = null)
    {
        // بدء الجلسة إذا لم تكن قد بدأت بعد
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // التحقق من وجود User ID في الجلسة
        if (isset($_SESSION['user_id'])) {
            return true; // إرجاع true إذا كان User ID موجودًا
        } else {
            return false; // إرجاع false إذا لم يكن User ID موجودًا
        }
    }
}
?>