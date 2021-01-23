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
           <div class="overlay"></div>
           <div class="container-fluid">
              <div class="row">
                 <div class="col-md-10 fixed_order">
                    <?php require_once __DIR__ . '/servicedesk_order.inc.php';?>
                 </div>
                 <div class="col-md-2">
                    <?php require_once __DIR__ . '/../inc/kpi_small.inc.php';?>
                 </div>
              </div>
			  <div class="row">
              <div class="col-md-12">
                 <?php require_once __DIR__ . '/servicedesk_send.inc.php';?>
              </div>
              </div>
			  <div class="row">
                 <div class="col-md-12">
                 <div id="meeting" class="fixed_meeting top-buffer_30"></div>
                 </div>
              </div>
			  <div class="row">
			  <div class="col-md-12">
                 <div><img class="img-responsive" src="/images/RPPS_MAP.png" alt="Pizza Simulation"></div>
              </div>
              </div>
			  <div class="row">
			  <div class="col-md-12">
				<?php require_once __DIR__ . '/../inc/menu.inc.php';?>
              </div>
			  </div>
			  
           </div>
        </section>

<?php require_once __DIR__ . '/../inc/script.inc.php';?>
</body>
</html>

