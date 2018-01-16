<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Airsoft Club Kisovec-Tereni</title>

<script type="text/javascript" src="./skripte/scriptaIndexSponzorji.js"></script>


<link rel="stylesheet" type="text/css" href="./stil/StilTereni.css">

<script>
	<?php
		session_start();
		echo 'var tabelaVsehSponzorjev ='.json_encode(unserialize($_SESSION["sponzorji"])).';';	
	?>
	
	function Zacetek()
	{
		prviLoadSponz(tabelaVsehSponzorjev);	
	}
	
	function MenjavaStr(stran)
	{
		PosljiSezSponorjev('<?php echo $_SESSION["sponzorji"]?>',stran);	
	}
	
	function PojdiNaGalerijo(ime)
	{
		DoPost(ime,'<?php echo $_SESSION["sponzorji"]?>');	
	}
</script>

<?php
	$vsiPoligoniTxt = glob("./DropBoxNaServerju/SLO/tereni/*.txt");
?>

</head>

<body onload = Zacetek()>
	<div align="center"> 
    	<table border="0" class="glavaTabela">
            <tr>
                <td>
                    <a href="index.php"><img class="Naslovnica" src="./Backgrounds/ACKlogo.png" width="178" height="187" /></a>
                </td>
                <td class="glava">
                    <a href="TereniENG.php" title="Engish"><img src="./Backgrounds/English.png" width="30" height="20" /></a>
                    <a href="Tereni.php" title="Slovenščina"><img src="./Backgrounds/Sloven.png" width="30" height="20" /></a>
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
                        <button class="GlavniMenuG gumbGD" onclick="MenjavaStr('Tereni.php')">Tereni</button>
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
			 <?php
                foreach ($vsiPoligoniTxt as $poligonTxt)
                {
                    $data = fopen($poligonTxt ,"r");
                    if($data)
                    {
                        $stVrstic = 0;
                        $linkDoSlike = "";
                        $besedilo = "";
                        while(($vrstica = fgets($data)) !== false)
                        {
                            if($stVrstic == 0)
                            {
                                $linkDoSlike = $vrstica;
                            }
                            else
                            {
                                $besedilo = "$besedilo$vrstica";
                            }
                            $stVrstic++;
                        }
                        fclose($data);
                        $linkDoSlike = str_replace(array("\n","\r"), '', $linkDoSlike);
                        $linkDoSlike = substr($linkDoSlike,strpos($linkDoSlike,"."));
                        $novicaNaslov = substr($poligonTxt,strrpos($poligonTxt,"/")+1);
                        $novicaNaslov = substr($novicaNaslov,0,strpos($novicaNaslov,"."));
                        $naslovnicaPoligona = str_replace("_"," ",$novicaNaslov);
                        ?>
                            <div class="OzadnjeEneNovice" align="center">
                                 <table border="0">
                                    <tr>
                                        <td>
                                            <div class="slikaPriNovicah">
                                               <a href="javascript:PojdiNaGalerijo('<?php echo $novicaNaslov?>')"><img src="<?php echo $linkDoSlike; ?>" width="180" height="180" /></a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="NovicaPisava">
                                                <h1><?php echo $naslovnicaPoligona?></h1>
                                                <?php echo $besedilo?>
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
