const nextButton = document.getElementById('nextBtn');
let isPassValid = false;
let isEmailValid = false;

window.onload = function() {
	nextButton.disabled = true;
}

setInterval(function(){
	if(isPassValid && isEmailValid){
		nextButton.disabled = false;
	}else{
		nextButton.disabled = true;
	}
}, 500);


document.querySelector(".emailText").addEventListener('input', function(){
	campo = event.target;
	valido = document.getElementById('textWarningEmail');
		emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
	if(emailRegex.test(campo.value)){
		valido.innerText = "";
		isEmailValid = true;
		}else{
		valido.innerText = "No válido";
		isEmailValid = false;
	}
	if(campo.value === ""){
		valido.innerText = "";
		isEmailValid = false;
	}
});

document.querySelector(".passText").addEventListener('input', function(){
	campo = event.target;
	valido = document.getElementById('textWarningPass');

	var contrasenaRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&#.$($)$-$_])[A-Za-z\d$@$!%*?&#.$($)$-$_]{8,30}$/;

	if (contrasenaRegex.test(campo.value)) {
      valido.innerText = "";
      isPassValid = true;
    } else {
      valido.innerText = "Recuerda las especificaciones de las contraseñas (8 caracteres, una mayúscula, una minúscula, un número y un carácter especial)";
      isPassValid = false;
    }

});


(function(){
	const formLogin = document.getElementById("loginForm");
	formLogin.onsubmit = function(e){
		e.preventDefault();

		const email = document.getElementById("emailInput");
		const pass = document.getElementById("passInput");

		const formData = new FormData();
		formData.append('email', email.value);
		formData.append('pass', pass.value);

		let xhr = new XMLHttpRequest();
		xhr.timeout = 5000; // 5 segundos
		xhr.open("POST", "../backend/controllers/logInController.php", true);

		xhr.onreadystatechange = function(){
			console.log(xhr.readyState);
			if(xhr.readyState == XMLHttpRequest.DONE){
				if(xhr.status == 200){
					if(xhr.response){
						console.log(xhr.response);
  			      try {
  			        let res = JSON.parse(xhr.response);
  			        if (res.success != true){
  			        	alert(res.msg);
  			        	return;
  			        } 
  			        alert(res.msg);
  			        window.location.replace("./../index.php");//CAMBIAR AL CONTROLADOR QUE TE TRAE LOS PRODUCTOS						
  			      } catch (error) {
  			        console.error("Ha ocurrido un error: " + error);
  			      }
					}else{
						console.error("La respuesta del servidor está vacía");
					}
				}else {
  			  console.error("Ha ocurrido un error en la solicitud: " + xhr.status);
  			}
			}
		}		
		xhr.send(formData);
		/*xhr.onreadystatechange = function() {
			console.log(xhr.readyState);
			if(xhr.readyState == XMLHttpRequest.DONE) {
				if(xhr.status == 200){
					console.log(xhr.response);
					try{
						let res = JSON.parse(xhr.response);
						if(res.suscces != true) return;
						alert(res.msg);
						window.location.replace("./../../index.php");//CAMBIAR AL CONTROLADOR QUE TE TRAE LOS PRODUCTOS						
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
		xhr.send(formData);*/
	}
})();