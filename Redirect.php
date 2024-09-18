<?php
include_once './SessionOperation.php';

class Redirect implements SessionOperation
{

    public static function execute($is_expire)
    {

        if (!$is_expire) {
            return false;
        }
    }

    public static function redirect($Path_to_login_page)
    {
        header("Location:" + $Path_to_login_page);
    }
}
?>