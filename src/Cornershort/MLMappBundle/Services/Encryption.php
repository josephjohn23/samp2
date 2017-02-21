<?php

namespace Cornershort\MLMappBundle\Services;

/**
 * Encryption class
 *
 * @author Joshua Loy <jloy@charton.biz>
 * @copyright 2015 Timberline Technologies, LLC
 * @license http://www.php.net/license/3_01.txt PHP License 3.01
 */
class Encryption {

    protected $encryption_key = '';

    /**
     * Sets Encryption Key
     *
     * @param str $encryption_key to be encrypted
     * @return boolean
     */
    public function setKey($encryption_key) {
        $this->encryption_key = substr(md5($encryption_key), 0, 24);
        return true;
    }

    /**
     * Encrypts data
     *
     * @param str $data to be encrypted
     * @return str encrypted string
     */
    public function encrypt($data) {
        $size = mcrypt_get_block_size('des', 'ecb');
        $data = $this->encryptPad($data, $size);
        $mcrypt_module = mcrypt_module_open(MCRYPT_TRIPLEDES, '', 'ecb', '');
        $mcrypt_iv = mcrypt_create_iv(mcrypt_enc_get_iv_size($mcrypt_module), MCRYPT_RAND);
        $encryption_key_size = mcrypt_enc_get_key_size($mcrypt_module);

        mcrypt_generic_init($mcrypt_module, $this->encryption_key, $mcrypt_iv);
        $encrypted = base64_encode(mcrypt_generic($mcrypt_module, $data));
        mcrypt_module_close($mcrypt_module);

        return $encrypted;
    }

    /**
     * Decrypt data
     *
     * @param str $data to be decrypted
     * @return str decrypted string
     */
    public function decrypt($data) {
        $mcrypt_module = mcrypt_module_open(MCRYPT_TRIPLEDES, '', 'ecb', '');
        $mcrypt_iv = mcrypt_create_iv(mcrypt_enc_get_iv_size($mcrypt_module), MCRYPT_RAND);
        $decrypted = mcrypt_decrypt(MCRYPT_TRIPLEDES, $this->encryption_key, base64_decode($data), 'ecb', $mcrypt_iv);
        mcrypt_module_close($mcrypt_module);

        return $this->decryptPad($decrypted);
    }

    private function encryptPad($text, $blocksize) {
        $pad = $blocksize - (strlen($text) % $blocksize);
        return $text . str_repeat(chr($pad), $pad);
    }

    private function decryptPad($text) {
        $pad = ord($text{strlen($text) - 1});
        if ($pad > strlen($text))
            return false;

        if (strspn($text, chr($pad), strlen($text) - $pad) != $pad)
            return false;

        return substr($text, 0, -1 * $pad);
    }

}
