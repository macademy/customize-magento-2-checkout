let config = {
    deps: [
        'Macademy_CustomCheckout/js/mask-telephone-inputs'
    ],
    map: {
        '*': {
            'Magento_Checkout/template/sidebar.html':
                'Macademy_CustomCheckout/template/sidebar.html'
        }
    },
    config: {
        mixins: {
            'Magento_Checkout/js/action/set-shipping-information': {
                'Macademy_CustomCheckout/js/action/set-shipping-information-mixin': true
            }
        }
    }
};
