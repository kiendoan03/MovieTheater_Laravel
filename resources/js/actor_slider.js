$('.slider_actor').slick({
    centerPadding: '2max',
    slidesToShow: 4,
    dots: true,
    responsive: [{
        breakpoint: 768,
        settings: {
            centerPadding: '2vmax',
            slidesToShow: 3
        }
    }, {
        breakpoint: 480,
        settings: {
            centerPadding: '2vmax',
            slidesToShow: 1
        }
    }]
});