<?php
session_start();
require_once("./connect.php");
require_once("./function.php");
$accounts_id = $_SESSION['accounts_id'];
$q = mysql_query_md("SELECT * FROM tbl_accounts WHERE accounts_id='$accounts_id'");
$row = mysql_fetch_md_assoc($q);
function trans()
{
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randstring = '';
    for ($i = 0; $i < 12; $i++) {
        $randstring .= $characters[rand(0, strlen($characters))];
    }
    return $randstring;
}

	if($_POST['submit']!='')
	{
		if($_POST['password']!=$row['password'])
		{
			$error .= "<i class=\"fa fa-warning\"></i>Password do not match.<br>";
		}
		if($_POST['withdraw']==0 || $_POST['withdraw']<0)
		{
						$error .= "<i class=\"fa fa-warning\"></i>Please input valid and not empty amount to withdraw.<br>";
		}
		if($_POST['withdraw']>$row['balance']) 
		{
			$error .= "<i class=\"fa fa-warning\"></i>Amount to withdraw(".$_POST['withdraw'].") is insufficient on current balance(".$row['balance']."). Please input valid amount.<br>";
		}
		
		if($error=='')
		{
		$sum  = $row['balance'] - $_POST['withdraw'];
		mysql_query_md("UPDATE tbl_accounts SET balance='".$sum."' WHERE accounts_id='$accounts_id'");
		$success = 1;
		$trans = trans();
		mysql_query_md("INSERT INTO tbl_withdraw_history SET transnum='$trans',claimtype='".$_POST['claimtype']."',address='".$_POST['address']."',accounts_id='$accounts_id',new_balance='".$sum."',amount='".$_POST['withdraw']."',current_balance='".$row['balance']."'");
		$q = mysql_query_md("SELECT * FROM tbl_accounts WHERE accounts_id='$accounts_id'");


		$row = mysql_fetch_md_assoc($q);		
		}
	}
	
$field[] = array("type"=>"text","value"=>"bank_name","label"=>"Bank Name");
$field[] = array("type"=>"text","value"=>"bank_accountname","label"=>"Account Name");
$field[] = array("type"=>"text","value"=>"bank_accountnumber","label"=>"Account Number");
//
$field[] = array("type"=>"text","value"=>"name","label"=>"Fullname");
$field[] = array("type"=>"text","value"=>"address","label"=>"Address");
$field[] = array("type"=>"text","value"=>"phone","label"=>"Phone Number");
//
$field[] = array("type"=>"number","value"=>"withdraw","label"=>"Amount to withraw");
$field[] = array("type"=>"password","value"=>"password","label"=>"Please enter password");
//
?>
<h2>Withdrawal Request - Balance(<?php echo $row['balance'];?>)</h2>   
<?php
if($error!='')
{
?>
<div class="warning"><ul class="fa-ul"><li><?php echo $error;?></li></ul></div>
<?php
}
?>

<style>
.bank,.remit,.remitmain,.smartpadala,.antibug
{
	display:none;
}
</style>
<?php
if($success!='')
{
?>
<div class="noti"><ul class="fa-ul"><li><i class="fa fa-check fa-li"></i>Done requesting for withdrawal please see status <a href='?pages=withdrawhistory'>here</a> </li></ul></div>
<?php
}
?>

<form method="POST" action="">
   <table width="100%">
      <tbody>

         <tr>
            <td style="width:180px;" class="key" valign="top"><label for="accounts_name">Withdrawal Type</label></td>
            <td>
				<select name='claimtype' onchange="widraw(this.value)" required>
						<option>Select Mode of Withdrawal</option>
						<option value='btc'>Bitcoin</option>
						<option value='kc'>Kringle Coins</option>
						<option value='billc'>The Billion Coins</option>
				</select>											
            </td>
         </tr>


         <tr class='antibugx'>
            <td style="width:180px;" class="key" valign="top"><label for="accounts_name">BTC Address:</label></td>
            <td>
               <input style="width: 302px;" required="" type="text" name="address" id="address" size="40" maxlength="255" value="">
               <span class="validation-status"></span>												
            </td>
         </tr>


         <tr class='antibugx'>
            <td style="width:180px;" class="key" valign="top"><label for="accounts_name">Amount to withraw:</label></td>
            <td>
               <input style="width: 302px;" required="" type="number" name="withdraw" id="withdraw" size="40" maxlength="255" value="">
               <span class="validation-status"></span>												
            </td>
         </tr>
         <tr class='antibugx'>
            <td style="width:180px;" class="key" valign="top"><label for="accounts_name">Please enter password:</label></td>
            <td>
               <input style="width: 302px;" required="" type="password" name="password" id="password" size="40" maxlength="255" value="">
               <span class="validation-status"></span>												
            </td>
         </tr>
      </tbody>
   </table>
   <br>
   <center><input class="btn btn-primary btn-lg" type="submit" name="submit" value="Process"></center>
</form>
<script>
function widraw(myval)
{


		$( ".antibug" ).each(function() {
			$(this).show();
		});		


}
</script>
