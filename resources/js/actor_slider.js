$('.slider_actor').slick({
    centerPadding: '2max',
    slidesToShow: 4,
    autoplay: true,
    speed: 1000,
    responsive: [{
        breakpoint: 800,
        settings: {
            centerPadding: '2vmax',
            autoplay: true,
            speed: 1000,
            slidesToShow: 3
        }
    }, {
        breakpoint: 620,
        settings: {
            centerPadding: '2vmax',
            autoplay: true,
            speed: 1000,
            slidesToShow: 2
        }
    }, {
        breakpoint: 430,
        settings: {
            centerPadding: '2vmax',
            autoplay: true,
            speed: 1000,
            slidesToShow: 1
        }
    }]
});