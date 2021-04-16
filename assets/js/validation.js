
let form = document.querySelector('.formValidation') 
let validateBtn = form.querySelector('.validateBtn') 
let login = form.querySelector('.login') 
let password = form.querySelector('.password') 
let password_second = form.querySelector('.password_second') 
let first_name = form.querySelector('.first_name') 
let last_name = form.querySelector('.last_name')
let email = form.querySelector('.email')
let phone = form.querySelector('.phone') 
let requireds = form.querySelectorAll('.required')  

form.addEventListener('submit', function (event) { 
    event.preventDefault() 
    
})    

// проверка полей формы на отсутствие данных

for (let i = 0; i < requireds.length; i++) { 
    if (!requireds[i].value) { 
    console.log('Пустые поля для заполнения', requireds[i]) 
    let error = document.createElement('div')
    error.className = 'error' 
    error.style.color = 'red' 
    error.innerHTML = 'Заполните поле' 
    form[i].parentElement.insertBefore(error, requireds[i])
    }
}

// проверка на совпадение пароля и его подтверждения

let checkPassword = function () { 
    if (password.value !== password_second.value) { 
        error.className = 'error' 
        error.style.color = 'red' 
        error.innerHTML = 'Пароли не совпадают' 
        password.parentElement.insertBefore(error, password)  
    }
}

// редирект на главную страницу 

// document.getElementById('submit').onclick = function() {
//     window.location = 'localhost/index.php';
// };

