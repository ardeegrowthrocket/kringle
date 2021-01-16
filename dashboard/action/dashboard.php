<?php
session_start();
require_once("./connect.php");
require_once("./function.php");

  $is_active = 1;

  if(empty($_SESSION['deadline'])){
      $is_active = 0;
  }else

  {

$today = date("Y-m-d h:i:s");
$expire = $_SESSION['deadline']; //from database

$today_time = strtotime($today);
$expire_time = strtotime($expire);

if ($expire_time < $today_time) { 

     $is_active = 0;
 }

}

$countdown = strtotime($_SESSION['deadline']);


$cdtest =  date("M d, Y h:i:s",$countdown);


$levelimit = $_SESSION['level'] + 9;
$path = $_SESSION['path'];
$aid = $_SESSION['accounts_id'];
$query_dl = "SELECT COUNT(accounts_id) as c FROM `tbl_accounts` WHERE path LIKE '{$path}%' AND level <= $levelimit ORDER BY `accounts_id` ASC";
$rowdl = mysql_fetch_md_array(mysql_query_md($query_dl));



 $query_ob = "SELECT SUM(amount) as c FROM `tbl_bonus_history` WHERE sid='{$_SESSION['accounts_id']}'";
$rowob = mysql_fetch_md_array(mysql_query_md($query_ob));


$query_dr = "SELECT COUNT(accounts_id) as c FROM `tbl_accounts` WHERE refer='{$_SESSION['accounts_id']}'";
$rowdr = mysql_fetch_md_array(mysql_query_md($query_dr));



if(empty($rowob['c'])){
  $rowob['c'] = 0;
}

$rowob['c'] = number_format($rowob['c'],2);
?>





<div class="row">
          <!-- ./col -->
          <div class="col-lg-4 col-12">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $rowdl['c']; ?></h3>

                <p>Downlines</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-12">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $rowdr['c']; ?></h3>

                <p>Direct Referrals</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-12">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>$<?php echo $rowob['c']; ?></h3>

                <p>Overall Bonuses</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
        </div>






<?php if(empty($is_active)) { ?>
<div class="callout callout-warning">
      <h5>Please resubscribe your account below.</h5>

      <p>You will lose the chance of getting large bonuses every month.</p>

      <a href='index.php?pages=exchangerequest'>Subscribe here</a>
</div>
<?php } else {
?>
<div class="callout callout-info">
      <h5>Your Subscription Expires In:.</h5>



<div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-clock"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"></span>
                <span class="info-box-number">
                  <p id="demo">Loading</p>
                </span>
              </div>
              <!-- /.info-box-content -->
</div>
<script>
// Set the date we're counting down to
var countDownDate = new Date("<?php echo $cdtest; ?>").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";

  // If the count down is finished, write some text
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "Inactive";
  }
}, 1000);
</script>

</div>
<?php } ?>
<div class="callout callout-success">
      <h5>Your Wallet:</h5>
<div class="info-box">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-wallet"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"></span>
                <span class="info-box-number">
                 		<?php echo number_format($_SESSION['balance'],2); ?>
                </span>
              </div>
              <!-- /.info-box-content -->
</div>
</div>
