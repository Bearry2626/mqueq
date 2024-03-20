<?php
include_once(dirname(dirname(__FILE__)) .  "/index.php");
?>

<?php
$phone_number = $_POST["phone_number"];
$password = $_POST["password"];
$repassword = $_POST["repassword"];

if ($password == "" || $repassword == "" || $phone_number == "") {
  setError("โปรดกรอกข้อมูลให้ครบถ้วน!");
} else if (!isPhoneNumber($phone_number)) {
  setError("โปรดกรอกเลขเบอร์โทรที่ถูกต้อง!");
} else if ($password != $repassword) {
  setError("รหัสผ่านไม่ตรงกัน!");
}
if (isError()) {;
  setRedirectLink("/into/forgot.php", true);
  exit();
}
$updateResult = query("UPDATE user SET password='$password' WHERE phone='$phone_number'");
setSuccess("เปลี่ยนรหัสผ่านเรียบร้อยแล้ว!");
setRedirectLink("/into/login.php", true);
