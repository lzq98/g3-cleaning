<?php
// do not include this file when deploying
session_start();
if (isset($_SESSION["uid"])){
    foreach($_SESSION as $key=>$val){
        echo $key . ": " . $val;
        echo "</br>";
    }
}else{
    echo "not logged in";
}
?>