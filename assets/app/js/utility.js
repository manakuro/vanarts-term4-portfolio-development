const $ = global.jQuery = require('jquery');
const _ = require('lodash');

module.exports = {

    /**
     * scrollAnim
     * 
     * @return {[void]} []
     */
    scrollAnim: (options) => {
        options = options || {};

        const lists = options.lists || '.scroll-list';

        $(window).scroll(() => {
            const windowHeight = $(window).height();
            const scrollTop = $(window).scrollTop();

            $(lists).each((index, list) => {
                const targetPos = $(list).offset().top;
                const animation = $(list).data('animation');
                const animationDelay = $(list).data('animation_delay');

                if (scrollTop > targetPos - windowHeight + 100) {
                    $(list).addClass(animation)
                        .css({
                            'visibility': 'visible',
                            'animation-delay': animationDelay
                        });
                }
            });

        });

    }
    
};