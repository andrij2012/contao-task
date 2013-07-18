(function() {	
	window.onload = function() {
		var mod_materials = document.getElementsByClassName('mod_materials');
		var images = document.getElementsByClassName('img');

		var src1;
		var src2;
		

		for(var i = 0; i < mod_materials.length; i++) {
			mod_materials[i].onclick = function() {
				var src = this.getAttribute('data-src');
				window.location = src;
			};
		}

		for(var i =0; i < images.length; i++) {
			images[i].onmouseover = function() {
				src1 = this.getAttribute('src');
				src2 = this.getAttribute('data-alt-src');
				this.setAttribute('src', src2);
			};

			images[i].onmouseout = function() {
				this.setAttribute('src', src1);
			};
		}


	};
})();