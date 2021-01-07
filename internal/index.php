<?php 
   require_once __DIR__ . '/../inc/config_simstart.php';
   require_once __DIR__ . '/../inc/config.inc.php';
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
           <div class="container">
              <div class="row">
                 <div class="col-md-10 fixed_order">
                    <?php require_once __DIR__ . '/servicedesk_order.inc.php';?>
                 </div>
                 <div class="col-md-2">
                    <?php require_once __DIR__ . '/../inc/kpi_small.inc.php';?>
                 </div>
              </div>
              <div class="col-md-12 fixed_order">
                 <?php require_once __DIR__ . '/servicedesk_send.inc.php';?>
              </div>
			  <div class="col-md-10">
                 <div><img class="img-responsive" src="/images/RPPS_MAP.png" alt="Pizza Simulation"></div>
              </div>
			  <div class="col-md-12">
			  
			  </div>
           </div>
        </section>

<?php require_once __DIR__ . '/../inc/script.inc.php';?>
</body>
</html>

