
  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
     
    </div>
    <div class="credits">
    
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/chart.js/chart.min.js"></script>
  <script src="../assets/vendor/echarts/echarts.min.js"></script>
  <script src="../assets/vendor/quill/quill.min.js"></script>
  <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>
  <script src="../assets/js/moment.js"></script>
  <script src="../assets/js/main.js"></script>
  <script src="../assets/js/fullcalendar.js"></script>
      <!-- Datatable Dependency start -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-colvis-1.6.1/b-html5-1.6.1/b-print-1.6.1/r-2.2.3/datatables.min.css" />
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-colvis-1.6.1/b-html5-1.6.1/b-print-1.6.1/r-2.2.3/datatables.min.js"></script>
  
  <?php 
		$calendar = array();
		$events_calendar = $mysqli->query("SELECT * from cm_events");
		while($res = $events_calendar->fetch_object()){ 
			
			 $start = $res->event_date . $res->event_time;
			 echo $startDate  = date("Y-m-d\Th:i:s", strtotime($start));
			 echo "<br>";
			 $calendar[] = array( "title"          => $res->event_name,
								  "event_venue"    => $res->event_venue,
								  "event_date"     => $res->event_date,
								  "event_time"     => $res->event_time,
								  "event_type"     => $res->event_type,
								  "event_package"  => $res->event_package,
								  "notes"          => $res->notes,
								  "guest"          => $res->guest,
								  "client_name"    => $res->client_name,
								  "contact_number" => $res->contact_number,
								  "payment_type"   => $res->payment_type,
								  "payment_status" => $res->payment_status,
								  "event_id"       => $res->event_id,
								  "start"          => $startDate,
								);
		}
		
	?>
</body>
<script>

var link = 'http://localhost/event/accounts/';

	$(document).ready(function() {
	
		
		$('#closecalendar').click(function() {
			$('#calendarmodal').modal('hide');
		});
		
		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaDay'
			},
			defaultView: 'month',
			events: <?php echo json_encode($calendar);?>,
			eventClick:  function(event, jsEvent, view) {
				$("#event_name").val(event.title);
				$("#event_venue").val(event.event_venue);
				$("#event_date").val(event.event_date);
				$("#event_time").val(event.event_time);
				$("#event_type").val(event.event_type);
				$("#notes").val(event.notes);
				$("#guests").val(event.guest);
				$("#client_name").val(event.client_name);
				$("#contact_number").val(event.contact_number);
				$("#payment_type").val(event.payment_type);
				$("#payment_status").val(event.payment_status);
				$("#event_packages").val(event.event_package);
				$("#event_types").val(event.event_types);
				$("#view-plan").html('<a href="planner-data.php?id='+event.event_id+'&event='+event.title+'&package='+event.event_package+'"><button type="submit" class="btn btn-success">VIEW PLAN </button></a>');
				$("#update-details").show();
			},
		});
		
	});		
	
	$('#event_package').on('change', function() {
				$.ajax({
				   type: "POST",
				   url: link + 'controller/get-package-pax.php',
				   data : {
							 'package'      : this.value , 
						
					},
				   success: function(data)
				   {
						$("#guest").val(data);
				   }
		});	
	});
	
	$('#event_package').on('change', function() {
				$.ajax({
				   type: "POST",
				   url: link + 'controller/get-package-pax.php',
				   data : {
							 'package'      : this.value , 
						
					},
				   success: function(data)
				   {
						$("#guest").val(data);
				   }
		});	
	});
	$('#beef').on('change', function() {
		var packages = $("#package").val();
		if(packages == 1 || packages == 2 || packages == 3 || packages == 4){
			if(this.value !=""){
			$("#pork").val("");
			$("#pork").prop('disabled', 'disabled');
			} else {
			$("#pork").removeAttr('disabled');
			}
		}
	});
	$('#pork').on('change', function() {
		var packages = $("#package").val();
		if(packages == 1 || packages == 2 || packages == 3 || packages == 4){
			if(this.value !=""){
			$("#beef").val("");
			$("#beef").prop('disabled', 'disabled');
			} else {
			$("#beef").removeAttr('disabled');
			}
		}
	});
	$('#chicken').on('change', function() {
		var packages = $("#package").val();
		if(packages == 1 || packages == 2){
			if(this.value !=""){
			$("#fish").prop('disabled', 'disabled');
			$("#fish").val("");
			} else {
			$("#fish").removeAttr('disabled');
			}
		}
	});
	$('#fish').on('change', function() {
		var packages = $("#package").val();
		if(packages == 1  || packages == 2){
			if(this.value !=""){
			$("#chicken").val("");
			$("#chicken").prop('disabled', 'disabled');
			} else {
			$("#chicken").removeAttr('disabled');
			}
		}
	});
</script>
<script type="text/javascript">

    function PrintElem(elem)
    {
        Popup($(elem).html());
    }

    function Popup(data) 
    {
        var mywindow = window.open('', '');
        mywindow.document.write('<html><head><title>my div</title>');
		mywindow.document.write("<link href=\"../assets/vendor/bootstrap/css/bootstrap.min.css\" rel=\"stylesheet\"><link href=\"../css/core.css\" rel=\"stylesheet\"><link href=\"../css/components.css\" rel=\"stylesheet\"><link href=\"../css/icons.css\" rel=\"stylesheet\">")
        mywindow.document.write('</head><body >');
        mywindow.document.write(data);
        mywindow.document.write('</body></html>');

        mywindow.print();
        mywindow.close();

        return true;
    }

</script>
<script>
$(document).ready(function() {
            $('#table_id').DataTable({

                dom: 'Bfrtip',
                responsive: false,
                pageLength: 25,
                // lengthMenu: [0, 5, 10, 20, 50, 100, 200, 500],

                buttons: [
                    'csv', 'excel', 'print'
                ]

            });
        });
</script>
</html>