function spremeniJ(ime, stran){
	var mapForm = document.createElement("form");
	mapForm.target = "_self";
	mapForm.method = "POST";
	mapForm.action = "./"+stran;
	
	var mapInput = document.createElement("input");
	mapInput.type = "text";
	mapInput.name = "name";
	mapInput.value = ime;
	
	mapForm.appendChild(mapInput);
	
	document.body.appendChild(mapForm);
	
	mapForm.submit();
	
	}