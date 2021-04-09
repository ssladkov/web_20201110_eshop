class Cart {
    constructor() {
        this.items = [];
        this.chosenSize = '';
    }

    fill() {
        let xhr = new XMLHttpRequest();
        xhr.open('GET', '/handlers/handlerCart.php?action=show');
        xhr.send();

        xhr.addEventListener('load', ()=>{
            let data = JSON.parse(xhr.responseText);
            data.forEach((item_data)=>{
                this.items.push({'product_id': item_data['product_id'], 'amount': item_data['amount']})
            });
        });  
    }

    add(product_id, amount) {
        let xhr = new XMLHttpRequest();
        xhr.open('GET', `/handlers/handlerCart.php?action=add&product_id=${product_id}&amount=${amount}`);
        xhr.send();

        xhr.addEventListener('load', ()=>{
            this.fill();
        });
        console.log(this.items); 
    }

    setProductSize(element) {
        let allSizesEl = document.querySelector('.product-dimensions');
        allSizesEl.querySelectorAll('div.size').forEach((currentSizeEl)=>{
            currentSizeEl.classList.remove('active');
        });
        element.classList.add('active');
        this.chosenSize = element.textContent;
    }
}

let cart = new Cart();
