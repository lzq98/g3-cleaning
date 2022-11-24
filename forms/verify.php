<?php
session_start();
include '../include/db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field

    // this file is only accessable by admin
    if (!isset($_SESSION["uid"])) {
        header("Location:/login.php");
        exit;
    }
    if ($_SESSION['role'] != 'admin') {
        header("Location:/login.php");
        exit;
    }
    $imageid = $_POST["imageid"];
    $imagelist = dbsearch("image", ["reviewer", "worker"], "imageid", $imageid);
    if (count($imagelist) == 0) {
        // image not found
        header("Location:/verifylist.php");
    } else {
        $image = $imagelist[0];
        if ($imagelist['reviewer'] == 0 or $imagelist['reviewer'] == $_SESSION['uid']) {
            $values['result'] = $_POST['result'];
            $values['reviewer'] = $_SESSION['uid'];
            if (dbupdate("image", "imageid", $imageid, $values)) {
                if ($values['result'] == 1) {
                    $workerinfo['healthy'] = 1;
                    if (dbupdate("worker", "uid", $image['worker'], $workerinfo)) {
                        echo "You have accepted this certificate.";
                    }else{
                        echo "Something went wrong, please contact technical department";
                    }
                } elseif ($values['result'] == 0) {
                    echo "You have rejected this certificate.";
                } else {
                    // error handling
                    echo "Something went wrong, please contact technical department";
                }
            } else {
                // error handling
                echo "Something went wrong, please contact technical department";
            }
        }
    }

} else {
    echo "This page can only accessed by POST method.";
    header("Location:/searchorder.php");
}
?>