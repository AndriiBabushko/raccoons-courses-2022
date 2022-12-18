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


// Handlers for 'Drag and scroll'
const mouseMoveHandler = event => {
    const dx = event.clientX - positions.x;
    const dy = event.clientY - positions.y;

    programmingLanguagesContainer.scrollTop = positions.top - dy;
    programmingLanguagesContainer.scrollLeft = positions.left - dx;
};

const mouseUpHandler = event => {
    programmingLanguagesContainer.removeEventListener('mousemove', mouseMoveHandler);
    programmingLanguagesContainer.removeEventListener('mouseup', mouseUpHandler);

    programmingLanguagesContainer.style.cursor = 'grab';
    programmingLanguagesContainer.style.removeProperty('user-select');
};

// Drag and scroll
const programmingLanguagesContainer = document.querySelector('.programming-languages-container');
let positions = {
    top: 0, left: 0, x: 0, y: 0
};

programmingLanguagesContainer.addEventListener('mousedown', event => {
    positions = {
        top: programmingLanguagesContainer.scrollTop,
        left: programmingLanguagesContainer.scrollLeft, x: event.clientX, y: event.clientY
    };

    programmingLanguagesContainer.style.cursor = 'grabbing';
    programmingLanguagesContainer.style.userSelect = 'none';


    programmingLanguagesContainer.addEventListener('mousemove', mouseMoveHandler);
    programmingLanguagesContainer.addEventListener('mouseup', mouseUpHandler);
})