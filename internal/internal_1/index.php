<?php 
   require_once __DIR__ . '/../inc/config.simstart.inc.php';
   require_once __DIR__ . '/../inc/config.inc.php';
   require_once __DIR__ . '/../inc/config.db.inc.php';
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
               <div class="col-md-2"></div>
               <div class="col-md-8">
			   <ul>
                  <li><a href="/internal/index.php" class="nav-link">Common Area</a></li>
                  <li><a href="/internal/service.php" class="nav-link">Service</a></li>
                  <li><a href="/internal/kitchen.php" class="nav-link">Kitchen</a></li>
                  <li><a href="/internal/delivery.php" class="nav-link">Delivery</a></li>
			   </ul>
               </div>
               <div class="col-md-2">
                  <?php require_once __DIR__ . '/../inc/kpi_small.inc.php';?>
               </div>
            </div>
            <div class="row">
               <?php require_once __DIR__ . '/bodypart2.inc.php';?>
            </div>
         </div>
      </section>
      <?php require_once __DIR__ . '/../inc/script.inc.php';?>
   </body>
</html>