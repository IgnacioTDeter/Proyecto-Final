const form = document.getElementById('form');
const inputs = document.querySelectorAll('.input');
let msg = document.getElementById('msg'),
    pop_up = document.getElementById('pop_up'),
    overlay = document.getElementById('overlay'),
    btn_back = document.getElementById('btn_back');


form.addEventListener('submit', (e) => {
    e.preventDefault();

    
    const data = new FormData(form);
    
    fetch('../php/form_high.php', {
        method: 'POST',
        body: data
    })
        .then(res => res.json())
        .then(data => {
            if (data === 'error_inputs') {
                msg.innerHTML = 'Asegurese que todos los campos estén llenos';
                msg.classList.add('active');
                pop_up.classList.add('active');
                overlay.classList.add('active');
            } else if (data === 'error_tool_name') {
                msg.innerHTML = 'Esta herramienta ya existe';
                msg.classList.add('active');
                pop_up.classList.add('active');
                overlay.classList.add('active');
            } else if (data === 'success') {
                pop_up.classList.add('active');
                msg.innerHTML = 'Exito';
                msg.classList.add('active');
                overlay.classList.add('active');
                form.reset();
                window.location = "inventory.php";
            }
        })
        .catch(error => console.log(error))
})

btn_back.onclick = () => {
    pop_up.classList.remove('active');
    overlay.classList.remove('active');
}
/**/
