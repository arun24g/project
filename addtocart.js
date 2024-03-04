// cart.js
function addItemToCart(itemId, itemName, itemPrice) {
    const cart = JSON.parse(localStorage.getItem("cart")) || [];
    const item = { id: itemId, name: itemName, price: itemPrice };
    cart.push(item);
    localStorage.setItem("cart", JSON.stringify(cart));
}



function removeItemFromCart(itemId) {
    const cart = JSON.parse(localStorage.getItem("cart")) || [];
    const removedItem = cart.find(item => item.id === itemId);

    if (removedItem) {
        total -= removedItem.price;
        const updatedCart = cart.filter(item => item.id !== itemId);
        localStorage.setItem("cart", JSON.stringify(updatedCart));
        updateCartDisplay();
    }
}

function clearCart() {
    localStorage.removeItem("cart");
    updateCartDisplay();
}

function updateCartDisplay() {
    const cartList = document.getElementById("cart-list");
    cartList.innerHTML = "";

    const cart = JSON.parse(localStorage.getItem("cart")) || [];

    cart.forEach(item => {
        const li = document.createElement("li");
        li.textContent = `${ item.name }  ----- Rs: ${ item.price.toFixed(2) }`;

        const removeButton = document.createElement("button");
        removeButton.style.color = "red";
        removeButton.style.border = "none";
        removeButton.style.fontSize = "large";
        removeButton.style.margin = "5px";
        removeButton.style.padding = "10px";
        removeButton.style.cursor = "grab";
        removeButton.style.fontStyle = "oblique";
        removeButton.style.backgroundColor = "inherit";
        removeButton.style.float = "right";
        removeButton.style.marginTop = "-10px"
        removeButton.textContent = "X";
        removeButton.onclick = () => {
            removeItemFromCart(item.id);

        }

        li.appendChild(removeButton);
        cartList.appendChild(li);

        const totalElement = document.getElementById("total");
        totalElement.style.fontStyle = "italic";
        totalElement.style.fontWeight = "bold";
        totalElement.style.fontSize = "large";

        totalElement.textContent = `Total= Rs : ${calculateTotal().toFixed(2)} /-`;
    });
}

function calculateTotal() {
    const cart = JSON.parse(localStorage.getItem("cart")) || [];
    let total = 0;

    cart.forEach(item => {
        total += item.price;
    });

    return total;
}


// Initial update of cart display when the page loads
updateCartDisplay();