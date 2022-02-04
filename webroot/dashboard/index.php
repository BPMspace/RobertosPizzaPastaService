<?php 
#require_once __DIR__ . '/mainpage_inc//config.db.inc.php';
#require_once __DIR__ . '/mainpage_inc//config.inc.php';
#require_once __DIR__ . '/mainpage_inc//config.simstart.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php 
	require_once __DIR__ . '/../inc/htmlhead.inc.php';
	?>
</head>
<body>
	<div class="container">
		<div class="row mb-5 mt-5">
			<div class="col-sm-1"></div>	
			<div class="col-sm-4">
				<a  href="/index.php"><img src="/images/roberto-auf-transparent.png" class="img-responsive" alt="Pizza Simulation"></a>
			</div>
			<div class="col-sm-6">	
				<h4 class="subline mt-5">Robertos Pizza &amp; Pasta Service </br> <span class="font_orange">Report Prozess-Simulation</span></h4>
			</div>
			<div class="col-sm-1"></div>
		</div>
	</div>
	<div class="pr-5 pl-5">
	<table id="order" class="table table-striped table-responsive-md">
		<thead class="thead-dark">
			<tr>
				<th>TEAM</th>
				<th>round</th>
				<th>timestamp_in</th>
				<th>timestamp_out</th>
				<th>DeliveryTime</th>
				<th>AddWine</th>
				<th>DIFFWEIGHT</th>
				<th>DIFFPRICE</th>
				<th>DIFFAREA </th>
			</tr>
		</thead>
	</table>
</div>
	<div class="row">
    	<div class="col-sm-1"></div>
		<div class="col-sm-8">
		<?php 
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://dashboard.pizza.pub.lab.nm.ifi.lmu.de/API/v1/records/ORDER_REPORT_ALL_TEAMS',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'GET',
		));

		$response = curl_exec($curl);

		curl_close($curl);
		echo "</br></br></br></br></br></br></br></br></br></br></br>";
		echo $response;
		?>
    </div>
    <div class="col-sm-1"></div>
</div>
</body>
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
<script src="https://cdn.datatables.net/plug-ins/1.11.4/api/average().js"></script>
<script>
$(document).ready(function() {
	$('#order thead tr')
        .clone(true)
        .addClass('filters')
        .appendTo('#order thead');

	var table = $('#order').DataTable( {
		orderCellsTop: true,
        fixedHeader: true,
        initComplete: function () {
            var api = this.api();
 
            // For each column
            api
                .columns()
                .eq(0)
                .each(function (colIdx) {
                    // Set the header cell to contain the input element
                    var cell = $('.filters th').eq(
                        $(api.column(colIdx).header()).index()
                    );
                    var title = $(cell).text();
                    $(cell).html('<input type="text" placeholder="' + title + '" />');
 
                    // On every keypress in this input
                    $(
                        'input',
                        $('.filters th').eq($(api.column(colIdx).header()).index())
                    )
                        .off('keyup change')
                        .on('keyup change', function (e) {
                            e.stopPropagation();
 
                            // Get the search value
                            $(this).attr('title', $(this).val());
                            var regexr = '({search})'; //$(this).parents('th').find('select').val();
 
                            var cursorPosition = this.selectionStart;
                            // Search the column for that value
                            api
                                .column(colIdx)
                                .search(
                                    this.value != ''
                                        ? regexr.replace('{search}', '(((' + this.value + ')))')
                                        : '',
                                    this.value != '',
                                    this.value == ''
                                )
                                .draw();
 
                            $(this)
                                .focus()[0]
                                .setSelectionRange(cursorPosition, cursorPosition);
                        });
                });
        },
        ajax: {
            url: 'https://dashboard.pizza.pub.lab.nm.ifi.lmu.de/API/v1/records/ORDER_REPORT_ALL_TEAMS',
            dataSrc: 'records'
        },
        columns: [
            { data: "TEAM" },
            { data: "round" },
            { data: "timestamp_in" },
            { data: "timestamp_out" },
            { data: "DeliveryTime" },
            { data: "AddWine" },
            { data: "DIFFWEIGHT" },
            { data: "DIFFPRICE" },
            { data: "DIFFAREA" }
        ]
    });
	//console.log( table.column(4).data().toArray() );
	//var avg =  table.column(4).data().average();
	//console.log(avg);
});
</script>
</html>

