<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<style>
	.borderdraw {
		position:fixed;
		border-style:solid;
		height:0;
		line-height:0;
		width:0;
		z-index:-1;
	}

	body {
            color: black;
        }

	.tag1{ z-index:9999;position:absolute;top:40px; }
	.tag2 { z-index:9999;position:absolute;left:40px; }
	.diag { position: relative; width: 50px; height: 50px; }
	.outerdivslant { position: absolute; top: 0px; left: 0px; border-color: transparent transparent transparent rgb(64, 0, 0); border-width: 50px 0px 0px 60px;}
	.innerdivslant {position: absolute; top: 1px; left: 0px; border-color: transparent transparent transparent #fff; border-width: 49px 0px 0px 59px;}                  

	table {
	
	}
	
	th{
		height: 10px;
		text-decoration: none;
		font-family: Tahoma, "Times New Roman", serif; 
		font-size: 0.6em;
	} 
	
	td {
		height: 10px;
		text-decoration: none;
		font-family: Tahoma, "Times New Roman", serif; 
		font-size: 0.5em;		
	}

        .triangle {
    width: 0;
    height: 0;
	display: inline-block;
}

	.triangle-halfdown {
		border-bottom: 22px solid #333;
		border-left:22px solid transparent;
		}

	.triangle-halfup {
		border-top: 22px solid #333;
		border-right:22px solid transparent;
	}

	.triangle-full {
		border-bottom: 22px solid #333;
		border-right:22px solid #333;
	}

	</style>	
</head><br>
<body style="color: black;">
<table border="0" cellspacing="0" cellpadding="1" width="800">
	<tr>
		
		<td align="center" valign="top">
			<strong><font size="+1">School Form 2 (SF2) Daily Attendance Report of Learners</font></strong><br>
			<br>
			<table width="100%" border="0">
							<tr height="25">
					<td width="15%" align="right" ><font size="1">Level / Section &nbsp;</td>
					<td align="center" style="BORDER-RIGHT: black solid 1px; BORDER-TOP: black solid 1px; BORDER-LEFT: black solid 1px; BORDER-BOTTOM: black solid 1px"><font size="1"> {{ $students->first()->course->name }} </td>
					<td width="3%"></td>
					<td></td>
					<td width="15%" align="right"><font size="1">School Year &nbsp;</td>
					<td align="center" style="BORDER-RIGHT: black solid 1px; BORDER-TOP: black solid 1px; BORDER-LEFT: black solid 1px; BORDER-BOTTOM: black solid 1px"><font size="1">{{ $students->first()->course->School_year}}-2024 </td>
					<td width="3%"></td>
					<td width="3%" align="right"></td>
					<td align="right" colspan="2"><font size="1">For the Month of &nbsp;</td>
					<td align="center" style="BORDER-RIGHT: black solid 1px; BORDER-TOP: black solid 1px; BORDER-LEFT: black solid 1px; BORDER-BOTTOM: black solid 1px">&nbsp;&nbsp;&nbsp; <span style="font-size: 10px;">April</span></td>
				</tr>
		
			</table>
		</td>
		<td width="10%"><img src="{{url('/')}}/img/sanhs_logo.png" width="40"></td>
	</tr>
</table>
<table border="1" cellspacing="0" cellpadding="1" width="800">
	<tr>
		<th rowspan="3" width="1%">#</th>
		<th rowspan="3" width="20%">NAME (Last Name, First Name, Middle Name)</th>
		<th colspan="25">(1st row for date)</th>
		<th rowspan="2" colspan="2" width="10%">Total for the Month</th>
	</tr>
	<tr height="15">
		<th width="2%"></th>
		<th width="2%"></th>
		<th width="2%"></th>
		<th width="2%"></th>
		<th width="2%"></th>
		<th width="2%"></th>
		<th width="2%"></th>
		<th width="2%"></th>
		<th width="2%"></th>
		<th width="2%"></th>
		<th width="2%"></th>
		<th width="2%"></th>
		<th width="2%"></th>
		<th width="2%"></th>
		<th width="2%"></th>
		<th width="2%"></th>
		<th width="2%"></th>
		<th width="2%"></th>
		<th width="2%"></th>
		<th width="2%"></th>
		<th width="2%"></th>
		<th width="2%"></th>
		<th width="2%"></th>
		<th width="2%"></th>
		<th width="2%"></th>
	</tr>
	<tr>
		<th>M</th>
		<th>T</th>
		<th>W</th>
		<th>TH</th>
		<th>F</th>
		<th>M</th>
		<th>T</th>
		<th>W</th>
		<th>TH</th>
		<th>F</th>
		<th>M</th>
		<th>T</th>
		<th>W</th>
		<th>TH</th>
		<th>F</th>
		<th>M</th>
		<th>T</th>
		<th>W</th>
		<th>TH</th>
		<th>F</th>
		<th>M</th>
		<th>T</th>
		<th>W</th>
		<th>TH</th>
		<th>F</th>
		<th>PRESENT</th>
		<th>TARDY</th>
	</tr>
	@foreach($students->where('gender', 'Male') as $student)
	<tr height="25">
		<td align="right"><strong>0</strong></td>
		<td align="center">

		<strong>{{ $student->getFullname() }}</strong></td>
		<td style="text-align: center;">
			@php
				$specificDate = '2024-04-02'; // Change this to your specific date
				$latestCheckinout = null;
				foreach($student->checkinout->sortByDesc('created_at') as $checkinout) {
					$createdAtDate = substr($checkinout->created_at, 0, 10);
					if($createdAtDate === $specificDate) {
						$latestCheckinout = $checkinout;
						break; // Break the loop after finding the most recent data for the specific date
					}
				}
			@endphp

			@if($latestCheckinout)
				@if($latestCheckinout->Getstate() == 1)
					<span class="triangle triangle-halfdown"></span>
				@elseif($latestCheckinout->Getstate() == 0)
					<span class="triangle triangle-no"></span>
				@elseif($latestCheckinout->Getstate() == 2)
					<span class="triangle triangle-half"></span>
				@else
					<span class="triangle triangle-halfup"></span>
				@endif
			@endif
		</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	@endforeach
		<tr height="25">
		<td align="right"><strong>0</strong></td>
		<td align="center"><strong><=== MALE | TOTAL Per Day ===></strong></td>
		<td><strong></strong></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	@foreach($students->where('gender', 'Female') as $student)
	<tr height="25">
		<td align="right"><strong>0</strong></td>
		<td  align="center"><strong><strong>{{ $student->getFullname() }}</strong></strong></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	@endforeach
		<tr height="25">
		<td align="right"><strong>0</strong></td>
		<td align="center"><strong><=== FEMALE | TOTAL Per Day ===></strong></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	<tr height="25">
		<td align="right"><strong>0</strong></td>
		<td align="center"><strong>Combined | TOTAL Per Day</strong></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>	
</table>
</body>

@section('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.0/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.0/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.0/js/buttons.colVis.min.js"></script>
    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true, 
                "lengthChange": false, 
                "autoWidth": false, 
                "pageLength": 5,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
@stop
