<?php
if (isset($_SESSION["username"])){
    echo "you are already logged in";
    echo $_SESSION["username"];
}else{
    echo "not logged in";
    echo $_SESSION["username"];
}
?>