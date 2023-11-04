const form = document.getElementById('form'); 
let msg = document.getElementById('msg');


form.addEventListener('submit', (e) => {
    e.preventDefault();

    const data = new FormData(form);

    fetch('./php/login.php', {
        method: 'POST',
        body: data
    }) 
    .then(res => res.json())
    .then(data => {
        if(data === 'error_inputs') { 
            msg.innerHTML = 'Asegurese que todos los campos estén llenos';
            msg.classList.add('active');
        } else if (data === 'error_user_name') {
            msg.innerHTML = 'Nombre de usuario o contraseña incorrecta';
            msg.classList.add('active');
        } else if (data === 'error_password') {
            msg.innerHTML = 'Nombre de usuario o contraseña incorrecta';
            msg.classList.add('active');
        } else if (data === 'success') {
            form.reset();
            window.location = "pages/orders.php";
        }
    })
    .catch(error => console.log(error))
})
