-- إنشاء قاعدة البيانات
CREATE DATABASE fire_accounts;

-- استخدام قاعدة البيانات
USE fire_accounts;

-- إنشاء جدول الحسابات
CREATE TABLE accounts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    video_link VARCHAR(255) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- إنشاء جدول سجلات الوصول
CREATE TABLE access_logs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ip_address VARCHAR(45) NOT NULL,
    user_agent VARCHAR(255) NOT NULL,
    access_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
