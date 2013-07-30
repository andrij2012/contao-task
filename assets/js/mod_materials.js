(function() {	
	window.onload = function() {

		var mod_materials = document.getElementsByClassName('mod_materials');
		var images = document.getElementsByClassName('img');
		
		// src of img when mouseout
		var srcOnMouseOut;
		
		//src of img when mouseover
		var srcOnMouseOver;
		

		for(var i = 0; i < mod_materials.length; i++) {
			mod_materials[i].onclick = function() {
				var src = this.getAttribute('data-src');
				window.location = src;
			};
		}

		for(var i =0; i < images.length; i++) {
			images[i].onmouseover = function() {
				srcOnMouseOut = this.getAttribute('src');
				srcOnMouseOver = this.getAttribute('data-alt-src');
				this.setAttribute('src', srcOnMouseOver);
			};

			images[i].onmouseout = function() {
				this.setAttribute('src', srcOnMouseOut);
			};
		}
	};
})();