class Cart {
    constructor() {
        this.items = [];
        this.fill(this.render);
        this.chosenSize = '';
        this.totalPrice = 0;
    }

    fill(render) {
        let xhr = new XMLHttpRequest();
        xhr.open('GET', '/handlers/handlerCart.php?action=show');
        xhr.send();

        xhr.addEventListener('load', () => {
            let data = JSON.parse(xhr.responseText);
            this.items = [];
            data.forEach((item_data) => {
                this.items.push({ 'product_id': item_data['product_id'], 'amount': item_data['amount'], 'size': item_data['size'] })
            });
            console.log(this.items);
            let cartAmount = document.getElementById('cart-amount');
            let totalAmount = 0;
            this.items.forEach((element) => {
                totalAmount += element.amount;
            });
            cartAmount.textContent = `Корзина (${totalAmount})`;
            if (render && cartPage) {
                this.render();
            }
        });

    }
    render() {
        if (this.items.length !== 0) {
            console.log('render');
            console.log(this.items);

            let xhr = new XMLHttpRequest();
            xhr.open('GET', `/handlers/handlerCart.php?action=render`);
            xhr.send();

            xhr.addEventListener('load', () => {

                let data = JSON.parse(xhr.responseText);
                console.log(data);
                data.forEach((obj) => {
                    let currentItemId = obj.id;
                    let newTable = document.createElement('div');
                    newTable.classList.add('table-item');
                    document.querySelector('.table').appendChild(newTable);

                    let photo = document.createElement('div');
                    photo.classList.add('photo');
                    photo.setAttribute('style', `background-image:url(../uploads/images/${obj.image});`);
                    newTable.appendChild(photo);

                    let name = document.createElement('div');
                    name.classList.add('name');
                    name.textContent = `${obj.name}`;
                    newTable.appendChild(name);

                    let size = document.createElement('div');
                    size.classList.add('size');
                    size.textContent = `${obj.size}`;
                    newTable.appendChild(size);

                    let amount = document.createElement('div');
                    amount.classList.add('amount');
                    amount.textContent = `${obj.amount}`;
                    newTable.appendChild(amount);

                    let amountAdd = document.createElement('div');
                    amountAdd.innerHTML = `&#10133;`;
                    amountAdd.classList.add('amount-button');
                    amountAdd.addEventListener('click', () => {
                        this.addOne(currentItemId);
                    });
                    amount.appendChild(amountAdd);

                    let amountRemove = document.createElement('div');
                    amountRemove.innerHTML = `&#10134;`;
                    amountRemove.classList.add('amount-button');
                    amountRemove.addEventListener('click', () => {
                        this.removeOne(currentItemId);
                    });
                    amount.appendChild(amountRemove);


                    let price = document.createElement('div');
                    price.classList.add('price-column');
                    price.classList.add('price');
                    price.textContent = `${obj.price}`;
                    newTable.appendChild(price);

                    let del = document.createElement('div');
                    del.classList.add('delete-column');
                    del.classList.add('delete');
                    newTable.appendChild(del);
                    let delButton = document.createElement('div');
                    delButton.innerHTML = '&#10006;';
                    delButton.setAttribute('style', 'cursor:pointer;font-size:20px');
                    del.appendChild(delButton);
                    delButton.addEventListener('click', () => {
                        let xhr = new XMLHttpRequest();
                        xhr.open('GET', `/handlers/handlerCart.php?action=delete&id=${currentItemId}`);
                        xhr.send();

                        xhr.addEventListener('load', () => {
                            console.log(xhr.responseText);
                            document.location.reload();
                        });
                    });

                    this.totalPrice += (obj.price * obj.amount);
                    console.log(this.totalPrice);
                    document.querySelector('.total-amount').innerHTML = 'Итого: <span class="total-price"></span>';
                    document.querySelector('.total-price').textContent = `${this.totalPrice} руб.`;
                    document.querySelector('.total-end-price-basic').textContent = `Стоимость: ${this.totalPrice} руб.`;
                    document.querySelector('.total-end-price-final').textContent = `Итого: ${this.totalPrice + 500} руб.`;
                });
            });
        } else {
            let newTable = document.createElement('div');
            newTable.classList.add('table-item');
            newTable.setAttribute('style', 'display:flex;justify-content:center;align-items:center;font-size:30px');
            newTable.textContent = 'Корзина пуста';
            document.querySelector('.table').appendChild(newTable);
            console.log('no render');
            document.querySelector('.total-end-price-basic').textContent = ``;
            document.querySelector('.total-end-price-final').textContent = `Корзина пуста`;
        }
    }

    add(product_id, amount, chosenSize) {
        let xhr = new XMLHttpRequest();
        xhr.open('GET', `/handlers/handlerCart.php?action=add&product_id=${product_id}&amount=${amount}&chosenSize=${chosenSize}`);
        xhr.send();

        xhr.addEventListener('load', () => {
            this.fill(this.render);
            // console.log(xhr.responseText);
        });


    }

    setProductSize(element) {
        let allSizesEl = document.querySelector('.product-dimensions');
        allSizesEl.querySelectorAll('div.size').forEach((currentSizeEl) => {
            currentSizeEl.classList.remove('active');
        });
        element.classList.add('active');
        this.chosenSize = element.textContent;
        console.log(this.chosenSize);
    }
    removeOne(product_id) {
        let id = product_id;
        let xhr = new XMLHttpRequest();
        xhr.open('GET', `/handlers/handlerCart.php?action=removeOne&id=${id}`);
        xhr.send();
        xhr.addEventListener('load', () => {
            console.log(xhr.responseText);
            document.location.reload();
        });
    }
    addOne(product_id) {
        let id = product_id;
        let xhr = new XMLHttpRequest();
        xhr.open('GET', `/handlers/handlerCart.php?action=addOne&id=${id}`);
        xhr.send();
        xhr.addEventListener('load', () => {
            console.log(xhr.responseText);
            document.location.reload();
        });
    }
}

let cart = new Cart();
