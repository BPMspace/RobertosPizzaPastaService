<section class="ftco-gallery">
   <div class="container-wrap">
      <div class="row justify-content-center mb-5 pb-3 mt-5 pt-5">
        <div class="col-md-7 heading-section text-center ftco-animate">
            <h2 class="mb-4">Our Menu Pricing</h2>
        </div>
      </div>

	  <?php 
		require_once __DIR__ . '/../inc/menu.sub.pizza.inc.php';
		require_once __DIR__ . '/../inc/menu.sub.pasta.inc.php';
		require_once __DIR__ . '/../inc/menu.sub.extra.inc.php';
		if ($INTERNAL == true) {
			require_once __DIR__ . '/../inc/menu.sub.basic.inc.php';
		}
	?> 
   </div>	
</section>