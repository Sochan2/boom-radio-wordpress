
// Your custom JavaScript here
console.log("Theme loaded");

const swiper = new Swiper('.mySwiper', {
  //slidesPerView: 'auto',
  slidesPerView: 4,
  slidesPerGroup: 1, 
  loop: true,
  centeredSlides: true, 
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
  spaceBetween: 40,

  breakpoints: {
    320: {
      slidesPerView: 2,
    },
    768: {
      slidesPerView: 3,
    },
    1024: {
      slidesPerView: 4,
    },
  },
});


