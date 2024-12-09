<?php
// index.php
include 'db.php';

// تسجيل وصول المستخدم
$ip_address = $_SERVER['REMOTE_ADDR'];
$user_agent = $_SERVER['HTTP_USER_AGENT'];

// حماية من SQL Injection باستخدام prepared statements
$stmt = $conn->prepare("INSERT INTO access_logs (ip_address, user_agent) VALUES (?, ?)");
$stmt->bind_param("ss", $ip_address, $user_agent);
$stmt->execute();
$stmt->close();

// جلب جميع الحسابات
$sql = "SELECT * FROM accounts ORDER BY created_at DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>حسابات فري فاير للبيع</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>حسابات فري فاير للبيع</h1>
        <nav>
            <a href="developer.php">صفحة المطور</a>
        </nav>
    </header>
    <div class="container">
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo '<div class="account">';
                echo '<p><strong>رابط الفيديو:</strong> <a href="' . htmlspecialchars($row['video_link']) . '" target="_blank">مشاهدة الفيديو</a></p>';
                echo '<p><strong>سعر الحساب:</strong> ' . htmlspecialchars($row['price']) . ' درهم</p>';
                echo '<p><strong>وصف الحساب:</strong> ' . (!empty($row['description']) ? htmlspecialchars($row['description']) : 'لا يوجد وصف') . '</p>';
                echo '<button onclick="buyAccount(' . $row['id'] . ')">شراء الحساب</button>';
                echo '</div><hr>';
            }
        } else {
            echo '<p>لا توجد حسابات متاحة للبيع.</p>';
        }
        ?>
    </div>

    <!-- نموذج الشراء -->
    <div id="buyModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeBuyModal()">&times;</span>
            <h2>شراء الحساب</h2>
            <form id="buyForm" action="process.php" method="POST">
                <input type="hidden" name="account_id" id="account_id">
                <label for="whatsapp_number">رقم الواتساب:</label>
                <input type="text" name="whatsapp_number" id="whatsapp_number" required>
                <button type="submit" name="buy_account">شراء</button>
            </form>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>
