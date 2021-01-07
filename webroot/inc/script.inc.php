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
<script type="text/javascript">
    $(function() {

      //This setTimeout function execute or call automatically when 5 second completed.
      setTimeout(function() {
        $("#divShow").fadeOut(1500);
      }, 7000);

      $('#btnShow').click(function() {
        //This is used for show the div.
		location.reload(true);
        //$('#divShow').show();

        //This setTimeout function execute when click on show div buton and hide automatically.
        setTimeout(function() {
          $("#divShow").fadeOut(1500);
        }, 2000);

      });
    });
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="/js/google-map.js"></script>
<script src="/js/main.js"></script>