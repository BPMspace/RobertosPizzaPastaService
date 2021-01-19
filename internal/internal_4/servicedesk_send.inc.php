<h3 class="mb-3">Send Oder to Departement</h3>

<form action="/task/task_create.php"  method="POST" class="appointment-form form-horizontal">

  <span>Send Order to other department:&nbsp;&nbsp;&nbsp;</span>
  <div class="form-group">
		<input type="hidden" id="sender_php_self" name="sender_php_self" value="<?php echo $_SERVER['PHP_SELF']?>">
		<input type="hidden" id="sender" name="sender" value="service">
        <input type="radio" name="receiver" value="kitchen" checked="checked">&nbsp;&nbsp;&nbsp;Kitchen&nbsp;&nbsp;&nbsp;
        <input type="radio" name="receiver" value="driver">&nbsp;&nbsp;&nbsp;Driver
        <input class="form-control" type="text" id="subject" name="subject" placeholder="Subject" required >
		<div class="md-form">
		<input class="form-control" type="text" id="message" name="message" placeholder="Message" rows="5" required >
        <label for="message">&nbsp;&nbsp;OrderNumber - Customer - Order - Street -  Temperature - Humidity</label>
		</div>
  </div>
  <input type="submit" value="Submit">
</form> 