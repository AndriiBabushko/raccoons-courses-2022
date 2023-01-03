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

    for (let i = 0; i < data.length; i++) {
        if (foundData.length === 0) {
            cardTitles[i].parentElement.parentElement.parentElement.style.display = 'none';
        } else {
            if (foundData.length === data.length) {
                cardTitles[i].parentElement.parentElement.parentElement.removeAttribute('style');
            } else {
                for (let j = 0; j < foundData.length; j++) {
                    if (data[i]['name'] === foundData[j]['name']) {
                        cardTitles[i].parentElement.parentElement.parentElement.removeAttribute('style');
                        foundData = foundData.filter(item => item['name'] !== foundData[j]['name']);
                    } else {
                        cardTitles[i].parentElement.parentElement.parentElement.style.display = 'none';
                    }
                }
            }
        }
    }
};

const findData = (data, searchValue) => {
    return data.filter(obj => {
        const cutValue = obj.name.slice(0, searchValue.length);
        return cutValue === searchValue;
    });
};