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
					<td align="center" style="BORDER-RIGHT: black solid 1px; BORDER-TOP: black solid 1px; BORDER-LEFT: black solid 1px; BORDER-BOTTOM: black solid 1px"><font size="1"> {{ $students->first()->course->level }}-{{ $students->first()->course->name }} </td>
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
	@php $s = 19; @endphp
	@php $i = 1; @endphp
	@foreach($students->where('gender', 'MALE') as $student)
	<tr height="25">
	@php $d = 0; @endphp
		<td align="right"><strong>{{ $loop->iteration }}</strong></td>
		<td align="center">

		<strong>{{ $student->getFullname() }}</strong></td>
		<td style="text-align: center;">
			@php
				$specificDate = '2024-04-01'; // Change this to your specific date
				$latestCheckinout = null;
				$createdAtDate = null;
				$createdTime = null;
				$updatedCheckinout = null;
				$updatedTime = null;
				foreach($student->checkinout->sortByDesc('created_at') as $checkinout) {
					$createdAtDate = substr($checkinout->created_at, 0, 10);
					$createdTime = substr($checkinout->created_at, 11);
					$createdTime = intval(str_replace(":", "", $createdTime));
					if($createdAtDate === $specificDate) {
						$latestCheckinout = $checkinout;
						break; // Break the loop after finding the most recent data for the specific date
					}
				}

				foreach($student->checkinout->sortByDesc('updated_at') as $updatedcheckinout) {
					$updatedAtDate = substr($updatedcheckinout->updated_at, 0, 10);
					$updatedTime = substr($updatedcheckinout->updated_at, 11);
					$updatedTime = intval(str_replace(":", "", $updatedTime));
					if($updatedAtDate === $specificDate && $updatedcheckinout->updated_at !== null && $updatedcheckinout->updated_at !== "") {
						$UpdatedCheckinout = $updatedcheckinout;
						break; // Break the loop after finding the most recent data for the specific date
					}
				}
			@endphp

		@if($latestCheckinout)
			@if($latestCheckinout->created_at === null || $latestCheckinout->created_at === "")
				<span class="triangle triangle-full">
			@elseif($latestCheckinout->Getstate() == null || $latestCheckinout->Getstate() == "")
				<span class="triangle triangle-full">
			@elseif ($latestCheckinout->Getstate() == 1) // Checking state of latestCheckinout
				@if (!is_null($createdTime)) // Checking if createdTime is not null
					@if ($createdTime > 074600) // Checking if createdTime is greater than 07:46:00
						<span class="triangle triangle-halfdown"></span>
						@php $d = $d + 0.5; @endphp // Incrementing $d by 0.5
					@else
						// Placeholder for else condition
					@endif
				@else
					<span class="triangle triangle-full"></span>
					@php $d++; @endphp
				@endif
			@elseif($latestCheckinout->Getstate() == 0)
				<span class="triangle triangle-no"></span>
			@elseif($latestCheckinout->Getstate() == 2)
				<span class="triangle triangle-full"></span>
				@php $d++; @endphp
			@else
				<span class="triangle triangle-halfup"></span>
				@php $d = $d + 0.5; @endphp
			@endif
		@else
			<span class="triangle triangle-full"></span>
			@php $d++; @endphp
		@endif
		</td>
		<td style="text-align: center;">
			@php
				$specificDate = '2024-04-02'; // Change this to your specific date
				$latestCheckinout = null;
				$createdAtDate = null;
				$createdTime = null;
				$updatedCheckinout = null;
				$updatedTime = null;
				foreach($student->checkinout->sortByDesc('created_at') as $checkinout) {
					$createdAtDate = substr($checkinout->created_at, 0, 10);
					$createdTime = substr($checkinout->created_at, 11);
					$createdTime = intval(str_replace(":", "", $createdTime));
					if($createdAtDate === $specificDate) {
						$latestCheckinout = $checkinout;
						break; // Break the loop after finding the most recent data for the specific date
					}
				}

				foreach($student->checkinout->sortByDesc('updated_at') as $updatedcheckinout) {
					$updatedAtDate = substr($updatedcheckinout->updated_at, 0, 10);
					$updatedTime = substr($updatedcheckinout->updated_at, 11);
					$updatedTime = intval(str_replace(":", "", $updatedTime));
					if($updatedAtDate === $specificDate && $updatedcheckinout->updated_at !== null && $updatedcheckinout->updated_at !== "") {
						$UpdatedCheckinout = $updatedcheckinout;
						break; // Break the loop after finding the most recent data for the specific date
					}
				}
			@endphp

			@if($latestCheckinout)
			@if($latestCheckinout->created_at === null || $latestCheckinout->created_at === "")
				<span class="triangle triangle-full">
			@elseif($latestCheckinout->Getstate() == null || $latestCheckinout->Getstate() == "")
				<span class="triangle triangle-full">
			@elseif ($latestCheckinout->Getstate() == 1) // Checking state of latestCheckinout
				@if (!is_null($createdTime)) // Checking if createdTime is not null
					@if ($createdTime > 074600) // Checking if createdTime is greater than 07:46:00
						<span class="triangle triangle-halfdown"></span>
						@php $d = $d + 0.5; @endphp // Incrementing $d by 0.5
					@else
						// Placeholder for else condition
					@endif
				@else
					<span class="triangle triangle-full"></span>
					@php $d++; @endphp
				@endif
			@elseif($latestCheckinout->Getstate() == 0)
				<span class="triangle triangle-no"></span>
			@elseif($latestCheckinout->Getstate() == 2)
				<span class="triangle triangle-full"></span>
				@php $d++; @endphp
			@else
				<span class="triangle triangle-halfup"></span>
				@php $d = $d + 0.5; @endphp
			@endif
		@else
			<span class="triangle triangle-full"></span>
			@php $d++; @endphp
		@endif
			<td style="text-align: center;">
			@php
				$specificDate = '2024-04-03'; // Change this to your specific date
				$latestCheckinout = null;
				$createdAtDate = null;
				$createdTime = null;
				$updatedCheckinout = null;
				$updatedTime = null;
				foreach($student->checkinout->sortByDesc('created_at') as $checkinout) {
					$createdAtDate = substr($checkinout->created_at, 0, 10);
					$createdTime = substr($checkinout->created_at, 11);
					$createdTime = intval(str_replace(":", "", $createdTime));
					if($createdAtDate === $specificDate) {
						$latestCheckinout = $checkinout;
						break; // Break the loop after finding the most recent data for the specific date
					}
				}

				foreach($student->checkinout->sortByDesc('updated_at') as $updatedcheckinout) {
					$updatedAtDate = substr($updatedcheckinout->updated_at, 0, 10);
					$updatedTime = substr($updatedcheckinout->updated_at, 11);
					$updatedTime = intval(str_replace(":", "", $updatedTime));
					if($updatedAtDate === $specificDate && $updatedcheckinout->updated_at !== null && $updatedcheckinout->updated_at !== "") {
						$UpdatedCheckinout = $updatedcheckinout;
						break; // Break the loop after finding the most recent data for the specific date
					}
				}
			@endphp

			@if($latestCheckinout)
			@if($latestCheckinout->created_at === null || $latestCheckinout->created_at === "")
				<span class="triangle triangle-full">
			@elseif($latestCheckinout->Getstate() == null || $latestCheckinout->Getstate() == "")
				<span class="triangle triangle-full">
			@elseif ($latestCheckinout->Getstate() == 1) // Checking state of latestCheckinout
				@if (!is_null($createdTime)) // Checking if createdTime is not null
					@if ($createdTime > 074600) // Checking if createdTime is greater than 07:46:00
						<span class="triangle triangle-halfdown"></span>
						@php $d = $d + 0.5; @endphp // Incrementing $d by 0.5
					@else
						// Placeholder for else condition
					@endif
				@else
					<span class="triangle triangle-full"></span>
					@php $d++; @endphp
				@endif
			@elseif($latestCheckinout->Getstate() == 0)
				<span class="triangle triangle-no"></span>
			@elseif($latestCheckinout->Getstate() == 2)
				<span class="triangle triangle-full"></span>
				@php $d++; @endphp
			@else
				<span class="triangle triangle-halfup"></span>
				@php $d = $d + 0.5; @endphp
			@endif
		@else
			<span class="triangle triangle-full"></span>
			@php $d++; @endphp
		@endif
			<td style="text-align: center;">
			@php
				$specificDate = '2024-04-04'; // Change this to your specific date
				$latestCheckinout = null;
				$createdAtDate = null;
				$createdTime = null;
				$updatedCheckinout = null;
				$updatedTime = null;
				foreach($student->checkinout->sortByDesc('created_at') as $checkinout) {
					$createdAtDate = substr($checkinout->created_at, 0, 10);
					$createdTime = substr($checkinout->created_at, 11);
					$createdTime = intval(str_replace(":", "", $createdTime));
					if($createdAtDate === $specificDate) {
						$latestCheckinout = $checkinout;
						break; // Break the loop after finding the most recent data for the specific date
					}
				}

				foreach($student->checkinout->sortByDesc('updated_at') as $updatedcheckinout) {
					$updatedAtDate = substr($updatedcheckinout->updated_at, 0, 10);
					$updatedTime = substr($updatedcheckinout->updated_at, 11);
					$updatedTime = intval(str_replace(":", "", $updatedTime));
					if($updatedAtDate === $specificDate && $updatedcheckinout->updated_at !== null && $updatedcheckinout->updated_at !== "") {
						$UpdatedCheckinout = $updatedcheckinout;
						break; // Break the loop after finding the most recent data for the specific date
					}
				}
			@endphp

			@if($latestCheckinout)
			@if($latestCheckinout->created_at === null || $latestCheckinout->created_at === "")
				<span class="triangle triangle-full">
			@elseif($latestCheckinout->Getstate() == null || $latestCheckinout->Getstate() == "")
				<span class="triangle triangle-full">
			@elseif ($latestCheckinout->Getstate() == 1) // Checking state of latestCheckinout
				@if (!is_null($createdTime)) // Checking if createdTime is not null
					@if ($createdTime > 074600) // Checking if createdTime is greater than 07:46:00
						<span class="triangle triangle-halfdown"></span>
						@php $d = $d + 0.5; @endphp // Incrementing $d by 0.5
					@else
						// Placeholder for else condition
					@endif
				@else
					<span class="triangle triangle-full"></span>
					@php $d++; @endphp
				@endif
			@elseif($latestCheckinout->Getstate() == 0)
				<span class="triangle triangle-no"></span>
			@elseif($latestCheckinout->Getstate() == 2)
				<span class="triangle triangle-full"></span>
				@php $d++; @endphp
			@else
				<span class="triangle triangle-halfup"></span>
				@php $d = $d + 0.5; @endphp
			@endif
		@else
			<span class="triangle triangle-full"></span>
			@php $d++; @endphp
		@endif
			<td style="text-align: center;">
			@php
				$specificDate = '2024-04-05'; // Change this to your specific date
				$latestCheckinout = null;
				$createdAtDate = null;
				$createdTime = null;
				$updatedCheckinout = null;
				$updatedTime = null;
				foreach($student->checkinout->sortByDesc('created_at') as $checkinout) {
					$createdAtDate = substr($checkinout->created_at, 0, 10);
					$createdTime = substr($checkinout->created_at, 11);
					$createdTime = intval(str_replace(":", "", $createdTime));
					if($createdAtDate === $specificDate) {
						$latestCheckinout = $checkinout;
						break; // Break the loop after finding the most recent data for the specific date
					}
				}

				foreach($student->checkinout->sortByDesc('updated_at') as $updatedcheckinout) {
					$updatedAtDate = substr($updatedcheckinout->updated_at, 0, 10);
					$updatedTime = substr($updatedcheckinout->updated_at, 11);
					$updatedTime = intval(str_replace(":", "", $updatedTime));
					if($updatedAtDate === $specificDate && $updatedcheckinout->updated_at !== null && $updatedcheckinout->updated_at !== "") {
						$UpdatedCheckinout = $updatedcheckinout;
						break; // Break the loop after finding the most recent data for the specific date
					}
				}
			@endphp

			@if($latestCheckinout)
			@if($latestCheckinout->created_at === null || $latestCheckinout->created_at === "")
				<span class="triangle triangle-full">
			@elseif($latestCheckinout->Getstate() == null || $latestCheckinout->Getstate() == "")
				<span class="triangle triangle-full">
			@elseif ($latestCheckinout->Getstate() == 1) // Checking state of latestCheckinout
				@if (!is_null($createdTime)) // Checking if createdTime is not null
					@if ($createdTime > 074600) // Checking if createdTime is greater than 07:46:00
						<span class="triangle triangle-halfdown"></span>
						@php $d = $d + 0.5; @endphp // Incrementing $d by 0.5
					@else
						// Placeholder for else condition
					@endif
				@else
					<span class="triangle triangle-full"></span>
					@php $d++; @endphp
				@endif
			@elseif($latestCheckinout->Getstate() == 0)
				<span class="triangle triangle-no"></span>
			@elseif($latestCheckinout->Getstate() == 2)
				<span class="triangle triangle-full"></span>
				@php $d++; @endphp
			@else
				<span class="triangle triangle-halfup"></span>
				@php $d = $d + 0.5; @endphp
			@endif
		@else
			<span class="triangle triangle-full"></span>
			@php $d++; @endphp
		@endif
			<td style="text-align: center;">
			<!--
			@php
				$specificDate = '2024-04-08'; // Change this to your specific date
				$latestCheckinout = null;
				$createdAtDate = null;
				$createdTime = null;
				$updatedCheckinout = null;
				$updatedTime = null;
				foreach($student->checkinout->sortByDesc('created_at') as $checkinout) {
					$createdAtDate = substr($checkinout->created_at, 0, 10);
					$createdTime = substr($checkinout->created_at, 11);
					$createdTime = intval(str_replace(":", "", $createdTime));
					if($createdAtDate === $specificDate) {
						$latestCheckinout = $checkinout;
						break; // Break the loop after finding the most recent data for the specific date
					}
				}

				foreach($student->checkinout->sortByDesc('updated_at') as $updatedcheckinout) {
					$updatedAtDate = substr($updatedcheckinout->updated_at, 0, 10);
					$updatedTime = substr($updatedcheckinout->updated_at, 11);
					$updatedTime = intval(str_replace(":", "", $updatedTime));
					if($updatedAtDate === $specificDate && $updatedcheckinout->updated_at !== null && $updatedcheckinout->updated_at !== "") {
						$UpdatedCheckinout = $updatedcheckinout;
						break; // Break the loop after finding the most recent data for the specific date
					}
				}
			@endphp

			@if($latestCheckinout)
			@if($latestCheckinout->created_at === null || $latestCheckinout->created_at === "")
				<span class="triangle triangle-full">
			@elseif($latestCheckinout->Getstate() == null || $latestCheckinout->Getstate() == "")
			<span class="triangle triangle-full">
			@elseif($latestCheckinout->Getstate() == 1)
				<span class="triangle triangle-halfdown"></span>
			@elseif($latestCheckinout->Getstate() == 0)
				<span class="triangle triangle-no"></span>
			@elseif($latestCheckinout->Getstate() == 2)
				<span class="triangle triangle-full"></span>
			@else
				<span class="triangle triangle-halfup"></span>
			@endif
		@else
			<span class="triangle triangle-full"></span>
			
		@endif -->
	</td>
			<td style="text-align: center;">
			<!--
			@php
				$specificDate = '2024-04-09'; // Change this to your specific date
				$latestCheckinout = null;
				$createdAtDate = null;
				$createdTime = null;
				$updatedCheckinout = null;
				$updatedTime = null;
				foreach($student->checkinout->sortByDesc('created_at') as $checkinout) {
					$createdAtDate = substr($checkinout->created_at, 0, 10);
					$createdTime = substr($checkinout->created_at, 11);
					$createdTime = intval(str_replace(":", "", $createdTime));
					if($createdAtDate === $specificDate) {
						$latestCheckinout = $checkinout;
						break; // Break the loop after finding the most recent data for the specific date
					}
				}

				foreach($student->checkinout->sortByDesc('updated_at') as $updatedcheckinout) {
					$updatedAtDate = substr($updatedcheckinout->updated_at, 0, 10);
					$updatedTime = substr($updatedcheckinout->updated_at, 11);
					$updatedTime = intval(str_replace(":", "", $updatedTime));
					if($updatedAtDate === $specificDate && $updatedcheckinout->updated_at !== null && $updatedcheckinout->updated_at !== "") {
						$UpdatedCheckinout = $updatedcheckinout;
						break; // Break the loop after finding the most recent data for the specific date
					}
				}
			@endphp

			@if($latestCheckinout)
			@if($latestCheckinout->created_at === null || $latestCheckinout->created_at === "")
				<span class="triangle triangle-full">
			@elseif($latestCheckinout->Getstate() == null || $latestCheckinout->Getstate() == "")
			<span class="triangle triangle-full">
			@elseif($latestCheckinout->Getstate() == 1)
				<span class="triangle triangle-halfdown"></span>
			@elseif($latestCheckinout->Getstate() == 0)
				<span class="triangle triangle-no"></span>
			@elseif($latestCheckinout->Getstate() == 2)
				<span class="triangle triangle-full"></span>
			@else
				<span class="triangle triangle-halfup"></span>
			@endif
		@else
			<span class="triangle triangle-full"></span>
		@endif -->
	</td>
			<td style="text-align: center;">
			<!--
			@php
				$specificDate = '2024-04-10'; // Change this to your specific date
				$latestCheckinout = null;
				$createdAtDate = null;
				$createdTime = null;
				$updatedCheckinout = null;
				$updatedTime = null;
				foreach($student->checkinout->sortByDesc('created_at') as $checkinout) {
					$createdAtDate = substr($checkinout->created_at, 0, 10);
					$createdTime = substr($checkinout->created_at, 11);
					$createdTime = intval(str_replace(":", "", $createdTime));
					if($createdAtDate === $specificDate) {
						$latestCheckinout = $checkinout;
						break; // Break the loop after finding the most recent data for the specific date
					}
				}

				foreach($student->checkinout->sortByDesc('updated_at') as $updatedcheckinout) {
					$updatedAtDate = substr($updatedcheckinout->updated_at, 0, 10);
					$updatedTime = substr($updatedcheckinout->updated_at, 11);
					$updatedTime = intval(str_replace(":", "", $updatedTime));
					if($updatedAtDate === $specificDate && $updatedcheckinout->updated_at !== null && $updatedcheckinout->updated_at !== "") {
						$UpdatedCheckinout = $updatedcheckinout;
						break; // Break the loop after finding the most recent data for the specific date
					}
				}
			@endphp

			@if($latestCheckinout)
			@if($latestCheckinout->created_at === null || $latestCheckinout->created_at === "")
				<span class="triangle triangle-full">
			@elseif($latestCheckinout->Getstate() == null || $latestCheckinout->Getstate() == "")
			<span class="triangle triangle-full">
			@elseif($latestCheckinout->Getstate() == 1)
				<span class="triangle triangle-halfdown"></span>
			@elseif($latestCheckinout->Getstate() == 0)
				<span class="triangle triangle-no"></span>
			@elseif($latestCheckinout->Getstate() == 2)
				<span class="triangle triangle-full"></span>
			@else
				<span class="triangle triangle-halfup"></span>
			@endif
		@else
			<span class="triangle triangle-full"></span>
		@endif -->
	</td>
			<td style="text-align: center;">
			@php
				$specificDate = '2024-04-11'; // Change this to your specific date
				$latestCheckinout = null;
				$createdAtDate = null;
				$createdTime = null;
				$updatedCheckinout = null;
				$updatedTime = null;
				foreach($student->checkinout->sortByDesc('created_at') as $checkinout) {
					$createdAtDate = substr($checkinout->created_at, 0, 10);
					$createdTime = substr($checkinout->created_at, 11);
					$createdTime = intval(str_replace(":", "", $createdTime));
					if($createdAtDate === $specificDate) {
						$latestCheckinout = $checkinout;
						break; // Break the loop after finding the most recent data for the specific date
					}
				}

				foreach($student->checkinout->sortByDesc('updated_at') as $updatedcheckinout) {
					$updatedAtDate = substr($updatedcheckinout->updated_at, 0, 10);
					$updatedTime = substr($updatedcheckinout->updated_at, 11);
					$updatedTime = intval(str_replace(":", "", $updatedTime));
					if($updatedAtDate === $specificDate && $updatedcheckinout->updated_at !== null && $updatedcheckinout->updated_at !== "") {
						$UpdatedCheckinout = $updatedcheckinout;
						break; // Break the loop after finding the most recent data for the specific date
					}
				}
			@endphp

			@if($latestCheckinout)
			@if($latestCheckinout->created_at === null || $latestCheckinout->created_at === "")
				<span class="triangle triangle-full">
			@elseif($latestCheckinout->Getstate() == null || $latestCheckinout->Getstate() == "")
				<span class="triangle triangle-full">
			@elseif ($latestCheckinout->Getstate() == 1) // Checking state of latestCheckinout
				@if (!is_null($createdTime)) // Checking if createdTime is not null
					@if ($createdTime > 074600) // Checking if createdTime is greater than 07:46:00
						<span class="triangle triangle-halfdown"></span>
						@php $d = $d + 0.5; @endphp // Incrementing $d by 0.5
					@else
						// Placeholder for else condition
					@endif
				@else
					<span class="triangle triangle-full"></span>
					@php $d++; @endphp
				@endif
			@elseif($latestCheckinout->Getstate() == 0)
				<span class="triangle triangle-no"></span>
			@elseif($latestCheckinout->Getstate() == 2)
				<span class="triangle triangle-full"></span>
				@php $d++; @endphp
			@else
				<span class="triangle triangle-halfup"></span>
				@php $d = $d + 0.5; @endphp
			@endif
		@else
			<span class="triangle triangle-full"></span>
			@php $d++; @endphp
		@endif
			<td style="text-align: center;">
			@php
				$specificDate = '2024-04-12'; // Change this to your specific date
				$latestCheckinout = null;
				$createdAtDate = null;
				$createdTime = null;
				$updatedCheckinout = null;
				$updatedTime = null;
				foreach($student->checkinout->sortByDesc('created_at') as $checkinout) {
					$createdAtDate = substr($checkinout->created_at, 0, 10);
					$createdTime = substr($checkinout->created_at, 11);
					$createdTime = intval(str_replace(":", "", $createdTime));
					if($createdAtDate === $specificDate) {
						$latestCheckinout = $checkinout;
						break; // Break the loop after finding the most recent data for the specific date
					}
				}

				foreach($student->checkinout->sortByDesc('updated_at') as $updatedcheckinout) {
					$updatedAtDate = substr($updatedcheckinout->updated_at, 0, 10);
					$updatedTime = substr($updatedcheckinout->updated_at, 11);
					$updatedTime = intval(str_replace(":", "", $updatedTime));
					if($updatedAtDate === $specificDate && $updatedcheckinout->updated_at !== null && $updatedcheckinout->updated_at !== "") {
						$UpdatedCheckinout = $updatedcheckinout;
						break; // Break the loop after finding the most recent data for the specific date
					}
				}
			@endphp

			@if($latestCheckinout)
			@if($latestCheckinout->created_at === null || $latestCheckinout->created_at === "")
				<span class="triangle triangle-full">
			@elseif($latestCheckinout->Getstate() == null || $latestCheckinout->Getstate() == "")
				<span class="triangle triangle-full">
			@elseif ($latestCheckinout->Getstate() == 1) // Checking state of latestCheckinout
				@if (!is_null($createdTime)) // Checking if createdTime is not null
					@if ($createdTime > 074600) // Checking if createdTime is greater than 07:46:00
						<span class="triangle triangle-halfdown"></span>
						@php $d = $d + 0.5; @endphp // Incrementing $d by 0.5
					@else
						// Placeholder for else condition
					@endif
				@else
					<span class="triangle triangle-full"></span>
					@php $d++; @endphp
				@endif
			@elseif($latestCheckinout->Getstate() == 0)
				<span class="triangle triangle-no"></span>
			@elseif($latestCheckinout->Getstate() == 2)
				<span class="triangle triangle-full"></span>
				@php $d++; @endphp
			@else
				<span class="triangle triangle-halfup"></span>
				@php $d = $d + 0.5; @endphp
			@endif
		@else
			<span class="triangle triangle-full"></span>
			@php $d++; @endphp
		@endif
			<td style="text-align: center;">
			@php
				$specificDate = '2024-04-15'; // Change this to your specific date
				$latestCheckinout = null;
				$createdAtDate = null;
				$createdTime = null;
				$updatedCheckinout = null;
				$updatedTime = null;
				foreach($student->checkinout->sortByDesc('created_at') as $checkinout) {
					$createdAtDate = substr($checkinout->created_at, 0, 10);
					$createdTime = substr($checkinout->created_at, 11);
					$createdTime = intval(str_replace(":", "", $createdTime));
					if($createdAtDate === $specificDate) {
						$latestCheckinout = $checkinout;
						break; // Break the loop after finding the most recent data for the specific date
					}
				}

				foreach($student->checkinout->sortByDesc('updated_at') as $updatedcheckinout) {
					$updatedAtDate = substr($updatedcheckinout->updated_at, 0, 10);
					$updatedTime = substr($updatedcheckinout->updated_at, 11);
					$updatedTime = intval(str_replace(":", "", $updatedTime));
					if($updatedAtDate === $specificDate && $updatedcheckinout->updated_at !== null && $updatedcheckinout->updated_at !== "") {
						$UpdatedCheckinout = $updatedcheckinout;
						break; // Break the loop after finding the most recent data for the specific date
					}
				}
			@endphp

			@if($latestCheckinout)
			@if($latestCheckinout->created_at === null || $latestCheckinout->created_at === "")
				<span class="triangle triangle-full">
			@elseif($latestCheckinout->Getstate() == null || $latestCheckinout->Getstate() == "")
				<span class="triangle triangle-full">
			@elseif ($latestCheckinout->Getstate() == 1) // Checking state of latestCheckinout
				@if (!is_null($createdTime)) // Checking if createdTime is not null
					@if ($createdTime > 074600) // Checking if createdTime is greater than 07:46:00
						<span class="triangle triangle-halfdown"></span>
						@php $d = $d + 0.5; @endphp // Incrementing $d by 0.5
					@else
						// Placeholder for else condition
					@endif
				@else
					<span class="triangle triangle-full"></span>
					@php $d++; @endphp
				@endif
			@elseif($latestCheckinout->Getstate() == 0)
				<span class="triangle triangle-no"></span>
			@elseif($latestCheckinout->Getstate() == 2)
				<span class="triangle triangle-full"></span>
				@php $d++; @endphp
			@else
				<span class="triangle triangle-halfup"></span>
				@php $d = $d + 0.5; @endphp
			@endif
		@else
			<span class="triangle triangle-full"></span>
			@php $d++; @endphp
		@endif
			<td style="text-align: center;">
			@php
				$specificDate = '2024-04-16'; // Change this to your specific date
				$latestCheckinout = null;
				$createdAtDate = null;
				$createdTime = null;
				$updatedCheckinout = null;
				$updatedTime = null;
				foreach($student->checkinout->sortByDesc('created_at') as $checkinout) {
					$createdAtDate = substr($checkinout->created_at, 0, 10);
					$createdTime = substr($checkinout->created_at, 11);
					$createdTime = intval(str_replace(":", "", $createdTime));
					if($createdAtDate === $specificDate) {
						$latestCheckinout = $checkinout;
						break; // Break the loop after finding the most recent data for the specific date
					}
				}

				foreach($student->checkinout->sortByDesc('updated_at') as $updatedcheckinout) {
					$updatedAtDate = substr($updatedcheckinout->updated_at, 0, 10);
					$updatedTime = substr($updatedcheckinout->updated_at, 11);
					$updatedTime = intval(str_replace(":", "", $updatedTime));
					if($updatedAtDate === $specificDate && $updatedcheckinout->updated_at !== null && $updatedcheckinout->updated_at !== "") {
						$UpdatedCheckinout = $updatedcheckinout;
						break; // Break the loop after finding the most recent data for the specific date
					}
				}
			@endphp

			@if($latestCheckinout)
			@if($latestCheckinout->created_at === null || $latestCheckinout->created_at === "")
				<span class="triangle triangle-full">
			@elseif($latestCheckinout->Getstate() == null || $latestCheckinout->Getstate() == "")
				<span class="triangle triangle-full">
			@elseif ($latestCheckinout->Getstate() == 1) // Checking state of latestCheckinout
				@if (!is_null($createdTime)) // Checking if createdTime is not null
					@if ($createdTime > 074600) // Checking if createdTime is greater than 07:46:00
						<span class="triangle triangle-halfdown"></span>
						@php $d = $d + 0.5; @endphp // Incrementing $d by 0.5
					@else
						// Placeholder for else condition
					@endif
				@else
					<span class="triangle triangle-full"></span>
					@php $d++; @endphp
				@endif
			@elseif($latestCheckinout->Getstate() == 0)
				<span class="triangle triangle-no"></span>
			@elseif($latestCheckinout->Getstate() == 2)
				<span class="triangle triangle-full"></span>
				@php $d++; @endphp
			@else
				<span class="triangle triangle-halfup"></span>
				@php $d = $d + 0.5; @endphp
			@endif
		@else
			<span class="triangle triangle-full"></span>
			@php $d++; @endphp
		@endif
			<td style="text-align: center;">
			@php
				$specificDate = '2024-04-17'; // Change this to your specific date
				$latestCheckinout = null;
				$createdAtDate = null;
				$createdTime = null;
				$updatedCheckinout = null;
				$updatedTime = null;
				foreach($student->checkinout->sortByDesc('created_at') as $checkinout) {
					$createdAtDate = substr($checkinout->created_at, 0, 10);
					$createdTime = substr($checkinout->created_at, 11);
					$createdTime = intval(str_replace(":", "", $createdTime));
					if($createdAtDate === $specificDate) {
						$latestCheckinout = $checkinout;
						break; // Break the loop after finding the most recent data for the specific date
					}
				}

				foreach($student->checkinout->sortByDesc('updated_at') as $updatedcheckinout) {
					$updatedAtDate = substr($updatedcheckinout->updated_at, 0, 10);
					$updatedTime = substr($updatedcheckinout->updated_at, 11);
					$updatedTime = intval(str_replace(":", "", $updatedTime));
					if($updatedAtDate === $specificDate && $updatedcheckinout->updated_at !== null && $updatedcheckinout->updated_at !== "") {
						$UpdatedCheckinout = $updatedcheckinout;
						break; // Break the loop after finding the most recent data for the specific date
					}
				}
			@endphp

			@if($latestCheckinout)
			@if($latestCheckinout->created_at === null || $latestCheckinout->created_at === "")
				<span class="triangle triangle-full">
			@elseif($latestCheckinout->Getstate() == null || $latestCheckinout->Getstate() == "")
				<span class="triangle triangle-full">
			@elseif ($latestCheckinout->Getstate() == 1) // Checking state of latestCheckinout
				@if (!is_null($createdTime)) // Checking if createdTime is not null
					@if ($createdTime > 074600) // Checking if createdTime is greater than 07:46:00
						<span class="triangle triangle-halfdown"></span>
						@php $d = $d + 0.5; @endphp // Incrementing $d by 0.5
					@else
						// Placeholder for else condition
					@endif
				@else
					<span class="triangle triangle-full"></span>
					@php $d++; @endphp
				@endif
			@elseif($latestCheckinout->Getstate() == 0)
				<span class="triangle triangle-no"></span>
			@elseif($latestCheckinout->Getstate() == 2)
				<span class="triangle triangle-full"></span>
				@php $d++; @endphp
			@else
				<span class="triangle triangle-halfup"></span>
				@php $d = $d + 0.5; @endphp
			@endif
		@else
			<span class="triangle triangle-full"></span>
			@php $d++; @endphp
		@endif
			<td style="text-align: center;">
			@php
				$specificDate = '2024-04-18'; // Change this to your specific date
				$latestCheckinout = null;
				$createdAtDate = null;
				$createdTime = null;
				$updatedCheckinout = null;
				$updatedTime = null;
				foreach($student->checkinout->sortByDesc('created_at') as $checkinout) {
					$createdAtDate = substr($checkinout->created_at, 0, 10);
					$createdTime = substr($checkinout->created_at, 11);
					$createdTime = intval(str_replace(":", "", $createdTime));
					if($createdAtDate === $specificDate) {
						$latestCheckinout = $checkinout;
						break; // Break the loop after finding the most recent data for the specific date
					}
				}

				foreach($student->checkinout->sortByDesc('updated_at') as $updatedcheckinout) {
					$updatedAtDate = substr($updatedcheckinout->updated_at, 0, 10);
					$updatedTime = substr($updatedcheckinout->updated_at, 11);
					$updatedTime = intval(str_replace(":", "", $updatedTime));
					if($updatedAtDate === $specificDate && $updatedcheckinout->updated_at !== null && $updatedcheckinout->updated_at !== "") {
						$UpdatedCheckinout = $updatedcheckinout;
						break; // Break the loop after finding the most recent data for the specific date
					}
				}
			@endphp

			@if($latestCheckinout)
			@if($latestCheckinout->created_at === null || $latestCheckinout->created_at === "")
				<span class="triangle triangle-full">
			@elseif($latestCheckinout->Getstate() == null || $latestCheckinout->Getstate() == "")
				<span class="triangle triangle-full">
			@elseif ($latestCheckinout->Getstate() == 1) // Checking state of latestCheckinout
				@if (!is_null($createdTime)) // Checking if createdTime is not null
					@if ($createdTime > 074600) // Checking if createdTime is greater than 07:46:00
						<span class="triangle triangle-halfdown"></span>
						@php $d = $d + 0.5; @endphp // Incrementing $d by 0.5
					@else
						// Placeholder for else condition
					@endif
				@else
					<span class="triangle triangle-full"></span>
					@php $d++; @endphp
				@endif
			@elseif($latestCheckinout->Getstate() == 0)
				<span class="triangle triangle-no"></span>
			@elseif($latestCheckinout->Getstate() == 2)
				<span class="triangle triangle-full"></span>
				@php $d++; @endphp
			@else
				<span class="triangle triangle-halfup"></span>
				@php $d = $d + 0.5; @endphp
			@endif
		@else
			<span class="triangle triangle-full"></span>
			@php $d++; @endphp
		@endif
			<td style="text-align: center;">
			@php
				$specificDate = '2024-04-19'; // Change this to your specific date
				$latestCheckinout = null;
				$createdAtDate = null;
				$createdTime = null;
				$updatedCheckinout = null;
				$updatedTime = null;
				foreach($student->checkinout->sortByDesc('created_at') as $checkinout) {
					$createdAtDate = substr($checkinout->created_at, 0, 10);
					$createdTime = substr($checkinout->created_at, 11);
					$createdTime = intval(str_replace(":", "", $createdTime));
					if($createdAtDate === $specificDate) {
						$latestCheckinout = $checkinout;
						break; // Break the loop after finding the most recent data for the specific date
					}
				}

				foreach($student->checkinout->sortByDesc('updated_at') as $updatedcheckinout) {
					$updatedAtDate = substr($updatedcheckinout->updated_at, 0, 10);
					$updatedTime = substr($updatedcheckinout->updated_at, 11);
					$updatedTime = intval(str_replace(":", "", $updatedTime));
					if($updatedAtDate === $specificDate && $updatedcheckinout->updated_at !== null && $updatedcheckinout->updated_at !== "") {
						$UpdatedCheckinout = $updatedcheckinout;
						break; // Break the loop after finding the most recent data for the specific date
					}
				}
			@endphp

			@if($latestCheckinout)
			@if($latestCheckinout->created_at === null || $latestCheckinout->created_at === "")
				<span class="triangle triangle-full">
			@elseif($latestCheckinout->Getstate() == null || $latestCheckinout->Getstate() == "")
				<span class="triangle triangle-full">
			@elseif ($latestCheckinout->Getstate() == 1) // Checking state of latestCheckinout
				@if (!is_null($createdTime)) // Checking if createdTime is not null
					@if ($createdTime > 074600) // Checking if createdTime is greater than 07:46:00
						<span class="triangle triangle-halfdown"></span>
						@php $d = $d + 0.5; @endphp // Incrementing $d by 0.5
					@else
						// Placeholder for else condition
					@endif
				@else
					<span class="triangle triangle-full"></span>
					@php $d++; @endphp
				@endif
			@elseif($latestCheckinout->Getstate() == 0)
				<span class="triangle triangle-no"></span>
			@elseif($latestCheckinout->Getstate() == 2)
				<span class="triangle triangle-full"></span>
				@php $d++; @endphp
			@else
				<span class="triangle triangle-halfup"></span>
				@php $d = $d + 0.5; @endphp
			@endif
		@else
			<span class="triangle triangle-full"></span>
			@php $d++; @endphp
		@endif
			<td style="text-align: center;">
			@php
				$specificDate = '2024-04-22'; // Change this to your specific date
				$latestCheckinout = null;
				$createdAtDate = null;
				$createdTime = null;
				$updatedCheckinout = null;
				$updatedTime = null;
				foreach($student->checkinout->sortByDesc('created_at') as $checkinout) {
					$createdAtDate = substr($checkinout->created_at, 0, 10);
					$createdTime = substr($checkinout->created_at, 11);
					$createdTime = intval(str_replace(":", "", $createdTime));
					if($createdAtDate === $specificDate) {
						$latestCheckinout = $checkinout;
						break; // Break the loop after finding the most recent data for the specific date
					}
				}

				foreach($student->checkinout->sortByDesc('updated_at') as $updatedcheckinout) {
					$updatedAtDate = substr($updatedcheckinout->updated_at, 0, 10);
					$updatedTime = substr($updatedcheckinout->updated_at, 11);
					$updatedTime = intval(str_replace(":", "", $updatedTime));
					if($updatedAtDate === $specificDate && $updatedcheckinout->updated_at !== null && $updatedcheckinout->updated_at !== "") {
						$UpdatedCheckinout = $updatedcheckinout;
						break; // Break the loop after finding the most recent data for the specific date
					}
				}
			@endphp

			@if($latestCheckinout)
			@if($latestCheckinout->created_at === null || $latestCheckinout->created_at === "")
				<span class="triangle triangle-full">
			@elseif($latestCheckinout->Getstate() == null || $latestCheckinout->Getstate() == "")
				<span class="triangle triangle-full">
			@elseif ($latestCheckinout->Getstate() == 1) // Checking state of latestCheckinout
				@if (!is_null($createdTime)) // Checking if createdTime is not null
					@if ($createdTime > 074600) // Checking if createdTime is greater than 07:46:00
						<span class="triangle triangle-halfdown"></span>
						@php $d = $d + 0.5; @endphp // Incrementing $d by 0.5
					@else
						// Placeholder for else condition
					@endif
				@else
					<span class="triangle triangle-full"></span>
					@php $d++; @endphp
				@endif
			@elseif($latestCheckinout->Getstate() == 0)
				<span class="triangle triangle-no"></span>
			@elseif($latestCheckinout->Getstate() == 2)
				<span class="triangle triangle-full"></span>
				@php $d++; @endphp
			@else
				<span class="triangle triangle-halfup"></span>
				@php $d = $d + 0.5; @endphp
			@endif
		@else
			<span class="triangle triangle-full"></span>
			@php $d++; @endphp
		@endif
			<td style="text-align: center;">
			@php
				$specificDate = '2024-04-23'; // Change this to your specific date
				$latestCheckinout = null;
				$createdAtDate = null;
				$createdTime = null;
				$updatedCheckinout = null;
				$updatedTime = null;
				foreach($student->checkinout->sortByDesc('created_at') as $checkinout) {
					$createdAtDate = substr($checkinout->created_at, 0, 10);
					$createdTime = substr($checkinout->created_at, 11);
					$createdTime = intval(str_replace(":", "", $createdTime));
					if($createdAtDate === $specificDate) {
						$latestCheckinout = $checkinout;
						break; // Break the loop after finding the most recent data for the specific date
					}
				}

				foreach($student->checkinout->sortByDesc('updated_at') as $updatedcheckinout) {
					$updatedAtDate = substr($updatedcheckinout->updated_at, 0, 10);
					$updatedTime = substr($updatedcheckinout->updated_at, 11);
					$updatedTime = intval(str_replace(":", "", $updatedTime));
					if($updatedAtDate === $specificDate && $updatedcheckinout->updated_at !== null && $updatedcheckinout->updated_at !== "") {
						$UpdatedCheckinout = $updatedcheckinout;
						break; // Break the loop after finding the most recent data for the specific date
					}
				}
			@endphp

			@if($latestCheckinout)
			@if($latestCheckinout->created_at === null || $latestCheckinout->created_at === "")
				<span class="triangle triangle-full">
			@elseif($latestCheckinout->Getstate() == null || $latestCheckinout->Getstate() == "")
				<span class="triangle triangle-full">
			@elseif ($latestCheckinout->Getstate() == 1) // Checking state of latestCheckinout
				@if (!is_null($createdTime)) // Checking if createdTime is not null
					@if ($createdTime > 074600) // Checking if createdTime is greater than 07:46:00
						<span class="triangle triangle-halfdown"></span>
						@php $d = $d + 0.5; @endphp // Incrementing $d by 0.5
					@else
						// Placeholder for else condition
					@endif
				@else
					<span class="triangle triangle-full"></span>
					@php $d++; @endphp
				@endif
			@elseif($latestCheckinout->Getstate() == 0)
				<span class="triangle triangle-no"></span>
			@elseif($latestCheckinout->Getstate() == 2)
				<span class="triangle triangle-full"></span>
				@php $d++; @endphp
			@else
				<span class="triangle triangle-halfup"></span>
				@php $d = $d + 0.5; @endphp
			@endif
		@else
			<span class="triangle triangle-full"></span>
			@php $d++; @endphp
		@endif
			<td style="text-align: center;">
			@php
				$specificDate = '2024-04-24'; // Change this to your specific date
				$latestCheckinout = null;
				$createdAtDate = null;
				$createdTime = null;
				$updatedCheckinout = null;
				$updatedTime = null;
				foreach($student->checkinout->sortByDesc('created_at') as $checkinout) {
					$createdAtDate = substr($checkinout->created_at, 0, 10);
					$createdTime = substr($checkinout->created_at, 11);
					$createdTime = intval(str_replace(":", "", $createdTime));
					if($createdAtDate === $specificDate) {
						$latestCheckinout = $checkinout;
						break; // Break the loop after finding the most recent data for the specific date
					}
				}

				foreach($student->checkinout->sortByDesc('updated_at') as $updatedcheckinout) {
					$updatedAtDate = substr($updatedcheckinout->updated_at, 0, 10);
					$updatedTime = substr($updatedcheckinout->updated_at, 11);
					$updatedTime = intval(str_replace(":", "", $updatedTime));
					if($updatedAtDate === $specificDate && $updatedcheckinout->updated_at !== null && $updatedcheckinout->updated_at !== "") {
						$UpdatedCheckinout = $updatedcheckinout;
						break; // Break the loop after finding the most recent data for the specific date
					}
				}
			@endphp

			@if($latestCheckinout)
			@if($latestCheckinout->created_at === null || $latestCheckinout->created_at === "")
				<span class="triangle triangle-full">
			@elseif($latestCheckinout->Getstate() == null || $latestCheckinout->Getstate() == "")
				<span class="triangle triangle-full">
			@elseif ($latestCheckinout->Getstate() == 1) // Checking state of latestCheckinout
				@if (!is_null($createdTime)) // Checking if createdTime is not null
					@if ($createdTime > 074600) // Checking if createdTime is greater than 07:46:00
						<span class="triangle triangle-halfdown"></span>
						@php $d = $d + 0.5; @endphp // Incrementing $d by 0.5
					@else
						// Placeholder for else condition
					@endif
				@else
					<span class="triangle triangle-full"></span>
					@php $d++; @endphp
				@endif
			@elseif($latestCheckinout->Getstate() == 0)
				<span class="triangle triangle-no"></span>
			@elseif($latestCheckinout->Getstate() == 2)
				<span class="triangle triangle-full"></span>
				@php $d++; @endphp
			@else
				<span class="triangle triangle-halfup"></span>
				@php $d = $d + 0.5; @endphp
			@endif
		@else
			<span class="triangle triangle-full"></span>
			@php $d++; @endphp
		@endif
			<td style="text-align: center;">
			@php
				$specificDate = '2024-04-25'; // Change this to your specific date
				$latestCheckinout = null;
				$createdAtDate = null;
				$createdTime = null;
				$updatedCheckinout = null;
				$updatedTime = null;
				foreach($student->checkinout->sortByDesc('created_at') as $checkinout) {
					$createdAtDate = substr($checkinout->created_at, 0, 10);
					$createdTime = substr($checkinout->created_at, 11);
					$createdTime = intval(str_replace(":", "", $createdTime));
					if($createdAtDate === $specificDate) {
						$latestCheckinout = $checkinout;
						break; // Break the loop after finding the most recent data for the specific date
					}
				}

				foreach($student->checkinout->sortByDesc('updated_at') as $updatedcheckinout) {
					$updatedAtDate = substr($updatedcheckinout->updated_at, 0, 10);
					$updatedTime = substr($updatedcheckinout->updated_at, 11);
					$updatedTime = intval(str_replace(":", "", $updatedTime));
					if($updatedAtDate === $specificDate && $updatedcheckinout->updated_at !== null && $updatedcheckinout->updated_at !== "") {
						$UpdatedCheckinout = $updatedcheckinout;
						break; // Break the loop after finding the most recent data for the specific date
					}
				}
			@endphp

			@if($latestCheckinout)
			@if($latestCheckinout->created_at === null || $latestCheckinout->created_at === "")
				<span class="triangle triangle-full">
			@elseif($latestCheckinout->Getstate() == null || $latestCheckinout->Getstate() == "")
				<span class="triangle triangle-full">
			@elseif ($latestCheckinout->Getstate() == 1) // Checking state of latestCheckinout
				@if (!is_null($createdTime)) // Checking if createdTime is not null
					@if ($createdTime > 074600) // Checking if createdTime is greater than 07:46:00
						<span class="triangle triangle-halfdown"></span>
						@php $d = $d + 0.5; @endphp // Incrementing $d by 0.5
					@else
						// Placeholder for else condition
					@endif
				@else
					<span class="triangle triangle-full"></span>
					@php $d++; @endphp
				@endif
			@elseif($latestCheckinout->Getstate() == 0)
				<span class="triangle triangle-no"></span>
			@elseif($latestCheckinout->Getstate() == 2)
				<span class="triangle triangle-full"></span>
				@php $d++; @endphp
			@else
				<span class="triangle triangle-halfup"></span>
				@php $d = $d + 0.5; @endphp
			@endif
		@else
			<span class="triangle triangle-full"></span>
			@php $d++; @endphp
		@endif
			<td style="text-align: center;">
			@php
				$specificDate = '2024-04-26'; // Change this to your specific date
				$latestCheckinout = null;
				$createdAtDate = null;
				$createdTime = null;
				$updatedCheckinout = null;
				$updatedTime = null;
				foreach($student->checkinout->sortByDesc('created_at') as $checkinout) {
					$createdAtDate = substr($checkinout->created_at, 0, 10);
					$createdTime = substr($checkinout->created_at, 11);
					$createdTime = intval(str_replace(":", "", $createdTime));
					if($createdAtDate === $specificDate) {
						$latestCheckinout = $checkinout;
						break; // Break the loop after finding the most recent data for the specific date
					}
				}

				foreach($student->checkinout->sortByDesc('updated_at') as $updatedcheckinout) {
					$updatedAtDate = substr($updatedcheckinout->updated_at, 0, 10);
					$updatedTime = substr($updatedcheckinout->updated_at, 11);
					$updatedTime = intval(str_replace(":", "", $updatedTime));
					if($updatedAtDate === $specificDate && $updatedcheckinout->updated_at !== null && $updatedcheckinout->updated_at !== "") {
						$UpdatedCheckinout = $updatedcheckinout;
						break; // Break the loop after finding the most recent data for the specific date
					}
				}
			@endphp

			@if($latestCheckinout)
			@if($latestCheckinout->created_at === null || $latestCheckinout->created_at === "")
				<span class="triangle triangle-full">
			@elseif($latestCheckinout->Getstate() == null || $latestCheckinout->Getstate() == "")
				<span class="triangle triangle-full">
			@elseif ($latestCheckinout->Getstate() == 1) // Checking state of latestCheckinout
				@if (!is_null($createdTime)) // Checking if createdTime is not null
					@if ($createdTime > 074600) // Checking if createdTime is greater than 07:46:00
						<span class="triangle triangle-halfdown"></span>
						@php $d = $d + 0.5; @endphp // Incrementing $d by 0.5
					@else
						// Placeholder for else condition
					@endif
				@else
					<span class="triangle triangle-full"></span>
					@php $d++; @endphp
				@endif
			@elseif($latestCheckinout->Getstate() == 0)
				<span class="triangle triangle-no"></span>
			@elseif($latestCheckinout->Getstate() == 2)
				<span class="triangle triangle-full"></span>
				@php $d++; @endphp
			@else
				<span class="triangle triangle-halfup"></span>
				@php $d = $d + 0.5; @endphp
			@endif
		@else
			<span class="triangle triangle-full"></span>
			@php $d++; @endphp
		@endif
			<td style="text-align: center;">
			@php
				$specificDate = '2024-04-29'; // Change this to your specific date
				$latestCheckinout = null;
				$createdAtDate = null;
				$createdTime = null;
				$updatedCheckinout = null;
				$updatedTime = null;
				foreach($student->checkinout->sortByDesc('created_at') as $checkinout) {
					$createdAtDate = substr($checkinout->created_at, 0, 10);
					$createdTime = substr($checkinout->created_at, 11);
					$createdTime = intval(str_replace(":", "", $createdTime));
					if($createdAtDate === $specificDate) {
						$latestCheckinout = $checkinout;
						break; // Break the loop after finding the most recent data for the specific date
					}
				}

				foreach($student->checkinout->sortByDesc('updated_at') as $updatedcheckinout) {
					$updatedAtDate = substr($updatedcheckinout->updated_at, 0, 10);
					$updatedTime = substr($updatedcheckinout->updated_at, 11);
					$updatedTime = intval(str_replace(":", "", $updatedTime));
					if($updatedAtDate === $specificDate && $updatedcheckinout->updated_at !== null && $updatedcheckinout->updated_at !== "") {
						$UpdatedCheckinout = $updatedcheckinout;
						break; // Break the loop after finding the most recent data for the specific date
					}
				}
			@endphp

			@if($latestCheckinout)
			@if($latestCheckinout->created_at === null || $latestCheckinout->created_at === "")
				<span class="triangle triangle-full">
			@elseif($latestCheckinout->Getstate() == null || $latestCheckinout->Getstate() == "")
				<span class="triangle triangle-full">
			@elseif ($latestCheckinout->Getstate() == 1) // Checking state of latestCheckinout
				@if (!is_null($createdTime)) // Checking if createdTime is not null
					@if ($createdTime > 074600) // Checking if createdTime is greater than 07:46:00
						<span class="triangle triangle-halfdown"></span>
						@php $d = $d + 0.5; @endphp // Incrementing $d by 0.5
					@else
						// Placeholder for else condition
					@endif
				@else
					<span class="triangle triangle-full"></span>
					@php $d++; @endphp
				@endif
			@elseif($latestCheckinout->Getstate() == 0)
				<span class="triangle triangle-no"></span>
			@elseif($latestCheckinout->Getstate() == 2)
				<span class="triangle triangle-full"></span>
				@php $d++; @endphp
			@else
				<span class="triangle triangle-halfup"></span>
				@php $d = $d + 0.5; @endphp
			@endif
		@else
			<span class="triangle triangle-full"></span>
			@php $d++; @endphp
		@endif
			<td style="text-align: center;">
			@php
				$specificDate = '2024-04-30'; // Change this to your specific date
				$latestCheckinout = null;
				$createdAtDate = null;
				$createdTime = null;
				$updatedCheckinout = null;
				$updatedTime = null;
				foreach($student->checkinout->sortByDesc('created_at') as $checkinout) {
					$createdAtDate = substr($checkinout->created_at, 0, 10);
					$createdTime = substr($checkinout->created_at, 11);
					$createdTime = intval(str_replace(":", "", $createdTime));
					if($createdAtDate === $specificDate) {
						$latestCheckinout = $checkinout;
						break; // Break the loop after finding the most recent data for the specific date
					}
				}

				foreach($student->checkinout->sortByDesc('updated_at') as $updatedcheckinout) {
					$updatedAtDate = substr($updatedcheckinout->updated_at, 0, 10);
					$updatedTime = substr($updatedcheckinout->updated_at, 11);
					$updatedTime = intval(str_replace(":", "", $updatedTime));
					if($updatedAtDate === $specificDate && $updatedcheckinout->updated_at !== null && $updatedcheckinout->updated_at !== "") {
						$UpdatedCheckinout = $updatedcheckinout;
						break; // Break the loop after finding the most recent data for the specific date
					}
				}
			@endphp

			@if($latestCheckinout)
			@if($latestCheckinout->created_at === null || $latestCheckinout->created_at === "")
				<span class="triangle triangle-full">
			@elseif($latestCheckinout->Getstate() == null || $latestCheckinout->Getstate() == "")
				<span class="triangle triangle-full">
			@elseif ($latestCheckinout->Getstate() == 1) // Checking state of latestCheckinout
				@if (!is_null($createdTime)) // Checking if createdTime is not null
					@if ($createdTime > 074600) // Checking if createdTime is greater than 07:46:00
						<span class="triangle triangle-halfdown"></span>
						@php $d = $d + 0.5; @endphp // Incrementing $d by 0.5
					@else
						// Placeholder for else condition
					@endif
				@else
					<span class="triangle triangle-full"></span>
					@php $d++; @endphp
				@endif
			@elseif($latestCheckinout->Getstate() == 0)
				<span class="triangle triangle-no"></span>
			@elseif($latestCheckinout->Getstate() == 2)
				<span class="triangle triangle-full"></span>
				@php $d++; @endphp
			@else
				<span class="triangle triangle-halfup"></span>
				@php $d = $d + 0.5; @endphp
			@endif
		@else
			<span class="triangle triangle-full"></span>
			@php $d++; @endphp
		@endif
		<td></td>
		<td></td>
		<td></td>
		<td>{{$s-$d}}</td>
		<td>{{$d}}</td>
		@php $m = $i; @endphp
		@php $i++; @endphp
		@endforeach
	</tr>
		<tr height="25">
		<td align="right"><strong><?php echo $m; ?></strong></td>
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
	@php $s = 19; @endphp
	@php $i = 1; @endphp
	@foreach($students->where('gender', 'FEMALE') as $student)
	<tr height="25">
	@php $d = 0; @endphp
		<td align="right"><strong>{{ $loop->iteration }}</strong></td>
		<td  align="center"><strong><strong>{{ $student->getFullname() }}</strong></strong></td>
		<td style="text-align: center;">
			@php
				$specificDate = '2024-04-01'; // Change this to your specific date
				$latestCheckinout = null;
				$createdAtDate = null;
				$createdTime = null;
				$updatedCheckinout = null;
				$updatedTime = null;
				foreach($student->checkinout->sortByDesc('created_at') as $checkinout) {
					$createdAtDate = substr($checkinout->created_at, 0, 10);
					$createdTime = substr($checkinout->created_at, 11);
					$createdTime = intval(str_replace(":", "", $createdTime));
					if($createdAtDate === $specificDate) {
						$latestCheckinout = $checkinout;
						break; // Break the loop after finding the most recent data for the specific date
					}
				}

				foreach($student->checkinout->sortByDesc('updated_at') as $updatedcheckinout) {
					$updatedAtDate = substr($updatedcheckinout->updated_at, 0, 10);
					$updatedTime = substr($updatedcheckinout->updated_at, 11);
					$updatedTime = intval(str_replace(":", "", $updatedTime));
					if($updatedAtDate === $specificDate && $updatedcheckinout->updated_at !== null && $updatedcheckinout->updated_at !== "") {
						$UpdatedCheckinout = $updatedcheckinout;
						break; // Break the loop after finding the most recent data for the specific date
					}
				}
			@endphp

			@if($latestCheckinout)
			@if($latestCheckinout->created_at === null || $latestCheckinout->created_at === "")
				<span class="triangle triangle-full">
			@elseif($latestCheckinout->Getstate() == null || $latestCheckinout->Getstate() == "")
				<span class="triangle triangle-full">
			@elseif ($latestCheckinout->Getstate() == 1) // Checking state of latestCheckinout
				@if (!is_null($createdTime)) // Checking if createdTime is not null
					@if ($createdTime > 074600) // Checking if createdTime is greater than 07:46:00
						<span class="triangle triangle-halfdown"></span>
						@php $d = $d + 0.5; @endphp // Incrementing $d by 0.5
					@else
						// Placeholder for else condition
					@endif
				@else
					<span class="triangle triangle-full"></span>
					@php $d++; @endphp
				@endif
			@elseif($latestCheckinout->Getstate() == 0)
				<span class="triangle triangle-no"></span>
			@elseif($latestCheckinout->Getstate() == 2)
				<span class="triangle triangle-full"></span>
				@php $d++; @endphp
			@else
				<span class="triangle triangle-halfup"></span>
				@php $d = $d + 0.5; @endphp
			@endif
		@else
			<span class="triangle triangle-full"></span>
			@php $d++; @endphp
		@endif
		<td style="text-align: center;">
			@php
				$specificDate = '2024-04-02'; // Change this to your specific date
				$latestCheckinout = null;
				$createdAtDate = null;
				$createdTime = null;
				$updatedCheckinout = null;
				$updatedTime = null;
				foreach($student->checkinout->sortByDesc('created_at') as $checkinout) {
					$createdAtDate = substr($checkinout->created_at, 0, 10);
					$createdTime = substr($checkinout->created_at, 11);
					$createdTime = intval(str_replace(":", "", $createdTime));
					if($createdAtDate === $specificDate) {
						$latestCheckinout = $checkinout;
						break; // Break the loop after finding the most recent data for the specific date
					}
				}

				foreach($student->checkinout->sortByDesc('updated_at') as $updatedcheckinout) {
					$updatedAtDate = substr($updatedcheckinout->updated_at, 0, 10);
					$updatedTime = substr($updatedcheckinout->updated_at, 11);
					$updatedTime = intval(str_replace(":", "", $updatedTime));
					if($updatedAtDate === $specificDate && $updatedcheckinout->updated_at !== null && $updatedcheckinout->updated_at !== "") {
						$UpdatedCheckinout = $updatedcheckinout;
						break; // Break the loop after finding the most recent data for the specific date
					}
				}
			@endphp

			@if($latestCheckinout)
			@if($latestCheckinout->created_at === null || $latestCheckinout->created_at === "")
				<span class="triangle triangle-full">
			@elseif($latestCheckinout->Getstate() == null || $latestCheckinout->Getstate() == "")
				<span class="triangle triangle-full">
			@elseif ($latestCheckinout->Getstate() == 1) // Checking state of latestCheckinout
				@if (!is_null($createdTime)) // Checking if createdTime is not null
					@if ($createdTime > 074600) // Checking if createdTime is greater than 07:46:00
						<span class="triangle triangle-halfdown"></span>
						@php $d = $d + 0.5; @endphp // Incrementing $d by 0.5
					@else
						// Placeholder for else condition
					@endif
				@else
					<span class="triangle triangle-full"></span>
					@php $d++; @endphp
				@endif
			@elseif($latestCheckinout->Getstate() == 0)
				<span class="triangle triangle-no"></span>
			@elseif($latestCheckinout->Getstate() == 2)
				<span class="triangle triangle-full"></span>
				@php $d++; @endphp
			@else
				<span class="triangle triangle-halfup"></span>
				@php $d = $d + 0.5; @endphp
			@endif
		@else
			<span class="triangle triangle-full"></span>
			@php $d++; @endphp
		@endif
			<td style="text-align: center;">
			@php
				$specificDate = '2024-04-03'; // Change this to your specific date
				$latestCheckinout = null;
				$createdAtDate = null;
				$createdTime = null;
				$updatedCheckinout = null;
				$updatedTime = null;
				foreach($student->checkinout->sortByDesc('created_at') as $checkinout) {
					$createdAtDate = substr($checkinout->created_at, 0, 10);
					$createdTime = substr($checkinout->created_at, 11);
					$createdTime = intval(str_replace(":", "", $createdTime));
					if($createdAtDate === $specificDate) {
						$latestCheckinout = $checkinout;
						break; // Break the loop after finding the most recent data for the specific date
					}
				}

				foreach($student->checkinout->sortByDesc('updated_at') as $updatedcheckinout) {
					$updatedAtDate = substr($updatedcheckinout->updated_at, 0, 10);
					$updatedTime = substr($updatedcheckinout->updated_at, 11);
					$updatedTime = intval(str_replace(":", "", $updatedTime));
					if($updatedAtDate === $specificDate && $updatedcheckinout->updated_at !== null && $updatedcheckinout->updated_at !== "") {
						$UpdatedCheckinout = $updatedcheckinout;
						break; // Break the loop after finding the most recent data for the specific date
					}
				}
			@endphp

			@if($latestCheckinout)
			@if($latestCheckinout->created_at === null || $latestCheckinout->created_at === "")
				<span class="triangle triangle-full">
			@elseif($latestCheckinout->Getstate() == null || $latestCheckinout->Getstate() == "")
				<span class="triangle triangle-full">
			@elseif ($latestCheckinout->Getstate() == 1) // Checking state of latestCheckinout
				@if (!is_null($createdTime)) // Checking if createdTime is not null
					@if ($createdTime > 074600) // Checking if createdTime is greater than 07:46:00
						<span class="triangle triangle-halfdown"></span>
						@php $d = $d + 0.5; @endphp // Incrementing $d by 0.5
					@else
						// Placeholder for else condition
					@endif
				@else
					<span class="triangle triangle-full"></span>
					@php $d++; @endphp
				@endif
			@elseif($latestCheckinout->Getstate() == 0)
				<span class="triangle triangle-no"></span>
			@elseif($latestCheckinout->Getstate() == 2)
				<span class="triangle triangle-full"></span>
				@php $d++; @endphp
			@else
				<span class="triangle triangle-halfup"></span>
				@php $d = $d + 0.5; @endphp
			@endif
		@else
			<span class="triangle triangle-full"></span>
			@php $d++; @endphp
		@endif
			<td style="text-align: center;">
			@php
				$specificDate = '2024-04-04'; // Change this to your specific date
				$latestCheckinout = null;
				$createdAtDate = null;
				$createdTime = null;
				$updatedCheckinout = null;
				$updatedTime = null;
				foreach($student->checkinout->sortByDesc('created_at') as $checkinout) {
					$createdAtDate = substr($checkinout->created_at, 0, 10);
					$createdTime = substr($checkinout->created_at, 11);
					$createdTime = intval(str_replace(":", "", $createdTime));
					if($createdAtDate === $specificDate) {
						$latestCheckinout = $checkinout;
						break; // Break the loop after finding the most recent data for the specific date
					}
				}

				foreach($student->checkinout->sortByDesc('updated_at') as $updatedcheckinout) {
					$updatedAtDate = substr($updatedcheckinout->updated_at, 0, 10);
					$updatedTime = substr($updatedcheckinout->updated_at, 11);
					$updatedTime = intval(str_replace(":", "", $updatedTime));
					if($updatedAtDate === $specificDate && $updatedcheckinout->updated_at !== null && $updatedcheckinout->updated_at !== "") {
						$UpdatedCheckinout = $updatedcheckinout;
						break; // Break the loop after finding the most recent data for the specific date
					}
				}
			@endphp

			@if($latestCheckinout)
			@if($latestCheckinout->created_at === null || $latestCheckinout->created_at === "")
				<span class="triangle triangle-full">
			@elseif($latestCheckinout->Getstate() == null || $latestCheckinout->Getstate() == "")
				<span class="triangle triangle-full">
			@elseif ($latestCheckinout->Getstate() == 1) // Checking state of latestCheckinout
				@if (!is_null($createdTime)) // Checking if createdTime is not null
					@if ($createdTime > 074600) // Checking if createdTime is greater than 07:46:00
						<span class="triangle triangle-halfdown"></span>
						@php $d = $d + 0.5; @endphp // Incrementing $d by 0.5
					@else
						// Placeholder for else condition
					@endif
				@else
					<span class="triangle triangle-full"></span>
					@php $d++; @endphp
				@endif
			@elseif($latestCheckinout->Getstate() == 0)
				<span class="triangle triangle-no"></span>
			@elseif($latestCheckinout->Getstate() == 2)
				<span class="triangle triangle-full"></span>
				@php $d++; @endphp
			@else
				<span class="triangle triangle-halfup"></span>
				@php $d = $d + 0.5; @endphp
			@endif
		@else
			<span class="triangle triangle-full"></span>
			@php $d++; @endphp
		@endif
			<td style="text-align: center;">
			@php
				$specificDate = '2024-04-05'; // Change this to your specific date
				$latestCheckinout = null;
				$createdAtDate = null;
				$createdTime = null;
				$updatedCheckinout = null;
				$updatedTime = null;
				foreach($student->checkinout->sortByDesc('created_at') as $checkinout) {
					$createdAtDate = substr($checkinout->created_at, 0, 10);
					$createdTime = substr($checkinout->created_at, 11);
					$createdTime = intval(str_replace(":", "", $createdTime));
					if($createdAtDate === $specificDate) {
						$latestCheckinout = $checkinout;
						break; // Break the loop after finding the most recent data for the specific date
					}
				}

				foreach($student->checkinout->sortByDesc('updated_at') as $updatedcheckinout) {
					$updatedAtDate = substr($updatedcheckinout->updated_at, 0, 10);
					$updatedTime = substr($updatedcheckinout->updated_at, 11);
					$updatedTime = intval(str_replace(":", "", $updatedTime));
					if($updatedAtDate === $specificDate && $updatedcheckinout->updated_at !== null && $updatedcheckinout->updated_at !== "") {
						$UpdatedCheckinout = $updatedcheckinout;
						break; // Break the loop after finding the most recent data for the specific date
					}
				}
			@endphp

			@if($latestCheckinout)
			@if($latestCheckinout->created_at === null || $latestCheckinout->created_at === "")
				<span class="triangle triangle-full">
			@elseif($latestCheckinout->Getstate() == null || $latestCheckinout->Getstate() == "")
				<span class="triangle triangle-full">
			@elseif ($latestCheckinout->Getstate() == 1) // Checking state of latestCheckinout
				@if (!is_null($createdTime)) // Checking if createdTime is not null
					@if ($createdTime > 074600) // Checking if createdTime is greater than 07:46:00
						<span class="triangle triangle-halfdown"></span>
						@php $d = $d + 0.5; @endphp // Incrementing $d by 0.5
					@else
						// Placeholder for else condition
					@endif
				@else
					<span class="triangle triangle-full"></span>
					@php $d++; @endphp
				@endif
			@elseif($latestCheckinout->Getstate() == 0)
				<span class="triangle triangle-no"></span>
			@elseif($latestCheckinout->Getstate() == 2)
				<span class="triangle triangle-full"></span>
				@php $d++; @endphp
			@else
				<span class="triangle triangle-halfup"></span>
				@php $d = $d + 0.5; @endphp
			@endif
		@else
			<span class="triangle triangle-full"></span>
			@php $d++; @endphp
		@endif
			<td style="text-align: center;">
			<!--
			@php
				$specificDate = '2024-04-08'; // Change this to your specific date
				$latestCheckinout = null;
				$createdAtDate = null;
				$createdTime = null;
				$updatedCheckinout = null;
				$updatedTime = null;
				foreach($student->checkinout->sortByDesc('created_at') as $checkinout) {
					$createdAtDate = substr($checkinout->created_at, 0, 10);
					$createdTime = substr($checkinout->created_at, 11);
					$createdTime = intval(str_replace(":", "", $createdTime));
					if($createdAtDate === $specificDate) {
						$latestCheckinout = $checkinout;
						break; // Break the loop after finding the most recent data for the specific date
					}
				}

				foreach($student->checkinout->sortByDesc('updated_at') as $updatedcheckinout) {
					$updatedAtDate = substr($updatedcheckinout->updated_at, 0, 10);
					$updatedTime = substr($updatedcheckinout->updated_at, 11);
					$updatedTime = intval(str_replace(":", "", $updatedTime));
					if($updatedAtDate === $specificDate && $updatedcheckinout->updated_at !== null && $updatedcheckinout->updated_at !== "") {
						$UpdatedCheckinout = $updatedcheckinout;
						break; // Break the loop after finding the most recent data for the specific date
					}
				}
			@endphp

			@if($latestCheckinout)
			@if($latestCheckinout->created_at === null || $latestCheckinout->created_at === "")
				<span class="triangle triangle-full">
			@elseif($latestCheckinout->Getstate() == null || $latestCheckinout->Getstate() == "")
			<span class="triangle triangle-full">
			@elseif($latestCheckinout->Getstate() == 1)
				<span class="triangle triangle-halfdown"></span>
			@elseif($latestCheckinout->Getstate() == 0)
				<span class="triangle triangle-no"></span>
			@elseif($latestCheckinout->Getstate() == 2)
				<span class="triangle triangle-full"></span>
			@else
				<span class="triangle triangle-halfup"></span>
			@endif
		@else
			<span class="triangle triangle-full"></span>
		@endif -->
	</td>
			<td style="text-align: center;">
			<!--
			@php
				$specificDate = '2024-04-09'; // Change this to your specific date
				$latestCheckinout = null;
				$createdAtDate = null;
				$createdTime = null;
				$updatedCheckinout = null;
				$updatedTime = null;
				foreach($student->checkinout->sortByDesc('created_at') as $checkinout) {
					$createdAtDate = substr($checkinout->created_at, 0, 10);
					$createdTime = substr($checkinout->created_at, 11);
					$createdTime = intval(str_replace(":", "", $createdTime));
					if($createdAtDate === $specificDate) {
						$latestCheckinout = $checkinout;
						break; // Break the loop after finding the most recent data for the specific date
					}
				}

				foreach($student->checkinout->sortByDesc('updated_at') as $updatedcheckinout) {
					$updatedAtDate = substr($updatedcheckinout->updated_at, 0, 10);
					$updatedTime = substr($updatedcheckinout->updated_at, 11);
					$updatedTime = intval(str_replace(":", "", $updatedTime));
					if($updatedAtDate === $specificDate && $updatedcheckinout->updated_at !== null && $updatedcheckinout->updated_at !== "") {
						$UpdatedCheckinout = $updatedcheckinout;
						break; // Break the loop after finding the most recent data for the specific date
					}
				}
			@endphp

			@if($latestCheckinout)
			@if($latestCheckinout->created_at === null || $latestCheckinout->created_at === "")
				<span class="triangle triangle-full">
			@elseif($latestCheckinout->Getstate() == null || $latestCheckinout->Getstate() == "")
			<span class="triangle triangle-full">
			@elseif($latestCheckinout->Getstate() == 1)
				<span class="triangle triangle-halfdown"></span>
			@elseif($latestCheckinout->Getstate() == 0)
				<span class="triangle triangle-no"></span>
			@elseif($latestCheckinout->Getstate() == 2)
				<span class="triangle triangle-full"></span>
			@else
				<span class="triangle triangle-halfup"></span>
			@endif
		@else
			<span class="triangle triangle-full"></span>
		@endif -->
	</td>
			<td style="text-align: center;">
			<!--
			@php
				$specificDate = '2024-04-10'; // Change this to your specific date
				$latestCheckinout = null;
				$createdAtDate = null;
				$createdTime = null;
				$updatedCheckinout = null;
				$updatedTime = null;
				foreach($student->checkinout->sortByDesc('created_at') as $checkinout) {
					$createdAtDate = substr($checkinout->created_at, 0, 10);
					$createdTime = substr($checkinout->created_at, 11);
					$createdTime = intval(str_replace(":", "", $createdTime));
					if($createdAtDate === $specificDate) {
						$latestCheckinout = $checkinout;
						break; // Break the loop after finding the most recent data for the specific date
					}
				}

				foreach($student->checkinout->sortByDesc('updated_at') as $updatedcheckinout) {
					$updatedAtDate = substr($updatedcheckinout->updated_at, 0, 10);
					$updatedTime = substr($updatedcheckinout->updated_at, 11);
					$updatedTime = intval(str_replace(":", "", $updatedTime));
					if($updatedAtDate === $specificDate && $updatedcheckinout->updated_at !== null && $updatedcheckinout->updated_at !== "") {
						$UpdatedCheckinout = $updatedcheckinout;
						break; // Break the loop after finding the most recent data for the specific date
					}
				}
			@endphp

			@if($latestCheckinout)
			@if($latestCheckinout->created_at === null || $latestCheckinout->created_at === "")
				<span class="triangle triangle-full">
			@elseif($latestCheckinout->Getstate() == null || $latestCheckinout->Getstate() == "")
			<span class="triangle triangle-full">
			@elseif($latestCheckinout->Getstate() == 1)
				<span class="triangle triangle-halfdown"></span>
			@elseif($latestCheckinout->Getstate() == 0)
				<span class="triangle triangle-no"></span>
			@elseif($latestCheckinout->Getstate() == 2)
				<span class="triangle triangle-full"></span>
			@else
				<span class="triangle triangle-halfup"></span>
			@endif
		@else
			<span class="triangle triangle-full"></span>
		@endif -->
	</td>
			<td style="text-align: center;">
			@php
				$specificDate = '2024-04-11'; // Change this to your specific date
				$latestCheckinout = null;
				$createdAtDate = null;
				$createdTime = null;
				$updatedCheckinout = null;
				$updatedTime = null;
				foreach($student->checkinout->sortByDesc('created_at') as $checkinout) {
					$createdAtDate = substr($checkinout->created_at, 0, 10);
					$createdTime = substr($checkinout->created_at, 11);
					$createdTime = intval(str_replace(":", "", $createdTime));
					if($createdAtDate === $specificDate) {
						$latestCheckinout = $checkinout;
						break; // Break the loop after finding the most recent data for the specific date
					}
				}

				foreach($student->checkinout->sortByDesc('updated_at') as $updatedcheckinout) {
					$updatedAtDate = substr($updatedcheckinout->updated_at, 0, 10);
					$updatedTime = substr($updatedcheckinout->updated_at, 11);
					$updatedTime = intval(str_replace(":", "", $updatedTime));
					if($updatedAtDate === $specificDate && $updatedcheckinout->updated_at !== null && $updatedcheckinout->updated_at !== "") {
						$UpdatedCheckinout = $updatedcheckinout;
						break; // Break the loop after finding the most recent data for the specific date
					}
				}
			@endphp

			@if($latestCheckinout)
			@if($latestCheckinout->created_at === null || $latestCheckinout->created_at === "")
				<span class="triangle triangle-full">
			@elseif($latestCheckinout->Getstate() == null || $latestCheckinout->Getstate() == "")
				<span class="triangle triangle-full">
			@elseif ($latestCheckinout->Getstate() == 1) // Checking state of latestCheckinout
				@if (!is_null($createdTime)) // Checking if createdTime is not null
					@if ($createdTime > 074600) // Checking if createdTime is greater than 07:46:00
						<span class="triangle triangle-halfdown"></span>
						@php $d = $d + 0.5; @endphp // Incrementing $d by 0.5
					@else
						// Placeholder for else condition
					@endif
				@else
					<span class="triangle triangle-full"></span>
					@php $d++; @endphp
				@endif
			@elseif($latestCheckinout->Getstate() == 0)
				<span class="triangle triangle-no"></span>
			@elseif($latestCheckinout->Getstate() == 2)
				<span class="triangle triangle-full"></span>
				@php $d++; @endphp
			@else
				<span class="triangle triangle-halfup"></span>
				@php $d = $d + 0.5; @endphp
			@endif
		@else
			<span class="triangle triangle-full"></span>
			@php $d++; @endphp
		@endif
			<td style="text-align: center;">
			@php
				$specificDate = '2024-04-12'; // Change this to your specific date
				$latestCheckinout = null;
				$createdAtDate = null;
				$createdTime = null;
				$updatedCheckinout = null;
				$updatedTime = null;
				foreach($student->checkinout->sortByDesc('created_at') as $checkinout) {
					$createdAtDate = substr($checkinout->created_at, 0, 10);
					$createdTime = substr($checkinout->created_at, 11);
					$createdTime = intval(str_replace(":", "", $createdTime));
					if($createdAtDate === $specificDate) {
						$latestCheckinout = $checkinout;
						break; // Break the loop after finding the most recent data for the specific date
					}
				}

				foreach($student->checkinout->sortByDesc('updated_at') as $updatedcheckinout) {
					$updatedAtDate = substr($updatedcheckinout->updated_at, 0, 10);
					$updatedTime = substr($updatedcheckinout->updated_at, 11);
					$updatedTime = intval(str_replace(":", "", $updatedTime));
					if($updatedAtDate === $specificDate && $updatedcheckinout->updated_at !== null && $updatedcheckinout->updated_at !== "") {
						$UpdatedCheckinout = $updatedcheckinout;
						break; // Break the loop after finding the most recent data for the specific date
					}
				}
			@endphp

			@if($latestCheckinout)
			@if($latestCheckinout->created_at === null || $latestCheckinout->created_at === "")
				<span class="triangle triangle-full">
			@elseif($latestCheckinout->Getstate() == null || $latestCheckinout->Getstate() == "")
				<span class="triangle triangle-full">
			@elseif ($latestCheckinout->Getstate() == 1) // Checking state of latestCheckinout
				@if (!is_null($createdTime)) // Checking if createdTime is not null
					@if ($createdTime > 074600) // Checking if createdTime is greater than 07:46:00
						<span class="triangle triangle-halfdown"></span>
						@php $d = $d + 0.5; @endphp // Incrementing $d by 0.5
					@else
						// Placeholder for else condition
					@endif
				@else
					<span class="triangle triangle-full"></span>
					@php $d++; @endphp
				@endif
			@elseif($latestCheckinout->Getstate() == 0)
				<span class="triangle triangle-no"></span>
			@elseif($latestCheckinout->Getstate() == 2)
				<span class="triangle triangle-full"></span>
				@php $d++; @endphp
			@else
				<span class="triangle triangle-halfup"></span>
				@php $d = $d + 0.5; @endphp
			@endif
		@else
			<span class="triangle triangle-full"></span>
			@php $d++; @endphp
		@endif
			<td style="text-align: center;">
			@php
				$specificDate = '2024-04-15'; // Change this to your specific date
				$latestCheckinout = null;
				$createdAtDate = null;
				$createdTime = null;
				$updatedCheckinout = null;
				$updatedTime = null;
				foreach($student->checkinout->sortByDesc('created_at') as $checkinout) {
					$createdAtDate = substr($checkinout->created_at, 0, 10);
					$createdTime = substr($checkinout->created_at, 11);
					$createdTime = intval(str_replace(":", "", $createdTime));
					if($createdAtDate === $specificDate) {
						$latestCheckinout = $checkinout;
						break; // Break the loop after finding the most recent data for the specific date
					}
				}

				foreach($student->checkinout->sortByDesc('updated_at') as $updatedcheckinout) {
					$updatedAtDate = substr($updatedcheckinout->updated_at, 0, 10);
					$updatedTime = substr($updatedcheckinout->updated_at, 11);
					$updatedTime = intval(str_replace(":", "", $updatedTime));
					if($updatedAtDate === $specificDate && $updatedcheckinout->updated_at !== null && $updatedcheckinout->updated_at !== "") {
						$UpdatedCheckinout = $updatedcheckinout;
						break; // Break the loop after finding the most recent data for the specific date
					}
				}
			@endphp

			@if($latestCheckinout)
			@if($latestCheckinout->created_at === null || $latestCheckinout->created_at === "")
				<span class="triangle triangle-full">
			@elseif($latestCheckinout->Getstate() == null || $latestCheckinout->Getstate() == "")
				<span class="triangle triangle-full">
			@elseif ($latestCheckinout->Getstate() == 1) // Checking state of latestCheckinout
				@if (!is_null($createdTime)) // Checking if createdTime is not null
					@if ($createdTime > 074600) // Checking if createdTime is greater than 07:46:00
						<span class="triangle triangle-halfdown"></span>
						@php $d = $d + 0.5; @endphp // Incrementing $d by 0.5
					@else
						// Placeholder for else condition
					@endif
				@else
					<span class="triangle triangle-full"></span>
					@php $d++; @endphp
				@endif
			@elseif($latestCheckinout->Getstate() == 0)
				<span class="triangle triangle-no"></span>
			@elseif($latestCheckinout->Getstate() == 2)
				<span class="triangle triangle-full"></span>
				@php $d++; @endphp
			@else
				<span class="triangle triangle-halfup"></span>
				@php $d = $d + 0.5; @endphp
			@endif
		@else
			<span class="triangle triangle-full"></span>
			@php $d++; @endphp
		@endif
			<td style="text-align: center;">
			@php
				$specificDate = '2024-04-16'; // Change this to your specific date
				$latestCheckinout = null;
				$createdAtDate = null;
				$createdTime = null;
				$updatedCheckinout = null;
				$updatedTime = null;
				foreach($student->checkinout->sortByDesc('created_at') as $checkinout) {
					$createdAtDate = substr($checkinout->created_at, 0, 10);
					$createdTime = substr($checkinout->created_at, 11);
					$createdTime = intval(str_replace(":", "", $createdTime));
					if($createdAtDate === $specificDate) {
						$latestCheckinout = $checkinout;
						break; // Break the loop after finding the most recent data for the specific date
					}
				}

				foreach($student->checkinout->sortByDesc('updated_at') as $updatedcheckinout) {
					$updatedAtDate = substr($updatedcheckinout->updated_at, 0, 10);
					$updatedTime = substr($updatedcheckinout->updated_at, 11);
					$updatedTime = intval(str_replace(":", "", $updatedTime));
					if($updatedAtDate === $specificDate && $updatedcheckinout->updated_at !== null && $updatedcheckinout->updated_at !== "") {
						$UpdatedCheckinout = $updatedcheckinout;
						break; // Break the loop after finding the most recent data for the specific date
					}
				}
			@endphp

			@if($latestCheckinout)
			@if($latestCheckinout->created_at === null || $latestCheckinout->created_at === "")
				<span class="triangle triangle-full">
			@elseif($latestCheckinout->Getstate() == null || $latestCheckinout->Getstate() == "")
				<span class="triangle triangle-full">
			@elseif ($latestCheckinout->Getstate() == 1) // Checking state of latestCheckinout
				@if (!is_null($createdTime)) // Checking if createdTime is not null
					@if ($createdTime > 074600) // Checking if createdTime is greater than 07:46:00
						<span class="triangle triangle-halfdown"></span>
						@php $d = $d + 0.5; @endphp // Incrementing $d by 0.5
					@else
						// Placeholder for else condition
					@endif
				@else
					<span class="triangle triangle-full"></span>
					@php $d++; @endphp
				@endif
			@elseif($latestCheckinout->Getstate() == 0)
				<span class="triangle triangle-no"></span>
			@elseif($latestCheckinout->Getstate() == 2)
				<span class="triangle triangle-full"></span>
				@php $d++; @endphp
			@else
				<span class="triangle triangle-halfup"></span>
				@php $d = $d + 0.5; @endphp
			@endif
		@else
			<span class="triangle triangle-full"></span>
			@php $d++; @endphp
		@endif
			<td style="text-align: center;">
			@php
				$specificDate = '2024-04-17'; // Change this to your specific date
				$latestCheckinout = null;
				$createdAtDate = null;
				$createdTime = null;
				$updatedCheckinout = null;
				$updatedTime = null;
				foreach($student->checkinout->sortByDesc('created_at') as $checkinout) {
					$createdAtDate = substr($checkinout->created_at, 0, 10);
					$createdTime = substr($checkinout->created_at, 11);
					$createdTime = intval(str_replace(":", "", $createdTime));
					if($createdAtDate === $specificDate) {
						$latestCheckinout = $checkinout;
						break; // Break the loop after finding the most recent data for the specific date
					}
				}

				foreach($student->checkinout->sortByDesc('updated_at') as $updatedcheckinout) {
					$updatedAtDate = substr($updatedcheckinout->updated_at, 0, 10);
					$updatedTime = substr($updatedcheckinout->updated_at, 11);
					$updatedTime = intval(str_replace(":", "", $updatedTime));
					if($updatedAtDate === $specificDate && $updatedcheckinout->updated_at !== null && $updatedcheckinout->updated_at !== "") {
						$UpdatedCheckinout = $updatedcheckinout;
						break; // Break the loop after finding the most recent data for the specific date
					}
				}
			@endphp

			@if($latestCheckinout)
			@if($latestCheckinout->created_at === null || $latestCheckinout->created_at === "")
				<span class="triangle triangle-full">
			@elseif($latestCheckinout->Getstate() == null || $latestCheckinout->Getstate() == "")
				<span class="triangle triangle-full">
			@elseif ($latestCheckinout->Getstate() == 1) // Checking state of latestCheckinout
				@if (!is_null($createdTime)) // Checking if createdTime is not null
					@if ($createdTime > 074600) // Checking if createdTime is greater than 07:46:00
						<span class="triangle triangle-halfdown"></span>
						@php $d = $d + 0.5; @endphp // Incrementing $d by 0.5
					@else
						// Placeholder for else condition
					@endif
				@else
					<span class="triangle triangle-full"></span>
					@php $d++; @endphp
				@endif
			@elseif($latestCheckinout->Getstate() == 0)
				<span class="triangle triangle-no"></span>
			@elseif($latestCheckinout->Getstate() == 2)
				<span class="triangle triangle-full"></span>
				@php $d++; @endphp
			@else
				<span class="triangle triangle-halfup"></span>
				@php $d = $d + 0.5; @endphp
			@endif
		@else
			<span class="triangle triangle-full"></span>
			@php $d++; @endphp
		@endif
			<td style="text-align: center;">
			@php
				$specificDate = '2024-04-18'; // Change this to your specific date
				$latestCheckinout = null;
				$createdAtDate = null;
				$createdTime = null;
				$updatedCheckinout = null;
				$updatedTime = null;
				foreach($student->checkinout->sortByDesc('created_at') as $checkinout) {
					$createdAtDate = substr($checkinout->created_at, 0, 10);
					$createdTime = substr($checkinout->created_at, 11);
					$createdTime = intval(str_replace(":", "", $createdTime));
					if($createdAtDate === $specificDate) {
						$latestCheckinout = $checkinout;
						break; // Break the loop after finding the most recent data for the specific date
					}
				}

				foreach($student->checkinout->sortByDesc('updated_at') as $updatedcheckinout) {
					$updatedAtDate = substr($updatedcheckinout->updated_at, 0, 10);
					$updatedTime = substr($updatedcheckinout->updated_at, 11);
					$updatedTime = intval(str_replace(":", "", $updatedTime));
					if($updatedAtDate === $specificDate && $updatedcheckinout->updated_at !== null && $updatedcheckinout->updated_at !== "") {
						$UpdatedCheckinout = $updatedcheckinout;
						break; // Break the loop after finding the most recent data for the specific date
					}
				}
			@endphp

			@if($latestCheckinout)
			@if($latestCheckinout->created_at === null || $latestCheckinout->created_at === "")
				<span class="triangle triangle-full">
			@elseif($latestCheckinout->Getstate() == null || $latestCheckinout->Getstate() == "")
				<span class="triangle triangle-full">
			@elseif ($latestCheckinout->Getstate() == 1) // Checking state of latestCheckinout
				@if (!is_null($createdTime)) // Checking if createdTime is not null
					@if ($createdTime > 074600) // Checking if createdTime is greater than 07:46:00
						<span class="triangle triangle-halfdown"></span>
						@php $d = $d + 0.5; @endphp // Incrementing $d by 0.5
					@else
						// Placeholder for else condition
					@endif
				@else
					<span class="triangle triangle-full"></span>
					@php $d++; @endphp
				@endif
			@elseif($latestCheckinout->Getstate() == 0)
				<span class="triangle triangle-no"></span>
			@elseif($latestCheckinout->Getstate() == 2)
				<span class="triangle triangle-full"></span>
				@php $d++; @endphp
			@else
				<span class="triangle triangle-halfup"></span>
				@php $d = $d + 0.5; @endphp
			@endif
		@else
			<span class="triangle triangle-full"></span>
			@php $d++; @endphp
		@endif
			<td style="text-align: center;">
			@php
				$specificDate = '2024-04-19'; // Change this to your specific date
				$latestCheckinout = null;
				$createdAtDate = null;
				$createdTime = null;
				$updatedCheckinout = null;
				$updatedTime = null;
				foreach($student->checkinout->sortByDesc('created_at') as $checkinout) {
					$createdAtDate = substr($checkinout->created_at, 0, 10);
					$createdTime = substr($checkinout->created_at, 11);
					$createdTime = intval(str_replace(":", "", $createdTime));
					if($createdAtDate === $specificDate) {
						$latestCheckinout = $checkinout;
						break; // Break the loop after finding the most recent data for the specific date
					}
				}

				foreach($student->checkinout->sortByDesc('updated_at') as $updatedcheckinout) {
					$updatedAtDate = substr($updatedcheckinout->updated_at, 0, 10);
					$updatedTime = substr($updatedcheckinout->updated_at, 11);
					$updatedTime = intval(str_replace(":", "", $updatedTime));
					if($updatedAtDate === $specificDate && $updatedcheckinout->updated_at !== null && $updatedcheckinout->updated_at !== "") {
						$UpdatedCheckinout = $updatedcheckinout;
						break; // Break the loop after finding the most recent data for the specific date
					}
				}
			@endphp

			@if($latestCheckinout)
			@if($latestCheckinout->created_at === null || $latestCheckinout->created_at === "")
				<span class="triangle triangle-full">
			@elseif($latestCheckinout->Getstate() == null || $latestCheckinout->Getstate() == "")
				<span class="triangle triangle-full">
			@elseif ($latestCheckinout->Getstate() == 1) // Checking state of latestCheckinout
				@if (!is_null($createdTime)) // Checking if createdTime is not null
					@if ($createdTime > 074600) // Checking if createdTime is greater than 07:46:00
						<span class="triangle triangle-halfdown"></span>
						@php $d = $d + 0.5; @endphp // Incrementing $d by 0.5
					@else
						// Placeholder for else condition
					@endif
				@else
					<span class="triangle triangle-full"></span>
					@php $d++; @endphp
				@endif
			@elseif($latestCheckinout->Getstate() == 0)
				<span class="triangle triangle-no"></span>
			@elseif($latestCheckinout->Getstate() == 2)
				<span class="triangle triangle-full"></span>
				@php $d++; @endphp
			@else
				<span class="triangle triangle-halfup"></span>
				@php $d = $d + 0.5; @endphp
			@endif
		@else
			<span class="triangle triangle-full"></span>
			@php $d++; @endphp
		@endif
			<td style="text-align: center;">
			@php
				$specificDate = '2024-04-22'; // Change this to your specific date
				$latestCheckinout = null;
				$createdAtDate = null;
				$createdTime = null;
				$updatedCheckinout = null;
				$updatedTime = null;
				foreach($student->checkinout->sortByDesc('created_at') as $checkinout) {
					$createdAtDate = substr($checkinout->created_at, 0, 10);
					$createdTime = substr($checkinout->created_at, 11);
					$createdTime = intval(str_replace(":", "", $createdTime));
					if($createdAtDate === $specificDate) {
						$latestCheckinout = $checkinout;
						break; // Break the loop after finding the most recent data for the specific date
					}
				}

				foreach($student->checkinout->sortByDesc('updated_at') as $updatedcheckinout) {
					$updatedAtDate = substr($updatedcheckinout->updated_at, 0, 10);
					$updatedTime = substr($updatedcheckinout->updated_at, 11);
					$updatedTime = intval(str_replace(":", "", $updatedTime));
					if($updatedAtDate === $specificDate && $updatedcheckinout->updated_at !== null && $updatedcheckinout->updated_at !== "") {
						$UpdatedCheckinout = $updatedcheckinout;
						break; // Break the loop after finding the most recent data for the specific date
					}
				}
			@endphp

			@if($latestCheckinout)
			@if($latestCheckinout->created_at === null || $latestCheckinout->created_at === "")
				<span class="triangle triangle-full">
			@elseif($latestCheckinout->Getstate() == null || $latestCheckinout->Getstate() == "")
				<span class="triangle triangle-full">
			@elseif ($latestCheckinout->Getstate() == 1) // Checking state of latestCheckinout
				@if (!is_null($createdTime)) // Checking if createdTime is not null
					@if ($createdTime > 074600) // Checking if createdTime is greater than 07:46:00
						<span class="triangle triangle-halfdown"></span>
						@php $d = $d + 0.5; @endphp // Incrementing $d by 0.5
					@else
						// Placeholder for else condition
					@endif
				@else
					<span class="triangle triangle-full"></span>
					@php $d++; @endphp
				@endif
			@elseif($latestCheckinout->Getstate() == 0)
				<span class="triangle triangle-no"></span>
			@elseif($latestCheckinout->Getstate() == 2)
				<span class="triangle triangle-full"></span>
				@php $d++; @endphp
			@else
				<span class="triangle triangle-halfup"></span>
				@php $d = $d + 0.5; @endphp
			@endif
		@else
			<span class="triangle triangle-full"></span>
			@php $d++; @endphp
		@endif
			<td style="text-align: center;">
			@php
				$specificDate = '2024-04-23'; // Change this to your specific date
				$latestCheckinout = null;
				$createdAtDate = null;
				$createdTime = null;
				$updatedCheckinout = null;
				$updatedTime = null;
				foreach($student->checkinout->sortByDesc('created_at') as $checkinout) {
					$createdAtDate = substr($checkinout->created_at, 0, 10);
					$createdTime = substr($checkinout->created_at, 11);
					$createdTime = intval(str_replace(":", "", $createdTime));
					if($createdAtDate === $specificDate) {
						$latestCheckinout = $checkinout;
						break; // Break the loop after finding the most recent data for the specific date
					}
				}

				foreach($student->checkinout->sortByDesc('updated_at') as $updatedcheckinout) {
					$updatedAtDate = substr($updatedcheckinout->updated_at, 0, 10);
					$updatedTime = substr($updatedcheckinout->updated_at, 11);
					$updatedTime = intval(str_replace(":", "", $updatedTime));
					if($updatedAtDate === $specificDate && $updatedcheckinout->updated_at !== null && $updatedcheckinout->updated_at !== "") {
						$UpdatedCheckinout = $updatedcheckinout;
						break; // Break the loop after finding the most recent data for the specific date
					}
				}
			@endphp

			@if($latestCheckinout)
			@if($latestCheckinout->created_at === null || $latestCheckinout->created_at === "")
				<span class="triangle triangle-full">
			@elseif($latestCheckinout->Getstate() == null || $latestCheckinout->Getstate() == "")
				<span class="triangle triangle-full">
			@elseif ($latestCheckinout->Getstate() == 1) // Checking state of latestCheckinout
				@if (!is_null($createdTime)) // Checking if createdTime is not null
					@if ($createdTime > 074600) // Checking if createdTime is greater than 07:46:00
						<span class="triangle triangle-halfdown"></span>
						@php $d = $d + 0.5; @endphp // Incrementing $d by 0.5
					@else
						// Placeholder for else condition
					@endif
				@else
					<span class="triangle triangle-full"></span>
					@php $d++; @endphp
				@endif
			@elseif($latestCheckinout->Getstate() == 0)
				<span class="triangle triangle-no"></span>
			@elseif($latestCheckinout->Getstate() == 2)
				<span class="triangle triangle-full"></span>
				@php $d++; @endphp
			@else
				<span class="triangle triangle-halfup"></span>
				@php $d = $d + 0.5; @endphp
			@endif
		@else
			<span class="triangle triangle-full"></span>
			@php $d++; @endphp
		@endif
			<td style="text-align: center;">
			@php
				$specificDate = '2024-04-24'; // Change this to your specific date
				$latestCheckinout = null;
				$createdAtDate = null;
				$createdTime = null;
				$updatedCheckinout = null;
				$updatedTime = null;
				foreach($student->checkinout->sortByDesc('created_at') as $checkinout) {
					$createdAtDate = substr($checkinout->created_at, 0, 10);
					$createdTime = substr($checkinout->created_at, 11);
					$createdTime = intval(str_replace(":", "", $createdTime));
					if($createdAtDate === $specificDate) {
						$latestCheckinout = $checkinout;
						break; // Break the loop after finding the most recent data for the specific date
					}
				}

				foreach($student->checkinout->sortByDesc('updated_at') as $updatedcheckinout) {
					$updatedAtDate = substr($updatedcheckinout->updated_at, 0, 10);
					$updatedTime = substr($updatedcheckinout->updated_at, 11);
					$updatedTime = intval(str_replace(":", "", $updatedTime));
					if($updatedAtDate === $specificDate && $updatedcheckinout->updated_at !== null && $updatedcheckinout->updated_at !== "") {
						$UpdatedCheckinout = $updatedcheckinout;
						break; // Break the loop after finding the most recent data for the specific date
					}
				}
			@endphp

			@if($latestCheckinout)
			@if($latestCheckinout->created_at === null || $latestCheckinout->created_at === "")
				<span class="triangle triangle-full">
			@elseif($latestCheckinout->Getstate() == null || $latestCheckinout->Getstate() == "")
				<span class="triangle triangle-full">
			@elseif ($latestCheckinout->Getstate() == 1) // Checking state of latestCheckinout
				@if (!is_null($createdTime)) // Checking if createdTime is not null
					@if ($createdTime > 074600) // Checking if createdTime is greater than 07:46:00
						<span class="triangle triangle-halfdown"></span>
						@php $d = $d + 0.5; @endphp // Incrementing $d by 0.5
					@else
						// Placeholder for else condition
					@endif
				@else
					<span class="triangle triangle-full"></span>
					@php $d++; @endphp
				@endif
			@elseif($latestCheckinout->Getstate() == 0)
				<span class="triangle triangle-no"></span>
			@elseif($latestCheckinout->Getstate() == 2)
				<span class="triangle triangle-full"></span>
				@php $d++; @endphp
			@else
				<span class="triangle triangle-halfup"></span>
				@php $d = $d + 0.5; @endphp
			@endif
		@else
			<span class="triangle triangle-full"></span>
			@php $d++; @endphp
		@endif
			<td style="text-align: center;">
			@php
				$specificDate = '2024-04-25'; // Change this to your specific date
				$latestCheckinout = null;
				$createdAtDate = null;
				$createdTime = null;
				$updatedCheckinout = null;
				$updatedTime = null;
				foreach($student->checkinout->sortByDesc('created_at') as $checkinout) {
					$createdAtDate = substr($checkinout->created_at, 0, 10);
					$createdTime = substr($checkinout->created_at, 11);
					$createdTime = intval(str_replace(":", "", $createdTime));
					if($createdAtDate === $specificDate) {
						$latestCheckinout = $checkinout;
						break; // Break the loop after finding the most recent data for the specific date
					}
				}

				foreach($student->checkinout->sortByDesc('updated_at') as $updatedcheckinout) {
					$updatedAtDate = substr($updatedcheckinout->updated_at, 0, 10);
					$updatedTime = substr($updatedcheckinout->updated_at, 11);
					$updatedTime = intval(str_replace(":", "", $updatedTime));
					if($updatedAtDate === $specificDate && $updatedcheckinout->updated_at !== null && $updatedcheckinout->updated_at !== "") {
						$UpdatedCheckinout = $updatedcheckinout;
						break; // Break the loop after finding the most recent data for the specific date
					}
				}
			@endphp

			@if($latestCheckinout)
			@if($latestCheckinout->created_at === null || $latestCheckinout->created_at === "")
				<span class="triangle triangle-full">
			@elseif($latestCheckinout->Getstate() == null || $latestCheckinout->Getstate() == "")
				<span class="triangle triangle-full">
			@elseif ($latestCheckinout->Getstate() == 1) // Checking state of latestCheckinout
				@if (!is_null($createdTime)) // Checking if createdTime is not null
					@if ($createdTime > 074600) // Checking if createdTime is greater than 07:46:00
						<span class="triangle triangle-halfdown"></span>
						@php $d = $d + 0.5; @endphp // Incrementing $d by 0.5
					@else
						// Placeholder for else condition
					@endif
				@else
					<span class="triangle triangle-full"></span>
					@php $d++; @endphp
				@endif
			@elseif($latestCheckinout->Getstate() == 0)
				<span class="triangle triangle-no"></span>
			@elseif($latestCheckinout->Getstate() == 2)
				<span class="triangle triangle-full"></span>
				@php $d++; @endphp
			@else
				<span class="triangle triangle-halfup"></span>
				@php $d = $d + 0.5; @endphp
			@endif
		@else
			<span class="triangle triangle-full"></span>
			@php $d++; @endphp
		@endif
			<td style="text-align: center;">
			@php
				$specificDate = '2024-04-26'; // Change this to your specific date
				$latestCheckinout = null;
				$createdAtDate = null;
				$createdTime = null;
				$updatedCheckinout = null;
				$updatedTime = null;
				foreach($student->checkinout->sortByDesc('created_at') as $checkinout) {
					$createdAtDate = substr($checkinout->created_at, 0, 10);
					$createdTime = substr($checkinout->created_at, 11);
					$createdTime = intval(str_replace(":", "", $createdTime));
					if($createdAtDate === $specificDate) {
						$latestCheckinout = $checkinout;
						break; // Break the loop after finding the most recent data for the specific date
					}
				}

				foreach($student->checkinout->sortByDesc('updated_at') as $updatedcheckinout) {
					$updatedAtDate = substr($updatedcheckinout->updated_at, 0, 10);
					$updatedTime = substr($updatedcheckinout->updated_at, 11);
					$updatedTime = intval(str_replace(":", "", $updatedTime));
					if($updatedAtDate === $specificDate && $updatedcheckinout->updated_at !== null && $updatedcheckinout->updated_at !== "") {
						$UpdatedCheckinout = $updatedcheckinout;
						break; // Break the loop after finding the most recent data for the specific date
					}
				}
			@endphp

			@if($latestCheckinout)
			@if($latestCheckinout->created_at === null || $latestCheckinout->created_at === "")
				<span class="triangle triangle-full">
			@elseif($latestCheckinout->Getstate() == null || $latestCheckinout->Getstate() == "")
				<span class="triangle triangle-full">
			@elseif ($latestCheckinout->Getstate() == 1) // Checking state of latestCheckinout
				@if (!is_null($createdTime)) // Checking if createdTime is not null
					@if ($createdTime > 074600) // Checking if createdTime is greater than 07:46:00
						<span class="triangle triangle-halfdown"></span>
						@php $d = $d + 0.5; @endphp // Incrementing $d by 0.5
					@else
						// Placeholder for else condition
					@endif
				@else
					<span class="triangle triangle-full"></span>
					@php $d++; @endphp
				@endif
			@elseif($latestCheckinout->Getstate() == 0)
				<span class="triangle triangle-no"></span>
			@elseif($latestCheckinout->Getstate() == 2)
				<span class="triangle triangle-full"></span>
				@php $d++; @endphp
			@else
				<span class="triangle triangle-halfup"></span>
				@php $d = $d + 0.5; @endphp
			@endif
		@else
			<span class="triangle triangle-full"></span>
			@php $d++; @endphp
		@endif
			<td style="text-align: center;">
			@php
				$specificDate = '2024-04-29'; // Change this to your specific date
				$latestCheckinout = null;
				$createdAtDate = null;
				$createdTime = null;
				$updatedCheckinout = null;
				$updatedTime = null;
				foreach($student->checkinout->sortByDesc('created_at') as $checkinout) {
					$createdAtDate = substr($checkinout->created_at, 0, 10);
					$createdTime = substr($checkinout->created_at, 11);
					$createdTime = intval(str_replace(":", "", $createdTime));
					if($createdAtDate === $specificDate) {
						$latestCheckinout = $checkinout;
						break; // Break the loop after finding the most recent data for the specific date
					}
				}

				foreach($student->checkinout->sortByDesc('updated_at') as $updatedcheckinout) {
					$updatedAtDate = substr($updatedcheckinout->updated_at, 0, 10);
					$updatedTime = substr($updatedcheckinout->updated_at, 11);
					$updatedTime = intval(str_replace(":", "", $updatedTime));
					if($updatedAtDate === $specificDate && $updatedcheckinout->updated_at !== null && $updatedcheckinout->updated_at !== "") {
						$UpdatedCheckinout = $updatedcheckinout;
						break; // Break the loop after finding the most recent data for the specific date
					}
				}
			@endphp

			@if($latestCheckinout)
			@if($latestCheckinout->created_at === null || $latestCheckinout->created_at === "")
				<span class="triangle triangle-full">
			@elseif($latestCheckinout->Getstate() == null || $latestCheckinout->Getstate() == "")
				<span class="triangle triangle-full">
			@elseif ($latestCheckinout->Getstate() == 1) // Checking state of latestCheckinout
				@if (!is_null($createdTime)) // Checking if createdTime is not null
					@if ($createdTime > 074600) // Checking if createdTime is greater than 07:46:00
						<span class="triangle triangle-halfdown"></span>
						@php $d = $d + 0.5; @endphp // Incrementing $d by 0.5
					@else
						// Placeholder for else condition
					@endif
				@else
					<span class="triangle triangle-full"></span>
					@php $d++; @endphp
				@endif
			@elseif($latestCheckinout->Getstate() == 0)
				<span class="triangle triangle-no"></span>
			@elseif($latestCheckinout->Getstate() == 2)
				<span class="triangle triangle-full"></span>
				@php $d++; @endphp
			@else
				<span class="triangle triangle-halfup"></span>
				@php $d = $d + 0.5; @endphp
			@endif
		@else
			<span class="triangle triangle-full"></span>
			@php $d++; @endphp
		@endif
			<td style="text-align: center;">
			@php
				$specificDate = '2024-04-30'; // Change this to your specific date
				$latestCheckinout = null;
				$createdAtDate = null;
				$createdTime = null;
				$updatedCheckinout = null;
				$updatedTime = null;
				foreach($student->checkinout->sortByDesc('created_at') as $checkinout) {
					$createdAtDate = substr($checkinout->created_at, 0, 10);
					$createdTime = substr($checkinout->created_at, 11);
					$createdTime = intval(str_replace(":", "", $createdTime));
					if($createdAtDate === $specificDate) {
						$latestCheckinout = $checkinout;
						break; // Break the loop after finding the most recent data for the specific date
					}
				}

				foreach($student->checkinout->sortByDesc('updated_at') as $updatedcheckinout) {
					$updatedAtDate = substr($updatedcheckinout->updated_at, 0, 10);
					$updatedTime = substr($updatedcheckinout->updated_at, 11);
					$updatedTime = intval(str_replace(":", "", $updatedTime));
					if($updatedAtDate === $specificDate && $updatedcheckinout->updated_at !== null && $updatedcheckinout->updated_at !== "") {
						$UpdatedCheckinout = $updatedcheckinout;
						break; // Break the loop after finding the most recent data for the specific date
					}
				}
			@endphp

			@if($latestCheckinout)
			@if($latestCheckinout->created_at === null || $latestCheckinout->created_at === "")
				<span class="triangle triangle-full">
			@elseif($latestCheckinout->Getstate() == null || $latestCheckinout->Getstate() == "")
				<span class="triangle triangle-full">
			@elseif ($latestCheckinout->Getstate() == 1) // Checking state of latestCheckinout
				@if (!is_null($createdTime)) // Checking if createdTime is not null
					@if ($createdTime > 074600) // Checking if createdTime is greater than 07:46:00
						<span class="triangle triangle-halfdown"></span>
						@php $d = $d + 0.5; @endphp // Incrementing $d by 0.5
					@else
						// Placeholder for else condition
					@endif
				@else
					<span class="triangle triangle-full"></span>
					@php $d++; @endphp
				@endif
			@elseif($latestCheckinout->Getstate() == 0)
				<span class="triangle triangle-no"></span>
			@elseif($latestCheckinout->Getstate() == 2)
				<span class="triangle triangle-full"></span>
				@php $d++; @endphp
			@else
				<span class="triangle triangle-halfup"></span>
				@php $d = $d + 0.5; @endphp
			@endif
		@else
			<span class="triangle triangle-full"></span>
			@php $d++; @endphp
		@endif
		<td></td>
		<td></td>
		<td></td>
		<td>{{$s-$d}}</td>
		<td>{{$d}}</td>
		@php $f = $i; @endphp
		@php $i++; @endphp
	</tr>
	@endforeach
		<tr height="25">
		<td align="right"><strong><?php echo $f; ?></strong></td>
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
<script>window.print();</script>

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
