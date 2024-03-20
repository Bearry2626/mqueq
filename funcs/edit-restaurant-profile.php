<?php
include_once(dirname(dirname(__FILE__)) .  "/index.php");
?>

<?php
if (!isRestaurant()) {
  setError("โปรดเข้าสู่ระบบก่อน!");
  setRedirectLink("/user/main.php", true);
  exit();
}
$name = $_POST["name"];
$phone = $_POST["phone"];
$address = $_POST["address"];

$img = $_FILES["file"];
if (!is_uploaded_file($img['tmp_name'])) {
  $insertResult = query("UPDATE restaurant SET name='$name', phone='$phone', address='$address' WHERE id=" . $restaurant["id"]);
  setSuccess("อัพเดทโปรไฟล์เรียบร้อยแล้ว!");
  setRedirectLink("/res/profile.php", true);
} else {
  $ext = strtolower(pathinfo($img['name'], PATHINFO_EXTENSION));
  $imgName = uniqid() . '.' . $ext;
  if (move_uploaded_file($img['tmp_name'], '../img/restaurant/' . $imgName)) {
    $insertResult = query("UPDATE restaurant SET 
    name='$name', phone='$phone', address='$address', image='$imgName' WHERE
    id=" . $restaurant["id"]);
    setSuccess("อัพเดทโปรไฟล์เรียบร้อยแล้ว!");
    setRedirectLink("/res/profile.php", true);
  } else {
    setError("อัพโหลดรูปไม่สำเร็จ!");
    setRedirectLink("/res/profile.php", true);
    exit();
  }
}
