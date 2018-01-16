var tabelaSponzorjev = "";
var tabelaClanov = "";

function setEqualHeight(e) {
    if($(window).width()<=1200){	
		var StringZaTab = "<table><tr>";
		var SteviloClanov = 1;
		for(i in tabelaClanov)
		{
			var IndexSlasha = tabelaClanov[i].lastIndexOf("/");	
			var ImeClana = tabelaClanov[i].substring(IndexSlasha+1);
			var imeSPresledki = "";
			var positions = [];
			for(var y=0; y<ImeClana.length; y++){
				if(ImeClana[y].match(/[A-Z]/) != null){
					positions.push(y);
				}
			}
			for(var y = 0; y<=positions.length-1;y++)
			{
				imeSPresledki=imeSPresledki+" "+ImeClana.substring(positions[y],positions[y+1]);
			}
			StringZaTab = StringZaTab+"<td><div class=\"slikaFolderja\" align='center'><a href=\"javascript:DoPost('"+ImeClana+"')\" title=\""+ImeClana+"\"><img id=\"border1\" width=\"200\" height=\"200\" src=\""+tabelaClanov[i]+"/slike/_"+ImeClana+".jpg\" alt="+ImeClana+"></a><p>"+imeSPresledki+"</p> </div></td>";
			if(SteviloClanov%3 == 0)
			{
				StringZaTab = StringZaTab+"</tr><tr>";	
			}
			SteviloClanov++;
		}
		StringZaTab = StringZaTab+"</tr></table>";
		document.getElementById('JSTable').innerHTML = StringZaTab;
	}
	if($(window).width()>1200){
		var StringZaTab = "<table><tr>";
		var SteviloClanov = 1;
		for(i in tabelaClanov)
		{
			var IndexSlasha = tabelaClanov[i].lastIndexOf("/");	
			var ImeClana = tabelaClanov[i].substring(IndexSlasha+1);
			var imeSPresledki = "";
			var positions = [];
			for(var y=0; y<ImeClana.length; y++){
				if(ImeClana[y].match(/[A-Z]/) != null){
					positions.push(y);
				}
			}
			for(var y = 0; y<=positions.length-1;y++)
			{
				imeSPresledki=imeSPresledki+" "+ImeClana.substring(positions[y],positions[y+1]);
			}
			StringZaTab = StringZaTab+"<td><div class=\"slikaFolderja\" align='center'><a href=\"javascript:DoPost('"+ImeClana+"')\" title=\""+ImeClana+"\"><img id=\"border1\" width=\"200\" height=\"200\" src=\""+tabelaClanov[i]+"/slike/_"+ImeClana+".jpg\" alt="+ImeClana+"></a><p>"+imeSPresledki+"</p> </div></td>";
			if(SteviloClanov%4 == 0)
			{
				StringZaTab = StringZaTab+"</tr><tr>";	
			}
			SteviloClanov++;
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
	tabelaClanov = tabela;
	if($(window).width()<=1200){	
		var StringZaTab = "<table><tr>";
		var SteviloClanov = 1;
		for(i in tabela)
		{
			var IndexSlasha = tabela[i].lastIndexOf("/");	
			var ImeClana = tabela[i].substring(IndexSlasha+1);
			var imeSPresledki = "";
			var positions = [];
			for(var y=0; y<ImeClana.length; y++){
				if(ImeClana[y].match(/[A-Z]/) != null){
					positions.push(y);
				}
			}
			for(var y = 0; y<=positions.length-1;y++)
			{
				imeSPresledki=imeSPresledki+" "+ImeClana.substring(positions[y],positions[y+1]);
			}
			StringZaTab = StringZaTab+"<td><div class=\"slikaFolderja\" align='center'><a href=\"javascript:DoPost('"+ImeClana+"')\" title=\""+ImeClana+"\"><img id=\"border1\" width=\"200\" height=\"200\" src=\""+tabela[i]+"/slike/_"+ImeClana+".jpg\" alt="+ImeClana+"></a><p>"+imeSPresledki+"</p> </div></td>";
			if(SteviloClanov%3 == 0)
			{
				StringZaTab = StringZaTab+"</tr><tr>";	
			}
			SteviloClanov++;
		}
		StringZaTab = StringZaTab+"</tr></table>";
		document.getElementById('JSTable').innerHTML = StringZaTab;
	}
	if($(window).width()>1200){
		var StringZaTab = "<table><tr>";
		var SteviloClanov = 1;
		for(i in tabela)
		{
			var IndexSlasha = tabela[i].lastIndexOf("/");	
			var ImeClana = tabela[i].substring(IndexSlasha+1);
			var imeSPresledki = "";
			var positions = [];
			for(var y=0; y<ImeClana.length; y++){
				if(ImeClana[y].match(/[A-Z]/) != null){
					positions.push(y);
				}
			}
			for(var y = 0; y<=positions.length-1;y++)
			{
				imeSPresledki=imeSPresledki+" "+ImeClana.substring(positions[y],positions[y+1]);
			}
			StringZaTab = StringZaTab+"<td><div class=\"slikaFolderja\" align='center'><a href=\"javascript:DoPost('"+ImeClana+"')\" title=\""+ImeClana+"\"><img id=\"border1\" width=\"200\" height=\"200\" src=\""+tabela[i]+"/slike/_"+ImeClana+".jpg\" alt="+ImeClana+"></a><p>"+imeSPresledki+"</p> </div></td>";
			if(SteviloClanov%4 == 0)
			{
				StringZaTab = StringZaTab+"</tr><tr>";	
			}
			SteviloClanov++;
		}
		StringZaTab = StringZaTab+"</tr></table>";
		document.getElementById('JSTable').innerHTML = StringZaTab;
	}
}

function DoPost(ime){
	var mapForm = document.createElement("form");
	mapForm.target = "_self";
	mapForm.method = "POST";
	mapForm.action = "./Clani.php";
	
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