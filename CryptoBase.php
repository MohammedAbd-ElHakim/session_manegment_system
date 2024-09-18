<?php
class CryptoBase
{
    protected $encryption_key;
    protected $cipher_method = 'AES-256-CBC';
    protected $iv_length;
    protected $options = 0;

    public function __construct($key)
    {
        $this->encryption_key = hash('sha256', $key, true);
        $this->iv_length = openssl_cipher_iv_length($this->cipher_method);
    }

    protected function generateIv()
    {
        return openssl_random_pseudo_bytes($this->iv_length);
    }

    protected function encodeData($iv, $encrypted_data)
    {
        return base64_encode($iv . $encrypted_data);
    }

    protected function decodeData($data)
    {
        return base64_decode($data);
    }
}
?>