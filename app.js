document.addEventListener('DOMContentLoaded', () => {
    fetch('/api/products')
        .then(response => response.json())
        .then(products => {
            const productSelect = document.getElementById('product');
            products.forEach(product => {
                const option = document.createElement('option');
                option.value = product.id;
                option.textContent = product.name;
                productSelect.appendChild(option);
            });
        });

    const form = document.getElementById('create-order');
    form.addEventListener('submit', (event) => {
        event.preventDefault();

        const product = form.product.value;
        const quantity = form.quantity.value;

        fetch('/api/orders', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ product, quantity })
        })
        .then(response => response.json())
        .then(order => {
            alert('Order created successfully!');
            form.reset();
        });
    });
});