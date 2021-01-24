<?php
$ROOM = "Service";
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
            <?php require_once __DIR__ . '/service_IN.inc.php';?>
         </div>
         <div class="col-md-2">
            <?php require_once __DIR__ . '/../inc/kpi_small.inc.php';?>
         </div>
      </div>
      <div class="row">
         <div class="col-md-12 top-buffer_60">
            <?php require_once __DIR__ . '/service_OUT.inc.php';?>
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



