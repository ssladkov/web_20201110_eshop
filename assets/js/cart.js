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
                this.items.push({ 'product_id': item_data['product_id'], 'amount': item_data['amount'] })
            });
            // console.log(this.items);
            if (render) {
                render(this.items);
            }
        });

    }
    render(items) {
        if (cartPage) {
            console.log('render');
            console.log(items);
            items.forEach((item) => {
                let newEl = document.createElement('div');
                newEl.innerHTML = `id:${item.product_id} amount:${item.amount}`;
                document.body.appendChild(newEl);
            })


        }

    }

    add(product_id, amount) {
        let xhr = new XMLHttpRequest();
        xhr.open('GET', `/handlers/handlerCart.php?action=add&product_id=${product_id}&amount=${amount}`);
        xhr.send();

        xhr.addEventListener('load', () => {
            this.fill(this.render);
            // console.log(xhr.responseText);
        });


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
