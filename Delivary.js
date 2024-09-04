document.getElementById('deliveryForm').addEventListener('submit', function(event) {
    event.preventDefault();

    const city = document.getElementById('city').value.trim();
    const zip = document.getElementById('zip').value.trim();
    const message = document.getElementById('message');

    if (city.toLowerCase() === 'kagalle' && zip === '71000') {
        message.textContent = 'Yes, we can deliver your order there.';
        message.style.color = 'green';
    } else {
        message.textContent = 'Sorry, we still cannot deliver your order there.';
        message.style.color = 'red';
    }
});