import categories from './tabs/categories.js';
import products from './tabs/products.js';
import users from './tabs/users.js';
import tab from './tab.js';

$(function () {
    categories.init();
    products.init();
    users.init();
    tab.init();
});