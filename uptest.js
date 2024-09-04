// update product details

// let closeBtn = document.querySelector('#close_form');

// closeBtn.addEventListener('click',() => {
//     document.querySelector('.update_container').style.display='none';
// })

//Add product Popup


document.addEventListener('DOMContentLoaded', (event) => {
    const openPopupBtn = document.getElementById('openPopupBtn');
    const popup = document.getElementById('popup');
    const closePopupBtn = document.getElementById('closePopupBtn');

    openPopupBtn.addEventListener('click', () => {
        popup.style.display = 'block';
    });

    closePopupBtn.addEventListener('click', () => {
        popup.style.display = 'none';
    });

    window.addEventListener('click', (event) => {
        if (event.target === popup) {
            popup.style.display = 'none';
        }
    });
});

// update popup

document.addEventListener('DOMContentLoaded', (event) => {
    const openPopupBtn = document.getElementById('show-updateFrom');
    const popup = document.getElementById('popup');
    const closePopupBtn = document.getElementById('closePopupBtn');

    openPopupBtn.addEventListener('click', () => {
        popup.style.display = 'block';
    });

    closePopupBtn.addEventListener('click', () => {
        popup.style.display = 'none';
    });

    window.addEventListener('click', (event) => {
        if (event.target === popup) {
            popup.style.display = 'none';
        }
    });
});