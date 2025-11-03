
var swiper = new Swiper(".js-pm", {
    slidesPerView: 2,
    // slidesPerView: "auto",
    spaceBetween: 20,
    // centeredSlides: true,
    loop: true,
    autoplay: {
      delay: 3500,
      disableOnInteraction: false
    },
    scrollbar: {
      el: ".swiper-scrollbar",
      hide: false,
    },
  
    breakpoints: {
      640: {
        slidesPerView: 3,
        // spaceBetween: 20
      },
      768: {
        slidesPerView: 53
        // spaceBetween: 30
      },
      1024: {
        slidesPerView: 5,
        // spaceBetween: 50
      },
      1366: {
        slidesPerView: 5,
        // spaceBetween: 50
        // slidesPerView: "auto",
      }
    }
  });
  