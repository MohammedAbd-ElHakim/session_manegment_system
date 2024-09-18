<?php
include_once './SessionOperation.php';

class ConnfigOfSession implements SessionOperation
{

    private $setings;

    public function __construct(array $setings)
    {
        $this->setings = $setings;
    }

    public static function execute($para = null)
    {
        foreach (self::$setings as $key => $value) {
            # code...
            ini_set($key, $value);
        }
    }
}
?>