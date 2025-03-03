const express = require('express');
const router = express.Router();

let products = [
    { id: 1, name: 'Apples' },
    { id: 2, name: 'Oranges' },
    { id: 3, name: 'Bananas' }
];

let orders = [];

router.get('/products', (req, res) => {
    res.json(products);
});

router.post('/orders', (req, res) => {
    const { product, quantity } = req.body;
    const order = { id: orders.length + 1, product, quantity };
    orders.push(order);
    res.status(201).json(order);
});

module.exports = router;