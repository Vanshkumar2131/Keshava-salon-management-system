document.addEventListener("DOMContentLoaded", function () {
    updateCartTotals();
});

let totalcart = 0;

function updateCartTotals() {
    let cartItems = JSON.parse(localStorage.getItem("cartItems")) || {};
    let cartSubTotal = 0;

    const cartItemsBody = document.getElementById("cart-items-body");
    cartItemsBody.innerHTML = "";

    for (const key in cartItems) {
        if (cartItems.hasOwnProperty(key)) {
            const item = cartItems[key];
            const productSubTotal = parseFloat(item.sale_rate) * parseFloat(item.productQuantity);

            const tableRow = document.createElement("tr");

            const removeButton = document.createElement("button");
            removeButton.className = "cart-remove-btn";
            removeButton.textContent = "Remove";
            removeButton.style.backgroundColor = "#0C9";
            removeButton.style.color = "#fff";
            removeButton.onclick = function() {
                removeFromCart(key);
            };
            const td1 = document.createElement("td");
            td1.appendChild(removeButton);
            tableRow.appendChild(td1);

            const td2 = document.createElement("td");
            td2.textContent = item.productName;
            tableRow.appendChild(td2);

            const td3 = document.createElement("td");
            td3.textContent = "₹ " + item.sale_rate;
            tableRow.appendChild(td3);

            const quantityInput = document.createElement("input");
            quantityInput.type = "number";
            quantityInput.value = item.productQuantity;
            quantityInput.className = "cart-quantity-input";
            quantityInput.style.color = "#000";
            quantityInput.onchange = function() {
                updateCartItemQuantity(key, this.value);
            };
            const td5 = document.createElement("td");
            td5.appendChild(quantityInput);
            tableRow.appendChild(td5);

            const td6 = document.createElement("td");
            td6.textContent = "₹ " + productSubTotal.toFixed(2);
            tableRow.appendChild(td6);

            cartItemsBody.appendChild(tableRow);

            cartSubTotal += productSubTotal;
        }
    }
    const shipping = 0;
    const total = cartSubTotal + shipping;

    const cartShippingFee = document.getElementById("cart-shipping-fee");
    cartShippingFee.textContent = shipping > 0 ? "Free" : "₹ 0.00";

    const cartSubtotal = document.getElementById("cart-subtotal");
    cartSubtotal.textContent = "₹ " + cartSubTotal.toFixed(2);

    const totalElement = document.getElementById("total");
    totalElement.textContent = "₹ " + total.toFixed(2);

    localStorage.setItem("cartSubTotal", cartSubTotal.toFixed(2));
    localStorage.setItem("total", total.toFixed(2));
    totalcart = total.toFixed(2);
}


var options = {
    "key": "rzp_test_tvD4Fa9f1Ysai6",
    "amount": "58000", // Pass the calculated amount in paise
    "currency": "INR",
    "name": "Demo Payment",
    "description": "Test Transaction",
    "handler": function (response){
        // Send payment ID to server for verification
        var payment_id = response.razorpay_payment_id;
        var form = document.querySelector('form');
        form.innerHTML += '<input type="hidden" name="razorpay_payment_id" value="' + payment_id + '">';
        form.submit();
        console.log(payment_id);
    }
};

var rzp = new Razorpay(options);

document.querySelector('button').onclick = function(e) {
    rzp.open();
    e.preventDefault();
}

function removeFromCart(key) {
    let cartItems = JSON.parse(localStorage.getItem("cartItems")) || {};
    delete cartItems[key];
    localStorage.setItem("cartItems", JSON.stringify(cartItems));
    updateCartTotals();
}

function updateCartItemQuantity(key, quantity) {
    let cartItems = JSON.parse(localStorage.getItem("cartItems")) || {};
    cartItems[key].productQuantity = quantity;
    localStorage.setItem("cartItems", JSON.stringify(cartItems));
    updateCartTotals();
}


