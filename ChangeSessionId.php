<?php
include_once './SessionOperation.php';

class ChangeSessionId implements SessionOperation
{

    public static function execute($para = null)
    {
        session_regenerate_id(true);
    }
}
?>