let user = document.querySelector('#user');
let pass = document.querySelector('#password');
const btnSubmit = document.querySelector('#btn-form');

btnSubmit.addEventListener('click', () => {
    let data = {
        user: user.value,
        pass: pass.value
    }

    $.ajax({
        url: './controller/login/validar_usuario.php',
        type: 'post',
        data: data,
        success: (res) => {
            let dataRes = JSON.parse(res);
            (dataRes.status == "200") ? loginSuccess() : errorData();
        }
    });
});

const loginSuccess = () => {
    window.location = './views/src/principal.php';
}

const errorData = () => {
    let error = document.querySelector('#error-data');
    error.classList.remove('notError');
    error.classList.add('errorUsuario');
}
