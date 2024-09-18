<?php
include_once './SessionOperation.php';

class SaveSessionData implements SessionOperation
{
    private $SessionData = [];
    private $encryptor;

    public function __construct(array $data, EncryptSessionID $encryptor)
    {
        $this->SessionData = $data;
        $this->encryptor = $encryptor;
    }

    public static function execute($para = null)
    {
        foreach (self::$SessionData as $key => $value) {
            # code...
            $encrypted_value = self::$encryptor->execute($value);
            $_SESSION[$key] = $encrypted_value;
        }
    }
}
?>