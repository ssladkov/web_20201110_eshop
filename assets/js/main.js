window.addEventListener("load", () => {
    document.querySelector('.lds-backdrop').classList.add('disabled');
});

let subscribeEl = document.querySelector('form');
let emailInputEl = document.querySelector('.email_input input[name=email]');
let emailButtonEl = document.querySelector('.email_input input[type=submit]');
let errorTextEl = document.querySelector('.error-text');
let xhr = new XMLHttpRequest();
function emailSend(){
    emailButtonEl.addEventListener('click', ()=> {
        xhr.open('GET', '/handlerSubscribe.php?email=' + emailInputEl.value);
        xhr.send();
        emailButtonEl.setAttribute('disabled', 'disabled');
        emailButtonEl.innerHTML = 'Подождите...';
        xhr.addEventListener('load', ()=> {
            if(xhr.status == 200) {
                console.log(xhr.responseText);
                if(xhr.responseText == 'not_uniq') {
                    emailButtonEl.removeAttribute('disabled');
                    emailButtonEl.innerHTML = 'Подписаться';
                    errorTextEl.innerHTML = 'Такой e-mail уже существует!';
                    subscribeEl.appendChild(el);
                }
            }
        }
    });

    if(emailInputEl.value == ''){
        errorTextEl.style.display = 'block';
        return false;
    } else {
        return true;
    }
};