let xhr = new XMLHttpRequest();
let elMain = document.querySelector('.main');
xhr.open('GET', 'handler.php');
xhr.send();

xhr.addEventListener('load', ()=>{
    let data = JSON.parse(xhr.responseText);
    //console.log(data);
    data.forEach((product)=> {
        //console.log(product.name);
        let newEl = document.createElement('div');
        elMain.appendChild(newEl);
        newEl.innerHTML = `${product.name} <strong>${product.price}</strong>`;
    });
});