import {grabAndScrollListener} from "/static/js/grabAndScroll.js";

const programmingLanguagesContainer = document.querySelector('.programming-languages-container');

programmingLanguagesContainer.addEventListener('mousedown', event => {
    grabAndScrollListener(event, programmingLanguagesContainer);
});

