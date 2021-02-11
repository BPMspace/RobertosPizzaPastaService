<script src="/js/jquery.min.js"></script>
<script src="/js/jquery-migrate-3.0.1.min.js"></script>
<script src="/js/popper.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/jquery.easing.1.3.js"></script>
<script src="/js/jquery.waypoints.min.js"></script>
<script src="/js/jquery.stellar.min.js"></script>
<script src="/js/owl.carousel.min.js"></script>
<script src="/js/jquery.magnific-popup.min.js"></script>
<script src="/js/aos.js"></script>
<script src="/js/jquery.animateNumber.min.js"></script>
<script src="/js/bootstrap-datepicker.js"></script>
<script src="/js/jquery.timepicker.min.js"></script>
<script src="/js/scrollax.min.js"></script>
<script src="https://meet.jit.si/external_api.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://unpkg.com/hotkeys-js/dist/hotkeys.min.js"></script>
<script type="text/javascript">
   hotkeys('ctrl+c,ctrl+v,ctrl+f,ctrl+s,', function (event, handler){
     switch (handler.key) {
       case 'ctrl+c': alert('Pizza Sim Rule violation- Roberto is wachting you!');
         break;
       case 'ctrl+v': alert('Pizza Sim Rule violation- Roberto is wachting you!');
         break;
       case 'ctrl+f': alert('Pizza Sim Rule violation- Roberto is wachting you!');
         break;
       default: alert('Pizza Sim Rule violation- Roberto is wachting you!');
     }
   });
</script>
<script>
   if (document.addEventListener) {
     document.addEventListener('contextmenu', function(e) {
       alert("Pizza Sim Rule violation- Roberto is wachting you!");
       e.preventDefault();
     }, false);
   } else {
     document.attachEvent('oncontextmenu', function() {
       alert("Pizza Sim Rule violation- Roberto is wachting you!");
       window.event.returnValue = false;
     });
     
   }
</script>
<script>
   var options = {
       roomName: "Pizza SIM Team <?php echo $TEAM_NUMBER ?> - <?php echo $ROOM ?> - Round <?php echo $SIMULATION_ROUND ?><?php echo $SIM_GUID ?>",
       width: 700,
       height: 525,
       parentNode: document.querySelector('#meeting'),
       configOverwrite: {
			prejoinPageEnabled: false, 
			startScreenSharing: false,
			localRecording: false,
			startWithVideoMuted: false,
			remoteVideoMenu: 
				{
					disableKick: true,
				}
			},
		userInfo: {
		displayName: '<?php echo $USER ?>'
	},
	interfaceConfigOverwrite: {
		SHOW_CHROME_EXTENSION_BANNER: false,
		TOOLBAR_BUTTONS: ['allow','microphone', 'camera', 'fullscreen', 'chat']}
	}
   var api = new JitsiMeetExternalAPI("meet.jit.si", options);
  
</script>
<script>
   $(document).ready(function(){
      $('#sim_time_btn').load("/simbutton.php");
      setInterval(function() {
               $('#sim_time_btn').load("/simbutton.php");
				}, 1000);
      
      $('#task_table').load("/task_read.php");
      setInterval(function() {
               $('#task_table').load("/task_read.php",{room: "<?php echo $ROOM ?>"});
				}, 1000);
       
      $('#order_table').load("/order_read.php");
      setInterval(function() {
               $('#order_table').load("/order_read.php");
				}, 1000);
       
      $('#customer').DataTable({
        "paging":   false,
        "searching": true,
        "info":     false,
        "ordering": true
        } );

      $('#street').DataTable({
        "paging":   false,
        "searching": true,
        "info":     false,
        "ordering": true
        } );
    
     $('#task').DataTable({
        "paging":   false,
        "searching": true,
        "info":     false,
        "ordering": true,
		"columnDefs": [
			{ className: "dt-body-left", "targets": [ 0 ] },
			{ className: "dt-body-left", "targets": [ 1 ] },
			{ className: "dt-body-left", "targets": [ 2 ] },
			{ className: "dt-body-left", "targets": [ 3 ] },
			{ className: "dt-body-left", "targets": [ 4 ] }
		]
        } );
		
      $('#order').DataTable({
        "paging":   false,
        "searching": true,
        "info":     false,
        "ordering": true
        } );
      
    
      if (navigator.userAgent.indexOf("Firefox") < 0) {
                   alert("ONLY TESTED WITH FIREFOX - Please don't use anything else!");
               }
   });
</script>
<script type="text/javascript">
   $(function() {
     $('.order').css('background-image', 'url(/order.php?time='+Math.random()+')');
	 
	 //This setTimeout function execute or call automatically when 5 second completed.
     setTimeout(function() {
		   $("#divShow").fadeOut(100);
		   }, <?php echo $DIFF_BETWEEN_ORDERS ?>);

     $("#btnShow").attr("disabled", "disabled");
       setTimeout(function() {
           $("#btnShow").removeAttr("disabled");      
       }, <?php echo $DIFF_BETWEEN_ORDERS ?>);
   
     $('#btnShow').click(function() {
		   $('.order').css('background-image', '');
		   $('.order').css('background-image', 'url(/order.php?time='+Math.random()+')'); 
		   $('#divShow').show();
		   setTimeout(function() {
		   $("#divShow").fadeOut(100);
		   }, <?php echo $DIFF_BETWEEN_ORDERS ?>);
		   $("#btnShow").attr("disabled", "disabled");
			   setTimeout(function() {
				   $("#btnShow").removeAttr("disabled");      
			   }, <?php echo $DIFF_BETWEEN_ORDERS ?>);
		});
   });
</script>
<script>
   $(function () {
   
   $('#task_create').on('submit', function (e) {
   
   e.preventDefault();
   
   $.ajax({
   type: 'post',
   url: '/task_create.php',
   data: $('#task_create').serialize(),
   success: function () {
   alert('Task was created!');
   $("#subject").val("");
   $("#subject1").val("");
   $("#subject2").val("");
   $("#message").val("");
   $("#message1").val("");
   $("#message2").val("");
   $("#message3").val("");
   $("#message4").val("");
   }
   });
   
   });
   
   });
</script>
<script>
   $(function () {
   
   $('#task_update').on('submit', function (e) {
   
   e.preventDefault();
   
   $.ajax({
   type: 'post',
   url: '/task_update.php',
   data: $('#task_update').serialize(),
   success: function () {
   alert('Task was set to done!');
   }
   });
   
   });
   
   });
</script>
<script>
   $(function () {
   
   $('#order_update').on('submit', function (e) {
   
   e.preventDefault();
   
   $.ajax({
   type: 'post',
   url: '/order_update.php',
   data: $('#order_update').serialize(),
   success: function () {
   alert('Order was delivered!');
   $("#order_id").val("");
   $("#wine").val("");
   $("#area").val("");
   $("#price").val("");
   $("#weight").val("");
   }
   });
   
   });
   
   });
</script>
<script src="/js/main.js"></script>

