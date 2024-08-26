document.addEventListener('DOMContentLoaded', function () {
    setupBootstrapClientSideValidation();
});

// Example starter JavaScript for disabling form submissions if there are invalid fields

let setupBootstrapClientSideValidation = () =>
{
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('form.needs-validation')

    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
        .forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })
}
