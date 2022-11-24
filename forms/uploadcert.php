<?php
session_start();
include '../include/db.php';
date_default_timezone_set('Australia/Adelaide');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_SESSION['role'] != 'worker' and $_SESSION['healthy'] != 0) {
        header("Location:/index.php");
    }
    //var_dump($_FILES);
    $file = $_FILES["image"];
    if ($file["error"] == 0) {
        // success received img
        $filetype = explode("/", $file["type"]);
        if ($filetype[0] == "image") {
            // is image
            if (in_array($filetype[1], array("jpg", "png", "jpeg"))) {
                // only accept jpg, png and jpeg images

                $hash = md5_file($file["tmp_name"]);

                $dir = "/web/uploads/"; // modify this accourding to your server's upload directory
                
                $path = $dir . date("Y-m-d") . "/";
                if(is_dir($path)){
                    //echo "path exists";
                }else{
                    //echo "path not exists";
                    mkdir($path, 0777, true);
                }
                $newfile = $path . $hash . "." . $filetype[1];

                if (move_uploaded_file($file["tmp_name"], $newfile)){
                    echo "successfully uploaded your certificate";
                }else{
                    echo "failed to uploaded your certificate, please try again";
                }
            }
        }
    }
} else {
    echo "This page can only accessed by POST method.";
    header("Location:/searchorder.php");
}
?>