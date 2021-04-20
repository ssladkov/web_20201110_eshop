console.log(window);
window.addEventListener("load", () => {
    console.log(window);
    document.querySelector('.lds-backdrop').classList.add('disabled');
    let subscribeEl = document.querySelector('form');
    let emailInputEl = document.querySelector('.email_input input[name=email]');
    let errorTextEl = document.querySelector('.error-text');
    console.log(subscribeEl.value);
    subscribeEl.addEventListener('submit', (e)=> {
        console.log(subscribeEl);
        e.preventDefault();
        if(emailInputEl.value == ''){
            console.log(emailInputEl);
            errorTextEl.style.display = 'block';
            return false;
        }
        let xhr = new XMLHttpRequest();
        xhr.open('GET', '/parts/handlerSubscribe.php?email=' + emailInputEl.value);
        xhr.send();
        xhr.addEventListener('load', ()=> {
            if(xhr.responseText == 'ok') {
                subscribeEl.submit();
                console.log(xhr.responseText);
            } else if(xhr.responseText == 'not_uniq') {
                console.log(xhr.responseText);
                errorTextEl.innerHTML = 'Такой e-mail уже существует!';
            }
        })
        console.log(xhr);
    })
});