/*----------------------------
    Modules
----------------------------*/
const $ = global.jQuery = require('jquery');
const _ = require('lodash');
const Vivus = require('vivus');

// variables
const config = {};

$(() => {
    const opt = {
        duration: 400, 
        file: 'assets/app/img/svg/160727_logo.svg',
        type: 'oneByOne',
        animTimingFunction: Vivus.EASE
    };

    new Vivus('svg-logo', opt, () => {
        $('.hero').addClass('svg-finished');
    });

    // after pre-loading transition
    $('.pre-loader-left').on("transitionend webkitTransitionEnd", () => {
        $('.hero').addClass('filled');
        $('.pre-loader').hide();
    });


});