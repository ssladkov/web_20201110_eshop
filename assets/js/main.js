window.addEventListener("load", () => {
    document.querySelector('.lds-backdrop').classList.add('disabled');
    let subscribeEl = document.querySelector('form');
    let emailInputEl = document.querySelector('.email_input input[name=email]');
    let errorTextEl = document.querySelector('.error-text');
    subscribeEl.addEventListener('submit', (e)=> {
        e.preventDefault();
        if(emailInputEl.value == ''){
            errorTextEl.style.display = 'block';
        }
        let xhr = new XMLHttpRequest();
        xhr.open('GET', '/handlers/handlerSubscribe.php?email=' + emailInputEl.value);
        xhr.send();
        xhr.addEventListener('load', ()=> {
            if(xhr.responseText == 'ok') {
                errorTextEl.style.display = 'block';
                errorTextEl.innerHTML = 'Вы успешно подписались на рассылку!';
                errorTextEl.style.color = 'green';
                emailInputEl.style.display = 'none';
                subscribeEl.querySelector('input[type=submit]').style.display = 'none';
            } else if(xhr.responseText == 'not_uniq') {
                errorTextEl.style.display = 'block';
                errorTextEl.innerHTML = 'Такой e-mail уже существует!';
            }
        });
        return false;
    })
});