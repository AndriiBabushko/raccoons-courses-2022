const chooseSelector = (chosenElem) => chosenElem.classList.add('activeItem');

const unChooseSelector = (chosenElem) => chosenElem.classList.remove('activeItem');

const hiddenSelector = (selector) => {
    selector.classList.remove('d-flex');
    selector.classList.add('d-none');
}

const unhiddenSelector = (selector) => {
    selector.classList.remove('d-none');
    selector.classList.add('d-flex');
}


const menuItems = document.querySelectorAll('.settings-item');
const divAccountSettings = document.querySelector('#accountSettings');
const divAppearanceSettings = document.querySelector('#appearanceSettings');
const divLogoutSettings = document.querySelector('#logoutSettings');

let activeItems = [];
for (let i = 0; i < menuItems.length; i++) {
    activeItems.push(false)
}
activeItems[0] = true;

if (divAccountSettings === null || divAppearanceSettings === null || divLogoutSettings === null) {
    chooseSelector(menuItems[0]);
} else {
    unhiddenSelector(divAccountSettings);
    hiddenSelector(divAppearanceSettings);
    hiddenSelector(divLogoutSettings);
}


for (let i = 0; i < menuItems.length; i++) {
    menuItems[i].addEventListener('click', (event) => {
        const activeIndex = activeItems.findIndex((element) => element === true);

        if (activeIndex !== i) {
            activeItems[activeIndex] = false;
            activeItems[i] = true;

            chooseSelector(menuItems[i].querySelector('.settings-link'));
            unChooseSelector(menuItems[activeIndex].querySelector('.settings-link'));

            switch (i) {
                case 0: {
                    console.log('Account');
                    unhiddenSelector(divAccountSettings);
                    hiddenSelector(divAppearanceSettings);
                    hiddenSelector(divLogoutSettings);
                    break;
                }
                case 1: {
                    console.log('Appearance');
                    hiddenSelector(divAccountSettings);
                    unhiddenSelector(divAppearanceSettings);
                    hiddenSelector(divLogoutSettings);
                    break;
                }
                case 2: {
                    console.log('Logout');
                    hiddenSelector(divAccountSettings);
                    hiddenSelector(divAppearanceSettings);
                    unhiddenSelector(divLogoutSettings);
                    break;
                }
            }
        }
    });
}


