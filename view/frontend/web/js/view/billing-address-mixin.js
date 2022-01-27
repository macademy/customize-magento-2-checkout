define([], function() {
    'use strict';

    return function(subject) {
        return subject.extend({
            defaults: {
                detailsTemplate: 'Macademy_CustomCheckout/billing-address/details'
            }
        });
    };
});
