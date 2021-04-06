class Catalog {
    constructor() {
        this.catalogProductsEl = document.querySelector('.catalog-products');
        this.preloaderEl = document.querySelector('.lds-backdrop');
        this.paginationEl = document.querySelector('.catalog-pagination');
        this.products = [];
        this.categoryId = this.catalogProductsEl.getAttribute('data-category-id');
        this.load();
    }
    load(page_num = 1) {
        // загружает данные json по ajax из handlerCatalog
        // после загрузки вызывает renderProducts
        let xhr = new XMLHttpRequest();
        xhr.open('GET', `/handlers/handlerCatalog.php?category_id=${this.categoryId}&page=${page_num}`);
        xhr.send();
        this.showPreloader();
        xhr.addEventListener('load', ()=>{
            let data = JSON.parse(xhr.responseText);
            this.clear();
            data.products.forEach((product)=>{
                this.products.push(new Product(product.id, product.name, product.image, product.price, product.sku, product.description));
            });
            this.renderProducts();
            this.renderPagination(data.pagination);
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

    clear() {
        // строчки ниже присваивают пустое знаечение содержимому элементов
        this.catalogProductsEl.innerHTML = '';
        this.paginationEl.innerHTML = '';
        this.products = [];
    }

    renderPagination(pagination_data) {
        /**
         * В pagination_data - {pages_count: 5, current_page: 1}
         *
         * Задача - формировать div-ы с классом catalog-pagination-item
         * */
        for(let i = 0; i < pagination_data.pages_count; i++) {
            let item = document.createElement('div');
            let page = i + 1;
            item.textContent = `${page}`;
            item.classList.add('catalog-pagination-item');
            if(pagination_data.current_page == page) {
                item.classList.add('active');
            }
            item.addEventListener('click', (e)=> {
                // e.target - то, на что кликнули
                let clicked_page = e.target.textContent;
                this.load(clicked_page);
            })
            this.paginationEl.appendChild(item);
        }

    }
}

let catalog = new Catalog();