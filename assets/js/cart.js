class Cart {
    constructor() {
        this.items = [];
        this.fill(this.render);
        this.chosenSize = '';
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
            if (render) {
                this.render();
            }
        });

    }
    render() {
        if (cartPage) {
            console.log('render');
            console.log(this.items);
            this.items.forEach((element) => {
                let xhr = new XMLHttpRequest();
                xhr.open('GET', `/handlers/handlerCart.php?action=render&product_id=${element.product_id}`);
                xhr.send();

                xhr.addEventListener('load', () => {
                    let data = JSON.parse(xhr.responseText);
                    console.log(data);
                });
            })
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
}

let cart = new Cart();
