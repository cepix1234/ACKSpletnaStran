<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Airsoft Club Kisovec-Domov</title>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script>

<script type="text/javascript" src="./galleria/galleria-1.4.2.min.js"></script>
<script type="text/javascript" src="./skripte/scriptaIndexSponzorji.js"></script>

<link rel="stylesheet" type="text/css" href="./stil/StilIndex.css">

<script>
	<?php
	session_start();
		$VsiSponzorjiTxt = glob("./DropBoxNaServerju/SLO/sponzorji/*.txt");
		$VsiSponzorjiSlike = array();
		$IndexVTab = 0;
		foreach ($VsiSponzorjiTxt as $SponzorTxt)
		{
			$data = fopen($SponzorTxt, "r");
			if ($data)
			{
				$StVrstica = 0;
				$LinkDoSlikeSponzorja = "";
				while (($vrstica = fgets($data)) !== false)
				{
					if ($StVrstica == 2)
					{
						$LinkDoSlikeSponzorja = $vrstica;
					}
					$StVrstica++;
				}
				fclose($data);
				$LinkDoSlikeSponzorja = str_replace(array("\n","\r"), '', $LinkDoSlikeSponzorja);
				$VsiSponzorjiSlike[$IndexVTab] = $LinkDoSlikeSponzorja;
				$IndexVTab++;
			}
		}
		echo 'var tabelaVsehSponzorjev ='.json_encode($VsiSponzorjiSlike).';';
		$_SESSION["sponzorji"] = serialize($VsiSponzorjiSlike);
	?>
	
	function Zacetek()
	{
		prviLoadSponz(tabelaVsehSponzorjev);	
	}
	
	function MenjavaStr(stran)
	{
		PosljiSezSponorjev('<?php echo serialize($VsiSponzorjiSlike)?>',stran);	
	}
	function PojdiNaGalerijo(ime)
	{
		DoPost(ime,'<?php echo serialize($VsiSponzorjiSlike)?>');	
	}
</script>

</head>
<?php 
	//pridobitev zadnjega posta iz Facebooka
	  $data = get_data("https://graph.facebook.com/636934853003392/promotable_posts?access_token=CAAT0H0BUHf4BADl3hgFZCj4OTalY5QXzsGZAfy5MKitY0Upqfqn5UIL4qvt0ZC1g7zq6uKMehJFI2LZBTOXOZCZCj7vSjuEjIPZAGYsegRbWau4frcGJMg8VxifcXd8wU8juXfSDsuqZBCaiTAZCugeUuNsBrVQKep06ARZClSYWzasa9jSeAmjGgotvFno0l1hjgZD");
	  if($data != null)
	  {
		$result = json_decode($data);
		  $latest_post =  $result->data[0];
		  $latest_post_text = $latest_post->message;
		  $latest_post_link = $latest_post->id;
	  }else if ($data == null)
	  {
		  $latest_post =  "";
		  $latest_post_text = "Napaka pri pridobivanju zadnjega vnosa na Facebook starni!";
		  $latest_post_link = "";
	  }
	  
	  function get_data($url) {
		$ch = curl_init();
		$timeout = 5;
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		$data = curl_exec($ch);
		curl_close($ch);
		return $data;
	}
	//konec pridobitve
	
	$VseNoviceTxt = glob("./DropBoxNaServerju/SLO/novice/*.txt");
	$vseSlikeFolder = array_filter(glob("./DropBoxNaServerju/SLO/vse slike/*"), 'is_dir');
?>


