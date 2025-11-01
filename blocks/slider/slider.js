document.addEventListener('DOMContentLoaded', function () {
  var slider = new Swiper(".hero-slider", {
        // slidesPerView: 1,
    // effect: "fade",
    loop: true,
    lazy: true,
    speed: 1000,
    // parallax: true,
    autoplay: {
      delay: 4000
    },
    grabCursor: true,
    effect: "fade",
    pagination: {
      el: ".swiper-pagination--home",
      clickable: true,
      renderBullet: function (index, className) {
        return '<span class="' + className + '"><div class="swiper-pagination-bullet-number">0' + (index + 1) + "</div></span>";
      },
    }
    });
  });