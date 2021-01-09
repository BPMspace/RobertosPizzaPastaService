<section class="ftco-gallery">
   <div class="container-wrap">
      <div class="row justify-content-center mb-5 pb-3 mt-5 pt-5">
        <div class="col-md-7 heading-section text-center ftco-animate">
            <h2 class="mb-4">Our Menu Pricing</h2>
        </div>
      </div>
      <div class="row justify-content-center mb-5 pb-3 mt-5 pt-5">
         <div class="col-md-7 heading-section text-center ftco-animate">
            <p class="flip"><span class="deg1"></span><span class="deg2"></span><span class="deg3"></span></p>
            <div class="top-buffer_60">
               <h2 class="mb-4"><br/>Pizza</h2>
            </div>
         </div>
      </div>
      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="row">
            <?php
            // Create connection
            $dsn = 'mysql:dbname='.$dbname.';host='.$servername.';port=3306;charset=utf8';
            $conn = new PDO($dsn, $username, $dbpassword);

            // Check connection
            if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
            }

            try {
            $query = $conn->prepare("SELECT * FROM `MENU` WHERE `type` = \"Pizza\" ");
            $query->execute();
            }
            catch (PDOException $e) {
              $error=$e->getMessage();
            }
            while ($row = $query->fetch(PDO::FETCH_ASSOC))
            {
                echo '<div class="col-md-6">';
                echo '<div class="pricing-entry d-flex ftco-animate">';
                echo '<div class="img" style="background-image: url(images/pizza-1.jpg);"></div>';
                echo '<div class="desc pl-3">';
                echo '<div class="d-flex text align-items-center">';
                echo '<h3><span>'.$row['name'].'</span></h3>';
                echo '<span class="price">'.$row['price'].'</span>';
                echo '</div><div class="d-block"><p>'.$row['ingredients'].'</p></div>';
                echo '</div></div></div>';
            } ?>
            </div>
        </div>
        <div class="col-md-2"></div>
      </div>
      <div class="row justify-content-center mb-5 pb-3 mt-5 pt-5">
         <div class="col-md-7 heading-section text-center ftco-animate">
            <p class="flip"><span class="deg1"></span><span class="deg2"></span><span class="deg3"></span></p>
            <div class="top-buffer_60">
               <h2 class="mb-4"><br/>Pasta</h2>
            </div>
         </div>
      </div>
      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="row">
            <?php
            // Create connection
            $dsn = 'mysql:dbname='.$dbname.';host='.$servername.';port=3306;charset=utf8';
            $conn = new PDO($dsn, $username, $dbpassword);

            // Check connection
            if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
            }

            try {
            $query = $conn->prepare("SELECT * FROM `MENU` WHERE `type` = \"Pasta\" ");
            $query->execute();
            }
            catch (PDOException $e) {
              $error=$e->getMessage();
            }
            while ($row = $query->fetch(PDO::FETCH_ASSOC))
            {
                echo '<div class="col-md-6">';
                echo '<div class="pricing-entry d-flex ftco-animate">';
                echo '<div class="img" style="background-image: url(images/pizza-1.jpg);"></div>';
                echo '<div class="desc pl-3">';
                echo '<div class="d-flex text align-items-center">';
                echo '<h3><span>'.$row['name'].'</span></h3>';
                echo '<span class="price">'.$row['price'].'</span>';
                echo '</div><div class="d-block"><p>'.$row['ingredients'].'</p></div>';
                echo '</div></div></div>';
            } ?>
            </div>
        </div>
        <div class="col-md-2"></div>
      </div>
      <div class="row justify-content-center mb-5 pb-3 mt-5 pt-5">
         <div class="col-md-7 heading-section text-center ftco-animate">
            <p class="flip"><span class="deg1"></span><span class="deg2"></span><span class="deg3"></span></p>
            <div class="top-buffer_60">
               <h2 class="mb-4"><br/>Extra</h2>
            </div>
         </div>
      </div>
      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="row">
            <?php
            // Create connection
            $dsn = 'mysql:dbname='.$dbname.';host='.$servername.';port=3306;charset=utf8';
            $conn = new PDO($dsn, $username, $dbpassword);

            // Check connection
            if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
            }

            try {
            $query = $conn->prepare("SELECT * FROM `MENU` WHERE `type` = \"Extra\" ");
            $query->execute();
            }
            catch (PDOException $e) {
              $error=$e->getMessage();
            }
            while ($row = $query->fetch(PDO::FETCH_ASSOC))
            {
                echo '<div class="col-md-6">';
                echo '<div class="pricing-entry d-flex ftco-animate">';
                echo '<div class="img" style="background-image: url(images/pizza-1.jpg);"></div>';
                echo '<div class="desc pl-3">';
                echo '<div class="d-flex text align-items-center">';
                echo '<h3><span>'.$row['name'].'</span></h3>';
                echo '<span class="price">'.$row['price'].'</span>';
                echo '</div><div class="d-block"><p>'.$row['ingredients'].'</p></div>';
                echo '</div></div></div>';
            } ?>
            </div>
        </div>
        <div class="col-md-2"></div>
      </div>
      <div class="row justify-content-center mb-5 pb-3 mt-5 pt-5">
         <div class="col-md-7 heading-section text-center ftco-animate">
            <p class="flip"><span class="deg1"></span><span class="deg2"></span><span class="deg3"></span></p>
            <div class="top-buffer_60">
               <h2 class="mb-4"><br/>Basic</h2>
            </div>
         </div>
      </div>
      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="row">
            <?php
            // Create connection
            $dsn = 'mysql:dbname='.$dbname.';host='.$servername.';port=3306;charset=utf8';
            $conn = new PDO($dsn, $username, $dbpassword);

            // Check connection
            if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
            }

            try {
            $query = $conn->prepare("SELECT * FROM `MENU` WHERE `type` = \"Basic\" ");
            $query->execute();
            }
            catch (PDOException $e) {
              $error=$e->getMessage();
            }
            while ($row = $query->fetch(PDO::FETCH_ASSOC))
            {
                echo '<div class="col-md-6">';
                echo '<div class="pricing-entry d-flex ftco-animate">';
                echo '<div class="img" style="background-image: url(images/pizza-1.jpg);"></div>';
                echo '<div class="desc pl-3">';
                echo '<div class="d-flex text align-items-center">';
                echo '<h3><span>'.$row['name'].'</span></h3>';
                echo '<span class="price">'.$row['price'].'</span>';
                echo '</div><div class="d-block"><p>'.$row['ingredients'].'</p></div>';
                echo '</div></div></div>';
            } ?>
            </div>
        </div>
        <div class="col-md-2"></div>
      </div>
   </div>
</section>