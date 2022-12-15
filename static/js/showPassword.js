const closeEye = eye => {
    if (eye.tagName === 'SPAN') {
        const eyeSpan = eye.firstChild;
        console.log(eyeSpan);
        eyeSpan.classList.remove('bi-eye');
        eyeSpan.classList.add('bi-eye-slash')
    }

    if (eye.tagName === 'I') {
        eye.classList.remove('bi-eye');
        eye.classList.add('bi-eye-slash')
    }
}

const openEye = eye => {
    if (eye.tagName === 'SPAN') {
        const eyeSpan = eye.firstChild;
        console.log(eyeSpan);
        eyeSpan.classList.remove('bi-eye-slash');
        eyeSpan.classList.add('bi-eye')
    }

    if (eye.tagName === 'I') {
        eye.classList.remove('bi-eye-slash');
        eye.classList.add('bi-eye')
    }
}

const checkShowPasswordClick = target => {
    const input = target.parentNode.previousElementSibling;

    if (input.getAttribute('type') === 'password') {
        input.setAttribute('type', 'text');
        openEye(target);
    } else {
        input.setAttribute('type', 'password');
        closeEye(target);
    }
}

const showPassword = document.querySelectorAll('.showPassword');
for (let i = 0; i < showPassword.length; i++) {
    showPassword[i].addEventListener('click', event => {
        const target = event.target;

        if (target.tagName === 'SPAN') {
            console.log('SPAN');
            const correctTarget = target.querySelector('i');
            checkShowPasswordClick(correctTarget);
        }

        if (target.tagName === 'I') {
            console.log('I');
            checkShowPasswordClick(target);
        }
    });
}