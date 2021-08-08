
let form = document.getElementById('frm-contact');
form.addEventListener('submit', function(event) {
    if (!validForm()) {
        event.preventDefault();
        //event.stopPropagation();
    } else { form.submit(); }
});

function validForm() {
    // user data
    let User = {
        'firstname' : {
            valid : false,
            id : document.getElementById('firstname'),
            idError : document.getElementById('firstname_error'),
            value   : document.getElementById('firstname').value
        } ,
        'lastname' : {
            valid : false,
            id : document.getElementById('lastname'),
            idError : document.getElementById('lastname_error'),
            value   : document.getElementById('lastname').value
        } ,
        'email' : {
            valid : false,
            id : document.getElementById('email'),
            idError : document.getElementById('email_error'),
            value   : document.getElementById('email').value
        } ,
        'message' : {
            valid : false,
            id : document.getElementById('message'),
            idError : document.getElementById('message_error'),
            value   : document.getElementById('message').value
        } ,
        checkDataValidity : function() {
            return ( this.firstname.valid && this.lastname.valid && this.email.valid && this.message.valid );
            //return ( this.lastname.valid && this.email.valid  && this.message.valid );
        }
    }

    //check data
    if (!Regex.alpha(User['firstname'].value)) {
        Errors.showError(User['firstname'].id, User['firstname'].idError,'require');
        User['firstname'].valid = false;
    } else {
        Errors.hideError(User['firstname'].id, User['firstname'].idError);
        User['firstname'].valid = true;
    }

    if (!Regex.alpha(User['lastname'].value)) {
        Errors.showError(User['lastname'].id, User['lastname'].idError,'require');
        User['lastname'].valid = false;
    } else {
        Errors.hideError(User['lastname'].id, User['lastname'].idError);
        User['lastname'].valid = true;
    }

    if (!Regex.isValidEmail(User['email'].value)) {
        Errors.showError(User['email'].id, User['email'].idError,'email');
        User['email'].valid = false;
    } else {
        Errors.hideError(User['email'].id, User['email'].idError);
        User['email'].valid = true;
    }

    if (!Regex.alpha(User['message'].value)) {
        Errors.showError(User['message'].id, User['message'].idError,'require');
        User['message'].valid = false;
    } else {
        Errors.hideError(User['message'].id, User['message'].idError);
        User['message'].valid = true;
    }

    return User.checkDataValidity();
}