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
	
	var edit_icon = document.querySelectorAll(".edit_icon");
	var modif_txt_box = document.querySelectorAll(".modif_txt_box");

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

	var edit_icon = document.querySelectorAll(".edit_icon");
	var modif_txt_box = document.querySelectorAll(".modif_txt_box");

	for (var i = 0; i < edit_icon.length; i++) {
		edit_icon[i].onclick = function(){ 
			//(this.parentNode.parentNode.childNodes[13]).style.display = 'block';
			//console.log('ok');
			console.log(this.parentNode.parentNode.childNodes[12]);
		};
	}

	var move_icon = document.querySelectorAll(".move_icon");

	for (var k = 0; k < move_icon.length; k++) {
		move_icon[k].onclick = function(){ 
			(this.parentNode.parentNode.parentNode.childNodes[13]).style.display = 'block';
			//console.log(this.parentNode.parentNode.childNodes[13]);
		};
	}
};