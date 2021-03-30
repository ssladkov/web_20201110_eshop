class Product {
    constructor(id, name, image, price, sku, description) {
        this.id = id;
        this.name = name;
        this.image = image;
        this.price = price;
        this.sku = sku;
        this.description = description;
    }

    renderForCatalog() {
        let productEl = document.createElement('a');
        productEl.href = `/product.php?id=${this.id}`;
        productEl.classList.add('catalog-products-item');
        productEl.innerHTML = `
            <div class="catalog-products-item-image" style="background-image: url(/uploads/images/${this.image});"></div>
            <div class="catalog-products-item-name">${this.name}</div>
            <div class="catalog-products-item-price">${this.price}</div>
        `;
        return productEl;
    }
}