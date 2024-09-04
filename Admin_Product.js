
//Add product Popup


document.addEventListener('DOMContentLoaded', (event) => {
    var openPopupBtn = document.getElementById('openPopupBtn');
    var popup = document.getElementById('popup');
    var closePopupBtn = document.getElementById('closePopupBtn');

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

// document.addEventListener('DOMContentLoaded', (event) => {
//     var openPopupBtn = document.getElementById('show-updateFrom');
//     var popup = document.getElementById('popup');
//     var closePopupBtn = document.getElementById('closePopupBtn');

//     openPopupBtn.addEventListener('click', () => {
//         popup.style.display = 'block';
//     });

//     closePopupBtn.addEventListener('click', () => {
//         popup.style.display = 'none';
//     });

//     window.addEventListener('click', (event) => {
//         if (event.target === popup) {
//             popup.style.display = 'none';
//         }
//     });
// });

// update product details

let closeBtn = document.querySelector('#close_form');

closeBtn.addEventListener('click',() => {
    document.querySelector('.update_container').style.display='none';
})
