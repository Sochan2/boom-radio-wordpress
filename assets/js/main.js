document.addEventListener("DOMContentLoaded", function () {
  // Swiper for .mySwiper

  document.querySelectorAll(".swiper").forEach((swiperContainer) => {
    const nextBtn = swiperContainer.querySelector(".swiper-button-next");
    const prevBtn = swiperContainer.querySelector(".swiper-button-prev");
    const spaceBetween = parseInt(swiperContainer.dataset.space) || 10;

    new Swiper(swiperContainer, {
      loop: true,
      spaceBetween: spaceBetween,
      slidesPerView: 1,
      navigation: {
        nextEl: nextBtn,
        prevEl: prevBtn,
      },
      breakpoints: {
        540: {
          slidesPerView: 2,
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

  // Header scroll effect
  const header = document.querySelector("header");
  if (header) {
    window.addEventListener("scroll", function () {
      if (window.scrollY > 50) {
        header.classList.add("scrolled");
      } else {
        header.classList.remove("scrolled");
      }
    });
  }

  // Search input toggle
  const searchBtn = document.getElementById("searchBtn");
  const searchContainer = document.querySelector(".search-container");
  if (searchBtn && searchContainer) {
    searchBtn.addEventListener("click", function (e) {
      e.preventDefault();
      searchContainer.classList.toggle("active");

      const input = document.getElementById("searchInput");
      if (searchContainer.classList.contains("active") && input) {
        input.focus();
      }
    });
  }

  // Live radio player toggle
  const player = document.getElementById("live-radio-player");
  const toggleBtn = document.getElementById("radio-toggle");
  const playButton = document.querySelector(".play-button");

  function togglePlayer() {
    if (player) {
      player.classList.toggle("visible");
    }
    if (toggleBtn) {
      toggleBtn.classList.toggle("radio-active");
    }
  }

  if (toggleBtn) {
    toggleBtn.addEventListener("click", togglePlayer);
    toggleBtn.classList.add("bouncing");
  }

  if (playButton) {
    playButton.addEventListener("click", togglePlayer);
  }
});
