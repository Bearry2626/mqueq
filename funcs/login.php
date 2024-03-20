<?php
include_once(dirname(dirname(__FILE__)) .  "/index.php");
?>

<?php
$phone = $_POST["phone"];
$password = $_POST["password"];

if ($password == "" || $phone == "") {
    setError("โปรดกรอกข้อมูลให้ครบถ้วน!");
    setRedirectLink("/into/login.php", true);
    exit();
}
$result = query("SELECT * FROM user WHERE phone='$phone' AND password='$password'");
if ($result->num_rows == 0) {
    $result2 = query("SELECT * FROM restaurant WHERE phone='$phone' AND password='$password'");
    if ($result2->num_rows == 0) {
        setError("รหัสไม่ถูกต้อง");
        setRedirectLink("/into/login.php", true);
        exit();
    } else {
        $restaurantData = $result2->fetch_assoc();
        $_SESSION["restaurant_id"] = $restaurantData["id"];
        setSuccess("เข้าสู่ระบบเรียบร้อยแล้ว!");
        setRedirectLink("/res/main.php", true);
    }
} else {
    $userData = $result->fetch_assoc();
    $_SESSION["user_id"] = $userData["id"];
    setSuccess("เข้าสู่ระบบเรียบร้อยแล้ว!");
    if ($userData["role"] == "user") {
        setRedirectLink("/user/main.php", true);
    } else {
        setRedirectLink("/admin/main.php", true);
    }
}
