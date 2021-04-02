class Catalog {
    constructor() {
        this.catalogProductsEl = document.querySelector('.catalog-products');
        this.preloaderEl = document.querySelector('.lds-backdrop');
        this.products = [];
        this.categoryId = this.catalogProductsEl.getAttribute('data-category-id');
        this.load();
    }
    load() {
        // загружает данные json по ajax из handlerCatalog
        // после загрузки вызывает renderProducts
        let xhr = new XMLHttpRequest();
        xhr.open('GET', '/handlers/handlerCatalog.php?category_id=' + this.categoryId);
        xhr.send();

        xhr.addEventListener('load', ()=>{
            let data = JSON.parse(xhr.responseText);
            //console.log(data);
            data.products.forEach((product)=>{
                this.products.push(new Product(product.id, product.name, product.image, product.price, product.sku, product.description));
            });
            //console.log(data);
            this.renderProducts();
            this.hidePreloader();
        });
    }

    hidePreloader() {
        this.preloaderEl.classList.add('disabled');
    }

    showPreloader() {
        this.preloaderEl.classList.remove('disabled');
    }

    renderProducts() {
        // отрисовывает карточки товара по полученным данным
        this.products.forEach((product) =>{
            this.catalogProductsEl.appendChild(product.renderForCatalog())
        })
    }
}

let catalog = new Catalog();