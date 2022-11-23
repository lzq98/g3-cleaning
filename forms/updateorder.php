<?php
session_start();
include '../include/db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // get order detail
    $oid = filter_var($_POST['oid'], FILTER_SANITIZE_NUMBER_INT);
    $orderresult = dbsearchall("orders", "oid", $oid);
    if (count($orderresult) > 0) {
        // order found
        $order = $orderresult[0];
    } else {
        // order not found
        header("Location:/orderhistory.php");
        exit;
    }
    $order = $orderresult[0];
    if ($_SESSION['role'] == 'customer') {
        // first check if this order belongs to this customer
        if ($order['customer'] != $_SESSION['uid']) {
            // order not belong to this customer
            header("Location:/orderhistory.php");
            exit;
        }
        // have update and payment function
        if ($_POST['type'] == 'pay') {
            // gopayment
        } elseif ($_POST['type'] == 'update') {
            // only accept date, subject and message update
            $values["date"] = "'" . filter_var($_POST['date'], FILTER_SANITIZE_STRING) . "'";
            $values["subject"] = "'" . filter_var($_POST['subject'], FILTER_SANITIZE_STRING) . "'";
            $values["message"] = "'" . filter_var($_POST['message'], FILTER_SANITIZE_STRING) . "'";
            if (dbupdate("orders", "oid", $oid, $values)) {
                echo "You have updated your order";
            } else {
                echo "Something went wrong, please try again";
            }
        } else {
            // other type are not support
            header("Location:/orderhistory.php");
            exit;
        }
    } elseif ($_SESSION['role'] == 'worker') {
        // first check if this order belongs to this worker
        if ($order['worker'] != $_SESSION['uid']) {
            // order not belong to this worker
            header("Location:/orderhistory.php");
            exit;
        }
        // have update start and end function
        if ($_POST['type'] == 'update') {
            // only accept price update
            // price update must be done after the order has end and not paid
            if ($order['status'] == 'notpaid' and $order['start'] != "" and $order['end'] != "") {
                // update price
                $values["price"] = "'" . filter_var($_POST['price'], FILTER_SANITIZE_NUMBER_INT) . "'";
                if (dbupdate("orders", "oid", $oid, $values)) {
                    echo "You have updated your order";
                } else {
                    echo "Something went wrong, please try again";
                }
            } else {
                echo "Order is already paid or not end.";
            }
        } elseif ($_POST['type'] == 'start') {
            // start work
            // not accept any values except oid
            if ($order['status'] == 'notpaid' and $order['start'] == "" and $order['end'] == ""){
                // update start time
                $values["start"] = date('"h:i:s"');
                if (dbupdate("orders", "oid", $oid, $values)) {
                    echo "You have start your order";
                } else {
                    echo "Something went wrong, please try again";
                }
            }
        } elseif ($_POST['type'] == 'end') {
            // end work
            // not accept any values except oid
            if ($order['status'] == 'notpaid' and $order['start'] != "" and $order['end'] == ""){
                $values["end"] = date('"h:i:s"');

                //add automatic calculate price if not set here
                //$values["price"] = autocalc();

                if (dbupdate("orders", "oid", $oid, $values)) {
                    echo "You have end your order";
                } else {
                    echo "Something went wrong, please try again";
                }
            }
        } else {
            // other type are not support
            header("Location:/orderhistory.php");
            exit;
        }
    } else {
        // default: other role not allow to access
        header("Location:/orderhistory.php");
        exit;
    }
} else {
    echo "This page can only accessed by POST method.";
    header("Location:/login.php");
}
?>