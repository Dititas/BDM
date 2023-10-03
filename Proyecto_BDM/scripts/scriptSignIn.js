const nameText = document.getElementById('nameInput');
const lastNameText = document.getElementById('lastNameInput');
const genderSelect = document.getElementById('inputSelect');
const dateInput = document.getElementById('inputDate');
const imageInput = document.getElementById('foto');
const emailText = document.getElementById('inputEmail');
const passText = document.getElementById('inputPass');
const rolSelect = document.getElementById('inputSelectRol');
const checkPass = document.getElementById('checkbox');
const usernameText = document.getElementById('inputUsuario');

const btnUpload = document.getElementById('nextBtn');

window.onload = function(){
	btnUpload.disabled = true;
}

setInterval(function(){
	activateBtnSignUp();
}, 500);

(function(){
	const formSignUp = document.getElementById('registerForm');
	formSignUp.onsubmit = function(e){
		 e.preventDefault();
		const formData = new FormData();
		formData.append('email', emailText.value);
		formData.append('username', usernameText.value);
		formData.append('password', passText.value);
		formData.append('name', nameText.value.trim());
		formData.append('lastname', lastNameText.value.trim());
		formData.append('birthdate', dateInput.value);
		formData.append('image', imageInput.files[0]);
		formData.append('gender', genderSelect.options[genderSelect.selectedIndex].value);
		formData.append('isPublic', checkPass.checked ? 1 : 0);
		formData.append('rol', rolSelect.options[rolSelect.selectedIndex].value);

		let xhr = new XMLHttpRequest();
		xhr.open("POST", "../backend/controllers/signInController.php", true);
		xhr.onreadystatechange = function(){
			console.log(xhr.readyState);
			if(xhr.readyState == XMLHttpRequest.DONE){
				if(xhr.status == 200){
					if(xhr.response){
						console.log(xhr.response);
						try{
							let res = JSON.parse(xhr.response);
							if(res.success != true){
								alert(res.msg);
  			        			return;
							}else{
								//DEBE REDIRIGIR AL LOGIN
								 alert(res.msg);
								window.location.reload();
								window.location.replace("../views/login.php");
  			        			return; 
							}							
						}catch(error){
							console.error("Ha ocurrido un error: " + error);
						}
					}else{
						console.error("La respuesta del servidor está vacía");
					}
				}else{
					console.error("Ha ocurrido un error en la solicitud: " + xhr.status);
				}
			}
		}
		xhr.send(formData);	

	}
})();
 
function activateBtnSignUp(){
	if(onlyLetters() && somethingSelected() && validateDate() && validatePicture() && validatePassword() && validateEmail() && somethingSelectedRol()){
		btnUpload.disabled = false;
	}else{
		btnUpload.disabled = true;
	}
}

function onlyLetters(){
	const message = document.getElementById('textWarningName');
	const expresionRegular = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/;

	if(!nameText.value || !lastNameText.value){
		message.innerText = "Campo(s) incompleto(s)";
		return false;
	}else{
		message.innerText = "";
		if(!expresionRegular.test(nameText.value) || !expresionRegular.test(lastNameText.value)){
			message.innerText = "Solo texto";
			return false;
		}else{
			message.innerText = "";
			return true;
		}
	}
}

function withText(){
	const message = document.getElementById('textWarningUsuario');
	if(!usernameText.value){
		message.innerText = "Campo(s) incompleto(s)";
		return false;
	}else{
		message.innerText = "Campo(s) incompleto(s)";
		return false;
	}
}

function somethingSelected(){
	const message = document.getElementById('textWarningSelect');
	const selectedOptionIndex = genderSelect.selectedIndex;

	if(selectedOptionIndex !== 0){
		message.innerText = "";
		return true;
	}else{
		message.innerText = "Necesita escoger una opción válida";
    	return false;
	}

}

function somethingSelectedRol(){
	const message = document.getElementById('textWarningSelectRol');
	const selectedOptionIndex = rolSelect.selectedIndex;

	if(selectedOptionIndex !== 0){
		message.innerText = "";
		return true;
	}else{
		message.innerText = "Necesita escoger una opción válida";
    	return false;
	}

}

function validateDate(){
	const currentDate = new Date();
	const message = document.getElementById('textWarningDate');

	if(dateInput !== ""){
		const selectedDate = new Date(dateInput.value);
		if(selectedDate > currentDate){
			message.innerText = "La fecha seleccionada es posterior al día actual";
			return false;
		}else{
			message.innerText = "";
			return true;
		}
	}else{
		message.innerText = "Formato de Fecha inválida";
	}
}

function validatePicture(){
	const message = document.getElementById('textWarningFile');
	const files = imageInput.files;
	const allowedExtensions =  /(\.jpg|\.jpeg|\.png|\.gif)$/i;
	if(files.length === 0){
		message.innerText = "Debe colocar una imagen"
		return false;
	}else{
		if(!allowedExtensions.test(imageInput.value)){
			message.innerText = "EL archivo seleccionado no es una imagen válida";
			return false;
		}else{
			message.innerText = "";
			return true;
		}
	}
}

function validateEmail(){
	const message = document.getElementById('textWarningEmail');
	emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;

	if(emailText.value !== ""){
		if(emailRegex.test(emailText.value)){
			message.innerText = "";
			return true;
		}else{
			message.innerText = "Correo no válido";
			return false;
		}
	}	
}

function validatePassword(){
	const message = document.getElementById('textWarningPass');
	var passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&#.$($)$-$_])[A-Za-z\d$@$!%*?&#.$($)$-$_]{8,30}$/;	

	if(passText.value !== ""){
		if(passwordRegex.test(passText.value)){
			message.innerText = "";
			return true;
		}else{
			message.innerText = "La contraseña debe contener lo siguiente: 8 caracteres, una mayúscula, una minúscula, un número y un carácter especial";
			return false;
		}
	}
}

function toggleInput(){
	if(checkPass.checked){
		return true;
	}else{
		return false;
	}
}

