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


