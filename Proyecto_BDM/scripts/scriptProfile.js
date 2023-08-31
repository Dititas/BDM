const nameText = document.getElementById('nameInput');
const lastNameText = document.getElementById('lastNameInput');
const genderSelect = document.getElementById('inputSelect');
const dateInput = document.getElementById('inputDate');
const imageInput = document.getElementById('foto');
const emailText = document.getElementById('inputEmail');
const passText = document.getElementById('inputPass');
const confirmPassText = document.getElementById('inputPassConfirm');
const checkPass = document.getElementById('checkbox');
const cancelBtn = document.getElementById('cancelBtn');
const nextBtn = document.getElementById('nextBtn');
const optionDisabled = document.getElementById('optionDisabled');

let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".bx-menu");

var auxPass = false;
var auxSentInfo = 0;

window.onload = function(){
	passText.disabled = true;
	confirmPassText.disabled = true;
	nextBtn.disabled = true;
	imageInput.removeAttribute("required");
}

sidebarBtn.addEventListener("click", () => {
	sidebar.classList.toggle("close");
});

setInterval(function(){
	disableFields();
	activateBtnUpadte();		
}, 500);

(function(){
	const formUpdate = document.getElementById("updateProfile");
	formUpdate.onsubmit = function (e) {
		e.preventDefault();

		const formData = new FormData();

		formData.append('nombre', nameText.value.trim());
		formData.append('apellido', lastNameText.value.trim());
		formData.append('genero', genderSelect.options[genderSelect.selectedIndex].value);
		formData.append('fechaNacimiento', dateInput.value);

		if(auxSentInfo === 2 || auxSentInfo === 4)
			formData.append('foto', imageInput.files[0]);			
		else if(auxSentInfo === 2 || auxSentInfo === 3)
			formData.append('pass', passText.value);
		
		formData.append('option', auxSentInfo);
		
		let xhr = new XMLHttpRequest();
		xhr.timeout = 5000;
		xhr.open("POST", "../backend/controllers/updateUserController.php", true);
		xhr.onreadystatechange = function() {
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
								//SI SE PUDO CAMBIAR LA INFO
								alert(res.msg);
								window.location.reload();
  			        return;
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

function activateBtnUpadte(){
	if(onlyLetters() && somethingSelected() && validateDate() && validatePicture() === 1 && validatePassword() === 3 && validateSamePassword() === 2 ){ //SI NO QUIERE CAMBIAR FOTO Y SI NO QUIERE CAMBIAR CONTRA
		nextBtn.disabled = false;
		auxSentInfo = 1;
	}else if(onlyLetters() && somethingSelected() && validateDate() && validatePicture() === 2 && validatePassword() === 0 && validateSamePassword() === 0){//SI QUIERE CAMBIAR FOTO Y SI QUIERE CAMBIAR CONTRASEÑA
		nextBtn.disabled = false;
		auxSentInfo = 2;
	}else if(onlyLetters() && somethingSelected() && validateDate() && validatePicture() === 1 && validatePassword() === 0 && validateSamePassword() === 0){//NO CAMBIA FOTO PERO SI CONTRA
		nextBtn.disabled = false;
		auxSentInfo = 3;
	}else if(onlyLetters() && somethingSelected() && validateDate() && validatePicture() === 2 && validatePassword() === 3 && validateSamePassword() === 2){//CAMBIA FOTO PERO NO CONTRA
		nextBtn.disabled = false;
		auxSentInfo = 4;
	}else{
		nextBtn.disabled = true;
		auxSentInfo = 0;
	}
}

function disableFields(){
	emailText.disabled = true;
	optionDisabled.disabled = true;
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
		return false;
	}
}

function validatePicture(){
	const message = document.getElementById('textWarningFile');
	const files = imageInput.files;
	const allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
	if(files.length === 0){
		message.innerText = "Si no deseas cambiar la imagen, deja vacío este campo";
		return 1;
	}else{
		if(!allowedExtensions.test(imageInput.value)){
			message.innerText = "El archivo seleccionado no es una imagen válida";
			return 0;
		}else{
			message.innerText = "";
			return 2;
		}
	}
}

function validatePassword(){
	const message = document.getElementById('textWarningPass');
	var passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&#.$($)$-$_])[A-Za-z\d$@$!%*?&#.$($)$-$_]{8,30}$/;	

	if(passText.value !== "" && checkPass.checked){
		if(passwordRegex.test(passText.value)){
			message.innerText = "";
			auxPass = true;
			return 0;
		}else{
			message.innerText = "Las contraseña debe contener lo siguiente: 8 caracteres, una mayúscula, una minúscula, un número y un carácter especial";
			auxPass = false;
			return 1;
		}
	}else if(passText.value === "" && checkPass.checked){
		message.innerText = "Debes escribir una contraseña";
		auxPass = false;
		return 2
	}else if(!checkPass.checked){
		message.innerText = "";
		auxPass = false;
		return 3;
	}	
}

function toggleInput(){
	if(checkPass.checked){
		passText.disabled = false;
		confirmPassText.disabled = false;
	}else{
		passText.disabled = true;
		confirmPassText.disabled = true;
	}
}

function validateSamePassword(){
	const message = document.getElementById('textWarningPass');
	if((confirmPassText.value === passText.value) && checkPass.checked && auxPass){
		message.innerText = "";
		return 0;
	}else if((confirmPassText.value !== passText.value) && checkPass.checked && auxPass){
		message.innerText = "Las contraseñas deben coincidir";
		return 1;
	}else{		
		return 2;
	}
}

/*

function toggleInput(){
	var checkbox = document.getElementById("checkbox");
  
  if (checkbox.checked) {
    inputTextPass.disabled = false; // Habilitar el campo de entrada
    inputTextPassConfirm.disabled = false;
    checkPassword = true;
  } else {
    inputTextPass.disabled = true; // Deshabilitar el campo de entrada
    inputTextPassConfirm.disabled = true;
    checkPassword = false;
  }
}


const nextButton = document.getElementById('nextBtn');
const inputTextEmail = document.getElementById('inputEmail');
const inputTextPass = document.getElementById('inputPass');
const inputTextPassConfirm = document.getElementById('inputPassConfirm');


let inputEnabled = false;
let isPassValid = false;
let isNameValid = false;
let isSelectValid = false;
let isDateValid = false;
let isEmailValid = false;

let checkPassword = false;



window.onload = function() {	
	inputTextEmail.disabled = true;
	nextButton.disabled = true;
	inputTextPass.disabled = true;
	inputTextPassConfirm.disabled = true;
}

function toggleInput(){
	var checkbox = document.getElementById("checkbox");
  
  if (checkbox.checked) {
    inputTextPass.disabled = false; // Habilitar el campo de entrada
    inputTextPassConfirm.disabled = false;
    checkPassword = true;
  } else {
    inputTextPass.disabled = true; // Deshabilitar el campo de entrada
    inputTextPassConfirm.disabled = true;
    checkPassword = false;
  }
}


function validarSoloLetras(){
	const inputName = document.forms['updateProfile']['nameInput'];
	const inputLastName = document.forms['updateProfile']['lastNameInput'];

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
	if(checkPassword == true){
		if(isPassValid && isNameValid && isSelectValid && isDateValid){
			nextButton.disabled = false;
		}else{
			inputTextEmail.disabled = true;
		}
	}else{
		if(isNameValid && isSelectValid && isDateValid){
			nextButton.disabled = false;
		}else{
			inputTextEmail.disabled = true;
		}
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

document.getElementById('foto').addEventListener("change", function(){
	const message = document.getElementById('textWarningFile');
	const archivoSeleccionado = inputFoto.files[0];
  const extensionesPermitidas = ["jpg", "jpeg", "png"];
  const extensionArchivo = archivoSeleccionado.name.split(".").pop().toLowerCase();
  if (!extensionesPermitidas.includes(extensionArchivo)) {
    message.innerText = "El archivo seleccionado no es una foto";
    inputFoto.value = ""
  }else{
  	message.innerText = "";
  }
});


function validarEmail(){
	const inputEmail = document.forms['updateProfile']['inputEmail'];
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
	const inputPass = document.forms['updateProfile']['inputPass'];
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

let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".bx-menu");

console.log(sidebarBtn);

sidebarBtn.addEventListener("click", () => {
	sidebar.classList.toggle("close");
});*/