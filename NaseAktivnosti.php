<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Airsoft Club Kisovec-NaseAktivnosti</title>

<script type="text/javascript" src="./skripte/scriptaIndexSponzorji.js"></script>
<script type="text/javascript" src="./skripte/scriptaNaseAktivnosti.js"></script>


<link rel="stylesheet" type="text/css" href="./stil/StilNaseAktivnosti.css">

<script>
	<?php
		session_start();
	//pridobitev sponzorjev
		echo 'var tabelaVsehSponzorjev ='.json_encode(unserialize($_SESSION["sponzorji"])).';';
		
		//pridobitev vseh aktivnosti
		$tabelaVsehAktivnosti = array();
		$VseAktivnostiDirr = glob("./DropBoxNaServerju/SLO/nase_aktivnosti" . '/*' , GLOB_ONLYDIR);
		$IndexVCeliTab = 0;
		foreach ($VseAktivnostiDirr as $aktivnostDirr)
		{
			$tabelaVsehAktivnosti[$IndexVCeliTab][0][0][0] = substr($aktivnostDirr,strrpos($aktivnostDirr,"/")+1);
			$VseAktivnostiTxt = glob($aktivnostDirr."/*.txt");
			$VseAktivnostiSlike = array();
			$VsaBesedilaAktivnosti = array();
			$IndexVTab = 1;
			foreach ($VseAktivnostiTxt as $aktivnostiTxt)
			{
				$data = fopen($aktivnostiTxt, "r");
				if ($data)
				{
					$StVrstica = 0;
					$LinkDoSlikeAktivnosti = "";
					$BesediloAktivnosti = "";
					while (($vrstica = fgets($data)) !== false)
					{
						if ($StVrstica == 0)
						{
							$LinkDoSlikeAktivnosti = $vrstica;
						}
						else
						{
							$BesediloAktivnosti .= $vrstica;
						}
						$StVrstica++;
					}
					fclose($data);
					$LinkDoSlikeAktivnosti = str_replace(array("\n","\r"), '', $LinkDoSlikeAktivnosti);
					$tabelaVsehAktivnosti[$IndexVCeliTab][$IndexVTab][0][0] = $LinkDoSlikeAktivnosti;
					$tabelaVsehAktivnosti[$IndexVCeliTab][0][$IndexVTab][0] = $BesediloAktivnosti;
					$SubStrAktivnostiTxt = substr($aktivnostiTxt,strrpos($aktivnostiTxt,"/")+1);
					$tabelaVsehAktivnosti[$IndexVCeliTab][0][0][$IndexVTab] = substr($SubStrAktivnostiTxt,0,strrpos($SubStrAktivnostiTxt,"."));
					$IndexVTab++;
				}
			}
			$IndexVCeliTab++;
		}
	?>
	
	function MenjavaStr(stran)
	{
		PosljiSezSponorjev('<?php echo $_SESSION["sponzorji"]?>',stran);	
	}
	
	function Zacetek()
	{
		prviLoadSponz(tabelaVsehSponzorjev);
	}
	function PojdiNaGalerijo(ime)
	{
		DoPost(ime,'<?php echo $_SESSION["sponzorji"]?>');	
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
                    <a href="NaseAktivnostiENG.php" title="Engish"><img src="./Backgrounds/English.png" width="30" height="20" /></a>
                    <a href="NaseAktivnosti.php" title="Slovenščina"><img src="./Backgrounds/Sloven.png" width="30" height="20" /></a>
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
                        <button class="GlavniMenuG gumbGD" onclick="MenjavaStr('NaseAktivnosti.php')">Naše aktivnosti</button>
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
        
        <div class="vsebina" align="center">
            Kot klub smo karseda dejavni na lokalni ravni, prav tako se pridružujemo eventom in medklubskim spopadom v štajerski regiji. 
            Seveda se z veseljem odzovem vsakršnem vabilu, saj strmimo k tem močnejši slovenski airsoft skupnosti, 
            saj bomo le tako gojili duh fairplaya na vsakršnemkoli spopadu, kjerkoli in kadarkoli, doma ali v tujini.</p>
			Poleg omenjenih aktivnosti redno organiziramo treninge na domačem poligonu, 
            kjer nekajkrat letno organiziramo tudi medklubske treninge ali spopade. Seveda vsako leto pred časom dopustov organiziramo tudi naš 
            že tradicionalni dogodek Bloody Rock, na katerem se potrudimo prikazati življenje na bojiščih po svetu v tem bolj realnih pogojih.
		</div>
        
        <div class="razmakMedVsebino" align="center">
        <?php
			for ($i = 0; $i< count($tabelaVsehAktivnosti);$i++)
			{
				?>
                    <div  class="OzadnjeEneNovice" align="center">
                        <table border="0">
                            <tr>
                                <td>
                                    <div id= "<?php  echo("JSSlikaAktivnosti".$i)?>" class="slikaPriNovicah">
                                     <a href="javascript:PojdiNaGalerijo('<?php echo($tabelaVsehAktivnosti[$i][0][0][0])?>')"> <img src="./Slike/BloodyRockPlaceHolder.png" width="174" height="139" /></a>
                                    </div>
                                </td>
                                <td>
                            
                                <ul class="menu">
                                    <li><a href="#"><?php echo($tabelaVsehAktivnosti[$i][0][0][0])?>&#9660</a>
                                       <ul id="scrollbar-custom">
                                        <?php
                                            for ($y = 1; $y< count($tabelaVsehAktivnosti[$i]);$y++)
											{
                                        ?>
                                            	<li><a onClick = 'zamenjavaAktivnosti(<?php echo $i?>, <?php echo $y?>, <?php echo json_encode($tabelaVsehAktivnosti);?>)' href="#" ><?php echo($tabelaVsehAktivnosti[$i][0][0][$y])?></a></li>
										<?php
											}
                                        ?>
                                        </ul>
                                </td>
                                 <td>
                                     <div id= "<?php  echo("JSBesediloAktivnosti".$i)?>">
										<p>Iz spustnega menija izberite aktivnost!</p>
                                     </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                <?php
			}
		?>
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
