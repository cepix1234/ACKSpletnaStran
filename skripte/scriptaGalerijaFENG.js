function setEqualHeight(e) {
    if($(window).width()<=1200){
		document.getElementById('JSTable').innerHTML = "<table><tr><td><div class='slikaFolderja' align='center'><a href='javascript:DoPost(\"BlodyRock2\")' title='slika'><img width='200' height='200' src='./Slike/251029_4032399014480_496651715_n.jpg'alt='slika'></a><p>to pa to</p></div></td></tr></table>";
	}
	if($(window).width()>1200){
		document.getElementById('JSTable').innerHTML = "";
	}
 }
$(window).resize(function () {
    setEqualHeight( $('#border') );
});

function prviLoad(tabela){
	if($(window).width()<=1200){
		document.getElementById('JSTable').innerHTML = "<table><tr><td><div class='slikaFolderja' align='center'><a href='javascript:DoPost(\"BlodyRock2\")' title='slika'><img width='200' height='200' src='./Slike/251029_4032399014480_496651715_n.jpg'alt='slika'></a><p>to pa to</p></div></td></tr></table>";
	}
	if($(window).width()>1200){
		document.getElementById('JSTable').innerHTML = "";
	}
}

function DoPost(ime){
	var mapForm = document.createElement("form");
	mapForm.target = "_self";
	mapForm.method = "POST";
	mapForm.action = "./GalerijaSENG.php";
	
	var mapInput = document.createElement("input");
	mapInput.type = "text";
	mapInput.name = "name";
	mapInput.value = ime;
	
	mapForm.appendChild(mapInput);
	
	document.body.appendChild(mapForm);
	
	mapForm.submit();
	
	}