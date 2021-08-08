/* ==========================================================
 * form helpers : errors.js
  * ==========================================================*/

/* ERRORS CLASS DEFINITION
 * ====================== */

let ErrorsList = {
        'require'     : { 'type':'require','message':'mandatory field, Letters only' },
        'email'       : { 'type':'email','message':'Email is not valid' }
};

class Errors {
    constructor() {}
    static showError (source,target,type) {
        source.classList.add('has-error');
        target.innerText = ErrorsList[type].message.replace(/&#(\d+);/g);
    }
    static hideError (source,target) {
        source.classList.remove('has-error');
        target.innerText = '';
    }
}