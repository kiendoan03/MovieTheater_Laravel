$('.slider').slick({
    centerMode: true,
    centerPadding: '100px',
    slidesToShow: 3,
    dots: true,
    autoplay: true,
    arrows: false,
    responsive: [{
        breakpoint: 768,
        settings: {
            arrows: false,
            centerMode: true,
            centerPadding: '40px',
            slidesToShow: 3
        }
    }, {
        breakpoint: 480,
        settings: {
            arrows: false,
            centerMode: true,
            centerPadding: '40px',
            slidesToShow: 1
        }
    }]
});