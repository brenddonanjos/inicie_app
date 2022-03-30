<?php

namespace App\WebServices;

class Curl {

    public function get($url, $headers)
    {
        $cURL = curl_init();
        curl_setopt_array($cURL, [
            CURLOPT_URL => $url, //Host de envio
            CURLOPT_HTTPHEADER => $headers,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_POST => false
        ]);
        $response = curl_exec($cURL);
        curl_close($cURL);
        return $response;
    }

    public function post($url,$post_data,$headers)
    {
        $cURL = curl_init();
        curl_setopt_array($cURL, [
            CURLOPT_URL => $url, //Host de envio
            CURLOPT_HTTPHEADER => $headers,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => json_encode($post_data),
        ]);
        $response = curl_exec($cURL);
        $httpcode = curl_getinfo($cURL, CURLINFO_HTTP_CODE);
        curl_close($cURL);
        return (object) ['response' => $response, 'httpcode' => $httpcode];
    }

    public function put($url, $post_data, $headers)
    {
        $cURL = curl_init();
        curl_setopt_array($cURL, [
            CURLOPT_URL => $url, //Host de envio
            CURLOPT_HTTPHEADER => $headers,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_CUSTOMREQUEST => 'PUT',
            CURLOPT_POSTFIELDS => json_encode($post_data),
        ]);
        $response = curl_exec($cURL);
        $httpcode = curl_getinfo($cURL, CURLINFO_HTTP_CODE);
        curl_close($cURL);
        return (object) ['response' => $response, 'httpcode' => $httpcode];
    }

    public function delete($url,$headers)
    {
        $cURL = curl_init();
        curl_setopt_array($cURL, [
            CURLOPT_URL => $url, //Host de envio
            CURLOPT_HTTPHEADER => $headers,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_CUSTOMREQUEST => 'DELETE',  
        ]);
        $response = curl_exec($cURL);
        $httpcode = curl_getinfo($cURL, CURLINFO_HTTP_CODE);
        curl_close($cURL);
        return (object) ['response' => $response, 'httpcode' => $httpcode];
    }
}