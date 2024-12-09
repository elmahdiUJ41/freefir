<?php
// logout.php
setcookie('authenticated', '', time() - 3600, "/"); // حذف الكوكي
header("Location: developer.php");
exit();
?>
