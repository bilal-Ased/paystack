<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Paystack</title>
</head>

<body>
    <h2>Product Laptop</h2>
    <h1>Price 100 USD</h1>

    <form id="paymentForm">
        <div class="form-submit">
            <button type="submit" onclick="payWithPaystack()"> Pay </button>
        </div>
    </form>

    <script src="https://js.paystack.co/v1/inline.js"></script>
    <script>
        const paymentForm = document.getElementById('paymentForm');
        paymentForm.addEventListener("submit", payWithPaystack, false);

        function payWithPaystack(e) {
            e.preventDefault();

            let handler = PaystackPop.setup({
                key: "{{ env('PAYSTACK_PUBLIC_KEY') }}", // Replace with your public key
                email: "mughalbilal89@gmail.com",
                amount: 1000,
                currency: "KES",

                onClose: function() {
                    alert('Window closed.');
                },
                callback: function(response) {
                    let message = 'Payment complete! Reference: ' + response.reference;
                    alert(message);
                }
            });

            handler.openIframe();
        }
    </script>
</body>

</html>
