const getGoodsData = () => {
    const cards = document.querySelectorAll('.card');
    let data = [];

    for (let i = 0; i < cards.length; i++) {
        let obj = {};

        obj['name'] = cards[i].querySelector('.card-title').innerHTML;

        obj['price'] = cards[i].querySelector('.card-subtitle .price').innerHTML;
        obj['priceText'] = cards[i].querySelector('.card-subtitle').innerHTML;

        obj['short_description'] = cards[i].querySelector('.card-text').innerHTML;

        const viewAddButtons = document.querySelector('.view-cart-buttons');
        if (viewAddButtons !== null) {
            const buttons = viewAddButtons.querySelectorAll('.card-link');
            const viewButton = buttons[0];
            const cartButton = buttons[1];

            obj['viewButtonText'] = viewButton.innerHTML;
            obj['viewButtonHref'] = viewButton.getAttribute('href');

            obj['cartButtonText'] = cartButton.innerHTML;
            obj['cartButtonHref'] = cartButton.getAttribute('href');
        }

        const img = cards[i].querySelector('.card-img-top');
        obj['photoPath'] = img.getAttribute('src');
        obj['photoName'] = img.getAttribute('alt');

        const adminButtons = cards[i].querySelector('.admin-buttons');
        if (adminButtons !== null) {
            const updateButton = adminButtons.querySelector('.btn-primary');
            const deleteButton = adminButtons.querySelector('.btn-danger');

            if (updateButton !== null)
                obj['updateHref'] = updateButton.getAttribute('href');

            if (deleteButton !== null)
                obj['deleteHref'] = deleteButton.getAttribute('href');
        }

        data.push(obj);
    }

    return data;
};

const createGoodsCards = data => {
    const cardsBlock = document.createElement('div');
    console.log(data);

    for (let i = 0; i < data.length; i++) {
        const userHr = document.createElement('hr');
        const adminHr = document.createElement('hr');

        const viewButton = document.createElement('a');
        viewButton.classList.add('btn', 'btn-secondary', 'card-link');
        viewButton.setAttribute('href', data[i]['viewButtonHref']);
        viewButton.innerHTML = data[i]['viewButtonText'];

        const cartButton = document.createElement('a');
        cartButton.classList.add('btn', 'btn-success', 'card-link');
        cartButton.setAttribute('href', data[i]['cartButtonHref']);
        cartButton.innerHTML = data[i]['cartButtonText'];

        const viewCartButtonsContainer = document.createElement('div');
        viewCartButtonsContainer.classList.add('d-flex', 'justify-content-between', 'view-cart-buttons');
        viewCartButtonsContainer.append(viewButton, cartButton);

        const cardText = document.createElement('p');
        cardText.classList.add('card-text');
        cardText.innerHTML = data[i]['short_description'];

        const cardSubtitle = document.createElement('p');
        cardSubtitle.classList.add('card-subtitle');
        cardSubtitle.innerHTML = data[i]['priceText'];

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

            const adminButtonsContainer = document.createElement('div');
            adminButtonsContainer.classList.add('d-flex', 'justify-content-between', 'admin-buttons');
            adminButtonsContainer.append(updateButton, deleteButton);

            cardBody.append(cardTitle, cardSubtitle, userHr, cardText, viewCartButtonsContainer, adminHr, adminButtonsContainer);
        } else {
            cardBody.append(cardTitle, cardSubtitle, userHr, cardText, viewCartButtonsContainer);
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

const sortGoods = (orderBy, sortingType) => {
    const data = getGoodsData();

    if (orderBy === 'name' && sortingType === 'ascendingSort') {
        data.sort((obj1, obj2) => (obj1.name.localeCompare(obj2.name)) ? -1 : (obj2.name.localeCompare(obj1.name)) ? 1 : 0);
    }

    if (orderBy === 'name' && sortingType === 'descendingSort') {
        data.sort((obj1, obj2) => (obj2.name.localeCompare(obj1.name)) ? -1 : (obj1.name.localeCompare(obj2.name)) ? 1 : 0);
    }

    if (orderBy === 'price' && sortingType === 'ascendingSort') {
        data.sort((obj1, obj2) => (obj1.price < obj2.price) ? -1 : (obj1.price > obj2.price) ? 1 : 0);
    }

    if (orderBy === 'price' && sortingType === 'descendingSort') {
        data.sort((obj1, obj2) => (obj1.price > obj2.price) ? -1 : (obj1.price < obj2.price) ? 1 : 0);
    }

    if (orderBy === 'short_description' && sortingType === 'ascendingSort') {
        data.sort((obj1, obj2) => (obj1.short_description.localeCompare(obj2.short_description)) ? -1 : (obj2.short_description.localeCompare(obj1.short_description)) ? 1 : 0);
    }

    if (orderBy === 'short_description' && sortingType === 'descendingSort') {
        data.sort((obj1, obj2) => (obj2.short_description.localeCompare(obj1.short_description)) ? -1 : (obj1.short_description.localeCompare(obj2.short_description)) ? 1 : 0);
    }

    return data;
};


const searchInput = document.querySelector('#search');
const orderByInput = document.querySelector('#orderBy');
const sortingRadios = document.querySelectorAll('input[name="sortingType"]');

searchInput.addEventListener('input', () => {
    const searchValue = searchInput.value;
    const data = getGoodsData();
    const foundData = findData(data, searchValue);
    hideCards(data, foundData);
});

orderByInput.addEventListener('change', () => {
    const orderBy = orderByInput.value;
    const sortingType = document.querySelector('input[name="sortingType"]:checked').value;

    console.log(orderBy);
    console.log(sortingType);

    const data = sortGoods(orderBy, sortingType);
    deleteCards();
    showCards(createGoodsCards(data));
});

for (let i = 0; i < sortingRadios.length; i++) {
    sortingRadios[i].addEventListener('change', () => {
        const orderBy = orderByInput.value;
        const sortingType = document.querySelector('input[name="sortingType"]:checked').value;

        console.log(orderBy);
        console.log(sortingType);

        const data = sortGoods(orderBy, sortingType);
        deleteCards();
        showCards(createGoodsCards(data));
    });
}