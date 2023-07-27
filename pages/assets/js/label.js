function Form() {
    let inputs = document.querySelectorAll('.form__input');

    for ( let i = 0; i < inputs.length; i++) {
        inputs[i].addEventListener('keyup', function() {
            if(this.value.length >= 1) {
                msg.classList.remove('active')
                this.nextElementSibling.classList.add('fixed');
            } else {
                this.nextElementSibling.classList.remove('fixed');
            }
        })
    } 
}

Form()