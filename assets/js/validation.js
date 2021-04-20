document.addEventListener('DOMContentLoaded', () => {

    let form = document.querySelector("form");
    let pass = form.querySelector("input[name='password']");
    let pass_second = form.querySelector("input[name='password_second']");
    let hasErrors = false;
    
    form.addEventListener('submit', (even) => { 
        even.preventDefault();
        required_fields = form.querySelectorAll('input.required');
        
        required_fields.forEach((input) => {
            //проверка на пустоту обязательных полей
            console.log(input);
            if(input.value == '') {
                input.nextElementSibling.textContent = "Поле должно быть заполнено!";
                hasErrors = true;
            }
            //проверка совпадения паролей
            if(pass.value != pass_second.value) {
                input.nextElementSibling.textContent = "Пароли не совпадают";
                hasErrors = true;
            }
        }) 
        
        if (hasErrors == false) {
            form.submit();
        } else {
            return false;
        }
    });
});

