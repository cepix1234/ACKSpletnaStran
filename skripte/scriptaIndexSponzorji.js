function prviLoadSponz(tabela){
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

function PosljiSezSponorjev(tabela, stran){
	var mapForm = document.createElement("form");
	mapForm.target = "_self";
	mapForm.method = "POST";
	mapForm.action = "./"+stran;
	
	var mapInput = document.createElement("input");
	mapInput.type = "text";
	mapInput.name = "sponzorji";
	mapInput.value = tabela;
	
	mapForm.appendChild(mapInput);
	
	document.body.appendChild(mapForm);
	
	mapForm.submit();
	}
	
function DoPost(ime,tabela){
	var mapForm = document.createElement("form");
	mapForm.target = "_self";
	mapForm.method = "POST";
	mapForm.action = "./GalerijaS.php";
	
	var mapInputIme = document.createElement("input");
	mapInputIme.type = "text";
	mapInputIme.name = "name";
	mapInputIme.value = ime;
	
	var mapInputTab = document.createElement("input");
	mapInputTab.type = "text";
	mapInputTab.name = "sponzorji";
	mapInputTab.value = tabela;
	
	mapForm.appendChild(mapInputIme);
	mapForm.appendChild(mapInputTab);
	
	document.body.appendChild(mapForm);
	
	mapForm.submit();
	
}

