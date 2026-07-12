<!DOCTYPE html>
<html>
<head>
    <title>Currency Converter</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        <h1>Currency Converter</h1>
        <p>Convert any currency to another using live exchange rates</p>

        <div class="converter-box">
            <label>Amount</label>
            <input type="number" id="amount" value="1" min="0" step="any">

            <div class="row">
                <div>
                    <label>From</label>
                    <select id="from_currency">
                        <option value="USD">USD - US Dollar</option>
                        <option value="EUR">EUR - Euro</option>
                        <option value="GBP">GBP - British Pound</option>
                        <option value="INR">INR - Indian Rupee</option>
                        <option value="JPY">JPY - Japanese Yen</option>
                        <option value="AUD">AUD - Australian Dollar</option>
                        <option value="CAD">CAD - Canadian Dollar</option>
                        <option value="CNY">CNY - Chinese Yuan</option>
                        <option value="AED">AED - UAE Dirham</option>
                        <option value="PKR">PKR - Pakistani Rupee</option>
                    </select>
                </div>

                <button id="swap_btn" type="button" title="swap">⇄</button>

                <div>
                    <label>To</label>
                    <select id="to_currency">
                        <option value="INR">INR - Indian Rupee</option>
                        <option value="USD">USD - US Dollar</option>
                        <option value="EUR">EUR - Euro</option>
                        <option value="GBP">GBP - British Pound</option>
                        <option value="JPY">JPY - Japanese Yen</option>
                        <option value="AUD">AUD - Australian Dollar</option>
                        <option value="CAD">CAD - Canadian Dollar</option>
                        <option value="CNY">CNY - Chinese Yuan</option>
                        <option value="AED">AED - UAE Dirham</option>
                        <option value="PKR">PKR - Pakistani Rupee</option>
                    </select>
                </div>
            </div>

            <button id="convert_btn" type="button">Convert</button>

            <div id="result"></div>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>