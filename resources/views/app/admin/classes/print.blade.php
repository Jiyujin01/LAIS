@extends('adminlte::page')

@section('title', 'Classes')

@section('content_header')
    <h1>Classes</h1>
@stop

@section('content')
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
	</style>	
</head><br>
<body style="color: black;">
<table border="0" cellspacing="0" cellpadding="1" width="800">
	<tr>
		<td width="10%" align="right"><img src="/img/deped_logo.png" width="40"></td>
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
		<td width="10%"><img src="/img/sanhs_logo.png" width="40"></td>
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
		<td style="text-align: left;">@foreach($student->checkinout as $checkinout)
				@php
					$specificDate = '2024-04-02'; // Change this to your specific date
					$createdAtDate = substr($checkinout->created_at, 0, 10);
				@endphp
				@if($createdAtDate === $specificDate)
				@if($checkinout->Getstate() == 1)
					<span class="triangle triangle-green"></span>
				@elseif($checkinout->Getstate() == 0)
					<span class="triangle triangle-green"></span>
				@elseif($checkinout->Getstate() == 2)
					<span class="triangle triangle-black"></span>
				@else
					<span class="triangle triangle-red"></span>
				@endif
			@endif
			@endforeach</td>
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
@stop

@section('footer')
    Copyright &copy; 2024. <strong>Web-Based_ID_Entry</strong>. All rights reserved.
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
	<style>
        .triangle {
    width: 0;
    height: 0;
	display: inline-block;
        margin-bottom: -5px
}

	.triangle-green {
			border-top: 10px solid transparent;
			border-bottom: 10px solid transparent;
			border-right: 10px solid red;
		}

	.triangle-red {
		border-top: 10px solid transparent;
		border-bottom: 10px solid transparent;
		border-right: 10px solid red;
	}

	.triangle-black {
		border-bottom: 15px solid #333;
		border-right:15px solid transparent;
	}

    </style>
@stop

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
