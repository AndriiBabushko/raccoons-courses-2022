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

const createCards = (data) => {
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

        if (data[i].hasOwnProperty('updateHref')) {
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
            buttonsContainer.classList.add('d-flex', 'justify-content-evenly', 'admin-buttons');
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

const showCards = cardsBlock => {
    const cardsContainer = document.querySelector('#cardsContainer');
    const cols = cardsBlock.querySelectorAll('.col');

    for (let i = 0; i < cols.length; i++) {
        cardsContainer.appendChild(cols[i]);
    }
};

const deleteCards = () => {
    const cols = document.querySelectorAll('#cardsContainer .col');

    for (let i = 0; i < cols.length; i++) {
        cols[i].remove();
    }
};

const hideCards = (data, foundData) => {
    const cardTitles = document.querySelectorAll('#cardsContainer .col .card-body .card-title');

    for (let i = 0; i < cardTitles.length; i++) {
        if (foundData.length === 0) {
            cardTitles[i].parentElement.parentElement.parentElement.style.display = 'none';
        } else {
            if (foundData.length < data.length) {
                for (let j = 0; j < foundData.length; j++) {
                    if (cardTitles[i].innerHTML !== foundData[j]['name']) {
                        cardTitles[i].parentElement.parentElement.parentElement.style.display = 'none';
                    } else {
                        cardTitles[i].parentElement.parentElement.parentElement.removeAttribute('style');
                    }
                }
            } else
                cardTitles[i].parentElement.parentElement.parentElement.removeAttribute('style');
        }
    }
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
        data.sort((obj1, obj2) => (obj1.name.localeCompare(obj2.name)) ? -1 : (obj2.name.localeCompare(obj1.name)) ? 1 : 0);
    }

    if (orderBy === 'description' && sortingType === 'descendingSort') {
        data.sort((obj1, obj2) => (obj2.name.localeCompare(obj1.name)) ? -1 : (obj1.name.localeCompare(obj2.name)) ? 1 : 0);
    }

    deleteCards();
    showCards(createCards(data));
};

const findCategories = searchValue => {
    const data = getCategoriesData();

    const foundData = data.filter(obj => {
        const cutValue = obj.name.slice(0, searchValue.length);
        return cutValue === searchValue;
    });

    hideCards(data, foundData);
};


const searchInput = document.querySelector('#search');
const orderByInput = document.querySelector('#orderBy');
const sortingRadios = document.querySelectorAll('input[name="sortingType"]');

searchInput.addEventListener('input', () => {
    const searchValue = searchInput.value;
    findCategories(searchValue);
});

orderByInput.addEventListener('change', () => {
    const orderBy = orderByInput.value;
    const sortingType = document.querySelector('input[name="sortingType"]:checked').value;

    console.log(orderBy);
    console.log(sortingType);

    sortCategories(orderBy, sortingType);
});

for (let i = 0; i < sortingRadios.length; i++) {
    sortingRadios[i].addEventListener('change', () => {
        const orderBy = orderByInput.value;
        const sortingType = document.querySelector('input[name="sortingType"]:checked').value;

        console.log(orderBy);
        console.log(sortingType);

        sortCategories(orderBy, sortingType);
    });
}