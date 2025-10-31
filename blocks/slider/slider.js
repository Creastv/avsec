document.addEventListener('DOMContentLoaded', function () {
  var slider = new Swiper(".hero-slider", {
        // slidesPerView: 1,
    // effect: "fade",
    loop: true,
    lazy: true,
    speed: 1000,
    // // parallax: true,
    // autoplay: {
    //   delay: 4000
    // },
    grabCursor: true,
    effect: "creative",
    creativeEffect: {
      prev: {
        shadow: true,
        translate: [0, 0, -400]
      },
      next: {
        translate: ["100%", 0, 0]
      }
    },
    pagination: {
      el: ".swiper-pagination--home",
      clickable: true
    }
    });
  });