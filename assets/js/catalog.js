class Catalog {
    constructor() {
        this.catalogProductsEl = document.querySelector('.catalog-products');
        this.preloaderEl = document.querySelector('.lds-backdrop');
        this.paginationEl = document.querySelector('.catalog-pagination');
        this.filterEl = document.querySelector('.catalog-header-filter');

        this.products = [];
        this.categoryId = this.catalogProductsEl.getAttribute('data-category-id');
        this.filter = {
            filter_price: null,
            filter_size: null
        };
        this.addFilterListeners();
        this.load();
    }
    load(page_num = 1) {
        // загружает данные json по ajax из handlerCatalog
        // после загрузки вызывает renderProducts
        let xhr = new XMLHttpRequest();
        let get_str = `/handlers/handlerCatalog.php?category_id=${this.categoryId}&page=${page_num}`;

        if(this.filter['filter_size']) {
            get_str += `&filter_size=${this.filter['filter_size']}`;
        }
        if(this.filter['filter_price']) {
            get_str += `&filter_price=${this.filter['filter_price']}`;
        }

        xhr.open('GET', get_str);
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

    addFilterListeners() {
        this.filterEl.querySelectorAll('.catalog-header-filter-item').forEach((element)=> {
            element.querySelector('select').addEventListener('change', (e)=>{
                this.filter[e.target.getAttribute('name')] = e.target.value ? e.target.value : null;
                this.load(1);
            });
        });
    }
}

let catalog = new Catalog();