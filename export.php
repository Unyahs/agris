<?php include('session.php'); ?>
<?php require('server.php'); ?>
<?php  
if (isset($_SESSION['farm'])==true) {
		$bg = $_SESSION['farm'];
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
				count(case when resrv = 'Yes' AND ressex = 'Male' THEN resid END) AS ymale,
				count(case when resrv = 'Yes' AND ressex = 'Female' THEN resid END) AS yfemale, 
				count(case when resrv = 'No' AND ressex = 'Male' THEN resid END) AS nmale,
				count(case when resrv = 'No' AND ressex = 'Female' THEN resid END) AS nfemale FROM `tblresinfo` WHERE resbrgy ='$bg'");
			if(isset($_POST["excel"]))
				{
				
				 while($row=mysqli_fetch_array($query)){
								
				$hh = $row['hh'];
				$male = $row['Male'] ;
				$female = $row['Female'] ;
				$tutal = $male + $female;
				
				if($male== 0) {
					$freq111 = '0';
				}else{
					$freq111 = round($male/$tutal * '100');
				}
				if($female== 0) {
					$freq222 = '0';
				}else{
					$freq222 =  round($female/$tutal * '100');
				}
				
				if($freq111== 0 && $freq222==0) {
					$freq333 = '0';
				}else{
					$freq333 = $freq111 + $freq222;
				}
				
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
				  $output .= '
				   <table border="1" style="width:100%">  
									<tr>  
										 <th>Total no of Household in ' .$bg. '</th>
										 <th>Total no Male in ' .$bg. '</th>
										 <th>Frequency</th>
										 <th>Total no Female in ' .$bg. '</th>
										 <th>Frequency</th>
										 <th>Total</th>
										 
									</tr>
								
									<tr>	
										 <td style="text-align:center">'.$hh.'</td>
										 <td style="text-align:center">'.$male.'</td>
										 <td style="text-align:center">'.$freq111.'</td>
										 <td style="text-align:center">'.$female.'</td>	
										 <td style="text-align:center">'.$freq222.'</td>
										 <td style="text-align:center">'.$tutal.'</td>		
										 								 
									</tr>
									
									<tr>
												<td></td>
												<th>Male</th>
												<th>Frequency</th>
												<th>Female</th>
												<th>Frequency</th>
												<th>Total</th>
												
									</tr>
									
									<tr>
										<td style="text-align:center">Under 18</td>
										<td style="text-align:center">'.$mage.'</td>
										<td style="text-align:center">'.$freq1.'</td>
										<td style="text-align:center">'.$fage.'</td>
										<td style="text-align:center">'.$freq2.'</td>
										<td style="text-align:center">'.$total.'</td>
										
									</tr>
									
									<tr>
										<td style="text-align:center">18 and Above</td>
										<td style="text-align:center">'.$teen.'</td>
										<td style="text-align:center">'.$freq4.'</td>
										<td style="text-align:center">'.$teen2.'</td>
										<td style="text-align:center">'.$freq5.'</td>
										<td style="text-align:center">'.$total2.'</td>
										
									</tr>
									
									<tr>
										<td style="text-align:center">Senior Citizen</td>
										<td style="text-align:center">'.$seniorm.'</td>
										<td style="text-align:center">'.$freq7.'</td>
										<td style="text-align:center">'.$seniorf.'</td>
										<td style="text-align:center">'.$freq8.'</td>
										<td style="text-align:center">'.$total3.'</td>
										
									</tr>
									
									<tr>
												<td></td>
												<th>Male</th>
												<th>Frequency</th>
												<th>Female</th>
												<th>Frequency</th>
												<th>Total</th>
												
									</tr>
									<tr>
										<td style="text-align:center">Married</td>
										<td style="text-align:center">'.$mmale.'</td>
										<td style="text-align:center">'.$freq10.'</td>
										<td style="text-align:center">'.$mfemale.'</td>
										<td style="text-align:center">'.$freq11.'</td>
										<td style="text-align:center">'.$total8.'</td>
										
									</tr>
									<tr>
										<td style="text-align:center">Widowed</td>
										<td style="text-align:center">'.$wmale.'</td>
										<td style="text-align:center">'.$freq13.'</td>
										<td style="text-align:center">'.$wfemale.'</td>
										<td style="text-align:center">'.$freq14.'</td>
										<td style="text-align:center">'.$total7.'</td>
										
									</tr>
									<tr>
										<td style="text-align:center">Seperated</td>
										<td style="text-align:center">'.$semale.'</td>
										<td style="text-align:center">'.$freq16.'</td>
										<td style="text-align:center">'.$sefemale.'</td>
										<td style="text-align:center">'.$freq17.'</td>
										<td style="text-align:center">'.$total6.'</td>
										
									</tr>
									<tr>
										<td style="text-align:center">Divorced</td>
										<td style="text-align:center">'.$dmale.'</td>
										<td style="text-align:center">'.$freq19.'</td>
										<td style="text-align:center">'.$dfemale.'</td>
										<td style="text-align:center">'.$freq20.'</td>
										<td style="text-align:center">'.$total5.'</td>
										
									</tr>
									<tr>
										<td style="text-align:center">Single</td>
										<td style="text-align:center">'.$smale.'</td>
										<td style="text-align:center">'.$freq22.'</td>
										<td style="text-align:center">'.$sfemale.'</td>
										<td style="text-align:center">'.$freq23.'</td>
										<td style="text-align:center">'.$total4.'</td>
										
									</tr>
									<tr>
												<td></td>
												<th>Male</th>
												<th>Frequency</th>
												<th>Female</th>
												<th>Frequency</th>
												<th>Total</th>
												
									</tr>
												
									<tr>
										<td style="text-align:center">Employed</td>
										<td style="text-align:center">'.$pnmale.'</td>
										<td style="text-align:center">'.$freq25.'</td>
										<td style="text-align:center">'.$pnfemale.'</td>
										<td style="text-align:center">'.$freq26.'</td>
										<td style="text-align:center">'.$total10.'</td>
										
									</tr>
									<tr>
										<td style="text-align:center">Unemployed</td>
										<td style="text-align:center">'.$pmale.'</td>
										<td style="text-align:center">'.$freq28.'</td>
										<td style="text-align:center">'.$pfemale.'</td>
										<td style="text-align:center">'.$freq29.'</td>
										<td style="text-align:center">'.$total9.'</td>
										
									</tr>
									<tr>
										<td style="text-align:center">Registered Voters</td>
										<td style="text-align:center">'.$ymale.'</td>
										<td style="text-align:center">'.$freq31.'</td>
										<td style="text-align:center">'.$yfemale.'</td>
										<td style="text-align:center">'.$freq32.'</td>
										<td style="text-align:center">'.$total12.'</td>
										
									</tr>
									<tr>
										<td style="text-align:center">None Registered Voters</td>
										<td style="text-align:center">'.$nmale.'</td>
										<td style="text-align:center">'.$freq34.'</td>
										<td style="text-align:center">'.$nfemale.'</td>
										<td style="text-align:center">'.$freq35.'</td>
										<td style="text-align:center">'.$total11.'</td>
										
									</tr>
				  ';
				 
				  $output .= '</table>';
				  header('Content-Type: application/vnd.xls');
				  header('Content-Disposition: attachment; filename=GeneratedReports.xls');
				  echo $output;
				 
				}elseif(isset($_POST["word"])){
					
				 while($row=mysqli_fetch_array($query)){
						$hh = $row['hh'];
				$male = $row['Male'] ;
				$female = $row['Female'] ;
				$tutal = $male + $female;
				
				if($male== 0) {
					$freq111 = '0';
				}else{
					$freq111 = round($male/$tutal * '100');
				}
				if($female== 0) {
					$freq222 = '0';
				}else{
					$freq222 =  round($female/$tutal * '100');
				}
				
				if($freq111== 0 && $freq222==0) {
					$freq333 = '0';
				}else{
					$freq333 = $freq111 + $freq222;
				}
				
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
				  $output .= '
				   <table border="1" style="width:100%">  
									<tr>  
										 <th>Total no of Household in ' .$bg. '</th>
										 <th>Total no Male in ' .$bg. '</th>
										 <th>Frequency</th>
										 <th>Total no Female in ' .$bg. '</th>
										 <th>Frequency</th>
										 <th>Total</th>
										
									</tr>
								
									<tr>	
										 <td style="text-align:center">'.$hh.'</td>
										 <td style="text-align:center">'.$male.'</td>
										 <td style="text-align:center">'.$freq111.'</td>
										 <td style="text-align:center">'.$female.'</td>	
										 <td style="text-align:center">'.$freq222.'</td>
										 <td style="text-align:center">'.$tutal.'</td>		
																			 
									</tr>
									
									<tr>
												<td></td>
												<th>Male</th>
												<th>Frequency</th>
												<th>Female</th>
												<th>Frequency</th>
												<th>Total</th>
												
									</tr>
									
									<tr>
										<td style="text-align:center">Under 18</td>
										<td style="text-align:center">'.$mage.'</td>
										<td style="text-align:center">'.$freq1.'</td>
										<td style="text-align:center">'.$fage.'</td>
										<td style="text-align:center">'.$freq2.'</td>
										<td style="text-align:center">'.$total.'</td>
										
									</tr>
									
									<tr>
										<td style="text-align:center">18 and Above</td>
										<td style="text-align:center">'.$teen.'</td>
										<td style="text-align:center">'.$freq4.'</td>
										<td style="text-align:center">'.$teen2.'</td>
										<td style="text-align:center">'.$freq5.'</td>
										<td style="text-align:center">'.$total2.'</td>
										
									</tr>
									
									<tr>
										<td style="text-align:center">Senior Citizen</td>
										<td style="text-align:center">'.$seniorm.'</td>
										<td style="text-align:center">'.$freq7.'</td>
										<td style="text-align:center">'.$seniorf.'</td>
										<td style="text-align:center">'.$freq8.'</td>
										<td style="text-align:center">'.$total3.'</td>
										
									</tr>
									
									<tr>
												<td></td>
												<th>Male</th>
												<th>Frequency</th>
												<th>Female</th>
												<th>Frequency</th>
												<th>Total</th>
												
									</tr>
									<tr>
										<td style="text-align:center">Married</td>
										<td style="text-align:center">'.$mmale.'</td>
										<td style="text-align:center">'.$freq10.'</td>
										<td style="text-align:center">'.$mfemale.'</td>
										<td style="text-align:center">'.$freq11.'</td>
										<td style="text-align:center">'.$total8.'</td>
										
									</tr>
									<tr>
										<td style="text-align:center">Widowed</td>
										<td style="text-align:center">'.$wmale.'</td>
										<td style="text-align:center">'.$freq13.'</td>
										<td style="text-align:center">'.$wfemale.'</td>
										<td style="text-align:center">'.$freq14.'</td>
										<td style="text-align:center">'.$total7.'</td>
										
									</tr>
									<tr>
										<td style="text-align:center">Seperated</td>
										<td style="text-align:center">'.$semale.'</td>
										<td style="text-align:center">'.$freq16.'</td>
										<td style="text-align:center">'.$sefemale.'</td>
										<td style="text-align:center">'.$freq17.'</td>
										<td style="text-align:center">'.$total6.'</td>
										
									</tr>
									<tr>
										<td style="text-align:center">Divorced</td>
										<td style="text-align:center">'.$dmale.'</td>
										<td style="text-align:center">'.$freq19.'</td>
										<td style="text-align:center">'.$dfemale.'</td>
										<td style="text-align:center">'.$freq20.'</td>
										<td style="text-align:center">'.$total5.'</td>
										
									</tr>
									<tr>
										<td style="text-align:center">Single</td>
										<td style="text-align:center">'.$smale.'</td>
										<td style="text-align:center">'.$freq22.'</td>
										<td style="text-align:center">'.$sfemale.'</td>
										<td style="text-align:center">'.$freq23.'</td>
										<td style="text-align:center">'.$total4.'</td>
										
									</tr>
									<tr>
												<td></td>
												<th>Male</th>
												<th>Frequency</th>
												<th>Female</th>
												<th>Frequency</th>
												<th>Total</th>
												
									</tr>
												
									<tr>
										<td style="text-align:center">Employed</td>
										<td style="text-align:center">'.$pnmale.'</td>
										<td style="text-align:center">'.$freq25.'</td>
										<td style="text-align:center">'.$pnfemale.'</td>
										<td style="text-align:center">'.$freq26.'</td>
										<td style="text-align:center">'.$total10.'</td>
										
									</tr>
									<tr>
										<td style="text-align:center">Unemployed</td>
										<td style="text-align:center">'.$pmale.'</td>
										<td style="text-align:center">'.$freq28.'</td>
										<td style="text-align:center">'.$pfemale.'</td>
										<td style="text-align:center">'.$freq29.'</td>
										<td style="text-align:center">'.$total9.'</td>
										
									</tr>
									<tr>
										<td style="text-align:center">Registered Voters</td>
										<td style="text-align:center">'.$ymale.'</td>
										<td style="text-align:center">'.$freq31.'</td>
										<td style="text-align:center">'.$yfemale.'</td>
										<td style="text-align:center">'.$freq32.'</td>
										<td style="text-align:center">'.$total12.'</td>
										
									</tr>
									<tr>
										<td style="text-align:center">None Registered Voters</td>
										<td style="text-align:center">'.$nmale.'</td>
										<td style="text-align:center">'.$freq34.'</td>
										<td style="text-align:center">'.$nfemale.'</td>
										<td style="text-align:center">'.$freq35.'</td>
										<td style="text-align:center">'.$total11.'</td>
										
									</tr>
				  ';
				 
				  $output .= '</table>';
				  header('Content-Type: application/vnd.msword');
				  header('Content-Disposition: attachment; filename=GeneratedReports.doc');
				  echo $output;
				}
	}
?>