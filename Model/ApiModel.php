<?php
/**
 * Created by PhpStorm.
 * User: ale
 * Date: 24/11/18
 * Time: 11:14
 */

function runAPI($cif)
{
    //echo 'Estoy en runAPI<br>';
    //
    // Conseguir info JSON (Página de información de empresas)
    // einforma.com
    // Usuario: alejandroruizlopez@hotmail.es
    // contraseña: ein17418786
    // clientid: s8w672cov0j3hs4xkktcj9xw7rxi54mpnpzoy7ei.api.einforma.com
    // clientSecret: 6aZhFoQk181QbmydRt614-Xqn5Rne_qCPRlT3m_zp-E
    //
    // prueba de CIF: B93358778
    // prueba de CIF: B93388668

    //Autentication OAuth 2.0
    // 1º GET TOKEN
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://developers.einforma.com/api/v1/oauth/token?' .
            'client_id=s8w672cov0j3hs4xkktcj9xw7rxi54mpnpzoy7ei.api.einforma.com' .
            '&client_secret=6aZhFoQk181QbmydRt614-Xqn5Rne_qCPRlT3m_zp-E' .
            '&grant_type=client_credentials' .
            '&scope=buscar%3Aconsultar%3Aempresas',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "",
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/x-www-form-urlencoded',
            'cache-control: no-cache'
        ),
    ));
    //
    $responseOne = curl_exec($curl);
    $err = curl_error($curl);
    //
    curl_close($curl);
    // ----------------------//
    if ($err) {
        return "cURL Error #:" . $err;
    } else {
        // 2º GET DATA
        //
        //$token = json_decode($responseOne)->access_token;
        //$token = "Authorization: Bearer " . $token;
        $token = "Authorization: Bearer " . json_decode($responseOne)->access_token;
        //
        $url = "https://developers.einforma.com/api/v1/companies/" . $cif . "/test";
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_POSTFIELDS => "",
            CURLOPT_HTTPHEADER => array(
                $token,
                "accept: application/json",
                "cache-control: no-cache"
            ),
        ));

        $data = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return "cURL Error #:" . $err;
        } else {
            return $data;
        } // END GET DATA
        //
    } // END GET TOKEN

}