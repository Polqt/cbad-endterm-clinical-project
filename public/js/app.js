document.addEventListener('DOMContentLoaded', function () {
    const modals = document.querySelectorAll('.modal');

    modals.forEach((modal) => {
        modal.addEventListener('show.bs.modal', function () {
            const inputs = this.querySelectorAll('[data-original-value]');
            inputs.forEach((input) => {
                input.value = input.getAttribute('data-original-value'); 
            });
        });
    });

    setTimeout(function () {
        const alertElement = document.querySelector('.alert');
        if (alertElement) {
            alertElement.classList.remove('show');
            alertElement.classList.add('fade');
            setTimeout(() => {
                alertElement.remove();
            }, 500);
        }
    }, 3000);

    (() => {
        'use strict';

        // Fetch all forms with the `needs-validation` class
        const forms = document.querySelectorAll('.needs-validation');

        // Loop over them and prevent submission if invalid
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }

                form.classList.add('was-validated');

                const inputs = form.querySelectorAll('.is-valid');
                inputs.forEach(input => input.classList.remove('is-valid'));
            }, false);
        });
    })();

});
