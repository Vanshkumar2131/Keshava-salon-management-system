let total = document.getElementById('.total').textContent;

var options = {
    "key": "rzp_test_tvD4Fa9f1Ysai6",
    "amount": total, // Amount in paise
    "currency": "INR",
    "name": "Demo Payment",
    "description": "Test Transaction",
    "handler": function (response){
        // Send payment ID to server for verification
        var payment_id = response.razorpay_payment_id;
        var form = document.querySelector('form');
        form.innerHTML += '<input type="hidden" name="razorpay_payment_id" value="' + payment_id + '">';
        form.submit();
    }
};

var rzp = new Razorpay(options);

document.querySelector('button').onclick = function(e) {
    rzp.open();
    e.preventDefault();
}