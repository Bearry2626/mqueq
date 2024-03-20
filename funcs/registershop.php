<?php
include_once(dirname(dirname(__FILE__)) .  "/index.php");
?>

<?php

$name = $_POST["name"];
$phone = $_POST["phone"];
$address = $_POST["address"];
$password = $_POST["password"];
$cpassword = $_POST["cpassword"];

if ($name == "" || $phone == "" || $address == "" || $password == "" || $cpassword == "") {
  setError("โปรดกรอกข้อมูลให้ครบถ้วน!");
} else if (!isPhoneNumber($phone)) {
  setError("โปรดกรอกเลขเบอร์โทรที่ถูกต้อง!");
} else if ($password != $cpassword) {
  setError("รหัสผ่านไม่ตรงกัน!");
}
if (isError()) {;
  setRedirectLink("/into/regisshop.php", true);
  exit();
}
if (isDuplicatePhone($phone)) {
  setError("ขออภัย! เบอร์โทรนี้ถูกใช้งานแล้ว! โปรดใช้เบอร์อื่น!");
  setRedirectLink("/into/regisshop.php", true);
  exit();
}
$img = $_FILES["img"];
if (!is_uploaded_file($img['tmp_name'])) {
  setError("โปรดอัพโหลดรูปภาพ");
  setRedirectLink("/into/regisshop.php", true);
  exit();
} else {
  $ext = strtolower(pathinfo($img['name'], PATHINFO_EXTENSION));
  $imgName = uniqid() . '.' . $ext;
  if (move_uploaded_file($img['tmp_name'], '../img/restaurant/' . $imgName)) {
    $insertResult = query("INSERT INTO restaurant 
    (name, phone, address, image, password) VALUES 
    ('$name', '$phone', '$address', '$imgName', '$password')");
    setSuccess("สมัครร้านค้าเรียบร้อยแล้ว! โปรดรอแอดมินอนุมัติ");
    setRedirectLink("/into/login.php", true);
  } else {
    setError("อัพโหลดรูปไม่สำเร็จ!");
    setRedirectLink("/into/regisshop.php", true);
    exit();
  }
}
