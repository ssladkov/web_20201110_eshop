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
            // console.log(this.items);
            if (render && cartPage) {
                this.render();
            }
        });

    }
    render() {
        console.log('render');
        console.log(this.items);

        let xhr = new XMLHttpRequest();
        xhr.open('GET', `/handlers/handlerCart.php?action=render`);
        xhr.send();

        xhr.addEventListener('load', () => {

            let data = JSON.parse(xhr.responseText);
            console.log(data);
            data.forEach((arr) => {
                let newTable = document.createElement('div');
                newTable.classList.add('table-item');
                document.querySelector('.table').appendChild(newTable);

                let photo = document.createElement('div');
                photo.classList.add('photo-column');
                photo.classList.add('photo');
                photo.setAttribute('style', `background-image:url(../uploads/images/${arr.image});`)
                newTable.appendChild(photo);

                let name = document.createElement('div');
                name.classList.add('name-column');
                name.classList.add('name');
                name.textContent = `${arr.name}`
                newTable.appendChild(name);

                let size = document.createElement('div');
                size.classList.add('size-column');
                size.classList.add('size');
                size.textContent = `${arr.size}`
                newTable.appendChild(size);

                let amount = document.createElement('div');
                amount.classList.add('amount-column');
                amount.classList.add('amount');
                amount.textContent = `${arr.amount}`
                newTable.appendChild(amount);

                let price = document.createElement('div');
                price.classList.add('price-column');
                price.classList.add('price');
                price.textContent = `${arr.price}`
                newTable.appendChild(price);

                let del = document.createElement('div');
                del.classList.add('delete-column');
                newTable.appendChild(del);

                this.totalPrice += (arr.price * arr.amount);
                console.log(this.totalPrice);
                document.querySelector('.total-price').textContent = `${this.totalPrice} руб.`;
            });
        });

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
}

let cart = new Cart();
