<?php
$ROOM = "Delivery";
require_once __DIR__ . '/../inc/config.db.inc.php';
require_once __DIR__ . '/../inc/config.inc.php';
require_once __DIR__ . '/../inc/config.simstart.inc.php';
IF ($SIM_FINISHED == "FINISHED") {
	header("Location: /internal/index.php");
	die();
	}
?> 

<!DOCTYPE html>
<html lang="en">
   <head>
      <?php 
         require_once __DIR__ . '/../inc/htmlhead.inc.php';
         
         ?>
</head>
<body>
<?php require_once __DIR__ . '/../inc/navigation.inc.php'; ?> 
<section class="ftco-appointment">
   <div class="heading-section text-center ftco-animate">
      <p class="flip"><span class="deg1"></span><span class="deg2"></span><span class="deg3"></span></p>
      <h2 class="mb-4"><br/><?php echo $ROOM;?></h2>
   </div>
   <div class="container">
      <div class="row">
         <div class="col-md-10">
            <?php require_once __DIR__ . '/delivery_IN.inc.php';?>
         </div>
         <div class="col-md-2">
            <?php require_once __DIR__ . '/../inc/kpi_small.inc.php';?>
         </div>
      </div>
      <div class="row">
         <div class="col-md-12 top-buffer_60">
            <?php require_once __DIR__ . '/delivery_OUT.inc.php';?>
         </div>
      </div>
	  <div class="row">
		<div class="col-md-4 top-buffer_60">
			 <div class="top-buffer_30">
				   <div id="order_table"></div>
			 </div>
		</div>
		<div class="col-md-8 top-buffer_60">

				<form id="order_update" class="appointment-form form-horizontal">
				<div class="form-group">
				<input type="hidden" id="simguid" name="simguid" value="<?php echo $SIM_GUID?>">
				<input type="hidden" id="sender" name="sender" value="delivery">
				<span>XXXX</span><input class="form-control" type="text" id="order_id" name="order_id" placeholder="order_id" required>
				<span>€</span><input class="form-control" type="text" id="price" name="price" placeholder="price" required >
				<span>gramm</span><input class="form-control" type="text" id="weight" name="weight" placeholder="weight" required >
				&nbsp;&nbsp;<input type="checkbox" class="form-check-input" id="wine">
				<label class="form-check-label" for="wine">&nbsp;&nbsp;Wine?&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
				&nbsp;&nbsp;<input type="checkbox" class="form-check-input" id="area">
				<label class="form-check-label" for="area">&nbsp;&nbsp;Area?&nbsp;&nbsp;&nbsp;&nbsp;</label>
				</div>
				<input type="submit" value="submit">
				</form>
		</div>
    </div>
    <div class="row">
         <div class="col-md-12 top-buffer_60">
            <?php require_once __DIR__ . '/bodypart2.inc.php';?>
         </div>
    </div>
   </div>
</section>
<?php require_once __DIR__ . '/../inc/script.inc.php';?>
</body>
</html>



