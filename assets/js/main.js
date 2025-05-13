
// Your custom JavaScript here
console.log("Theme loaded");

const swiper = new Swiper('.mySwiper', {
  slidesPerView: 'auto',
  slidesPerView: 4,
  slidesPerGroup: 1, // ← ここが「1つずつずらす」ポイント
  loop: true,
  centeredSlides: true, 
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
  spaceBetween: 40,
});


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
