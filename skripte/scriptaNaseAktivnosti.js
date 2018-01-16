function prviLoadAktivnosti(tabela){
	var n = 0;
	document.getElementById('JSTableSponzorji').innerHTML = "<a href='./Sponzorji.php' title='slika'><img width='100' height='60' src='./DropBoxNaServerju/SLO/sponzorji/slikeSponzorji/"+tabela[n]+"' alt='slika'>";
	n++;
	var dolzina = tabela.length;
	(function loop() {
	  setTimeout(function () {
  			document.getElementById('JSTableSponzorji').innerHTML = "<a href='./Sponzorji.php' title='slika'><img width='100' height='60' src='./DropBoxNaServerju/SLO/sponzorji/slikeSponzorji/"+tabela[n]+"' alt='slika'>";
	    	n++;
	    	if(n == dolzina)
	    	{
	    		n = 0;
	    	}
	    	loop()
	  }, 10000);
	}());
	
}
function zamenjavaAktivnosti (indexAktivnosti, IndexPodAktivnosti, tabela)
{
	document.getElementById('JSSlikaAktivnosti'+indexAktivnosti).innerHTML = "<a href=\"javascript:PojdiNaGalerijo('"+tabela[indexAktivnosti][0][0][IndexPodAktivnosti]+"')\"><img src='"+tabela[indexAktivnosti][IndexPodAktivnosti][0][0]+"' width='174' height='139' /></a>";
	document.getElementById('JSBesediloAktivnosti'+indexAktivnosti).innerHTML = "<p>"+tabela[indexAktivnosti][0][IndexPodAktivnosti][0]+"</p>";
}


