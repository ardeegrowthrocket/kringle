<form action="https://www.coinpayments.net/index.php" method="post">
    <input type="hidden" name="cmd" value="_pay_simple">
    <input type="hidden" name="reset" value="1">
    <input type="hidden" name="merchant" value="<?php echo systemconfig('merchant_id'); ?>">
    <input type="hidden" name="item_name" value="Test">
    <input type="hidden" name="item_desc" value="Test Description">
    <input type="hidden" name="item_number" value="1">
    <input type="hidden" name="invoice" value="1">
    <input type="hidden" name="currency" value="USD">
    <input type="hidden" name="amountf" value="1.00000000">
    <input type="hidden" name="want_shipping" value="0">
    <input type="hidden" name="success_url" value="http://kringle.local/dashboard/index.php?pages=withdrawrequest">
    <input type="hidden" name="cancel_url" value="http://kringle.local/dashboard/index.php?pages=withdrawrequest">
    <input type="hidden" name="ipn_url" value="http://jointlineagecare.com/wasak.php">
    <input type="image" src="https://www.coinpayments.net/images/pub/buynow-wide-blue.png" alt="Buy Now with CoinPayments.net">
</form>