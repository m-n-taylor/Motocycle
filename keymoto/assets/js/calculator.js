jQuery.noConflict()(function($) {

    "use strict";

    function autoCalcInit(){
        autoCalcHideMsg();
        autoCalcHideTotal();
        $('a.autlines_calculate_btn').on('click',function(){

            var pix_thousand = document.getElementById('pix-thousand').value;
            var pix_decimal = document.getElementById('pix-decimal').value;
            var pix_decimal_number = document.getElementById('pix-decimal_number').value;
            $('.vehicle_price, .down_payment').number( true, pix_decimal_number, pix_decimal, pix_thousand);

            autoCalcExecute();
            autoCalcShowTotal();
        });
    }

    function autoCalcExecute(){

        var _currency= $('.orange.currency').html();
        _currency =  _currency.replace(/[()]/g, '');

        var pix_thousand = document.getElementById('pix-thousand').value;
        var pix_decimal = document.getElementById('pix-decimal').value;
        var pix_decimal_number = document.getElementById('pix-decimal_number').value;




        var _price = parseFloat($('.vehicle_price').val());
        var _rate = parseFloat($('.interest_rate').val());
        var _period = parseFloat($('.period_month').val());
        var _payment = parseFloat($('.down_payment').val());




        _rate = _rate/1200;

        var _base_rate = _rate;

        if(_rate == 0) {
            _base_rate = 1;
        }
        _permonthpaywithrate = (_price - _payment) * _base_rate * Math.pow(1 + _rate, _period);
        var _permonthpay = ((Math.pow(1 + _rate, _period)) - 1);
        if(_permonthpay == 0) {
            _permonthpay = 1;
        }

        _permonthpaywithrate = _permonthpaywithrate/_permonthpay;
        _permonthpaywithrate = _permonthpaywithrate.toFixed(0);

        _total_pay = _payment + (_permonthpaywithrate*_period);
        _total_pay = _total_pay.toFixed(0);



        _total_interest_pay = _total_pay - _price;
        _total_interest_pay = _total_interest_pay.toFixed(0);
        _total_interest_pay = _total_interest_pay.toLocaleString();

        //   $('.monthly_payment').html(_currency + _permonthpaywithrate);
        //   $('.total_interest_payment ').html(_currency + _total_interest_pay);
        //   $('.total_amount_to_pay').html(_currency+_total_pay);

        $('.total_amount_to_pay span.currency, .total_interest_payment span.currency, .monthly_payment span.currency').html(_currency);

        $('.monthly_payment span.val').html(_permonthpaywithrate);
        $('.total_amount_to_pay span.val').html(_total_pay);
        $('.total_interest_payment span.val').html(_total_interest_pay);

        $('.total_amount_to_pay span.val, .total_interest_payment span.val, .monthly_payment span.val').number( true, pix_decimal_number, pix_decimal, pix_thousand);

    }

    function autoCalcHideMsg(){
        $('.calculator-alert').hide();
    }

    function autoCalcShowMsg(){
        $('.calculator-alert').show();
    }

    function autoCalcHideTotal(){
        $('.autlines_calculator_results').hide();
    }

    function autoCalcShowTotal(){
        $('.autlines_calculator_results').slideDown('slow');
    }

    autoCalcInit();
});



// update: 2025-07-24T09:07:26.917626
