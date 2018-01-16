<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Airsoft Club Kisovec-Clani</title>

<script type="text/javascript" src="./skripte/scriptaIndexSponzorji.js"></script>
<script type="text/javascript" src="./skripte/jquery-1.12.0.min.js"></script>
<script type="text/javascript" src="./skripte/scriptaClaniF.js"></script>
<link rel="stylesheet" type="text/css" href="./stil/stilClaniF.css">


<script>
	<?php
		session_start();
		$allDirs = glob("./DropBoxNaServerju/ENG/clani" . '/*' , GLOB_ONLYDIR);
		echo 'var tabelaDirektorijev ='.json_encode($allDirs).';';
		echo 'var tabelaVsehSponzorjev ='.json_encode(unserialize($_SESSION["sponzorji"])).';';	
	?>
	
	function MenjavaStr(stran)
	{
		PosljiSezSponorjev('<?php echo $_SESSION["sponzorji"]?>',stran);	
	}
	
	function Zacetek()
	{
		prviLoad(tabelaDirektorijev,'<?php echo $_SESSION["sponzorji"]?>');
		prviLoadSponz(tabelaVsehSponzorjev);
	}
</script>

</head>


<body onload = Zacetek()>
	<div align="center"> 
    	<table border="0" class="glavaTabela">
            <tr>
                <td>
                    <a href="indexENG.php"><img class="Naslovnica" src="./Backgrounds/ACKlogo.png" width="178" height="187" /></a>
                </td>
                <td class="glava">
                    <a href="javascript:MenjavaStr('ClaniFENG.php')" title="Engish"><img src="./Backgrounds/English.png" width="30" height="20" /></a>
                    <a href="javascript:MenjavaStr('ClaniF.php')" title="Slovenščina"><img src="./Backgrounds/Sloven.png" width="30" height="20" /></a>
                	<br/>LANGUAGE: <b>ENG</b>
                </td>
            </tr>
        </table>
    </div>
    <div align="center"> 
        
        <div class="GlavniMenu" align="center">
        	<table class="GlavniMenuTabela">
                  <tr>
                    <button class="GlavniMenuG gumbG1" onclick="MenjavaStr('indexENG.php')">Domov</button>
                  </tr>
                    <tr>
                        <button class="GlavniMenuG gumbG2" onclick="MenjavaStr('OnasENG.php')">O nas</button>
                      </tr>
                    <tr>
                        <button class="GlavniMenuG gumbGD" onclick="MenjavaStr('ClaniFENG.php')">Člani</button>
                      </tr>
                    <tr>
                        <button class="GlavniMenuG gumbG4" onclick="MenjavaStr('NaseAktivnostiENG.php')">Naše aktivnosti</button>
                      </tr>
                    <tr>
                        <button class="GlavniMenuG gumbG2" onclick="MenjavaStr('TreningiENG.php')">Treningi</button>
                      </tr>
                    <tr>
                        <button class="GlavniMenuG gumbG2" onclick="MenjavaStr('TereniENG.php')">Tereni</button>
                      </tr>
                    <tr>
                        <button class="GlavniMenuG gumbG2" onclick="MenjavaStr('SponzorjiENG.php')">Sponzorji</button>
                      </tr>
                    <tr>
                        <button class="GlavniMenuG gumbG3" onclick="MenjavaStr('GalerijaFENG.php')">Galerija</button>
                  	</tr>
                </table>
        </div>
	   <div id="JSTable">
	   </div>       
        <div class="SpodnjiMenuInSponzorji" align="center">
         <table  border="0" class="spodnjaTabela">
                <tr>
                    <td>
                    	<table border="0">
                            <tr>
                                <td>
                                    <img src="Backgrounds/PikaZaSpodnjiMenu.png" class="Pika"/> <a class="spodnjiMenu" onclick="MenjavaStr('indexENG.php')"><u>Domov</u></a>
                                </td>
                                <td>
                                    <img src="Backgrounds/PikaZaSpodnjiMenu.png" class="Pika"/> <a class="spodnjiMenu" onclick="MenjavaStr('NaseAktivnostiENG.php')"><u>Na&scaron;e aktivnosti</u></a>
                                </td>
                                <td>
                                    <img src="Backgrounds/PikaZaSpodnjiMenu.png" class="Pika"/> <a class="spodnjiMenu" onclick="MenjavaStr('SponzorjiENG.php')"><u>Sponzorjit</u></a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="Backgrounds/PikaZaSpodnjiMenu.png" class="Pika"/><a class="spodnjiMenu" onclick="MenjavaStr('OnasENG.php')"><u> O nas</u></a>
                                </td>
                                <td>
                                    <img src="Backgrounds/PikaZaSpodnjiMenu.png" class="Pika"/> <a class="spodnjiMenu" onclick="MenjavaStr('TreningiENG.php')"><u>Treningi</u></a>
                                </td>
                                <td>
                                    <img src="Backgrounds/PikaZaSpodnjiMenu.png" class="Pika"/> <a class="spodnjiMenu" onclick="MenjavaStr('GalerijaFENG.php')"><u>Galerija</u></a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="Backgrounds/PikaZaSpodnjiMenu.png" class="Pika"/> <a class="spodnjiMenu" onclick="MenjavaStr('ClaniFENG.php')"><u>Člani</u></a>
                                </td>
                                <td>
                                    <img src="Backgrounds/PikaZaSpodnjiMenu.png" class="Pika"/><a class="spodnjiMenu" onclick="MenjavaStr('TereniENG.php')"><u>Tereni</u></a>
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
