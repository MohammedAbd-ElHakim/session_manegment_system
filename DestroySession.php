<?php
include_once './SessionOperation.php';

class DestroySession implements SessionOperation
{

    public static function execute($is_expire)
    {

        if ($is_expire) {
            session_unset();
            session_destroy();
            return true;
        }
    }

}
?>