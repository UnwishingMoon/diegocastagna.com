<?php
require_once __DIR__ . "/config.php";
require_once __DIR__ . "/connect.php";
require_once __DIR__ . "/generic_functions.php";

$globalSettings = array();

$query = "SELECT sett_name, sett_description, sett_visible FROM settings";
$result = DBC::$conn->query($query);
while ($row = mysqli_fetch_assoc($result)){
    if($row["sett_visible"] == 1){
        $globalSettings[$row["sett_name"]] = $row["sett_description"];
    } else {
        $globalSettings[$row["sett_name"]] = "";
    }
}