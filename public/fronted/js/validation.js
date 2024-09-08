function validateEmail() {
    var email = document.getElementById('email').value;
    var pattern_email = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    var error_email = document.getElementById('error_email');

    if (pattern_email.test(email)) {
        error_email.innerHTML = "";
    } else {
        error_email.innerHTML = "Please enter a valid email address.";
    }
}

function phoneNumber() {
    var phone = document.getElementById("phone").value;
    var pattern_phone = /^[6-9]{1}[0-9]{9}$/;
    var error_phone = document.getElementById('error_phone');

    if (pattern_phone.test(phone)) {
        error_phone.innerHTML = "";
    }
    else {
        error_phone.innerHTML = "Please enter a valid phone number"
    }
}
