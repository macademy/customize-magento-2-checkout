define([
    'uiComponent',
    'ko',
    'Magento_Checkout/js/model/step-navigator',
    'mage/translate',
    'underscore',
    'Magento_Checkout/js/model/quote',
    'Magento_Customer/js/model/customer',
    'jquery',
    'Magento_Checkout/js/model/customer-email-validator'
], function(
    Component,
    ko,
    stepNavigator,
    $t,
    _,
    quote,
    customer,
    $,
    customerEmailValidator
) {
    'use strict';

    return Component.extend({
        defaults: {
            template: 'Macademy_CustomCheckout/email',
            isVisible: ko.observable(false),
        },
        quoteIsVirtual: quote.isVirtual(),
        initialize: function() {
            this._super();

            stepNavigator.registerStep(
                'email',
                null,
                $t('Email'),
                this.isVisible,
                _.bind(this.navigate, this),
                this.sortOrder
            );

            return this;
        },
        navigate: function() {
            this.isVisible(true);
        },
        navigateToNextStep: function() {
            if (customerEmailValidator.validate()) {
                stepNavigator.next();
            }
        }
    });
});
