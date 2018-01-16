<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Airsoft Club Kisovec-Treningi</title>
<script type="text/javascript" src="./skripte/scriptaIndexSponzorji.js"></script>

<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <script>
  $(function() {
    $( "#datepicker" ).datepicker();
  });
  
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
  </script>

<link rel="stylesheet" type="text/css" href="./stil/StilTreningi.css">

</head>

<body onload = Zacetek()>
	<div align="center"> 
    	<table border="0" class="glavaTabela">
            <tr>
                <td>
                    <a href="indexENG.php"><img class="Naslovnica" src="./Backgrounds/ACKlogo.png" width="178" height="187" /></a>
                </td>
                <td class="glava">
                    <a href="TreningiENG.php" title="Engish"><img src="./Backgrounds/English.png" width="30" height="20" /></a>
                    <a href="Treningi.php" title="Slovenščina"><img src="./Backgrounds/Sloven.png" width="30" height="20" /></a>
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
                        <button class="GlavniMenuG gumbG2" onclick="MenjavaStr('ClaniFENG.php')">Člani</button>
                      </tr>
                    <tr>
                        <button class="GlavniMenuG gumbG4" onclick="MenjavaStr('NaseAktivnostiENG.php')">Naše aktivnosti</button>
                      </tr>
                    <tr>
                        <button class="GlavniMenuG gumbGD" onclick="MenjavaStr('TreningiENG.php')">Treningi</button>
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
        
        <div class="vsebina" align="center">
            V klubu treniramo na dva načina, in sicer z klasično igro ter z suhimi treningi. <p/>
			Najbolj smiselen način vzgoje mladih ter kvaliteten način vaje tudi za že uigranih igralcev so suhi treningi, na katerih se vadijo manevri, 
            ročni signali, komunikacija z postajami, rokovanje z replikami ter delo v klasičnih ter tudi v stresnih bojnih situacijah. <p/>
            Klasična igra predstavlja logično nadaljevanje procesa suhih treningov. Ti treningi so sestavljeni iz igravanja bojnih oddelkov. 
            Prav tako pa med treningi najdemo čas za izboljšanje lastne igre, ponovitve in analizo akcij iz bodisi treningov ali odigranih medklubskih 
            iger ali dogodkov. <p/>
            Naš namen je še naprej vztrajati v čim bolj pošteni, kvalitetni in zanimivi igri, ki nam popestri vikende po delovnikih.<p/>
            
            Spodaj nas lahko povabite, ali prijavite na trening.
        </div>
        
        <div class="razmakMedVsebino"></div>
        
        <div class="prijavaNaTrening" align="left">
        	<?php
				$datumErr= $imeErr =$eMailErr =$PPErr ="";
				$datum =$ime =$eMail =$PP =$sporocilo ="";
				$napaka = false;				
				if($_SERVER["REQUEST_METHOD"] == "POST")
				{
					if(empty($_POST["datum"]))
					{
						$datumErr = "Datum je potreben!";
						$napaka = true;	
					}else {
						$datum = test_input($_POST["datum"]);
					}
					
					if(empty($_POST["imeKluba"]))
					{
						$imeErr = "Ime je potreben!";
						$napaka = true;	
					}else {
						$ime = test_input($_POST["imeKluba"]);
					}
					
					if(empty($_POST["emailKluba"]))
					{
						$eMailErr = "E-Mail naslov je potreben!";
						$napaka = true;	
					}else {
						$eMail = test_input($_POST["emailKluba"]);
						if (!filter_var($eMail, FILTER_VALIDATE_EMAIL)) {
						   $eMailErr = "Napačen E-Mail format"; 
						   $napaka = true;	
						 }
					}
					
					if(empty($_POST["PP"]))
					{
						$PPErr = "Izbira je potrebna!";	
						$napaka = true;
					}else {
						$PP = test_input($_POST["PP"]);
					}
					
					if(!empty($_POST["sporocilo"]))
					{
						$sporocilo = test_input($_POST["sporocilo"]);	
					}
				}
				
				function test_input($data)
				{
					$data = trim($data);
				    $data = stripslashes($data);
				    $data = htmlspecialchars($data);
				    return $data;						
				}
			?>
        
        
        
            Prijavi se na Trening, ali povabi na trening.
            <br />
            <span class="error">* obvezno izponliti.</span></p>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
               <p>Izberi datum: <input type="text" name= "datum" id="datepicker" value="<?php echo $datum;?>">
               <span class="zvezda">*</span> 
               <span class="error">  <?php echo $datumErr;?></span></p>
    
               Ime kluba: <input type="text" name="imeKluba" value="<?php echo $ime;?>">
               <span class="zvezda">*</span>
               <span class="error"> <?php echo $imeErr;?></span>
               <br><br>
               
               Vaš E-mail: <input type="text" name="emailKluba" value="<?php echo $eMail;?>">
               <span class="zvezda">*</span>
               <span class="error">  <?php echo $eMailErr;?></span>
               <br><br>
               
               povabilo/prijava: 
               <input type="radio" name="PP" <?php if (isset($PP) && $PP=="povabilo") echo "checked";?>  value="povabilo">Povabilo
               <input type="radio" name="PP" <?php if (isset($PP) && $PP=="prijava") echo "checked";?> value="prijava">Prijava
               <span class="zvezda">*</span>
               <span class="error">  <?php echo $PPErr;?></span>
               <br><br>
               
               Sporočilo: <textarea name="sporocilo" rows="5" cols="40"><?php echo $sporocilo; ?></textarea>
               <br><br>
               
               <input class="GumbS" type="submit" name="submit" value="Pošlji"> 
            </form>
            
            <?php 
				if(isset($_POST["submit"]))
					{
						if(!$napaka)
						{
							$to = "bocepek027@gmail.com";
							$subject = $_POST["PP"]." za trening-Airsoft";
							$txt = "dne:".$_POST["datum"]."\n"."klub".$_POST["imeKluba"]."\n";
							if($_POST["PP"] == "povabilo"){
								$txt.="Vabi na trening \n".$_POST["sporocilo"];	
							}else
							{
								$txt.="Se prijavlja na trening \n".$_POST["sporocilo"];
							}
							$headers = "From: ".$_POST["emailKluba"]."\r\n";
							mail($to,$subject,$txt,$headers);
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
