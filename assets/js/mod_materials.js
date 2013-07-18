(function() {	
	window.onload = function() {
		var mod_materials = document.getElementsByClassName('mod_materials');
		for(var i = 0; i < mod_materials.length; i++) {
			mod_materials[i].onclick = function() {
				var src = this.getAttribute('data-src');
				window.location = src;
			};
		}
	};
})();