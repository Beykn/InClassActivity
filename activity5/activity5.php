<!DOCTYPE html>
<html lang="en">
<head>
    <title>Currency Calculation</title>
    <meta name="description" content="CENG 311 Inclass Activity 5" />
</head>

<body>

    <form action = "activity5.php" method="GET">
        <table>
            <tr>
                <td>
                    From:
                </td>
                <td>
                    <input type="text" name="value"/>
                </td>
                <td>
                    Currency:
                </td>
                <td>
                    <select name="from_currency">
                        <option value="USD">USD</option>
                        <option value="CAD">CAD</option>
                        <option value="EUR">EUR</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    To:
                </td>
                <td>
                    <input type="text" name="converted_value" disabled/>
                </td>
                <td>
                    Currency:
                </td>
                <td>
                    <select name="to_currency">
                        <option value="USD">USD</option>
                        <option value="CAD">CAD</option>
                        <option value="EUR">EUR</option>
                    </select>
                </td>
            </tr>
                <tr>
                <td></td>
                <td></td>
                <td></td>
                <td>
                    <input type="submit" value="convert"/>
                </td>
            </tr>
        </table>
    </form>

    <?php
    if (isset($_GET['value']) && isset($_GET['from_currency']) && isset($_GET['to_currency'])) {
        $amount = floatval($_GET['value']);
        $from_currency = $_GET['from_currency'];
        $to_currency = $_GET['to_currency'];

        $exchange_rates = [
            "USD" => ["USD" => 1.0, "CAD" => 1.35, "EUR" => 0.92],
            "CAD" => ["USD" => 0.74, "CAD" => 1.0, "EUR" => 0.68],
            "EUR" => ["USD" => 1.09, "CAD" => 1.47, "EUR" => 1.0]
        ];

        if (isset($exchange_rates[$from_currency][$to_currency])) {
            $converted_amount = $amount * $exchange_rates[$from_currency][$to_currency];
            echo "<h2>Result: $amount $from_currency = $converted_amount $to_currency</h2>";
        } else {
            echo "<h2>Conversion rate not available.</h2>";
        }
    }
    ?>
    
</body>
</html>
