<?php include('session.php')?>
<?php 
	if(isset($_SESSION['accounttype']) && $_SESSION['accounttype']=="Farmer"){
            header('location: index.php');
	}
?>
<?php 
	require('server.php');
		$hh='';
		$output = '';
$output2 = '';
$output3 = '';
$output4 = '';
$output5 = '';
$output6 = '';
$output7 = '';
$output8 = '';
$query = '';
$hh='';
		$goDisplay=false;
	if(isset($_POST['search']))
	{

			$valueToSearch = $_POST['valueToSearch'];
			$brgy = $valueToSearch;
			if($brgy == "Municipality of Naic"){
				$query = "SELECT count(distinct `householdno`) AS hh,
			COUNT(CASE WHEN ressex = 'Male' THEN resid END) AS Male,
			COUNT(CASE WHEN ressex = 'Female' THEN resid END) AS Female,
			COUNT(CASE WHEN resage < 18 AND ressex = 'Male' THEN resid END) AS mage,
			COUNT(CASE WHEN resage < 18 AND ressex = 'Female' THEN resid END) AS fage,
			COUNT(CASE WHEN resage >= 18 AND resage <= 59  AND ressex = 'Male' THEN resid END) AS teen,
			COUNT(CASE WHEN resage >= 18 AND resage <= 59  AND ressex = 'Female' THEN resid END) AS teen2,
			COUNT(CASE WHEN resage >= 60 AND ressex = 'Female' THEN resid END) AS seniorf,
			COUNT(CASE WHEN resage >= 60 AND ressex = 'Male' THEN resid END) AS seniorm,
			COUNT(CASE WHEN rescivil = 'Single' AND ressex = 'Male' THEN resid END) AS smale,
			COUNT(CASE WHEN rescivil = 'Single' AND ressex = 'Female' THEN resid END) AS sfemale,
			COUNT(CASE WHEN rescivil = 'Divorced' AND ressex = 'Female' THEN resid END) AS dfemale,
			COUNT(CASE WHEN rescivil = 'Divorced' AND ressex = 'Male' THEN resid END) AS dmale,
			COUNT(CASE WHEN rescivil = 'Separated' AND ressex = 'Male' THEN resid END) AS semale,
			COUNT(CASE WHEN rescivil = 'Separated' AND ressex = 'Female' THEN resid END) AS sefemale,
			COUNT(CASE WHEN rescivil = 'Widowed' AND ressex = 'Female' THEN resid END) AS wfemale,
			COUNT(CASE WHEN rescivil = 'Widowed' AND ressex = 'Male' THEN resid END) AS wmale,
			COUNT(CASE WHEN rescivil = 'Married' AND ressex = 'Male' THEN resid END) AS mmale,
			COUNT(CASE WHEN rescivil = 'Married' AND ressex = 'Female' THEN resid END) AS mfemale,
			count(case when respro = '' AND ressex = 'Male' THEN resid END) AS pmale,
			count(case when respro = '' AND ressex = 'Female' THEN resid END) AS pfemale,
			count(case when respro != '' AND ressex = 'Male' THEN resid END) AS pnmale,
			count(case when respro != '' AND ressex = 'Female' THEN resid END) AS pnfemale FROM `tblresinfo` WHERE resstatus='$status'";
			$search_result = filterTable($query);
			}else{
				$query = "SELECT count(distinct `householdno`) AS hh,
			COUNT(CASE WHEN ressex = 'Male' THEN resid END) AS Male,
			COUNT(CASE WHEN ressex = 'Female' THEN resid END) AS Female,
			COUNT(CASE WHEN resage < 18 AND ressex = 'Male' THEN resid END) AS mage,
			COUNT(CASE WHEN resage < 18 AND ressex = 'Female' THEN resid END) AS fage,
			COUNT(CASE WHEN resage >= 18 AND resage <= 59  AND ressex = 'Male' THEN resid END) AS teen,
			COUNT(CASE WHEN resage >= 18 AND resage <= 59  AND ressex = 'Female' THEN resid END) AS teen2,
			COUNT(CASE WHEN resage >= 60 AND ressex = 'Female' THEN resid END) AS seniorf,
			COUNT(CASE WHEN resage >= 60 AND ressex = 'Male' THEN resid END) AS seniorm,
			COUNT(CASE WHEN rescivil = 'Single' AND ressex = 'Male' THEN resid END) AS smale,
			COUNT(CASE WHEN rescivil = 'Single' AND ressex = 'Female' THEN resid END) AS sfemale,
			COUNT(CASE WHEN rescivil = 'Divorced' AND ressex = 'Female' THEN resid END) AS dfemale,
			COUNT(CASE WHEN rescivil = 'Divorced' AND ressex = 'Male' THEN resid END) AS dmale,
			COUNT(CASE WHEN rescivil = 'Separated' AND ressex = 'Male' THEN resid END) AS semale,
			COUNT(CASE WHEN rescivil = 'Separated' AND ressex = 'Female' THEN resid END) AS sefemale,
			COUNT(CASE WHEN rescivil = 'Widowed' AND ressex = 'Female' THEN resid END) AS wfemale,
			COUNT(CASE WHEN rescivil = 'Widowed' AND ressex = 'Male' THEN resid END) AS wmale,
			COUNT(CASE WHEN rescivil = 'Married' AND ressex = 'Male' THEN resid END) AS mmale,
			COUNT(CASE WHEN rescivil = 'Married' AND ressex = 'Female' THEN resid END) AS mfemale,
			count(case when respro = '' AND ressex = 'Male' THEN resid END) AS pmale,
			count(case when respro = '' AND ressex = 'Female' THEN resid END) AS pfemale,
			count(case when respro != '' AND ressex = 'Male' THEN resid END) AS pnmale,
			count(case when respro != '' AND ressex = 'Female' THEN resid END) AS pnfemale FROM `tblresinfo` WHERE resbrgy LIKE '%".$valueToSearch."%' AND resstatus='$status'";
			$search_result = filterTable($query);
			}
			$goDisplay = true;
	}else {		
			$brgy = "Municipality of Naic";
			$query = "SELECT count(distinct `householdno`) AS hh,
			COUNT(CASE WHEN ressex = 'Male' THEN resid END) AS Male,
			COUNT(CASE WHEN ressex = 'Female' THEN resid END) AS Female,
			COUNT(CASE WHEN resage < 18 AND ressex = 'Male' THEN resid END) AS mage,
			COUNT(CASE WHEN resage < 18 AND ressex = 'Female' THEN resid END) AS fage,
			COUNT(CASE WHEN resage >= 18 AND resage <= 59  AND ressex = 'Male' THEN resid END) AS teen,
			COUNT(CASE WHEN resage >= 18 AND resage <= 59  AND ressex = 'Female' THEN resid END) AS teen2,
			COUNT(CASE WHEN resage >= 60 AND ressex = 'Female' THEN resid END) AS seniorf,
			COUNT(CASE WHEN resage >= 60 AND ressex = 'Male' THEN resid END) AS seniorm,
			COUNT(CASE WHEN rescivil = 'Single' AND ressex = 'Male' THEN resid END) AS smale,
			COUNT(CASE WHEN rescivil = 'Single' AND ressex = 'Female' THEN resid END) AS sfemale,
			COUNT(CASE WHEN rescivil = 'Divorced' AND ressex = 'Female' THEN resid END) AS dfemale,
			COUNT(CASE WHEN rescivil = 'Divorced' AND ressex = 'Male' THEN resid END) AS dmale,
			COUNT(CASE WHEN rescivil = 'Separated' AND ressex = 'Male' THEN resid END) AS semale,
			COUNT(CASE WHEN rescivil = 'Separated' AND ressex = 'Female' THEN resid END) AS sefemale,
			COUNT(CASE WHEN rescivil = 'Widowed' AND ressex = 'Female' THEN resid END) AS wfemale,
			COUNT(CASE WHEN rescivil = 'Widowed' AND ressex = 'Male' THEN resid END) AS wmale,
			COUNT(CASE WHEN rescivil = 'Married' AND ressex = 'Male' THEN resid END) AS mmale,
			COUNT(CASE WHEN rescivil = 'Married' AND ressex = 'Female' THEN resid END) AS mfemale,
			count(case when respro = '' AND ressex = 'Male' THEN resid END) AS pmale,
			count(case when respro = '' AND ressex = 'Female' THEN resid END) AS pfemale,
			count(case when respro != '' AND ressex = 'Male' THEN resid END) AS pnmale,
			count(case when respro != '' AND ressex = 'Female' THEN resid END) AS pnfemale FROM `tblresinfo` WHERE resstatus='$status'";
			$search_result = filterTable($query);
	}

	function filterTable($query)
	{
	require('server.php');
    $filter_Result = mysqli_query($con, $query);
    return $filter_Result;
	}
	
