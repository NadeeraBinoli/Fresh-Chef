// popup Js code
document.addEventListener('DOMContentLoaded', function() {
    var openPopupBtn = document.getElementById('openPopup');
    var closePopupBtn = document.getElementById('closePopup');
    var popup = document.getElementById('popup');

    openPopupBtn.addEventListener('click', function() {
        popup.style.display = 'flex';
    });

    closePopupBtn.addEventListener('click', function() {
        popup.style.display = 'none';
    });

    window.addEventListener('click', function(event) {
        if (event.target === popup) {
            popup.style.display = 'none';
        }
    });
});









