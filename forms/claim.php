<?php
session_start();
include '../include/db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $oid = $_POST["oid"];
    $orderresult = dbsearch("orders", ["worker"], "oid", $oid);
    if (count($orderresult) > 0) {
        if ($orderresult[0]["worker"] != 0) {
            echo "You are late, this order has been claimed or assigned";
        } else {
            dbupdate("orders", "oid",$oid, array("worker" => $_SESSION['uid']));
            echo "You have claimed this order";
        }
    } else {
        // order not found
        header("Location:/searchorder.php");
    }

} else {
    echo "This page can only accessed by POST method.";
    header("Location:/searchorder.php");
}
?>