<?php 
   $ROOM = "Common Area";
   require_once __DIR__ . '/../inc/config.db.inc.php';
   require_once __DIR__ . '/../inc/config.inc.php';
   require_once __DIR__ . '/../inc/config.simstart.inc.php';
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
                  <div class="col-md-3 ftco-animate fadeInUp ftco-animated">
                     <div class="blog-entry">
                        <a href="/internal/index.php" class="block-20" style="background-image: url('/images/commonarea.png');">
                        </a>
                        <h3 class="heading mt-2"><a href="/internal/index.php">Common Area</a></h3>
                        <p>Here all Roberto's employees meet to discuss the most important things.</p>
                     </div>
                  </div>
                  <div class="col-md-3 ftco-animate fadeInUp ftco-animated">
                     <div class="blog-entry">
                        <a href="/internal/service.php" class="block-20" style="background-image: url('/images/service.png');">
                        </a>
                        <h3 class="heading mt-2"><a href="/internal/service.php">Service</a></h3>
                        <p>As a member of the Service ...</p>
                     </div>
                  </div>
                  <div class="col-md-3 ftco-animate fadeInUp ftco-animated">
                     <div class="blog-entry">
                        <a href="/internal/kitchen.php" class="block-20" style="background-image: url('/images/cook.png');">
                        </a>
                        <h3 class="heading mt-2"><a href="/internal/kitchen.php">Kitchen</a></h3>
                        <p>As cook you have to ...</p>
                     </div>
                  </div>
                  <div class="col-md-3 ftco-animate fadeInUp ftco-animated">
                     <div class="blog-entry">
                        <a href="/internal/delivery.php" class="block-20" style="background-image: url('/images/delivery.png');">
                        </a>
                        <h3 class="heading mt-2"><a href="/internal/delivery.php">Delivery</a></h3>
                        <p>As Driver you have to ...</p>
                     </div>
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