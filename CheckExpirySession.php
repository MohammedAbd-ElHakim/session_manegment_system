<?php
include_once './SessionOperation.php';

class CheckExpirySession implements SessionOperation
{

    public static function execute($timeout)
    {
        if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity']) > $timeout) {
            return true;
        }
    }

}
?>