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
});
