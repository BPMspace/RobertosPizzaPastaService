<h3 class="mb-3">Send Order to other internal Departement</h3>
<form id="task_create" class="appointment-form form-horizontal">
  <div class="form-group">
		<input type="hidden" id="simguid" name="simguid" value="<?php echo $SIM_GUID?>">
		<input type="hidden" id="sender" name="sender" value="service">
        <input type="radio" name="receiver" value="kitchen" checked="checked">&nbsp;&nbsp;&nbsp;Kitchen&nbsp;&nbsp;&nbsp;
        <input type="radio" name="receiver" value="delivery">&nbsp;&nbsp;&nbsp;delivery&nbsp;&nbsp;&nbsp;
        <input class="form-control" type="text" id="subject" name="subject" placeholder="Subject" required >
		<div class="md-form">
		<input class="form-control" type="text" id="message" name="message" placeholder="Message" rows="5" required >
        <label for="message">&nbsp;&nbsp;OrderNumber - Customer - Order - Street -  Temperature - Humidity</label>
		</div>
  </div>
  <input type="submit" value="submit">
</form> 