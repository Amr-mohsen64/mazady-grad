$(function () {
    // slick slider fro items and categories

    $('.items').slick({
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 2,
        nextArrow: $('.nextSliderOne'),
        prevArrow: $('.prevSliderOne'),
        // responsive slider 
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 500,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });
});