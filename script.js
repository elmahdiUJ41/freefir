// script.js

// فتح نموذج الشراء
function buyAccount(accountId) {
    document.getElementById('buyModal').style.display = "block";
    document.getElementById('account_id').value = accountId;
}

// إغلاق نموذج الشراء
function closeBuyModal() {
    document.getElementById('buyModal').style.display = "none";
}

// إغلاق النموذج عند النقر خارج المحتوى
window.onclick = function(event) {
    var modal = document.getElementById('buyModal');
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
