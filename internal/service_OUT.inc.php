<h3 class="mb-3">Send Order to other internal Departement</h3>
<form id="task_create" class="appointment-form form-horizontal">
  <div class="form-group">
		<input type="hidden" id="simguid" name="simguid" value="<?php echo $SIM_GUID?>">
		<input type="hidden" id="sender" name="sender" value="service">
        <input type="radio" name="receiver" value="kitchen" checked="checked">&nbsp;&nbsp;&nbsp;Kitchen&nbsp;&nbsp;&nbsp;
        <input type="radio" name="receiver" value="delivery">&nbsp;&nbsp;&nbsp;Delivery&nbsp;&nbsp;&nbsp;
        <input class="form-control" type="text" id="subject" name="subject" placeholder="Subject" required >
		<div class="md-form">
		<input class="form-control" type="text" id="subject1" name="subject1" placeholder="">
		<!-- <label for="subject1"></label> -->
		</div>
		<div class="md-form">
		<input class="form-control" type="text" id="subject2" name="subject2" placeholder="">
		<!-- <label for="subject2"></label> -->
		</div>
		<div class="md-form">
        <label for="message">&nbsp;&nbsp;OrderNumber - Customer - Order - Street -  Temperature - Humidity</label>
		<input class="form-control" type="text" id="message" name="message" placeholder="Message" rows="5" required >
		</div>
		<div class="md-form">
		<input class="form-control" type="text" id="message1" name="message1" placeholder="" >
        <!-- <label for="message1"></label> -->
		</div>
		<div class="md-form">
		<input class="form-control" type="text" id="message2" name="message2" placeholder="" >
        <!-- <label for="message2"></label>-->
		</div>
		<div class="md-form">
		<input class="form-control" type="text" id="message3" name="message3" placeholder="" >
        <!-- <label for="message3"></label>-->
		</div>
		<div class="md-form">
		<input class="form-control" type="text" id="message4" name="message4" placeholder="" >
        <!-- <label for="message4"></label> -->
		</div>
  </div>
  <input type="submit" value="submit">
</form> 