const nameText = document.getElementById('nameInput');
const lastNameText = document.getElementById('lastNameInput');
const genderSelect = document.getElementById('inputSelect');
const dateInput = document.getElementById('inputDate');
const imageInput = document.getElementById('foto');
const emailText = document.getElementById('inputEmail');
const passText = document.getElementById('inputPass');
const rolSelect = document.getElementById('inputSelectRol');

const btnUpload = document.getElementById('nextBtn');

window.onload = function(){
	btnUpload.disabled = true;
}

(function(){
	const formSignUp = document.getElementById("registerForm");
	formSignUp.onsubmit = function(e){
		const formData = new FormData();
		formData.append('name', nameText,value.trim());
		formData.append('lastname', lastNameText.value.trim());
		formData.append('gender', genderSelect.options[genderSelect.selectedIndex].value);
		formData.append('birthday', dateInput.value);
		formData.append('picture', imageInput.files[0]);
		formData.append('email', emailText.value);
		formData.append('password', passText.value);
		formData.append('rol', rolSelect.options[rolSelect.selectedIndex].value);

		//PARA EL AVANCE SOLO LO AGREGAS A UN IF PARA QUE REDIRIJA A LA PAGINA SIN VALIDACIONES DEL BACK
		let xhr = new XMLHttpRequest();
		//CHECA COMO PUEDES OPTIMIZAR EL URL
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
								/* alert(res.msg);
								window.location.reload();
  			        			return; */
							}
							/*if (res.success != true) return;
  			      alert(res.msg);
  			      window.location.replace("../views/login.php");*/
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

setInterval(function(){
	activateBtnSignIn();
}, 500);

function activateBtnSignIn(){
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

function somethingSelected(){
	const message = document.getElementById('textWarningSelect');
	const selectedOptionIndex = genderSelect.selectedIndex;

	if(selectedOptionIndex !== -1){
		return true;
	}else{
		message.innerText = "Necesita escoger una opción válida";
    	return false;
	}

}

function somethingSelectedRol(){
	const message = document.getElementById('textWarningSelectRol');
	const selectedOptionIndex = rolSelect.selectedIndex;

	if(selectedOptionIndex !== -1){
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

	if(emailRegex.test(emailText.value)){
		message.innerText = "";
		return true;
	}else{
		message.innerText = "Correo no válido";
		return false;
	}
}

function validatePassword(){
	const message = document.getElementById('textWarningPass');
	var passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&#.$($)$-$_])[A-Za-z\d$@$!%*?&#.$($)$-$_]{8,30}$/;	

	if(passText,value !== ""){
		if(passwordRegex.test(passText.value)){
			message.innerText = "";
			return true;
		}else{
			message.innerText = "Las contraseña debe contener lo siguiente: 8 caracteres, una mayúscula, una minúscula, un número y un carácter especial";
			return false;
		}
	}
}

/* const nextButton = document.getElementById('nextBtn');
let isPassValid = false;
let isNameValid = false;
let isSelectValid = false;
let isDateValid = false;
let isEmailValid = false;
let isSelectRolValid = false;

window.onload = function() {
	nextButton.disabled = true;
}

function validarSoloLetras(){
	const inputName = document.forms['registerForm']['nameInput'];
	const inputLastName = document.forms['registerForm']['lastNameInput'];

	const message = document.getElementById('textWarningName');

	const expresionRegular = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/	

	if(!inputName.value || !inputLastName.value){
		 message.innerText = "Uno o dos campos vacíos";
		 isNameValid = false;
	}else{
		message.innerText = "";
		if(!expresionRegular.test(inputName.value) || !expresionRegular.test(inputLastName.value)){
			message.innerText = "Solo texto";
			isNameValid = false;
		}else{
			message.innerText = "";
			isNameValid = true;
		}
	}
}

setInterval(function(){
	if(isPassValid && isNameValid && isSelectValid && isDateValid && isEmailValid && isSelectRolValid){
		nextButton.disabled = false;
	}else{
		nextButton.disabled = true;
	}
}, 500);


document.getElementById('inputSelect').addEventListener("change", function(){
	const message = document.getElementById('textWarningSelect');
	const valorSeleccionado = document.getElementById('inputSelect').value;
	if (valorSeleccionado !== "0") {
    	message.innerText = "";
    	isSelectValid = true;
  	} else {
    	message.innerText = "Necesita escoger una opción válida";
    	isSelectValid = false;
  	}
});

document.getElementById('inputSelectRol').addEventListener("change", function(){
	const message = document.getElementById('textWarningSelectRol');
	const valorSeleccionado = document.getElementById('inputSelectRol').value;
	if (valorSeleccionado !== "0") {
    	message.innerText = "";
    	isSelectRolValid = true;
  	} else {
    	message.innerText = "Necesita escoger una opción válida";
    	isSelectRolValid = false;
  	}
});

document.getElementById('inputDate').addEventListener("change", function(){
	const fechaSeleccionada = new Date(document.getElementById('inputDate').value);
	const fechaActual = new Date();
	const message = document.getElementById('textWarningDate');
	

	if(fechaSeleccionada > fechaActual){
		message.innerText = "La fecha seleccionada es posterior al día de hoy";
		isDateValid = false;
	}else{
		message.innerText = "";
		isDateValid = true;
	}
});

/*document.getElementById('foto').addEventListener("change", function(){
	const message = document.getElementById('textWarningFile');
	const inputFoto = document.getElementById("foto");
	const archivoSeleccionado = inputFoto.files[0];
  const extensionesPermitidas = ["jpg", "jpeg", "png"];
  const extensionArchivo = archivoSeleccionado.name.split(".").pop().toLowerCase();
  if (!extensionesPermitidas.includes(extensionArchivo)) {
    message.innerText = "El archivo seleccionado no es una foto";
    inputFoto.value = ""
  }else{
  	message.innerText = "";
  }
});/


function validarEmail(){
	const inputEmail = document.forms['registerForm']['inputEmail'];
	const message = document.getElementById('textWarningEmail');
	emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
	if(emailRegex.test(inputEmail.value)){
		message.innerText = "";
		isEmailValid = true;
		}else{
		message.innerText = "No válido";
		isEmailValid = false;
	}
	if(inputEmail.value === ""){
		message.innerText = "";
		isEmailValid = false;
	}
}

function validarPass(){
	const inputPass = document.forms['registerForm']['inputPass'];
	const message = document.getElementById('textWarningPass');
	var contrasenaRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&#.$($)$-$_])[A-Za-z\d$@$!%*?&#.$($)$-$_]{8,30}$/;
	if(contrasenaRegex.test(inputPass.value)){
		message.innerText = "";
		isPassValid = true;
		}else{
		isPassValid = false;
		message.innerText = "Recuerda las especificaciones de las contraseñas (8 caracteres, una mayúscula, una minúscula, un número y un carácter especial)";
	}
	if(inputPass.value === ""){
		message.innerText = "";
		isPassValid = false;
	}
}


(function(){
	const formSingup = document.getElementById("registerForm");
	formSingup.onsubmit = function (e) {
		e.preventDefault();
    const Name = document.getElementById("nameInput");
    const Lastname = document.getElementById("lastNameInput");
    const genderSelect = document.getElementById("inputSelect");    
    const inputDate = document.getElementById("inputDate");

    const Email  =document.getElementById("inputEmail");
    const Password = document.getElementById("inputPass");

    const inputSelectRol = document.getElementById("inputSelectRol");
    const rolSelection = parseInt(inputSelectRol.options[inputSelectRol.selectedIndex].value);

    const inputFoto = document.getElementById("foto");
    const selectedFile = inputFoto.files[0];
    

    const formData = new FormData();
    formData.append('nombre', Name.value.trim());
    formData.append('apellido', Lastname.value.trim());
    formData.append('genero', genderSelect.options[genderSelect.selectedIndex].value);
    formData.append('fechaNacimiento', inputDate.value);
    formData.append('foto', selectedFile);
    formData.append('email', Email.value);
    formData.append('pass', Password.value);
    if(rolSelection === 1){
    	formData.append('rol',"Maestro");
    }else if(rolSelection === 2){
    	formData.append('rol', "Alumno");
    }

    	let xhr = new XMLHttpRequest();
    	xhr.timeout = 5000; // 5 segundos
    	xhr.open("POST", "../backend/controllers/signInController.php", true);
    	xhr.onreadystatechange = function() {	
    		console.log(xhr.readyState);
  			if (xhr.readyState == XMLHttpRequest.DONE) {
  			  if (xhr.status == 200) {
  			    if (xhr.response) {
  			    	console.log(xhr.response);
  			      try {
  			        let res = JSON.parse(xhr.response);
  			        if (res.success != true) return;
  			        alert(res.msg);
  			        window.location.replace("../views/login.php");
  			      } catch (error) {
  			        console.error("Ha ocurrido un error: " + error);
  			      }
  			    } else {
  			      console.error("La respuesta del servidor está vacía");
  			    }
  			  } else {
  			    console.error("Ha ocurrido un error en la solicitud: " + xhr.status);
  			  }
  			}	    	
  	}
  	xhr.send(formData);
  	
	}
})(); */

