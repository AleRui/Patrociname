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

function checkFileUploadValid($fileUploaded, $imagePath) {
    $validFile = 0;
    //
    echo '$imagePath: '.$imagePath.'<br>';
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