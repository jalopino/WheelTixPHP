<?php
require("conn.php");
$sql = "INSERT INTO violations (`Fullname`,`Dateofbirth`,`Licensenumber`,`Typeofviolation`,`Date`)VALUES(".$_REQUEST["code"].")";

$select_sql = "SELECT * FROM violations";
$sql = str_replace("\\", "", $sql);
$select_sql = str_replace("\\", "", $select_sql);
try {
    $dbrecords = mysqli_query($connect, $select_sql);
    if(mysqli_num_rows($dbrecords) > 0) {
        if (mysqli_query($connect, $sql)) {
                $response["success"] = 1;
                $response["message"] = "DATA INSERTED";
                die(json_encode($response));
            } else {
                $response["success"] = 0;
                $response["message"] = "Database error. Please Try Again!" . $sql;
                die(json_encode($response));
            }
        }
    }
    catch (Exception $e) {
        $response["success"] = 0;
        $response["message"] = "Database error. Please try again!";
        die(json_encode($response));
    }
    $response["success"] = 1;
    $response["message"] = " DATA -> " . $select_sql;
    $response["message"] = " Record Saved. ";
    die(json_encode($response));
?>