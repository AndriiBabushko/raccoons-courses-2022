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
                if (input.classList.contains('username'))
                    if (isNumberInString(input.value.toString()))
                        return false;

                if (input.classList.contains('short'))
                    if (input.value.length > 100)
                        return false;

                if (input.classList.contains('long'))
                    if (input.value.length < 50)
                        return false;

                if (input.getAttribute('type') === 'email' || input.getAttribute('name') === 'email')
                    if (!input.value.trim().match(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/))
                        return false;

                if (input.getAttribute('type') === 'tel' || input.getAttribute('name') === 'phoneNumber')
                    if (!input.value.trim().match(/^\+?([0-9]{2})\)?[-. ]?([0-9]{3})\)?[-.]?([0-9]{3})[-.]?([0-9]{4})$/))
                        return false;
            }
        } else {
            if (input.getAttribute('id') === 'password' && unnecessaryInput.getAttribute('id') === 'confirmPassword') {
                if (input.value !== unnecessaryInput.value)
                    return false;
            }
        }
    }

    return true;
}

const checkInputForValidate = (event, input) => {
    if (input !== null)
        if (validateInput(input)) {
            addIsValid(input);
            removeIsInvalid(input);
        } else {
            addIsInvalid(input);
            removeIsValid(input);
            event.preventDefault();
        }
}

const validation = (event, textAction = 'Some Action') => {
    console.log(textAction);

    const firstNameInput = document.querySelector('#textFirstName');
    const lastNameInput = document.querySelector('#textLastName');
    const emailInput = document.querySelector('#email');
    const phoneNumberInput = document.querySelector('#phoneNumber');
    const passwordInput = document.querySelector('#password');
    const confirmPasswordInput = document.querySelector('#confirmPassword');

    const goodNameInput = document.querySelector('#goodName');
    const goodPriceInput = document.querySelector('#goodPrice');
    const goodShortDescriptionInput = document.querySelector('#goodShortDescription');
    const goodDescriptionInput = document.querySelector('#goodDescription');

    checkInputForValidate(event, firstNameInput);
    checkInputForValidate(event, lastNameInput);
    checkInputForValidate(event, emailInput);
    checkInputForValidate(event, phoneNumberInput);

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

    checkInputForValidate(event, goodNameInput);
    checkInputForValidate(event, goodPriceInput);
    checkInputForValidate(event, goodShortDescriptionInput);
    checkInputForValidate(event, goodDescriptionInput);
}

const buttonLogin = document.querySelector('#buttonLogin');
if (buttonLogin !== null) {
    buttonLogin.addEventListener('click', event => {
        validation(event, 'Login user Action!');
    });
}

const buttonRegister = document.querySelector('#buttonRegister');
if (buttonRegister !== null) {
    buttonRegister.addEventListener('click', event => {
        validation(event, 'Register user Action!');
    });
}

const buttonUpdate = document.querySelector('#buttonUpdate');
if (buttonUpdate !== null) {
    buttonUpdate.addEventListener('click', event => {
        validation(event, 'Update user Action!');
    });
}

const buttonAddGood = document.querySelector('#buttonAddGood');
if (buttonAddGood !== null) {
    buttonAddGood.addEventListener('click', event => {
        validation(event, 'Add good Action!');
    });
}

const buttonClear = document.querySelector('#buttonClear');
if (buttonClear !== null) {
    buttonClear.addEventListener('click', () => {
        console.log('Clear Action!');

        document.querySelector('#textFirstName').value = "";
        document.querySelector('#textLastName').value = "";
        document.querySelector('#email').value = "";
        document.querySelector('#phoneNumber').value = "";
        document.querySelector('#textareaBio').value = "";
    })
}
