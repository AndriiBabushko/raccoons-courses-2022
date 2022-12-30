import {grabAndScrollListener} from "/static/js/grabAndScroll.js";

const addDisplayBlock = element => {
    element.style.display = 'flex';
    element.style.animationName = 'smooth-appearance';
    element.style.animationDuration = '3s';
};

const programmingLanguageContainers = document.querySelectorAll('.programming-language-container');
for (let i = 0; i < programmingLanguageContainers.length; i++) {
    setTimeout(() => {
        addDisplayBlock(programmingLanguageContainers[i]);
    }, 100)
}


const programmingLanguagesContainer = document.querySelector('.programming-languages-container');

programmingLanguagesContainer.addEventListener('mousedown', event => {
    grabAndScrollListener(event, programmingLanguagesContainer);
});

