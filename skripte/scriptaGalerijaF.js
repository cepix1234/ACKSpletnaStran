var tabelaSponzorjev = "";
var tabelaGalerij = "";
function setEqualHeight(e) {
   if($(window).width()<=1200){	
		var StringZaTab = "<table><tr>";
		var SteviloGalerij = 1;
		for(i in tabelaGalerij)
		{
			var IndexSlasha = tabelaGalerij[i].lastIndexOf("/");	
			var ImeGalerije = tabelaGalerij[i].substring(IndexSlasha+1);
			StringZaTab = StringZaTab+"<td><div class=\"slikaFolderja\" align='center'><a href=\"javascript:DoPost('"+ImeGalerije+"')\" title=\""+ImeGalerije+"\"><img  width=\"200\" height=\"200\" src=\""+tabelaGalerij[i]+"/_"+ImeGalerije+".jpg\" alt="+ImeGalerije+"></a><p>"+ImeGalerije+"</p> </div></td>";
			if(SteviloGalerij%3 == 0)
			{
				StringZaTab = StringZaTab+"</tr><tr>";	
			}
			SteviloGalerij++;
		}
		StringZaTab = StringZaTab+"</tr></table>";
		document.getElementById('JSTable').innerHTML = StringZaTab;
	}
	if($(window).width()>1200){	
		var StringZaTab = "<table><tr>";
		var SteviloGalerij = 1;
		for(i in tabelaGalerij)
		{
			var IndexSlasha = tabelaGalerij[i].lastIndexOf("/");	
			var ImeGalerije = tabelaGalerij[i].substring(IndexSlasha+1);
			StringZaTab = StringZaTab+"<td><div class=\"slikaFolderja\" align='center'><a href=\"javascript:DoPost('"+ImeGalerije+"')\" title=\""+ImeGalerije+"\"><img  width=\"200\" height=\"200\" src=\""+tabelaGalerij[i]+"/_"+ImeGalerije+".jpg\" alt="+ImeGalerije+"></a><p>"+ImeGalerije+"</p> </div></td>";
			if(SteviloGalerij%4 == 0)
			{
				StringZaTab = StringZaTab+"</tr><tr>";	
			}
			SteviloGalerij++;
		}
		StringZaTab = StringZaTab+"</tr></table>";
		document.getElementById('JSTable').innerHTML = StringZaTab;
	}
 }
$(window).resize(function () {
    setEqualHeight( $('#border') );
});

function prviLoad(tabela, tabelaS){
	tabelaSponzorjev = tabelaS;
	tabelaGalerij = tabela;
	
	
	if($(window).width()<=1200){	
		var StringZaTab = "<table><tr>";
		var SteviloGalerij = 1;
		for(i in tabelaGalerij)
		{
			var IndexSlasha = tabelaGalerij[i].lastIndexOf("/");	
			var ImeGalerije = tabelaGalerij[i].substring(IndexSlasha+1);
			StringZaTab = StringZaTab+"<td><div class=\"slikaFolderja\" align='center'><a href=\"javascript:DoPost('"+ImeGalerije+"')\" title=\""+ImeGalerije+"\"><img  width=\"200\" height=\"200\" src=\""+tabelaGalerij[i]+"/_"+ImeGalerije+".jpg\" alt="+ImeGalerije+"></a><p>"+ImeGalerije+"</p> </div></td>";
			if(SteviloGalerij%3 == 0)
			{
				StringZaTab = StringZaTab+"</tr><tr>";	
			}
			SteviloGalerij++;
		}
		StringZaTab = StringZaTab+"</tr></table>";
		document.getElementById('JSTable').innerHTML = StringZaTab;
	}
	if($(window).width()>1200){	
		var StringZaTab = "<table><tr>";
		var SteviloGalerij = 1;
		for(i in tabelaGalerij)
		{
			var IndexSlasha = tabelaGalerij[i].lastIndexOf("/");	
			var ImeGalerije = tabelaGalerij[i].substring(IndexSlasha+1);
			StringZaTab = StringZaTab+"<td><div class=\"slikaFolderja\" align='center'><a href=\"javascript:DoPost('"+ImeGalerije+"')\" title=\""+ImeGalerije+"\"><img  width=\"200\" height=\"200\" src=\""+tabelaGalerij[i]+"/_"+ImeGalerije+".jpg\" alt="+ImeGalerije+"></a><p>"+ImeGalerije+"</p> </div></td>";
			if(SteviloGalerij%4 == 0)
			{
				StringZaTab = StringZaTab+"</tr><tr>";	
			}
			SteviloGalerij++;
		}
		StringZaTab = StringZaTab+"</tr></table>";
		document.getElementById('JSTable').innerHTML = StringZaTab;
	}
}

function DoPost(ime){
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
	mapInputTab.value = tabelaSponzorjev;
	
	mapForm.appendChild(mapInputIme);
	mapForm.appendChild(mapInputTab);
	
	document.body.appendChild(mapForm);
	
	mapForm.submit();
	
	}