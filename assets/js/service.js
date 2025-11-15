

    document.addEventListener('DOMContentLoaded', function () {
        var slider = new Swiper(".service-slider", {
              slidesPerView: 1,
              spaceBetween: 20,
          loop: true,
          lazy: true,
          speed: 1000,
          navigation: {
        nextEl: ".s-button-next",
        prevEl: ".s-button-prev",
      },
          breakpoints: {
            640: {
                slidesPerView: 1,

            },
            768: {
                slidesPerView: 2,

            },
            1024: {
                slidesPerView: 4,

            },
        },
          });
        });