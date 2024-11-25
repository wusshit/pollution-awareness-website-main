document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('#contactForm');
    form.addEventListener('submit', function (event) {
        let valid = true;
        const name = document.querySelector('#name');
        const email = document.querySelector('#email');
        const message = document.querySelector('#message');

        if (name.value.trim() === '') {
            alert('Name is required.');
            valid = false;
        }

        if (!/\S+@\S+\.\S+/.test(email.value)) {
            alert('Please enter a valid email.');
            valid = false;
        }

        if (message.value.trim() === '') {
            alert('Message cannot be empty.');
            valid = false;
        }

        if (!valid) {
            event.preventDefault();
        }
    });
});
