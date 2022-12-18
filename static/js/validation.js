const addIsInvalid = element => {
    element.classList.add('is-invalid');
}

const addIsValid = element => {
    element.classList.add('is-valid');
}

const removeIsInvalid = element => {
    element.classList.remove('is-invalid');
}

const removeIsValid = element => {
    element.classList.remove('is-valid');
}

const isNumberInString = string => /\d/.test(string);


const validateInput = (input, unnecessaryInput = null) => {
    if (input.value.trim() === '') {
        return false;
    } else {
        if (unnecessaryInput === null) {
            if (input.value.length < 2)
                return false;
            else {
                if (input.getAttribute('type') === 'text')
                    if (isNumberInString(input.value.toString()))
                        return false;

                if (input.getAttribute('type') === 'email' || input.getAttribute('name') === 'email')
                    if (!input.value.trim().match(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/))
                        return false;

                if (input.getAttribute('type') === 'tel' || input.getAttribute('name') === 'phoneNumber')
                    if (!input.value.trim().match(/^\+?([0-9]{2})\)?[-. ]?([0-9]{3})\)?[-.]?([0-9]{3})[-.]?([0-9]{4})$/))
                        return false;
            }
        } else {
            if (input.getAttribute('type') === 'password' && unnecessaryInput.getAttribute('type') === 'password') {
                if (input.value !== unnecessaryInput.value)
                    return false;
            }
        }
    }

    return true;
}

const validation = (event, textAction = 'Action') => {
    console.log(textAction);

    const firstNameInput = document.querySelector('#textFirstName');
    const lastNameInput = document.querySelector('#textLastName');
    const emailInput = document.querySelector('#email');
    const phoneNumberInput = document.querySelector('#phoneNumber');
    const passwordInput = document.querySelector('#password');
    const confirmPasswordInput = document.querySelector('#confirmPassword');

    if (firstNameInput !== null)
        if (validateInput(firstNameInput)) {
            addIsValid(firstNameInput);
            removeIsInvalid(firstNameInput);
        } else {
            addIsInvalid(firstNameInput);
            removeIsValid(firstNameInput);
            event.preventDefault();
        }

    if (lastNameInput !== null)
        if (validateInput(lastNameInput)) {
            addIsValid(lastNameInput);
            removeIsInvalid(lastNameInput);
        } else {
            addIsInvalid(lastNameInput);
            removeIsValid(lastNameInput);
            event.preventDefault();
        }

    if (emailInput !== null)
        if (validateInput(emailInput)) {
            addIsValid(emailInput);
            removeIsInvalid(emailInput);
        } else {
            addIsInvalid(emailInput);
            removeIsValid(emailInput);
            event.preventDefault();
        }

    if (phoneNumberInput !== null)
        if (validateInput(phoneNumberInput)) {
            addIsValid(phoneNumberInput);
            removeIsInvalid(phoneNumberInput);
        } else {
            addIsInvalid(phoneNumberInput);
            removeIsValid(phoneNumberInput);
            event.preventDefault();
        }

    if (passwordInput !== null && confirmPasswordInput !== null)
        if (validateInput(passwordInput, confirmPasswordInput)) {
            addIsValid(passwordInput);
            addIsValid(confirmPasswordInput);
            removeIsInvalid(passwordInput);
            removeIsInvalid(confirmPasswordInput);
        } else {
            addIsInvalid(passwordInput);
            addIsInvalid(confirmPasswordInput);
            removeIsValid(passwordInput);
            removeIsValid(confirmPasswordInput);
            event.preventDefault();
        }
}

const buttonLogin = document.querySelector('#buttonLogin');
if (buttonLogin !== null) {
    buttonLogin.addEventListener('click', event => {
        validation(event, 'Login Action!');
    });
}

const buttonRegister = document.querySelector('#buttonRegister');
if (buttonRegister !== null) {
    buttonRegister.addEventListener('click', event => {
        validation(event, 'Register Action!');
    });
}

const buttonUpdate = document.querySelector('#buttonUpdate');
if (buttonUpdate !== null) {
    buttonUpdate.addEventListener('click', event => {
        validation(event, 'Update Action!');
    });
}
