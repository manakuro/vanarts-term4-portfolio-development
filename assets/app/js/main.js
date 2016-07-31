/*----------------------------
    Modules
----------------------------*/
const $ = global.jQuery = require('jquery');
const _ = require('lodash');
const Vivus = require('vivus');

const ParticleJs = require('particles.js');

// variables
const config = {};

$(() => {
    // $('.hero').addClass('svg-finished');
    // $('.hero').addClass('filled');
    // return;

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

        // load particles
        particlesJS.load('particles-js', 'assets/json/particles.json', function() {
            console.log('callback - particles.js config loaded');
        });

    });


});