<?php
// db.php
$servername = "localhost";
$username = "root"; // اسم المستخدم لقاعدة البيانات
$password = "";     // كلمة المرور لقاعدة البيانات
$dbname = "fire_accounts";

// إنشاء الاتصال
$conn = new mysqli($servername, $username, $password, $dbname);

// التحقق من الاتصال
if ($conn->connect_error) {
    die("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
}
?>
