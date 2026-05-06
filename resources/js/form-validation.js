// Example starter JavaScript for disabling form submissions if there are invalid fields

let setupBootstrapClientSideValidation = () =>
{
    console.log('setupBootstrapClientSideValidation')
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    let forms = document.querySelectorAll('form.needs-validation');

    console.log('forms', forms)
    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
        .forEach(function (form) {
            form.addEventListener('submit', function (event) {
                console.log('form stop submit', form)
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })
}

setupBootstrapClientSideValidation();
