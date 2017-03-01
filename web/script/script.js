window.onload = function(){
	var add_file = document.getElementById('add_file');
	var form_for_add_file = document.getElementById('form_for_add_file');

	var other_params_bis = document.querySelector('#other_params_bis');
	var other_params_box = document.querySelector('#other_params_box');

	var rename_box = document.querySelectorAll(".rename_box");
    var rename_file = document.querySelector("#rename_file");

    var add_folder = document.querySelector('#add_folder');
	var form_for_add_folder = document.querySelector('#form_for_add_folder');

    var form_for_replace_file = document.querySelector("#form_for_replace_file");
    var replace_file = document.querySelector("#replace_file");
	
	add_file.onclick = function(){
		form_for_add_file.style.display = "block";
	}
	other_params_bis.onclick = function(){
		other_params_box.style.display = "flex";
	}

    rename_file.onclick = function(){
        for (var i = 0; i < rename_box.length; i++) {
            rename_box[i].style.display = 'block';
        }
    }
    
    add_folder.onclick = function(){
		form_for_add_folder.style.display = "block";
	}

	replace_file.onclick = function(){
		form_for_replace_file.style.display = "block";
	}
};