const addRemoveId = (element, idName) => {
    if (element.getAttribute('id') === idName)
        return element.removeAttribute('id');

    return element.setAttribute('id', idName);
}

const addRemoveClass = (element, addClassName, removeClassName) => {

}

const sidebarCollapse = document.querySelector('#sidebarCollapse');
const sidebar = document.querySelector('#sidebar');

sidebarCollapse.addEventListener('click', () => {
    addRemoveId(sidebar.parentElement, 'sidebarCol');
});