window.onload = function(){
	var add_file = document.getElementById('add_file');
	var form_for_add_file = document.getElementById('form_for_add_file');

	var other_params_bis = document.querySelector('#other_params_bis');
	var other_params_box = document.querySelector('#other_params_box');

	var rename_box = document.querySelectorAll(".rename_box");
    var rename_file = document.querySelector("#rename_file");
	
	add_file.onclick = function(){
		form_for_add_file.style.display = "block";
	}
	other_params_bis.onclick = function(){
		console.log('a');
		other_params_box.style.display = "flex";
	}

    rename_file.onclick = function(){
        for (var i = 0; i < rename_box.length; i++) {
            rename_box[i].style.display = 'block';
        }
    }
};