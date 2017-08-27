
<script src="fullcalender/fullcalendar.min.js" type="text/javascript"></script>


      <div class="col-md-12 section-title">
		   	<div  style="width: 305px;"><a class="i-text">
            Kalender</a></span></div>
        </div>
<div  style="background-color: #fff">

<?php
function tanggal_sekarang($time=FALSE)
{
	date_default_timezone_set('Asia/Jakarta');
	$str_format='';
	if($time==FALSE)
	{
		$str_format= date("Y-m-d");
	}else{
		$str_format= date("Y-m-d H:i:s");
	}
	return $str_format;
}
?>
<script>

	$(document).ready(function() {
	
		$('#calendar').fullCalendar({
			theme:true,
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay'
			},
			defaultDate: '<?=tanggal_sekarang();?>',
			editable: true,
			eventLimit: true,
			events: {
				url: 'koneksi_kalender.php',				
			},
			loading: function(bool) {
				$('#loading').toggle(bool);
			}
		});
		
	});

</script>
<style>
	#calendar {
		max-width: 700px;
		margin: 0 auto;
	}
</style>
<div id='loading'>loading...</div>
<div id='calendar'></div>
</div>