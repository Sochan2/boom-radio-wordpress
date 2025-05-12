document.addEventListener("DOMContentLoaded", function () {
    new Swiper(".mySwiper", {
      loop: true,
      spaceBetween: 30,
      slidesPerView: 10, 
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      breakpoints: {
        320: {
          slidesPerView: 1,
        },
        768: {
          slidesPerView: 2,
        },
        1024: {
          slidesPerView: 3,
        },
      },
      autoplay: {
        delay: 5000,
        disableOnInteraction: false,
      },
    });
  });
  