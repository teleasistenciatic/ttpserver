<?php namespace App\Models;

define("CRYPT_IV","kxp5j29vn4d8e0sq");

// Por seguridad y para que no se incluya en el repositorio
include('SecretKey.php');


use Illuminate\Database\Eloquent\Model;
//use Illuminate\Support\Facades\DB;

class CifradoModel extends Model{  

    /**
     * @param string $str
     * @param bool $isBinary whether to encrypt as binary or not. Default is: false
     * @return string Encrypted data
     */
    public static function cifrar($str, $isBinary = false)
    {
        $iv = CRYPT_IV;
        $key = CRYPT_KEY;
        
        $str = $isBinary ? $str : utf8_decode($str);

        $td = mcrypt_module_open('rijndael-128', ' ', 'cbc', $iv);

        mcrypt_generic_init($td, $key, $iv);
        $encrypted = mcrypt_generic($td, $str);

        mcrypt_generic_deinit($td);
        mcrypt_module_close($td);

        return $isBinary ? $encrypted : bin2hex($encrypted);
    }

    /**
     * @param string $code
     * @param bool $isBinary whether to decrypt as binary or not. Default is: false
     * @return string Decrypted data
     */
    public static function descifrar($code, $isBinary = false)
    {
        $code = $isBinary ? $code : hex2bin($code);
        
        $iv = CRYPT_IV;
        $key = CRYPT_KEY;

        $td = mcrypt_module_open('rijndael-128', ' ', 'cbc', $iv);

        mcrypt_generic_init($td, $key, $iv);
        $decrypted = mdecrypt_generic($td, $code);

        mcrypt_generic_deinit($td);
        mcrypt_module_close($td);

        return $isBinary ? trim($decrypted) : utf8_encode(trim($decrypted));
    }

    /**
     * Convierte una cadena hexadecimal, caracter a caracter, a binario
     * @param type $hexdata
     * @return type string binaria
     */
    protected static function hex2bin($hexdata)
    {
        $bindata = '';

        for ($i = 0; $i < strlen($hexdata); $i += 2) {
            $bindata .= chr(hexdec(substr($hexdata, $i, 2)));
        }

        return $bindata;
    }
    
}