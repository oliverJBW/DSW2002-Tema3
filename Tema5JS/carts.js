const TBODY = document.querySelector('tbody');

const cart = [];

PRODUCTS.forEach(p => {
    let row = `
    <tr>
        <td>${p.id}</td>
        <td>${p.name}</td>
        <td>${p.price}</td>
        <td>${p.amount}</td>
        <td onclick="addProduct(${p.id})">+</td>
    </tr>
    `;
    TBODY.insertAdjacentHTML('beforeend', row);
});

function addProduct(id){
    let newProduct = {
        id: id,
        amount: 1
    };
    
    cart.push(id);
    console.log(cart);
    localStorage.cart = JSON.stringify(cart);
}

function getCart(){
    let cart2 = JSON.parse(localStorage.cart);
    console.log(cart2);
}