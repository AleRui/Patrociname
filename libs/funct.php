<?php
/**
 * Created by PhpStorm.
 * User: ale
 * Date: 8/11/18
 * Time: 19:02
 */

function showPretty($obj)
{
    echo '<pre>';
    echo print_r($obj);
    echo '</pre>';
}

function checkFileUploadValid($fileUploaded, $imagePath)
{
    $validFile = 0;
    //
    echo '$imagePath: ' . $imagePath . '<br>';
    //showPretty($fileUploaded);
    //
    $imageFileType = strtolower(pathinfo($imagePath, PATHINFO_EXTENSION));
    //
    $check = getimagesize($fileUploaded["tmp_name"]);
    //
    if ($check !== false) {
        $validFile = 1;
    } else {
        $validFile = 0;
    }
    //
    //if (file_exists($imagePath)) {
    //    echo "Sorry, file already exists.";
    //    $validFile = 0;
    //}
    //
    if ($fileUploaded["size"] > 500000) {
        $validFile = 0;
    }
    //
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif") {
        $validFile = 0;
    }
    //
    return $validFile;
}

function falseDataForApi()
{
    //
    return "{\"denominacion\":\"PANADERIA Y CONFITERIA ARTEPAN MALAGA SL.\"," .
        "\"nombreComercial\":[\"SOLO CLIENTES\"],\"domicilioSocial\":\"CA" .
        "LLE ALEJANDRO DUMAS, 17 - BL 1 PISO 2 E\",\"localidad\":\"29004 " .
        "MALAGA (Málaga)\",\"formaJuridica\":\"SOCIEDAD LIMITADA\",\"cnae" .
        "\":\"1071 - Fabricación de pan y de productos frescos de panader" .
        "ía y pastelería\",\"fechaUltimoBalance\":\"2017-12-31\",\"identi" .
        "ficativo\":\"X9999999X\",\"situacion\":\"SOLO CLIENTES\",\"telef" .
        "ono\":[999999999],\"fax\":[999999999],\"web\":[\"http://www.exam" .
        "ple.com\"],\"email\":\"example@example.com\",\"cargoPrincipal\":" .
        "\"SOLO CLIENTES\",\"capitalSocial\":1.7976931348623157E308,\"ven" .
        "tas\":1.7976931348623157E308,\"anioVentas\":1970,\"empleados\":9" .
        "223372036854775807,\"fechaConstitucion\":\"YYYY-MM-DD\"}";
}