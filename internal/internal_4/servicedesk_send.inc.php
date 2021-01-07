<h3 class="mb-3">Send Task to Departement</h3>
<form action="/inc/mail.php"  method="POST" class="appointment-form form-horizontal">

  <div class="form-group">
  <span>Send task to department:&nbsp;&nbsp;&nbsp;</span>
        <input type="checkbox" id="kitchen" name="kitchen" value="TRUE" checked="checked">
        <label for="kitchen">&nbsp;Kitchen&nbsp;&nbsp;    </label>
        <input type="checkbox" id="driver" name="driver" value="Boat">
        <label for="driver">&nbsp;Driver&nbsp;&nbsp;</label>
        <input class="form-control" type="text" id="subject" name="subject" placeholder="Subject" required >
  </div>
  <div class="form-group">
    <div class="md-form">
        <i class="fa fa-2x fa-pencil font_orange"></i>
        <textarea id="messages" class="form-control" rows="5" placeholder="OrderNumber - Customer - Order - Street -  Temperature - Humidity" required></textarea>
        <label for="messages">&nbsp;&nbsp;OrderNumber - Customer - Order - Street -  Temperature - Humidity</label>
    </div>
  </div>
  <input type="submit" value="Submit">
</form> 