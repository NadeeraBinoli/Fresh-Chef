

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

// update product details


    document.addEventListener('DOMContentLoaded', (event) => {
        // Get the popup elements
        var updatePopup = document.getElementById('updateProductPopup');
        var closeUpdatePopupBtn = document.getElementById('closeUpdatePopupBtn');

        // Function to open the popup and populate the form
        function openUpdatePopup(id, name, price, type, img) {
            document.getElementById('update_id').value = id;
            document.getElementById('update_name').value = name;
            document.getElementById('update_price').value = price;
            document.getElementById('update_type').value = type;
            // You can add a preview of the image if you want here
            updatePopup.style.display = 'block';
        }

        // Function to close the popup
        function closeUpdatePopup() {
            updatePopup.style.display = 'none';
        }

        // Close popup when close button is clicked
        closeUpdatePopupBtn.onclick = function() {
            closeUpdatePopup();
        }

        // Close popup when clicking outside of the popup
        window.onclick = function(event) {
            if (event.target == updatePopup) {
                closeUpdatePopup();
            }
        }

        // Attach the event listener to the edit buttons
        var editButtons = document.querySelectorAll('a[href^="product.php?edit="]');
        editButtons.forEach(function(button) {
            button.addEventListener('click', function(event) {
                event.preventDefault();
                var id = this.href.split('=')[1];
                // Fetch product details using AJAX or any other method to populate the form
                fetch(`fetch_product.php?id=${id}`)
                    .then(response => response.json())
                    .then(data => {
                        openUpdatePopup(data.menu_rec_id, data.menu_name, data.menu_price, data.menu_type, data.menu_img);
                    });
            });
        });
    });

