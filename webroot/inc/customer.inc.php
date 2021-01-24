<div class="row justify-content-center mb-5 pb-3 mt-5 pt-5">
         <div class="col-md-7 heading-section text-center ftco-animate">
            <p class="flip"><span class="deg1"></span><span class="deg2"></span><span class="deg3"></span></p>
            <div class="top-buffer_60">
               <h2 class="mb-4"><br/>Customer</h2>
            </div>
         </div>
      </div>
<div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
		<table id="customer" class="table table-striped table-responsive-md">
         <thead class="thead-dark">
            <tr>
               <th scope="col" title="Name">Name</th>
               <th scope="col" title="Adress">Adress</th>
               <th scope="col" title="Order">Order</th>
            </tr>
         </thead>
         <tbody>
		<?php
		try {
            $query_customer = $conn->prepare("SELECT * FROM `ORDER_TEMPLATE` WHERE `hidden` =1 ");
            $query_customer->execute();
            }
            catch (PDOException $e) {
              $error=$e->getMessage();
            }
            while ($customer = $query_customer->fetch(PDO::FETCH_ASSOC))
            {
			echo "<tr>
						<td>".$customer['customer']."</td>
						<td>".$customer['adress']."</td>
						<td>".$customer['order']."</td>
					</tr>";
            }
		?>

		</div>
        <div class="col-md-2"></div>
</div>

