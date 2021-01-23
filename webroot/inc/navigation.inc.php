<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
   <div class="container">
      <a class="navbar-brand" href="/index.php"><img src = "/images/roberto-auf-transparent.png" class = "img-responsive" alt = "Pizza Simulation" /></a>
	  <div>
         <h4 class="subline">Robertos Pizza &amp; Pasta Service - <span class= "font_orange">Prozess-Simulation</span></h4>
         <span class="one_line">
			<div id="sim_time_btn" class="one_line"></div><?php echo $TEAM_NUMBER_BUTTON?>
         </span>
      </div>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="oi oi-menu"></span> Menu
      </button>
      <div class="collapse navbar-collapse" id="ftco-nav">
         <ul class="navbar-nav ml-auto">
            <li class="nav-item active"><a href="/index.php" class="nav-link">Home</a></li>
			<?php if ($INTERNAL) echo '<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" id="navbarRoomsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Rooms</a>
			<div class="dropdown-menu" aria-labelledby="navbarRoomsDropdown">
			<a class="dropdown-item" href="/internal/index.php" class="nav-link">Common Area</a>
			<a class="dropdown-item" href="/internal/service.php" class="nav-link">Service</a>
			<a class="dropdown-item" href="/internal/kitchen.php" class="nav-link">Kitchen</a>
			<a class="dropdown-item" href="/internal/delivery.php" class="nav-link">Delivery</a>
			</div></li>'
			?>
			<li class="nav-item"><a href="/internal/index.php" class="nav-link">Employee</a></li>
         </ul>
      </div>
   </div>
   
   
</nav>