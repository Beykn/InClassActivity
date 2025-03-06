<?php

// HTML Form make a post request.
// Check the requests for post one.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
	// $amount: money amount will converted.
	// If post request send the value, took with float variable. 
    $amount = isset($_POST['amount_base']) ? floatval($_POST['amount_base']) : 0;
	// $base_current: Which currency will convert from.
    $base_currency = $_POST['currency_base'];
    $to_currency = $_POST['currency_to'];

    // Exchange Rates:
	// HashMap schema: "String" took the another HashMap
	// "String" => ["String"=>Float]
    $exchange_rates = [
        "USD" => ["CAD" => 1.43, "EUR" => 0.91, "USD" => 1.0],
        "CAD" => ["USD" => 0.70, "EUR" => 0.65, "CAD" => 1.0],
        "EUR" => ["USD" => 1.08, "CAD" => 1.54, "EUR" => 1.0]
    ];

    // Calculate the result.
	// Check the variable are defined or not.
    $converted_amount = isset($exchange_rates[$base_currency][$to_currency]) ? 
                        $amount * $exchange_rates[$base_currency][$to_currency] : "Error occured!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Currency Calculation</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="CENG 311 Inclass Activity 5">
</head>
<body>
    <form action="activity5.php" method="POST">
        <table>
            <tr>
                <td>From:</td>
                <td><input type="text" name="amount_base" value="<?= isset($amount) ? $amount : ''; ?>" required /></td>
                <td>Currency:</td>
                <td>
                    <select name="currency_base">
                        <option value="USD" <?= (isset($base_currency) && $base_currency == "USD") ? 'selected' : ''; ?>>US Dollar</option>
                        <option value="CAD" <?= (isset($base_currency) && $base_currency == "CAD") ? 'selected' : ''; ?>>Canadian Dollar</option>
                        <option value="EUR" <?= (isset($base_currency) && $base_currency == "EUR") ? 'selected' : ''; ?>>Euro</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>To:</td>
                <td><input type="text" name="amount_to" value="<?= isset($converted_amount) ? round($converted_amount, 2) : ''; ?>" readonly /></td>
                <td>Currency:</td>
                <td>
                    <select name="currency_to">
                        <option value="USD" <?= (isset($to_currency) && $to_currency == "USD") ? 'selected' : ''; ?>>US Dollar</option>
                        <option value="CAD" <?= (isset($to_currency) && $to_currency == "CAD") ? 'selected' : ''; ?>>Canadian Dollar</option>
                        <option value="EUR" <?= (isset($to_currency) && $to_currency == "EUR") ? 'selected' : ''; ?>>Euro</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="4" style="text-align: right;">
                    <input type="submit" name="convert" value="Convert" />
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
