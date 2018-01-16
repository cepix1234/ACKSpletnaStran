<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Airsoft Club Kisovec-Sponzorji</title>

<script type="text/javascript" src="./skripte/scriptaIndexSponzorji.js"></script>

<link rel="stylesheet" type="text/css" href="./stil/StilSponzorji.css">

<script>
	<?php
		session_start();
		$allDirs = glob("./DropBoxNaServerju/SLO/clani" . '/*' , GLOB_ONLYDIR);
		echo 'var tabelaDirektorijev ='.json_encode($allDirs).';';
		echo 'var tabelaVsehSponzorjev ='.json_encode(unserialize($_SESSION["sponzorji"])).';';	
	?>
	
	function MenjavaStr(stran)
	{
		PosljiSezSponorjev('<?php echo $_SESSION["sponzorji"]?>',stran);	
	}
	
	function Zacetek()
	{
		prviLoadSponz(tabelaVsehSponzorjev);
	}
</script>

</head>


<body onload = Zacetek()>
	<div align="center"> 
    	<table border="0" class="glavaTabela">
            <tr>
                <td>
                    <a href="index.php"><img class="Naslovnica" src="./Backgrounds/ACKlogo.png" width="178" height="187" /></a>
                </td>
                <td class="glava">
                    <a href="SponzorjiENG.php" title="Engish"><img src="./Backgrounds/English.png" width="30" height="20" /></a>
                    <a href="Sponzorji.php" title="Slovenščina"><img src="./Backgrounds/Sloven.png" width="30" height="20" /></a>
                	<br/>LANGUAGE: <b>SLO</b>
                </td>
            </tr>
        </table>
    </div>
    <div align="center"> 
        
        <div class="GlavniMenu" align="center">
        	<table class="GlavniMenuTabela">
                  <tr>
                    <button class="GlavniMenuG gumbG1" onclick="MenjavaStr('index.php')">Domov</button>
                  </tr>
                    <tr>
                        <button class="GlavniMenuG gumbG2" onclick="MenjavaStr('Onas.php')">O nas</button>
                      </tr>
                    <tr>
                        <button class="GlavniMenuG gumbG2" onclick="MenjavaStr('ClaniF.php')">Člani</button>
                      </tr>
                    <tr>
                        <button class="GlavniMenuG gumbG4" onclick="MenjavaStr('NaseAktivnosti.php')">Naše aktivnosti</button>
                      </tr>
                    <tr>
                        <button class="GlavniMenuG gumbG2" onclick="MenjavaStr('Treningi.php')">Treningi</button>
                      </tr>
                    <tr>
                        <button class="GlavniMenuG gumbG2" onclick="MenjavaStr('Tereni.php')">Tereni</button>
                      </tr>
                    <tr>
                        <button class="GlavniMenuG gumbGD" onclick="MenjavaStr('Sponzorji.php')">Sponzorji</button>
                      </tr>
                    <tr>
                        <button class="GlavniMenuG gumbG3" onclick="MenjavaStr('GalerijaF.php')">Galerija</button>
                  	</tr>
                </table>
        </div>
        <div align="center">
        	<table class="TabelaSponzorjev">
				<tr>
					<?php
						$VsiSponzorjiTxt = glob("./DropBoxNaServerju/SLO/sponzorji/*.txt");
						$steviloSponzorjev = 1;
						foreach ($VsiSponzorjiTxt as $SponzorTxt)
						{
							$data = fopen($SponzorTxt, "r");
							if ($data)
							{
								$StVrstica = 0;
								$ImeSponzorja = "";
								$LinkDoStraniSponzorja = "";
								$LinkDoSlikeSponzorja = "";
								while (($vrstica = fgets($data)) !== false)
								{
									if ($StVrstica == 0)
									{
										$ImeSponzorja = $vrstica;
									}
									if ($StVrstica == 1)
									{
										$LinkDoStraniSponzorja = $vrstica;
									}
									if ($StVrstica == 2)
									{
										$LinkDoSlikeSponzorja = $vrstica;
										$LinkDoSlikeSponzorja = str_replace(array("\n","\r"), '', $LinkDoSlikeSponzorja);
									}
									$StVrstica++;
								}
								fclose($data);
								$LinkDoSlikeSponzorja = "./DropBoxNaServerju/SLO/sponzorji/slikeSponzorji/".$LinkDoSlikeSponzorja;
								list($width, $height, $type, $attr) = getimagesize($LinkDoSlikeSponzorja);
								?>
								<td align="center">									
									<a href=<?php echo $LinkDoStraniSponzorja?> target="_blank" title="slika"><img class="sponzor" width="<?php echo $width?>" height="<?php echo $height?>" src=<?php echo $LinkDoSlikeSponzorja?> alt=<?php echo $ImeSponzorja?>></a>
								</td>
                                <?php
							}
							if ($steviloSponzorjev%3 == 0)
							{
								?>
                                </tr>
                                <tr>
                                <?php
							}
							$steviloSponzorjev++;
						}						
					?>
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
