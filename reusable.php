<?php
function customhead ($title) {
    echo
    '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@100;300;400;900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,400&family=Raleway:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>'.$title.'</title>
    <link rel="stylesheet" href="css/style.css">
</head>';
}

function runquery($conn, $sql){
    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        echo "Error: " . $sql . " : " . mysqli_error($conn) . "<br>";
        return false;
    }
}

function sessionvalidation ($id) {
    if(!isset($_SESSION[$id])){
        header("location:index.php"); 
    }
}

function loggedin_usertype ($type) {
    if (isset($_SESSION[$type])) {
        if ($_SESSION[$type] == 1) {
            include 'staff_menu.php';
        } elseif ($_SESSION[$type] == 2) {
            include 'user_menu.php';
        }
    } else {
        include 'staff_menu.php';
    }
}

function usertype ($type) {
    if(isset($_SESSION["type"])){

        if($_SESSION["type"] == 1){
            include 'staff_menu.php';
        }
        elseif($_SESSION["type"] == 2){
            include 'user_menu.php';
        }
    }
    else {
        include 'user_menu.php';
    }
}
?>

