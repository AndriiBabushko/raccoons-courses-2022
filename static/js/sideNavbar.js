const addRemoveId = (element, idName) => {
    if (element.getAttribute('id') === idName)
        return element.removeAttribute('id');

    return element.setAttribute('id', idName);
}


const sidebarCollapse = document.querySelector('#sidebarCollapse');
const sidebar = document.querySelector('#sidebar');

sidebarCollapse.addEventListener('click', () => {
    sidebar.parentElement.classList.add('sidebar-col');
    addRemoveId(sidebar.parentElement, 'sidebarCol');
});