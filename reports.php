<?php include('session.php')?>
<?php 
	if(isset($_SESSION['accounttype']) && $_SESSION['accounttype']=="Admin"){
            header('location: index.php');
	}
?>
<?php require('server.php')?>
<?php 
	
	if (isset($_SESSION['barangay'])==true) {
		$bg = $_SESSION['barangay'];
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
		$query = mysqli_query($con,"SELECT count(distinct `householdno`) AS hh,
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
			count(case when respro != '' AND ressex = 'Female' THEN resid END) AS pnfemale, 
			count(case when resrv = 'Yes' AND ressex = 'Male' THEN resid END) AS ymale,
			count(case when resrv = 'Yes' AND ressex = 'Female' THEN resid END) AS yfemale, 
			count(case when resrv = 'No' AND ressex = 'Male' THEN resid END) AS nmale,
			count(case when resrv = 'No' AND ressex = 'Female' THEN resid END) AS nfemale FROM `tblresinfo` WHERE resbrgy ='$bg'");
		$count = mysqli_num_rows($query);
		while($row=mysqli_fetch_array($query)){
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

				$ymale = $row['ymale'];
				$yfemale = $row['yfemale'];
				$total12 = $ymale + $yfemale;
				if($ymale == 0){
					$freq31 = '0';
				}else{
					$freq31 =  round($ymale/$total12 * '100');
				}
				if($yfemale == 0){
					$freq32 = '0';
				}else{
					$freq32 =  round($yfemale/$total12 * '100');
				}
				if($freq31== 0 && $freq32==0) {
					$freq33 = '0';
				}else{
					$freq33 = $freq31 + $freq32;
				}

				$nmale = $row['nmale'];
				$nfemale = $row['nfemale'];
				$total11 = $nmale + $nfemale;
				if($nmale == 0){
					$freq34 = '0';
				}else{
					$freq34 =  round($nmale/$total11 * '100');
				}
				if($nfemale == 0){
					$freq35 = '0';
				}else{
					$freq35 =  round($nfemale/$total11 * '100');
				}
				if($freq34== 0 && $freq35==0) {
					$freq36 = '0';
				}else{
					$freq36 = $freq34 + $freq35;
				}
			}
	}
	
?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
	<title>Online Information System for Collecting Sex-disaggregated Data for Barangay Communities</title>
	<link rel="shortcut icon" href="img/team.ico" />
	<link href="css/ss7.css" rel="stylesheet" />
	
	<script type="text/javascript" src="jsscript/jquery-3.3.1.min.js"> </script>

	<script>
			
		$(document).ready(function() {
			$("#rimg").click(function() {
				location.href= 'barangay.php';
			
			});
		});
		
	</script>
		
</head>

<body >
	 
	<div class="topnav" id="myTopnav">
		<div class="r">
			<img src="img/team.png" id="rimg"> Generated Report
		</div>
		<a href="log-out.php"  id="out" >Sign out</a>
		  <div class="dropdown">
			<button class="dropbtn"><?php echo  $_SESSION['fname']; ?> <?php echo  $_SESSION['mname']; ?> <?php echo  $_SESSION['lname']; ?>
			  <div class="line"></div>
			</button>
			<div class="dropdown-content">
				<a href="addresident.php">Resident</a>	
				<a href="household.php">Household</a>	
				<a href="reports.php">Generated Report</a>
			</div>
		  </div> 
	</div>
	
	<form  method="POST" action="reports.php">
		
	<div class="container">
				<div id="resinfo">Generated Report</div>
					<hr id="hr1">
					
					<div class="r1">	
						<div class="rr1">
										
								<div class="text">Sex-disaggregated Data - <span style="color:#DAA520"><strong><?php echo  $_SESSION['barangay']; ?></strong><span></div>
										<table id= "table0">
												<tr>
												<th>No of Households as of <br><span id="date"><?php echo date('Y-m-d'); ?></span></th>
												</tr>
												<tr>												
												<td id="hh"><?php echo ("$hh"); ?></td>																			
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
												<td><?php echo ("$male"); ?></td>
												<td style="border-left:1px dotted #808080;"><?php echo ("$female"); ?></td>											
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
												<td><?php echo ("$mage"); ?></td>
												<td><?php echo ("$freq1" ); ?></td>
												<td><?php echo ("$fage"); ?></td>
												<td><?php echo ("$freq2"); ?></td>
												<td><?php echo ("$total"); ?></td>
												
											</tr>
											<tr>
												<td style="text-align:left;width:46.5%;">18 and Above</td>
												<td><?php echo ("$teen"); ?></td>
												<td><?php echo ("$freq4"); ?></td>
												<td><?php echo ("$teen2"); ?></td>
												<td><?php echo ("$freq5"); ?></td>
												<td><?php echo ("$total2"); ?></td>
												
											</tr>
											<tr>
												<td style="text-align:left;width:46.5%;">Senior Citizen</td>
												<td><?php echo ("$seniorm"); ?></td>
												<td><?php echo ("$freq7"); ?></td>
												<td><?php echo ("$seniorf"); ?></td>
												<td><?php echo ("$freq8"); ?></td>
												<td><?php echo ("$total3"); ?></td>
												
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
												<td><?php echo ("$mmale"); ?></td>
												<td><?php echo ("$freq10"); ?></td>
												<td><?php echo ("$mfemale"); ?></td>
												<td><?php echo ("$freq11"); ?></td>
												<td><?php echo ("$total8"); ?></td>
											
											</tr>
											<tr>
												<td style="text-align:left;width:46.5%;">Widowed</td>
												<td><?php echo ("$wmale"); ?></td>
												<td><?php echo ("$freq13"); ?></td>
												<td><?php echo ("$wfemale"); ?></td>
												<td><?php echo ("$freq14"); ?></td>
												<td><?php echo ("$total7"); ?></td>
											
											</tr>
											<tr>
												<td style="text-align:left;width:46.5%;">Seperated</td>
												<td><?php echo ("$semale"); ?></td>
												<td><?php echo ("$freq16"); ?></td>
												<td><?php echo ("$sefemale"); ?></td>
												<td><?php echo ("$freq17"); ?></td>
												<td><?php echo ("$total6"); ?></td>
											
											</tr>
											<tr>
												<td style="text-align:left;width:46.5%;">Divorced</td>
												<td><?php echo ("$dmale"); ?></td>
												<td><?php echo ("$freq19"); ?></td>
												<td><?php echo ("$dfemale"); ?></td>
												<td><?php echo ("$freq20"); ?></td>
												<td><?php echo ("$total5"); ?></td>
												
											</tr>
											<tr>
												<td style="text-align:left;width:46.5%;">Single</td>
												<td><?php echo ("$smale"); ?></td>
												<td><?php echo ("$freq22"); ?></td>
												<td><?php echo ("$sfemale"); ?></td>
												<td><?php echo ("$freq23"); ?></td>
												<td><?php echo ("$total4"); ?></td>
												
											</tr>
										</table>
										
										<br>
										<hr id="hr2">
										
										<table id="table3">
											<tr id="tr1">
												<td></td>
												<th>Male</th>
												<th>Frequency</th>
												<th>Female</th>
												<th>Frequency</th>
												<th>Total</th>
												
											</tr>
											<tr>
												<td style="text-align:left;width:46.5%;">Employed</td>
												<td><?php echo ("$pnmale"); ?></td>
												<td><?php echo ("$freq25"); ?></td>
												<td><?php echo ("$pnfemale"); ?></td>
												<td><?php echo ("$freq26"); ?></td>
												<td><?php echo ("$total10"); ?></td>
												
											</tr>
											<tr>
												<td style="text-align:left;width:46.5%;">Unemployed</td>
												<td><?php echo ("$pmale"); ?></td>
												<td><?php echo ("$freq28"); ?></td>
												<td><?php echo ("$pfemale"); ?></td>
												<td><?php echo ("$freq29"); ?></td>
												<td><?php echo ("$total9"); ?></td>
												
											</tr>
										</table>

										<br>
										<hr id="hr2">
										
										<table id="table3">
											<tr id="tr1">
												<td></td>
												<th>Male</th>
												<th>Frequency</th>
												<th>Female</th>
												<th>Frequency</th>
												<th>Total</th>
												
											</tr>
											<tr>
												<td style="text-align:left;width:46.5%;">Registered Voters</td>
												<td><?php echo ("$ymale"); ?></td>
												<td><?php echo ("$freq31"); ?></td>
												<td><?php echo ("$yfemale"); ?></td>
												<td><?php echo ("$freq32"); ?></td>
												<td><?php echo ("$total12"); ?></td>
												
											</tr>
											<tr>
												<td style="text-align:left;width:46.5%;">None Registered Voters</td>
												<td><?php echo ("$nmale"); ?></td>
												<td><?php echo ("$freq34"); ?></td>
												<td><?php echo ("$nfemale"); ?></td>
												<td><?php echo ("$freq35"); ?></td>
												<td><?php echo ("$total11"); ?></td>
												
											</tr>
										</table>
										<br>
		
				</div>
			</div>
				
	</div>
	
	</form> 
				<div class="export">
					 <form method="post" action="export.php">
					 <input type="submit" name="excel" id="excel" value="Export to Microsoft Excel" />
					 <input type="submit" name="word"  id="word" value="Export to Microsoft Word" />
					</form>
						</div>
							<div class="export">
							<form method="post" action="sample.php">
							<input type="submit" name="chart"  id="chart" value="View Chart" />
							</form>
						</div>
	<div id="footer">
		<p>Online Information System for Collecting Sex-disaggregated Data for Barangay Communities</p>
	</div>
	
</body>

</html>