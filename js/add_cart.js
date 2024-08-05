function addToCart() {
    let productID = document.getElementById('ProductID').value;
    let productName = document.getElementById('ProductName').textContent;
    let sale_rate = document.getElementById('sale_rate').textContent;
    let productQuantity = document.getElementById('quantity').value;

    const item = {
        productID: productID,
        productName: productName,
        sale_rate: sale_rate,
        productQuantity: productQuantity,
    };

    let cartItems = JSON.parse(localStorage.getItem("cartItems")) || {};

    const key = productID;

    if (cartItems[key]) {
        cartItems[key].productQuantity = productQuantity;
    } else {
        cartItems[key] = item;
    }

    localStorage.setItem("cartItems", JSON.stringify(cartItems));

    // Check if the user is logged in
    // Simulate a successful login (replace with your actual login logic)
    // For demonstration purposes, setTimeout is used here
    setTimeout(function () {
        // If login is successful, redirect to cart.php
        window.location.href = "cart.php";
    }, 2000); // Delay for 2 seconds (adjust as needed)

    // showPopup();
}