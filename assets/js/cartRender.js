document.addEventListener('DOMContentLoaded', () => {
    document.querySelector('.lds-backdrop').classList.add('disabled');

});
cart.renderCart();
setInterval(() => {
    cart.renderCart();
}, 10000);