<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.1/gsap.min.js"></script>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            height: 100vh;
            background-color: #f6fff5;
            overflow: hidden;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .payment-container {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 90%;
            text-align: center;
        }

        .payment-title {
            font-size: 28px;
            color: #115521;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .payment-details {
            font-size: 16px;
            color: #555;
            margin-bottom: 20px;
            line-height: 1.6;
        }

        .payment-details span {
            font-weight: bold;
            color: #28a745;
        }

        .input-group {
            margin-bottom: 15px;
            text-align: left;
        }

        .input-group label {
            display: block;
            margin-bottom: 5px;
            font-size: 14px;
            color: #115521;
        }

        .input-group input {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
            font-size: 16px;
            box-sizing: border-box;
        }

        .btn-pay {
            display: inline-block;
            background-color: #28a745;
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s, transform 0.3s;
            text-align: center;
            margin-top: 10px;
        }

        .btn-pay:hover {
            background-color: #0c7023;
            transform: scale(1.05);
        }

        .success-message {
            font-size: 18px;
            color: #28a745;
            margin-top: 20px;
            display: none;
            text-align: left;
        }

        .success-message p {
            margin: 5px 0;
        }

        .summary {
            margin-top: 15px;
            background-color: #f6fff5;
            padding: 15px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="payment-container">
        <h1 class="payment-title">Complete Your Payment</h1>
        <div class="payment-details">
            You selected the <span id="package-name">[Package Name]</span>.<br>
            The total price is <span id="total-price">$0</span>.<br>
            You need to pay <span id="partial-price">$0</span> (20% upfront).
        </div>

        <div class="input-group">
            <label for="account-details">Enter your account details:</label>
            <input type="text" id="account-details" placeholder="Account Number">
        </div>

        <button class="btn-pay" onclick="processPayment()">Pay Now</button>

        <div class="success-message" id="success-message">
            <p><strong>Payment Successful!</strong></p>
            <div class="summary">
                <p><strong>Package:</strong> <span id="summary-package"></span></p>
                <p><strong>Total Price:</strong> <span id="summary-total"></span></p>
                <p><strong>Amount Paid:</strong> <span id="summary-paid"></span></p>
                <p>Thank you for booking with us!</p>
            </div>
        </div>
    </div>

    <script>
        
        const queryParams = new URLSearchParams(window.location.search);
        const packageName = queryParams.get('packageName');
        const totalPrice = queryParams.get('totalPrice'); 

      
        const partialPrice = (totalPrice * 0.2).toFixed(2);

        
        document.getElementById('package-name').textContent = packageName || 'Unknown Package';
        document.getElementById('total-price').textContent = `$${totalPrice || '0.00'}`;
        document.getElementById('partial-price').textContent = `$${partialPrice || '0.00'}`;

        function processPayment() {
            const accountDetails = document.getElementById('account-details').value;

            if (!accountDetails.trim()) {
                alert('Please enter your account details to proceed.');
                return;
            }

           
            const successMessage = document.getElementById('success-message');
            document.getElementById('summary-package').textContent = packageName;
            document.getElementById('summary-total').textContent = `$${totalPrice}`;
            document.getElementById('summary-paid').textContent = `$${partialPrice}`;
            successMessage.style.display = 'block';

          
            gsap.fromTo(successMessage, { opacity: 0, y: 20 }, { opacity: 1, y: 0, duration: 0.5 });
        }
    </script>
</body>
</html>
