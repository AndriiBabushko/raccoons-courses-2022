import {grabAndScrollListener} from "/static/js/grabAndScroll.js";

const tableBlock = document.querySelector('#cardsBlock');
tableBlock.addEventListener('mousedown', event => {
    grabAndScrollListener(event, tableBlock);
})
