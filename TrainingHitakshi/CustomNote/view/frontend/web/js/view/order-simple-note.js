    define(
    [
        'jquery',
        'ko',
        'uiComponent',
        'TrainingHitakshi_CustomNote/js/action/save-order-simple-note',
        'Magento_Checkout/js/model/quote'
    ],
    function ($, ko, Component, saveOrderSimpleNote, quote) {
        'use strict';

        return Component.extend({
            defaults: {
                template: 'TrainingHitakshi_CustomNote/order_simple_note',
                simpleNote: ''
            },

            initObservable: function () {
                return this._super().observe(['simpleNote'])
            },

            saveSimpleNote: function () {
                var simpleNote = this.simpleNote();
                saveOrderSimpleNote.save(simpleNote);
            }
        });
    }
);