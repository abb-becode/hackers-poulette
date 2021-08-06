
//let frmContact = document.getElementById("frm-contact");

function showError (errorField, errorSpan,  msg) {
    errorField.classList.add("has-error");
    errorSpan.innerText = msg;
}
function hideError (errorField, errorSpan) {
    errorField.classList.remove("has-error");
    errorSpan.innerText = "";
}

/*frmContact.addEventListener("submit", (e) => {
    e.preventDefault(); //action par défaut
    // check fields
    //if fields_ok { form.submit() }
});*/

function validateForm() {
    let  firstname = document.getElementById('firstname');
    let errFirstname = document.getElementById('errFirstname');
    let  lastname = document.getElementById('lastname');
    let errLastname = document.getElementById('errLastname');
    let  email = document.getElementById('email');
    let errEmail = document.getElementById('errEmail');
    let  message = document.getElementById('message');
    let errMessage = document.getElementById('errMessage');

    let reg1 = /^[a-zA-Z]+$/;
    let reg2 = /^[a-zA-Z]+( [a-zA-Z]+)+$/;
    let reg3 = /(?:[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])/;


    let fnValue = firstname.value.trim();
    let lnValue = lastname.value.trim();
    let emailValue = email.value.trim();
    let messageValue = message.value.trim();

    let fnValid = false
        ,lnValid = false
        ,emailValid = false
        ,messageValid = false;

    if( !reg1.test(fnValue) && !reg2.test(fnValue) ) {
        showError(firstname, errFirstname,"invalid first name. only letters");
    } else { hideError(firstname,errFirstname); fnValid = true; }
    if (!reg1.test(lnValue) && !reg2.test(lnValue)) {
        showError(lastname, errLastname, "invalid last name. only letters");
    } else { hideError(lastname,errLastname);lnValid = true; }
    if (!reg3.test(emailValue)) {
        showError(email, errEmail, "invalid email");
    } else { hideError(email,errEmail);emailValid = true; }
    if (!messageValue || messageValue=='') {
        showError(message, errMessage, "invalid message. only letters");
    } else { hideError(message,errMessage);messageValid = true; }

    let valid = (fnValid && lnValid && emailValid && messageValid) ?  true :  false;
    return valid;
}