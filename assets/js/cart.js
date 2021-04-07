class Cart {
    constructor() {
        this.items = [];
    }

    fill() {
        let xhr = new XMLHttpRequest();
        xhr.open('GET', '/handlers/handlerCart.php?action=show');
        xhr.send();

        xhr.addEventListener('load', () => {
            let data = JSON.parse(xhr.responseText);
            this.items = [];
            data.forEach((item_data) => {
                this.items.push({ 'product_id': item_data['product_id'], 'amount': item_data['amount'] })
            });
            console.log(this.items);
        });

    }

    add(product_id, amount) {
        let xhr = new XMLHttpRequest();
        xhr.open('GET', `/handlers/handlerCart.php?action=add&product_id=${product_id}&amount=${amount}`);
        xhr.send();

        xhr.addEventListener('load', () => {
            this.fill();
            console.log(xhr.responseText);
        });


    }
    // fill() + render
    renderCart() {
        let xhr = new XMLHttpRequest();
        xhr.open('GET', '/handlers/handlerCart.php?action=show');
        xhr.send();

        xhr.addEventListener('load', () => {
            let data = JSON.parse(xhr.responseText);
            this.items = [];
            data.forEach((item_data) => {
                this.items.push({ 'product_id': item_data['product_id'], 'amount': item_data['amount'] })
            });
            this.items.forEach((element) => {
                let newEl = document.createElement('div');
                newEl.textContent = `id = ${element.product_id} amount = ${element.amount}`;
                document.body.appendChild(newEl);
                console.log('Я типо зарендерился!');
            });
        })
    };
}

let cart = new Cart();
