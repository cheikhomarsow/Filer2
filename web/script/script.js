window.onload = function(){
	var add_file = document.getElementById('add_file');
	var form_for_add_file = document.getElementById('form_for_add_file');
	var other_params = document.getElementById('other_params');
	var other_params_box = document.getElementById('other_params_box');
	
	add_file.onclick = function(){
		form_for_add_file.style.display = "block";
	}
	other_params.onclick = function(){
		other_params_box.style.display = "flex";
	}
};