<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class KeyController extends Controller
{
    public function gerar() {

        $str = 'teste1';

        $blockchain = [];

        //criando nova chave RSA
        $NEW_KEY = openssl_pkey_new(array(
            'private_key_bits' => 1024,
            'private_key_type' => OPENSSL_KEYTYPE_RSA,
            ));
         
        // $privKey contem a chave privada.
        openssl_pkey_export($NEW_KEY, $privKey);

        //Recuperando a chave publica
        $pubKey = openssl_pkey_get_details($NEW_KEY);
        $pubKey = $pubKey["key"];
        /* echo $privKey; */
        /* echo $pubKey; */

        // Assinando a mensagem.
        /* openssl_sign($str, $sig, $privKey, OPENSSL_ALGO_SHA256); */

        /* return [bin2hex($sig)]; */
        return ['privKey' => $privKey, 'pubKey' => $pubKey];
    }
}
