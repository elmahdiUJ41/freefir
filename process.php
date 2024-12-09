// إضافة كود تعبئة
if ($action === 'add_recharge_code' && isset($_POST['add_recharge_code'])) {
    $recharge_code = $conn->real_escape_string($_POST['recharge_code']);

    $stmt = $conn->prepare("INSERT INTO recharge_codes (code) VALUES (?)");
    $stmt->bind_param("s", $recharge_code);
    if ($stmt->execute()) {
        header("Location: developer.php");
        exit();
    } else {
        echo "خطأ: " . $stmt->error;
    }
    $stmt->close();
}

// حذف كود تعبئة
if ($action === 'delete_recharge_code' && isset($_POST['delete_recharge_code'])) {
    $recharge_id = intval($_POST['recharge_id']);

    $stmt = $conn->prepare("DELETE FROM recharge_codes WHERE id = ?");
    $stmt->bind_param("i", $recharge_id);
    if ($stmt->execute()) {
        header("Location: developer.php");
        exit();
    } else {
        echo "خطأ في حذف كود التعبئة: " . $stmt->error;
    }
    $stmt->close();
}

// إضافة إعلان
if ($action === 'add_ad' && isset($_POST['add_ad'])) {
    $ad_code = $conn->real_escape_string($_POST['ad_code']);

    $stmt = $conn->prepare("INSERT INTO ads (ad_code) VALUES (?)");
    $stmt->bind_param("s", $ad_code);
    if ($stmt->execute()) {
        header("Location: developer.php");
        exit();
    } else {
        echo "خطأ: " . $stmt->error;
    }
    $stmt->close();
}

// حذف إعلان
if ($action === 'delete_ad' && isset($_POST['delete_ad'])) {
    $ad_id = intval($_POST['ad_id']);

    $stmt = $conn->prepare("DELETE FROM ads WHERE id = ?");
    $stmt->bind_param("i", $ad_id);
    if ($stmt->execute()) {
        header("Location: developer.php");
        exit();
    } else {
        echo "خطأ في حذف الإعلان: " . $stmt->error;
    }
    $stmt->close();
}
