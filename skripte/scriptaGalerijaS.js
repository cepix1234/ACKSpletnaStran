jQuery(document).ready(function() {
	$('.popup-gallery').magnificPopup({
		delegate: 'a',
		type: 'image',
		tLoading: 'Loading image #%curr%...',
		mainClass: 'mfp-img-mobile',
		gallery: {
			enabled: true,
			navigateByImgClick: true,
			preload: [0,1] 
		},
		image: {
			tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
			titleSrc: function(item) {
				return item.el.attr('title');
			}
		}
	});
});

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