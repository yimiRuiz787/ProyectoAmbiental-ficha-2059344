const form = document.getElementById('form');
const usuario = document.getElementById('email');

const password = document.getElementById('password');


form.addEventListener('submit', e => {
	e.preventDefault();
	
	checkInputs();
});

function checkInputs() {
	// trim to remove the whitespaces
	const usuarioValue = usuario.value.trim();

	const passwordValue = password.value.trim();
;
	
	if(usuarioValue === '') {
		setErrorFor(usuario, 'Debe ingresar su correo de usuario');
	} else {
		setSuccessFor(usuario);
	}
	
	
	
	if(passwordValue === '') {
		setErrorFor(password, 'Debe ingresar una contraseña');
	} else {
		setSuccessFor(password);
	}

	if (usuarioValue!= '' && passwordValue!='') {

		location.href = "?controller=dashboard"
	}
	
	
}

function setErrorFor(input, message) {
	const formControl = input.parentElement;
	const small = formControl.querySelector('small');
	formControl.className = 'form-control error';
	small.innerText = message;
}

function setSuccessFor(input) {
	const formControl = input.parentElement;
	formControl.className = 'form-control success';
}

