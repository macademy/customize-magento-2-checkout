define([
    'uiComponent',
    'ko',
    'Magento_Checkout/js/model/step-navigator',
    'mage/translate',
    'underscore'
], function(
    Component,
    ko,
    stepNavigator,
    $t,
    _
) {
    'use strict';

    return Component.extend({
        defaults: {
            template: 'Macademy_CustomCheckout/email',
            isVisible: ko.observable(false),
        },
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
            stepNavigator.next();
        }
    });
});
