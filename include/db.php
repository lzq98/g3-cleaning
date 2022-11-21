<?php
include 'dbdetail.php';
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Failed: " . $conn->connect_error);
}

function sqlsanitizer($str)
{
    // sql injection filter here
    return $str;
}

function dbsearch($table, $values, $key, $target)
{
    // not tested
    // when call this function, email must have quotation marks
    global $conn;
    $query = "SELECT ";
    foreach ($values as $index => $value) {
        $query .= sqlsanitizer($value);
        if ($index < count($values) - 1) {
            $query .= ", ";
        }
    }
    $query .= " FROM " . sqlsanitizer($table) . " WHERE " . sqlsanitizer($key) . "=" . sqlsanitizer($target) . ";";
    echo $query;
    $dbresult = mysqli_query($conn, $query);

    $result = [];
    if (mysqli_num_rows($dbresult) > 0) {
        while ($row = mysqli_fetch_assoc($dbresult)) {
            array_push($result, $row);
        }
    }
    return $result;
}


function dbsearchmultiple($table, $values, $key, $targets)
{
    // not tested
    // when call this function, email must have quotation marks
    global $conn;
    $query = "SELECT ";
    foreach ($values as $index => $value) {
        $query .= sqlsanitizer($value);
        if ($index < count($values) - 1) {
            $query .= ", ";
        }
    }
    $query .= " FROM " . sqlsanitizer($table) . " WHERE " . sqlsanitizer($key) . " IN (";
    foreach ($targets as $index => $target) {
        $query .= $target;
        if ($index < count($targets) - 1) {
            $query .= ", ";
        }
    }
    $query .= ");";
    echo $query;
    $dbresult = mysqli_query($conn, $query);

    $result = [];
    if (mysqli_num_rows($dbresult) > 0) {
        while ($row = mysqli_fetch_assoc($dbresult)) {
            array_push($result, $row);
        }
    }
    return $result;
}

function dbsearchall($table, $key, $target)
{
    // when call this function, email must have quotation marks
    global $conn;
    $query = "SELECT * FROM " . sqlsanitizer($table) . " WHERE " . sqlsanitizer($key) . "=";
    $query .= sqlsanitizer($target);
    $query .= ";";
    //echo $query;
    $dbresult = mysqli_query($conn, $query);

    $result = [];
    if (mysqli_num_rows($dbresult) > 0) {
        while ($row = mysqli_fetch_assoc($dbresult)) {
            array_push($result, $row);
        }
    }
    return $result;
}

function dbsearchmultiplecondition($table, $results, $targets)
{
    // when call this function, email must have quotation marks
    global $conn;
    $query = "SELECT ";

    $index = 0;
    foreach ($results as $result) {
        $query .= sqlsanitizer($result);
        if ($index < count($results) - 1) {
            $query .= ", ";
            $index += 1;
        }
    }

    $query .= " FROM " . sqlsanitizer($table) . " WHERE ";
    $index = 0;
    foreach ($targets as $key => $value) {
        $query .= sqlsanitizer($key) . "='" . sqlsanitizer($value) . "'";
        if ($index < count($targets) - 1) {
            $query .= " AND ";
            $index += 1;
        }
    }
    $query .= ";";
    $dbresult = mysqli_query($conn, $query);

    $result = [];
    if (mysqli_num_rows($dbresult) > 0) {
        while ($row = mysqli_fetch_assoc($dbresult)) {
            array_push($result, $row);
        }
    }
    return $result;
}

function dbinsert($table, $values)
// $values must be associative array

{
    global $conn;
    $query = "INSERT INTO " . sqlsanitizer($table);
    $keystring = "";
    $valuestring = "";
    $index = 0;
    foreach ($values as $key => $value) {
        $keystring .= sqlsanitizer($key);
        $valuestring .= sqlsanitizer($value);
        if ($index < count($values) - 1) {
            $keystring .= ", ";
            $valuestring .= ", ";
            $index += 1;
        }
    }
    $query .= "(" . $keystring . ") VALUES (" . $valuestring . ");";
    if ($conn->query($query) === TRUE) {
        return TRUE;
    } else {
        return FALSE;
    }
}
?>