?>
<?php

$query=mysqli_query($con,"select * from tblfiles");
$rowcount=mysqli_num_rows($query);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
	<title>OIS for Collecting Sex-disaggregated Data</title>
	<link rel="shortcut icon" href="img/team.ico" />
	<link href="css/s9.css" rel="stylesheet" />
	<script type="text/javascript" src="jsscript/jquery-3.3.1.min.js"> </script>

	<script>
	
			$(document).ready(function() {
			$("#se2").prop("disabled",true);
			
			$('#se1').change(function() {
				 var y = $(this).val();
				if(y != ""){
					$("#se2").prop("disabled",false);
				}else {
					$("#se2").prop("disabled",true);
				}
			});
		});
	</script>
</head>

<body>
	<div class="topnav">
		<div class="r">
			<img src="img/team.png" id="rimg"> Admin
		</div>
		<a href="log-out.php"  id="out" >Sign out</a>
		  </div> 
	</div>
	
	<div class="topnav2" >
			<div class="name">
					<span id="n"><strong><?php echo  $_SESSION['fname']; ?> <?php echo  $_SESSION['mname']; ?> <?php echo  $_SESSION['lname']; ?></strong></span>
					<br>
					Admin : <?php echo  $_SESSION['username']; ?>
					<br>
					ADMIN
			</div>
	</div>
		

				<div class="menu" >
				
				<div class="menu2">
					<a class="active" href="admin.php"  >File</a>
					<a href="acc.php" >Manage Account</a>
				</div>
				
				</div>
			
				
			<div class="r1">	
			
				<form method="POST" autocomplete="off" action="admin.php" >
				<div id="se">
					<select name="valueToSearch" id="se1">
						<option value="" readonly></option>
						<option value="Municipality of Naic">Municipality of Naic</option>
						<option value="Bagong Kalsada">Bagong Kalsada</option>
						<option value="Balsahan">Balsahan</option>
						<option value="Bancaan">Bancaan</option>
						<option value="Bucana Malaki">Bucana Malaki</option>
						<option value="Bucana Sasahan">Bucana Sasahan</option>
						<option value="Capt. C. Nazareno (Poblacion)">Capt. C. Nazareno (Poblacion)</option>
						<option value="Calubcob">Calubcob</option>
						<option value="Gomez - Zamora (Poblacion)">Gomez - Zamora (Poblacion)</option>
						<option value="Halang">Halang</option>
						<option value="Humbac">Humbac</option>
						<option value="Ibayo Estacion">Ibayo Estacion</option>
						<option value="Ibayo Silangan">Ibayo Silangan</option>
						<option value="Kanluran">Kanluran</option>
						<option value="Labac">Labac</option>
						<option value="Latoria">Latoria</option>
						<option value="Mabolo">Mabolo</option>
						<option value="Makina">Makina</option>
						<option value="Malainen Bago">Malainen Bago</option>
						<option value="Malainen Luma">Malainen Luma</option>
						<option value="Molino">Molino</option>
						<option value="Munting Mapino">Munting Mapino</option>
						<option value="Muzon">Muzon</option>
						<option value="Palangue 1">Palangue 1</option>
						<option value="Palangue 2&3">Palangue 2&3</option>
						<option value="Sabang">Sabang</option>
						<option value="San Roque">San Roque</option>
						<option value="Santulan">Santulan</option>
						<option value="Sapa">Sapa</option>
						<option value="Timalan Balsahan">Timalan Balsahan</option>
						<option value="Timalan Concepcion">Timalan Concepcion</option>
							
					</select>
					
					<input type="submit" name="search" id="se2" value="Search">
				</div>
										<?php

										echo $search_result, "hello"; 
										if ($goDisplay) {
											echo $query;
											while($row = mysqli_fetch_array($search_result)):?>
										<?php 
											$hh = $row['hh'];
				$male = $row['Male'] ;
				$female = $row['Female'] ;
				$mage = $row['mage'];
				$fage = $row['fage'];
				$total = $mage + $fage;
				
				if($mage== 0) {
					$freq1 = '0';
				}else{
					$freq1 = round($mage/$total * '100');
				}
				if($fage== 0) {
					$freq2 = '0';
				}else{
					$freq2 =  round($fage/$total * '100');
				}
				
				if($freq1== 0 && $freq2==0) {
					$freq3 = '0';
				}else{
					$freq3 = $freq1 + $freq2;
				}
				
				$teen = $row['teen'];
				$teen2 = $row['teen2'];
				$total2 = $teen + $teen2;
				if($teen== 0) {
					$freq4 = '0';
				}else{
					$freq4 =  round($teen/$total2 * '100');
				}
				if($teen2== 0) {
					$freq5 = '0';
				}else{
					$freq5 = round($teen2/$total2 * '100');
				}
				if($freq4== 0 && $freq5==0) {
					$freq6 = '0';
				}else{
					$freq6 = $freq4 + $freq5;
				}
				
				$seniorf = $row['seniorf'];
				$seniorm = $row['seniorm'];
				$total3 = $seniorm + $seniorf;
				if($seniorm == 0){
					$freq7 = '0';
				}else{
					$freq7 =  round($seniorm/$total3 * '100');
				}
				if($seniorf == 0){
					$freq8 = '0';
				}else{
					$freq8 =  round($seniorf/$total3 * '100');
				}
				if($freq7== 0 && $freq8==0) {
					$freq9 = '0';
				}else{
					$freq9 = $freq7 + $freq8;
				}	
				
				$smale = $row['smale'];
				$sfemale = $row['sfemale'];
				$total4 = $smale + $sfemale;
				if($smale == 0){
					$freq22 = '0';
				}else{
					$freq22 =  round($smale/$total4 * '100');
				}
				if($sfemale == 0){
					$freq23 = '0';
				}else{
					$freq23 =  round($sfemale/$total4 * '100');
				}
				if($freq22== 0 && $freq23==0) {
					$freq24 = '0';
				}else{
					$freq24 = $freq22 + $freq23;
				}
				
				$dfemale = $row['dfemale'];
				$dmale = $row['dmale'];
				$total5 = $dmale + $dfemale;
				if($dmale == 0){
					$freq19 = '0';
				}else{
					$freq19 =  round($dmale/$total5 * '100');
				}
				if($dfemale == 0){
					$freq20 = '0';
				}else{
					$freq20 =  round($dfemale/$total5 * '100');
				}
				if($freq19== 0 && $freq20==0) {
					$freq21 = '0';
				}else{
					$freq21 = $freq19 + $freq20;
				}
				
				$semale = $row['semale'];
				$sefemale = $row['sefemale'];
				$total6 = $semale + $sefemale;
				if($semale == 0){
					$freq16 = '0';
				}else{
					$freq16 =  round($semale/$total6 * '100');
				}
				if($sefemale == 0){
					$freq17 = '0';
				}else{
					$freq17 =  round($sefemale/$total6 * '100');
				}
				if($freq16== 0 && $freq17==0) {
					$freq18 = '0';
				}else{
					$freq18 = $freq16 + $freq17;
				}
				
				$wfemale = $row['wfemale'];
				$wmale = $row['wmale'];
				$total7 = $wmale + $wfemale;
				if($wmale == 0){
					$freq13 = '0';
				}else{
					$freq13 =  round($wmale/$total7 * '100');
				}
				if($wfemale == 0){
					$freq14 = '0';
				}else{
					$freq14 =  round($wfemale/$total7 * '100');
				}
				if($freq13== 0 && $freq14==0) {
					$freq15 = '0';
				}else{
					$freq15 = $freq14 + $freq13;
				}	
				
				$mmale = $row['mmale'];
				$mfemale = $row['mfemale'];
				$total8 = $mmale + $mfemale;
				if($mmale == 0){
					$freq10 = '0';
				}else{
					$freq10 =  round($mmale/$total8 * '100');
				}
				if($mfemale == 0){
					$freq11 = '0';
				}else{
					$freq11 =  round($mfemale/$total8 * '100');
				}
				if($freq11== 0 && $freq10==0) {
					$freq12 = '0';
				}else{
					$freq12 = $freq11 + $freq10;
				}	
				
				$pnmale = $row['pnmale'];
				$pnfemale = $row['pnfemale'];
				$total10 = $pnmale + $pnfemale;
				if($pnmale == 0){
					$freq25 = '0';
				}else{
					$freq25 =  round($pnmale/$total10 * '100');
				}
				if($pnfemale == 0){
					$freq26 = '0';
				}else{
					$freq26 =  round($pnfemale/$total10 * '100');
				}
				if($freq25== 0 && $freq26==0) {
					$freq27 = '0';
				}else{
					$freq27 = $freq25 + $freq26;
				}	
				
				$pmale = $row['pmale'];
				$pfemale = $row['pfemale'];
				$total9 = $pmale + $pfemale;
				if($pmale == 0){
					$freq28 = '0';
				}else{
					$freq28 =  round($pmale/$total9 * '100');
				}
				if($pfemale == 0){
					$freq29 = '0';
				}else{
					$freq29 =  round($pfemale/$total9 * '100');
				}
				if($freq28== 0 && $freq29==0) {
					$freq30 = '0';
				}else{
					$freq30 = $freq28 + $freq29;
				}
										?>
								<div class="text">Sex-disaggregated Data -  <span style="color:#DAA520"><strong><?php echo $brgy; ?></strong><span></div>
										<table id= "table0">
										
												<tr>
												<th>No of Households as of <br><span id="date"><?php echo date('Y-m-d'); ?></span></th>
												</tr>
												<tr>												
												<td id="hh"><?php echo $row['hh']; ?></td>																			
												</tr>		
										</table>
										
										<table id="table1">
												<tr>
												<th colspan="2">No. of Residents</th>
												</tr>
												<tr>
												<th style="color:blue;">Male&nbsp;</th>
												<th style="color:red; border-left:1px dotted #808080;"> &nbsp;Female</th>
												</tr>
												<tr>												
												<td><?php echo $row['Male']; ?></td>
												<td style="border-left:1px dotted #808080;"><?php echo $row['Female']; ?></td>											
												</tr>
										</table>
										
										<br>
										<hr id="hr2">
										
										<table id="table2">
											<tr id="tr1">
												<td></td>
												<th>Male</th>
												<th>Frequency</th>
												<th>Female</th>
												<th>Frequency</th>
												<th>Total</th>
												
											</tr>
											<tr>
												<td style="text-align:left;width:46.5%;">Under 18</td>
												<td><?php echo $row['mage']; ?></td>
												<td><?php echo ("$freq1" ); ?></td>
												<td><?php echo $row['fage']; ?></td>
												<td><?php echo ("$freq2" ); ?></td>
												<td><?php echo $total= $row['mage'] + $row['fage']; ?></td>
											
											</tr>
											<tr>
												<td style="text-align:left;width:46.5%;">18 and Above</td>
												<td><?php echo $row['teen']; ?></td>
												<td><?php echo ("$freq4" ); ?></td>
												<td><?php echo $row['teen2']; ?></td>
												<td><?php echo ("$freq5" ); ?></td>
												<td><?php echo $total2= $row['teen'] + $row['teen2']; ?></td>
												
											</tr>
											<tr>
												<td style="text-align:left;width:46.5%;">Senior Citizen</td>
												<td><?php echo $row['seniorm']; ?></td>
												<td><?php echo ("$freq7" ); ?></td>
												<td><?php echo $row['seniorf']; ?></td>
												<td><?php echo ("$freq8" ); ?></td>
												<td><?php echo $total3= $row['seniorm'] + $row['seniorf']; ?></td>
												
											</tr>
										</table>
										
										<br>
										<hr id="hr2">
										
										<table id="table2">
											<tr id="tr1">
												<td></td>
												<th>Male</th>
												<th>Frequency</th>
												<th>Female</th>
												<th>Frequency</th>
												<th>Total</th>
												
											</tr>
											<tr>
												<td style="text-align:left;width:46.5%;">Married</td>
												<td><?php echo $row['mmale']; ?></td>
												<td><?php echo ("$freq10"); ?></td>
												<td><?php echo $row['mfemale']; ?></td>
												<td><?php echo ("$freq11"); ?></td>
												<td><?php echo $total8= $row['mmale'] + $row['mfemale']; ?></td>
											
											</tr>
											<tr>
												<td style="text-align:left;width:46.5%;">Widowed</td>
												<td><?php echo $row['wmale']; ?></td>
												<td><?php echo ("$freq13"); ?></td>
												<td><?php echo $row['wfemale']; ?></td>
												<td><?php echo ("$freq14"); ?></td>
												<td><?php echo $total7= $row['wmale'] + $row['wfemale']; ?></td>
												
											</tr>
											<tr>
												<td style="text-align:left;width:46.5%;">Seperated</td>
												<td><?php echo $row['semale']; ?></td>
												<td><?php echo ("$freq16"); ?></td>
												<td><?php echo $row['sefemale']; ?></td>
												<td><?php echo ("$freq17"); ?></td>
												<td><?php echo $total6= $row['semale'] + $row['sefemale']; ?></td>
												
											</tr>
											<tr>
												<td style="text-align:left;width:46.5%;">Divorced</td>
												<td><?php echo $row['dmale']; ?></td>
												<td><?php echo ("$freq19"); ?></td>
												<td><?php echo $row['dfemale']; ?></td>
												<td><?php echo ("$freq20"); ?></td>
												<td><?php echo $total5= $row['dmale'] + $row['dfemale']; ?></td>
												
											</tr>
											<tr>
												<td style="text-align:left;width:46.5%;">Single</td>
												<td><?php echo $row['smale']; ?></td>
												<td><?php echo ("$freq22"); ?></td>
												<td><?php echo $row['sfemale']; ?></td>
												<td><?php echo ("$freq23"); ?></td>
												<td><?php echo $total4= $row['smale'] + $row['sfemale']; ?></td>
												
											</tr>
										</table>
										
										<br>
										<hr id="hr2">
										
										<table id="table3">
											<tr id="tr3">
												<td></td>
												<th>Male</th>
												<th>Frequency</th>
												<th>Female</th>
												<th>Frequency</th>
												<th>Total</th>
											
											</tr>
											<tr>
												<td style="text-align:left;width:46.5%;">Employed</td>
												<td><?php echo $row['pnmale']; ?></td>
												<td><?php echo ("$freq25"); ?></td>
												<td><?php echo $row['pnfemale']; ?></td>
												<td><?php echo ("$freq26"); ?></td>
												<td><?php echo $total10= $row['pnmale'] + $row['pnfemale']; ?></td>
												
											</tr>
											<tr>
												<td style="text-align:left;width:46.5%;">Unemployed</td>
												<td><?php echo $row['pmale']; ?></td>
												<td><?php echo ("$freq28"); ?></td>
												<td><?php echo $row['pfemale']; ?></td>
												<td><?php echo ("$freq29"); ?></td>
												<td><?php echo $total9= $row['pmale'] + $row['pfemale']; ?></td>
												
											</tr>
											
										</table>
										<?php endwhile; }
										else {
											echo "wow";
										}?>
										
		
					</div>
				</form>
			</div>
			

			<div class="r2">
							<div class="rtext">Barangay Files</div>			
										<table>
											<tr>
											
											<th>File Name</th>
											<th>Barangay</th>
											<th ></th>
											</tr>
											<?php
											for($i=1;$i<=$rowcount;$i++)
											{
												$row=mysqli_fetch_array($query);

											?>
											
											<tr>
											
											<td><a href="upload/<?php echo $row["file"] ?>" style="text-decoration:none;"><?php echo $row["file"] ?></a></td>
											<td><a><?php echo $row["brgy"] ?></a></td>
											<td><a href="delete2.php?id=<?php echo $row["id"]?>" style="text-decoration:none;color:red;">Remove</a></td>
											
											</tr>

											<?php	
											}

										?>
										</table>
			</div>
		
		<div id="footer">
			<p>Online Information System for Collecting Sex-disaggregated Data for Barangay Communities</p>
		</div>

</body>


</html>