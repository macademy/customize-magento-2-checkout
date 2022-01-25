define([
    'Magento_Checkout/js/view/summary/cart-items'
], function(
    Component
) {
    'use strict';

    return Component.extend({
        isItemsBlockExpanded: function() {
            return true;
        }
    });
});
