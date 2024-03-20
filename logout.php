<?php
include_once(dirname(__FILE__) .  "/index.php");
unset($_SESSION["user_id"]);
unset($_SESSION["restaurant_id"]);
setSuccess("ออกจากระบบเรียบร้อยแล้ว!");
setRedirectLink("/into/login.php");
include_once(dirname(__FILE__) .  "/includes/footer-script.php");
