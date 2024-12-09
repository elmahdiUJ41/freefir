<!-- إضافة قسم لإدارة كودات التعبئة -->
<div class="form-section">
    <h2>إدارة كودات التعبئة</h2>
    <form action="process.php" method="POST">
        <input type="hidden" name="action" value="add_recharge_code">
        <label for="recharge_code">كود التعبئة:</label>
        <input type="text" name="recharge_code" id="recharge_code" required><br>
        <button type="submit" name="add_recharge_code">إضافة كود</button>
    </form>

    <h3>كودات التعبئة المضافة</h3>
    <?php
    $sql_recharge = "SELECT * FROM recharge_codes ORDER BY created_at DESC";
    $result_recharge = $conn->query($sql_recharge);
    if ($result_recharge->num_rows > 0) {
        while($row = $result_recharge->fetch_assoc()) {
            echo '<div class="recharge_code">';
            echo '<p><strong>ID:</strong> ' . htmlspecialchars($row['id']) . '</p>';
            echo '<p><strong>كود التعبئة:</strong> ' . htmlspecialchars($row['code']) . '</p>';
            echo '<form action="process.php" method="POST" onsubmit="return confirm(\'هل أنت متأكد من حذف هذا الكود؟\');">';
            echo '<input type="hidden" name="action" value="delete_recharge_code">';
            echo '<input type="hidden" name="recharge_id" value="' . $row['id'] . '">';
            echo '<button type="submit" name="delete_recharge_code">حذف الكود</button>';
            echo '</form>';
            echo '</div><hr>';
        }
    } else {
        echo '<p>لا توجد كودات تعبئة مضافة.</p>';
    }
    ?>
</div>

<!-- إضافة قسم لإدارة الإعلانات -->
<div class="form-section">
    <h2>إدارة الإعلانات</h2>
    <form action="process.php" method="POST">
        <input type="hidden" name="action" value="add_ad">
        <label for="ad_code">كود الإعلان:</label>
        <textarea name="ad_code" id="ad_code" required></textarea><br>
        <button type="submit" name="add_ad">إضافة إعلان</button>
    </form>

    <h3>الإعلانات المضافة</h3>
    <?php
    $sql_ads = "SELECT * FROM ads ORDER BY created_at DESC";
    $result_ads = $conn->query($sql_ads);
    if ($result_ads->num_rows > 0) {
        while($row = $result_ads->fetch_assoc()) {
            echo '<div class="ad">';
            echo '<p><strong>ID:</strong> ' . htmlspecialchars($row['id']) . '</p>';
            echo '<p><strong>كود الإعلان:</strong> ' . htmlspecialchars($row['ad_code']) . '</p>';
            echo '<form action="process.php" method="POST" onsubmit="return confirm(\'هل أنت متأكد من حذف هذا الإعلان؟\');">';
            echo '<input type="hidden" name="action" value="delete_ad">';
            echo '<input type="hidden" name="ad_id" value="' . $row['id'] . '">';
            echo '<button type="submit" name="delete_ad">حذف الإعلان</button>';
            echo '</form>';
            echo '</div><hr>';
        }
    } else {
        echo '<p>لا توجد إعلانات مضافة.</p>';
    }
    ?>
</div>
