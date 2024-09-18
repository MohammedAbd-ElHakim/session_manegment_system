<?php

include_once './SessionOperation.php';
include_once './CryptoBase.php';

class DecryptSessionID extends CryptoBase implements SessionOperation
{
    public function __construct($key)
    {
        parent::__construct($key);
    }

    public static function execute($data)
    {
        $data = base64_decode($data);
        $iv = substr($data, 0, parent::$iv_length);
        $encrypted_data = substr($data, parent::$iv_length);
        return openssl_decrypt($encrypted_data, parent::$cipher_method, parent::$encryption_key, parent::$options, $iv);
    }
}
?>