<body onload = Zacetek()>
    <div align="center"> 
    	<table border="0" class="glavaTabela">
            <tr>
                <td>
                    <a href="index.php"><img class="Naslovnica" src="./Backgrounds/ACKlogo.png" width="178" height="187" /></a>
                </td>
                <td class="glava">
                    <a href="indexENG.php" title="Engish"><img src="./Backgrounds/English.png" width="30" height="20" /></a>
                    <a href="index.php" title="Slovenščina"><img src="./Backgrounds/Sloven.png" width="30" height="20" /></a>
                	<br/>LANGUAGE: <b>SLO</b>
                </td>
            </tr>
        </table>
    </div>
    <div align="center">
        
        <div class="GlavniMenu" align="center">
        	<table class="GlavniMenuTabela">
                  <tr>
                    <button class="GlavniMenuG gumbGD" onclick="MenjavaStr('index.php')">Domov</button>
                  </tr>
                    <tr>
                        <button class="GlavniMenuG gumbG2" onclick="MenjavaStr('Onas.php')">O nas</button>
                      </tr>
                    <tr>
                        <button class="GlavniMenuG gumbG2" onclick="MenjavaStr('ClaniF.php')">Člani</button>
                      </tr>
                    <tr>
                        <button class="GlavniMenuG gumbG4" onclick="MenjavaStr('NaseAktivnosti.php')">Na&scaron;e aktivnosti</button>
                      </tr>
                    <tr>
                        <button class="GlavniMenuG gumbG2" onclick="MenjavaStr('Treningi.php')">Treningi</button>
                      </tr>
                    <tr>
                        <button class="GlavniMenuG gumbG2" onclick="MenjavaStr('Tereni.php')">Tereni</button>
                      </tr>
                    <tr>
                        <button class="GlavniMenuG gumbG2" onclick="MenjavaStr('Sponzorji.php')">Sponzorji</button>
                      </tr>
                    <tr>
                        <button class="GlavniMenuG gumbG3" onclick="MenjavaStr('GalerijaF.php')">Galerija</button>
                  	</tr>
                </table>
        </div>
        
        <div align="center">
            <table border="0">
                <tr>
                    <td rowspan="2">
                   	  <div id="scrollbar-custom" class="OzadnjeDesetZadnjihNovic" align="center">
                      		<div class="prostorZaDogodke"></div>
                            
                            <?php
								foreach ($VseNoviceTxt as $NovicaTxt)
								{
									$data = fopen($NovicaTxt, "r");
									if ($data)
									{
										$StVrstica = 0;
										$besedilo = "";
										$linkDoSLik = "";
										while (($vrstica = fgets($data)) !== false)
										{
											if ($StVrstica == 0)
											{
												$linkDoSLik = $vrstica;
											}
											else
											{
												$besedilo = "$besedilo$vrstica<p/>";
											}
											$StVrstica++;
										}
										fclose($data);
										$linkDoSLik = str_replace(array("\n","\r"), '', $linkDoSLik);
										$linkDoSLik = substr($linkDoSLik,strpos($linkDoSLik,"."));
										$novicaNaslov = substr($NovicaTxt,strrpos($NovicaTxt,"/")+1);
										$novicaNaslov = substr($novicaNaslov,0,strpos($novicaNaslov,"."));
										?>
										<div class="OzadnjeEneNovice" align="center">
											 <table border="0">
												<tr>
													<td>
														<div class="slikaPriNovicah">
														  <a href="javascript:PojdiNaGalerijo('<?php echo $novicaNaslov?>')"><img src="<?php echo $linkDoSLik; ?>" width="180" height="180" /></a>
														</div>
													</td>
													<td>
														<div class="NovicaPisava">
															<?php echo $besedilo; ?>
														</div>
													</td>
												</tr>
											</table>
									</div>
									<?php	
									}
								}
                            ?>
                   	    </div>
                    </td>
                    <td>
                        <div class="OzadnjeFacebookZanjiaObjava" align="center">
                         	<div class="FacebookTextIzSltrani" align="left">
                            	<div class="PrelomLinkaDoFacebooka">
                                	<a class="LinkDoFacebooka" href="https://www.facebook.com/<?php echo $latest_post_link ?>" target="_blank">https://www.facebook.com/<?php echo $latest_post_link ?></a>
                                </div>
                                <p>
                            	<?php echo $latest_post_text ?>
                            </div>
                      </div>
                  </td>
                </tr>
                <tr>
                	<td>
                    <?php
						$randFolder = rand(0, count($vseSlikeFolder)-1);
						$izbraniFolder = $vseSlikeFolder[$randFolder];
						$linkDoGalarije = substr($izbraniFolder,strrpos($izbraniFolder,"/")+1);
						$arrayRandomSLik = array();
						$vseSlikeVFolderju = glob("$izbraniFolder/*");
						for($i = 0;$i<7;$i++)
						{
							$randSLika = rand(0,count($vseSlikeVFolderju)-1);
							if(in_array($randSLika,$arrayRandomSLik))
							{
								$i--;	
							}
							else
							{
								array_push($arrayRandomSLik,$randSLika);	
							}
						}
					?>
                       <a href="javascript:PojdiNaGalerijo('<?php echo $linkDoGalarije?>')"> <div class="galleria" >
							<?php
								for($i = 0;$i<count($arrayRandomSLik);$i++)
								{
									?>
                                    	 <img src="<?php echo $vseSlikeVFolderju[$arrayRandomSLik[$i]]?>" width="500" height="300" />
                                    <?php
								}
                            ?>
                      </div></a>
                      <script>
							Galleria.loadTheme('./galleria/themes/classic/galleria.classic.min.js');
							Galleria.run('.galleria');
						</script>
                    </td>
                </tr>
            </table>
        </div>
        <div class="SpodnjiMenuInSponzorji" align="center">
            <table  border="0" class="spodnjaTabela">
                <tr>
                    <td>
                    	<table border="0">
                            <tr>
                                <td>
                                    <img src="Backgrounds/PikaZaSpodnjiMenu.png" class="Pika"/> <a class="spodnjiMenu" onclick="MenjavaStr('index.php')"><u>Domov</u></a>
                                </td>
                                <td>
                                    <img src="Backgrounds/PikaZaSpodnjiMenu.png" class="Pika"/> <a class="spodnjiMenu" onclick="MenjavaStr('NaseAktivnosti.php')"><u>Na&scaron;e aktivnosti</u></a>
                                </td>
                                <td>
                                    <img src="Backgrounds/PikaZaSpodnjiMenu.png" class="Pika"/> <a class="spodnjiMenu" onclick="MenjavaStr('Sponzorji.php')"><u>Sponzorjit</u></a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="Backgrounds/PikaZaSpodnjiMenu.png" class="Pika"/><a class="spodnjiMenu" onclick="MenjavaStr('Onas.php')"><u> O nas</u></a>
                                </td>
                                <td>
                                    <img src="Backgrounds/PikaZaSpodnjiMenu.png" class="Pika"/> <a class="spodnjiMenu" onclick="MenjavaStr('Treningi.php')"><u>Treningi</u></a>
                                </td>
                                <td>
                                    <img src="Backgrounds/PikaZaSpodnjiMenu.png" class="Pika"/> <a class="spodnjiMenu" onclick="MenjavaStr('GalerijaF.php')"><u>Galerija</u></a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="Backgrounds/PikaZaSpodnjiMenu.png" class="Pika"/> <a class="spodnjiMenu" onclick="MenjavaStr('ClaniF.php')"><u>Člani</u></a>
                                </td>
                                <td>
                                    <img src="Backgrounds/PikaZaSpodnjiMenu.png" class="Pika"/><a class="spodnjiMenu" onclick="MenjavaStr('Tereni.php')"><u>Tereni</u></a>
                                </td>
                            </tr>   
                     	</table>
                    </td>
                    <td>
                    	All rights reserved ACK
                        <p>
                        Created by Baž Ocepek
                    </td>
                    <td>
                    <div id="JSTableSponzorji">
	  				 </div>
                    </td>
                </tr>
             </table>
           
      </div>
</div>
</body>
</html>
