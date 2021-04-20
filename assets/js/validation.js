
document.addEventListener('DOMContentLoaded', () => {

    let form = document.querySelector("form");
    let pass = form.querySelector("password");
    let pass_second = form.querySelector("password_second");
    let hasErrors = false;

    let regExpLogin = /^[a-z0-9_-]{3,16}$/;
    let regExpPass = /^[a-z0-9_-]{6,18}$/;
    let regExpEmail = /^([a-z0-9_\.-]+)@([a-z0-9_\.-]+)\.([a-z\.]{2,6})$/;

    let validateElem = (elem) => {
        if(elem.name === "login") {
            if (!regExpLogin.test(elem.value) && (elem.value !== "")) {
                elem.nextElementSibling.textContent = "Введите корректный логин";
                hasErrors = false;    
            } else {
                elem.nextElementSibling.textContent = "";
                hasErrors = true;
            }
        }
    }

    let validateElem = (elem) => {
        if(elem.name === "password") {
            if (!regExpPassword.test(elem.value) && (elem.value !== "")) {
                elem.nextElementSibling.textContent = "Введите корректный пароль";
                hasErrors = false;    
            } else {
                elem.nextElementSibling.textContent = "";
                hasErrors = true;
            }
        }
    }

    let validateElem = (elem) => {
        if (!regExpPass.test(elem.value) && (elem.value !== "")) {
                elem.nextElementSibling.textContent = "Повторно введите пароль";
                hasErrors = false;    
            } else {
                elem.nextElementSibling.textContent = "";
                hasErrors = true;
            }
        }
    
        if (pass.value !== pass_second.value && pass_second.value !== "") {
            elem.nextElementSibling.textContent = "Пароли не совпадают";
            hasErrors = false;    
        } else {
            elem.nextElementSibling.textContent = "";
            hasErrors = true;
        }
        
    let validateElem = (elem) => {
        if (elem.name === "first_name") {
            if (elem.value !== "") {
            elem.nextElementSibling.textContent = "Введите имя";
            hasErrors = false;    
        } else {
            elem.nextElementSibling.textContent = "";
            hasErrors = true;
            }
        }
    }

    let validateElem = (elem) => {
        if(elem.name === "last_name") {
            if (elem.value !== "") {
            elem.nextElementSibling.textContent = "Введите фамилию";
            hasErrors = false;    
        } else {
            elem.nextElementSibling.textContent = "";
            hasErrors = true;
            }
        }
    }

    let validateElem = (elem) => {
        if(elem.name === "email") {
            if (!regExpEmail.test(elem.value) && (elem.value !== "")) {
                elem.nextElementSibling.textContent = "Введите корректный электронный адрес";
                hasErrors = false;    
            } else {
                elem.nextElementSibling.textContent = "";
                hasErrors = true;
            }
        }
    }
    
    let validateElem = (elem) => {  
        if(elem.name === "phone") {
            if (elem.value !== "") {
                elem.nextElementSibling.textContent = "Введите телефон";
                hasErrors = false;    
            } else {
                elem.nextElementSibling.textContent = "";
                hasErrors = true;
            }
        }
    }

        for (let elem of form.elements) {
                if(elem.value === "") {
        elem.addEventListener("blur", () => {
            validateElem(elem);
        })
    }
}
    
form.addEventListener('submit', (even) => { 
    even.preventDefault(); 
        for (let elem of form.elements) {
            if(elem.value === "")
        {
            elem.nextElementSibling.textContent = "Данное поле не заполнено";
            hasErrors = false;    
        } else {
            elem.nextElementSibling.textContent = "";
            hasErrors = true;
        }
    }
});

if (hasErrors == false) {
    form.submit();
} else {
    return true;
}
