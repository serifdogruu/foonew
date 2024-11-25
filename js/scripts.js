// js/scripts.js

// Örnek: Form doğrulama
function validateForm() {
    let ad = document.forms["myForm"]["ad"].value;
    let soyad = document.forms["myForm"]["soyad"].value;
    if (ad == "" || soyad == "") {
        alert("Ad ve Soyad alanları boş bırakılamaz.");
        return false;
    }
    return true;
}
