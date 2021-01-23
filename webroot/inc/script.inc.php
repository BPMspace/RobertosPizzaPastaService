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
<script>
		if (document.addEventListener) {
  document.addEventListener('contextmenu', function(e) {
    alert("Pizza Sim Rule violation"); //here you draw your own menu
    e.preventDefault();
  }, false);
} else {
  document.attachEvent('oncontextmenu', function() {
    alert("Pizza Sim Rule violation");
    window.event.returnValue = false;
  });
}
</script>

<script src="https://meet.jit.si/external_api.js"></script>

<script>
            var options = {
                roomName: "Pizza SIM Team <?php echo $TEAM_NUMBER ?> - <?php echo $ROOM ?> - Round <?php echo $SIMULATION_ROUND ?>",
                width: 700,
                height: 525,
                parentNode: document.querySelector('#meeting'),
                configOverwrite: {prejoinPageEnabled: false, startScreenSharing: false, localRecording: false, startWithVideoMuted: false},
				userInfo: {
						displayName: '<?php echo $USER ?>'
				},
                interfaceConfigOverwrite: {
					SHOW_CHROME_EXTENSION_BANNER: false,
					TOOLBAR_BUTTONS: ['microphone', 'camera']}
            }
            var api = new JitsiMeetExternalAPI("meet.jit.si", options);
</script>

<script type="text/javascript">
    $(function() {

      //This setTimeout function execute or call automatically when 5 second completed.
      setTimeout(function() {
			$("#divShow").fadeOut(1000);
			}, 20000);
			
	  $("#btnShow").attr("disabled", "disabled");
        setTimeout(function() {
            $("#btnShow").removeAttr("disabled");      
        }, 20000);
	  
      $('#btnShow').click(function() {
		$('.order').css('background-image', '');
		$('.order').css('background-image', 'url(/order.php?time='+Math.random()+')'); 
		$('#divShow').show();
		setTimeout(function() {
		  $("#divShow").fadeOut(1000);
		}, 20000);
		$("#btnShow").attr("disabled", "disabled");
        setTimeout(function() {
            $("#btnShow").removeAttr("disabled");      
        }, 20000);
      });
    });
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="/js/google-map.js"></script>
<script src="/js/main.js"></script>