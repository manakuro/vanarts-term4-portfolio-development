/*----------------------------
    Modules
----------------------------*/
const $ = global.jQuery = require('jquery');
const _ = require('lodash');
const Vivus = require('vivus');
const Utility = require('./utility');
const ParticleJs = require('particles.js');
require('magnific-popup');
const GoogleMap = require('./google_map');

// variables
const config = {};
let Manato = {
    home: {},
    about: {},
    work: {}
};

$(() => {
    /*---------------------------
        HOME PAGE
    ---------------------------*/
    if ($('#svg-logo').length > 0) {
        const opt = {
            duration: 400, 
            file: 'assets/app/img/svg/160727_logo.svg',
            type: 'oneByOne',
            animTimingFunction: Vivus.EASE
        };

        const afterPreLoading = () => {
            $('.hero').addClass('filled');
            $('body').addClass('preload-finished');
            $('.pre-loader').hide();
            $('.skip-inner').hide();
            $('html').css('overflow', 'auto');

            // load particles
            particlesJS.load('particles-js', 'assets/json/particles.json', function() {
                console.log('callback - particles.js config loaded');
            });
        };

        const vivus = new Vivus('svg-logo', opt, () => {
            $('.hero').addClass('svg-finished');
        });

        // after pre-loading transition
        $('.pre-loader-left').on("transitionend webkitTransitionEnd", () => {
            afterPreLoading();
        });

        // skip pre loading animation
        $('.js-skip').click((e) => {
            vivus.finish();
            $('.hero').addClass('svg-finished');
        });
    }

    // bind scroll animation event
    Utility.scrollAnim();

    /*---------------------------
        ABOUT PAGE
    ---------------------------*/
    const $videoContainer = $('.js-video-container');
    if ($videoContainer.length > 0) {
        $.extend(true, $.magnificPopup.defaults, {
          tClose: 'Close (Esc)', // Alt text on close button
          tLoading: 'Loading...', // Text that is displayed during loading. Can contain %curr% and %total% keys
          gallery: {
            tPrev: 'Previous (Left arrow key)', // Alt text on left arrow
            tNext: 'Next (Right arrow key)', // Alt text on right arrow
            tCounter: '%curr% of %total%' // Markup for "1 of 7" counter
          },
          image: {
            tError: '<a href="%url%">The image</a> could not be loaded.' // Error message when image could not be loaded
          },
          ajax: {
            tError: '<a href="%url%">The content</a> could not be loaded.' // Error message when ajax request failed
          }
        });

        $videoContainer.magnificPopup({
            delegate: '.js-popup-video',
            type: 'iframe',
            mainClass: 'mfp-fade',
            removeDelay: 200,
            preloader: false,
            fixedContentPos: false,
            gallery: {
              enabled:true
            },
        });

    }

    const $skillLists = $('.about-skills-li-inner');
    if ($skillLists.length > 0) {
        $skillLists.each((index, skill) => {
            const $skill  = $(skill);

            $skill.hover(
                // mouse enter
                () => {
                    const bg = $skill.data('bg');
                    const cl = $skill.data('cl');
                    const progress = parseInt($skill.data('pg')) - 1;
                    const pgItemBg = $skill.data('pg-item-bg');

                    // change background colour
                    $skill.css({
                        backgroundColor: bg,
                        color: cl,
                    });
                    // change progress circle
                    $skill.find('.progress-item').each(function(index, pgItem){
                        if (index <= progress) {
                            $(pgItem).css({
                                backgroundColor: pgItemBg,
                            });
                        }
                    });

                },

                // mouse leave
                () => {
                    const bg = $skill.data('origin-bg');
                    const cl = $skill.data('origin-cl');
                    const pgItemBg = $skill.data('origin-pg-item-bg');

                    $skillLists.css({
                        backgroundColor: bg,
                        color: cl,
                    })
                    .find('.progress-item').css({
                        backgroundColor: pgItemBg,
                    });
                }
            );
        });
    }

    /*---------------------------
        CONTACT PAGE
    ---------------------------*/
    if ($('#map').length > 0) {
        GoogleMap.load();
    }

});