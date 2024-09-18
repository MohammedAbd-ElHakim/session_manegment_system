<?php

include_once './SessionOperation.php';
include_once './CryptoBase.php';

class EncryptSessionID extends CryptoBase implements SessionOperation
{
    public function __construct($key)
    {
        parent::__construct($key);
    }

    public static function execute($data)
    {
        $iv = openssl_random_pseudo_bytes(parent::$iv_length);
        $encrypted_data = openssl_encrypt($data, parent::$cipher_method, parent::$encryption_key, parent::$options, $iv);
        return base64_encode($iv . $encrypted_data);
    }
}
?>