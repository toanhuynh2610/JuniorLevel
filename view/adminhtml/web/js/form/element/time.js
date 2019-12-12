define([
    'Magento_Ui/js/form/element/date',
    'jquery'
], function(Date, $) {
    'use strict';
    return Date.extend({
        defaults: {
            //Add options for datepicker
            options: {
                showsTime: false,
                beforeShowDay: function(date){
                    //foreach date, if date.getdate inArray
                        var availabelDates = [8,9,10,11];
                        if($.inArray(date.getDate(), availabelDates) == -1){
                            return[0];
                        } else {
                            return [1];
                        }
                }
            },
        },
        //initialize function is required (if not use it, u will receive constr error mesg)
        initialize: function () {
            this._super();
            return this;
        },

    });
});