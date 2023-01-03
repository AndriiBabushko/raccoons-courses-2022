const getCategoriesData = () => {
    const cards = document.querySelectorAll('.card');
    let data = [];

    for (let i = 0; i < cards.length; i++) {
        let obj = {};

        obj['name'] = cards[i].querySelector('.card-title').innerHTML;
        obj['description'] = cards[i].querySelector('.card-text').innerHTML;

        const img = cards[i].querySelector('.card-img-top');
        obj['photoPath'] = img.getAttribute('src');
        obj['photoName'] = img.getAttribute('alt');

        const viewButton = cards[i].querySelector('.card-link');
        obj['viewButtonText'] = viewButton.innerHTML;
        obj['viewButtonHref'] = viewButton.getAttribute('href');

        const adminButtons = cards[i].querySelector('.admin-buttons');
        if (adminButtons !== null) {
            const updateButton = adminButtons.querySelector('.btn-primary');
            const deleteButton = adminButtons.querySelector('.btn-danger');

            obj['updateHref'] = updateButton.getAttribute('href');
            obj['deleteHref'] = deleteButton.getAttribute('href');
        }

        data.push(obj);
    }

    return data;
};

const createCategoryCards = data => {
    const cardsBlock = document.createElement('div');
    console.log(data);

    for (let i = 0; i < data.length; i++) {
        const hr = document.createElement('hr');

        const viewButton = document.createElement('a');
        viewButton.classList.add('btn', 'btn-secondary', 'card-link');
        viewButton.setAttribute('href', data[i]['viewButtonHref']);
        viewButton.innerHTML = data[i]['viewButtonText'];

        const cardText = document.createElement('p');
        cardText.classList.add('card-text');
        cardText.innerHTML = data[i]['description'];

        const cardTitle = document.createElement('h5');
        cardTitle.classList.add('card-title');
        cardTitle.innerHTML = data[i]['name'];

        const cardBody = document.createElement('div');
        cardBody.classList.add('card-body');

        if (data[i].hasOwnProperty('updateHref') && data[i].hasOwnProperty('deleteHref')) {
            const updateIcon = document.createElement('i');
            updateIcon.classList.add('bi', 'bi-pencil');

            const deleteIcon = document.createElement('i');
            deleteIcon.classList.add('bi', 'bi-trash');

            const updateButton = document.createElement('a');
            updateButton.classList.add('btn', 'btn-primary');
            updateButton.setAttribute('href', data[i]['updateHref']);
            updateButton.appendChild(updateIcon);

            const deleteButton = document.createElement('a');
            deleteButton.classList.add('btn', 'btn-danger');
            deleteButton.setAttribute('href', data[i]['deleteHref']);
            deleteButton.appendChild(deleteIcon);

            const buttonsContainer = document.createElement('div');
            buttonsContainer.classList.add('d-flex', 'justify-content-between', 'admin-buttons');
            buttonsContainer.append(updateButton, deleteButton);

            cardBody.append(cardTitle, cardText, viewButton, hr, buttonsContainer);
        } else {
            cardBody.append(cardTitle, cardText, viewButton);
        }

        const img = document.createElement('img');
        img.setAttribute('src', data[i]['photoPath']);
        img.setAttribute('alt', data[i]['photoName']);
        img.classList.add('card-img-top');

        const card = document.createElement('div');
        card.classList.add('card', 'border-2');
        card.append(img, cardBody);

        const col = document.createElement('div');
        col.setAttribute('class', 'col');
        col.appendChild(card);

        cardsBlock.appendChild(col);
    }

    return cardsBlock;
};

const sortCategories = (orderBy, sortingType) => {
    const data = getCategoriesData();

    if (orderBy === 'name' && sortingType === 'ascendingSort') {
        data.sort((obj1, obj2) => (obj1.name.localeCompare(obj2.name)) ? -1 : (obj2.name.localeCompare(obj1.name)) ? 1 : 0);
    }

    if (orderBy === 'name' && sortingType === 'descendingSort') {
        data.sort((obj1, obj2) => (obj2.name.localeCompare(obj1.name)) ? -1 : (obj1.name.localeCompare(obj2.name)) ? 1 : 0);
    }

    if (orderBy === 'description' && sortingType === 'ascendingSort') {
        data.sort((obj1, obj2) => (obj1.description.localeCompare(obj2.description)) ? -1 : (obj2.description.localeCompare(obj1.description)) ? 1 : 0);
    }

    if (orderBy === 'description' && sortingType === 'descendingSort') {
        data.sort((obj1, obj2) => (obj2.description.localeCompare(obj1.description)) ? -1 : (obj1.description.localeCompare(obj2.description)) ? 1 : 0);
    }

    return data;
};

const searchInput = document.querySelector('#search');
const orderByInput = document.querySelector('#orderBy');
const sortingRadios = document.querySelectorAll('input[name="sortingType"]');

searchInput.addEventListener('input', () => {
    const searchValue = searchInput.value;
    const data = getCategoriesData();
    const foundData = findData(data, searchValue);
    hideCards(data, foundData);
});

orderByInput.addEventListener('change', () => {
    const orderBy = orderByInput.value;
    const sortingType = document.querySelector('input[name="sortingType"]:checked').value;

    console.log(orderBy);
    console.log(sortingType);

    const data = sortCategories(orderBy, sortingType);
    deleteCards();
    showCards(createCategoryCards(data));
});

for (let i = 0; i < sortingRadios.length; i++) {
    sortingRadios[i].addEventListener('change', () => {
        const orderBy = orderByInput.value;
        const sortingType = document.querySelector('input[name="sortingType"]:checked').value;

        console.log(orderBy);
        console.log(sortingType);

        const data = sortCategories(orderBy, sortingType);
        deleteCards();
        showCards(createCategoryCards(data));
    });
}