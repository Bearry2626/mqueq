<?php

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'mqueq');

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: (" . mysqli_connect_error() . ") ";
    exit();
}

function query($cmd, $getdata = true) {
    global $conn;
    if ($getdata) {
        return $conn->query($cmd);
    } else {
        $check = ($conn->query($cmd) ? 1 : 0);
        if ($check == 1) {
            return 1;
        } else {
            echo $conn->error;
        }
    }
}

if (isset($_SESSION["user_id"])) {
    $userLogin = query("SELECT * FROM user WHERE id=" . $_SESSION["user_id"]);
    if ($userLogin->num_rows >= 1) {
        $user = $userLogin->fetch_assoc();
    } else {
        unset($_SESSION["user_id"]);
    }
} else if (isset($_SESSION["restaurant_id"])) {
    $userLogin = query("SELECT * FROM restaurant WHERE id=" . $_SESSION["restaurant_id"]);
    if ($userLogin->num_rows >= 1) {
        $restaurant = $userLogin->fetch_assoc();
    } else {
        unset($_SESSION["restaurant_id"]);
    }
}
