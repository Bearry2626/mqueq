<?php
include_once(dirname(dirname(__FILE__)) .  "/index.php");
?>

<?php
$username = $_POST["username"];
$phone = $_POST["phone"];
$password = $_POST["password"];
$cpassword = $_POST["cpassword"];

if ($password == "" || $username == "" || $cpassword == "" || $phone == "") {
  setError("โปรดกรอกข้อมูลให้ครบถ้วน!");
} else if (!isPhoneNumber($phone)) {
  setError("โปรดกรอกเลขเบอร์โทรที่ถูกต้อง!");
} else if ($password != $cpassword) {
  setError("รหัสผ่านไม่ตรงกัน!");
}
if (isError()) {;
  setRedirectLink("/into/register.php", true);
  exit();
}
if (isDuplicatePhone($phone)) {
  setError("ขออภัย! เบอร์โทรนี้ถูกใช้งานแล้ว! โปรดใช้เบอร์อื่น!");
  setRedirectLink("/into/register.php", true);
  exit();
}
$insertResult = query("INSERT INTO user (username, password, phone) VALUES 
('$username', '$password', '$phone')");
setSuccess("สมัครสมาชิกเรียบร้อยแล้ว!");
setRedirectLink("/into/register.php", true);
