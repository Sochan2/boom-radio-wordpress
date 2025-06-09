document.addEventListener('DOMContentLoaded', function () {
  const myNewSwiper = document.querySelector(".mySwiper");

  if(myNewSwiper){
    new Swiper('myNewSwiper',{
      loop: true,
      spaceBetween: 20,
      slidesPerView: 3,
      navigation: {
        nextEl: '.latestEpisodesSwiper .swiper-button-next',
        prevEl: '.latestEpisodesSwiper .swiper-button-prev',
      },
      breakpoints: {
        640: {
          slidesPerView: 1,
        },
        768: {
          slidesPerView: 2,
        },
        1024: {
          slidesPerView: 3,
        }
      }
    })
  }




  new Swiper('', {
    slidesPerView: 1,
    spaceBetween: 30,
    loop: true,
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    breakpoints: {
      768: {
        slidesPerView: 2, // Show 2 on tablets
      },
      1024: {
        slidesPerView: 3, // Show 3 on desktop
      },
    }
  });
});

const latestEpisodeSwipers = document.querySelector('.latestEpisodesSwiper');
if(latestEpisodeSwipers){
  new Swiper(latestEpisodeSwipers,{
    loop: true,
    spaceBetween: 20,
    slidesPerView: 3,
    navigation: {
      nextEl: '.latestEpisodesSwiper .swiper-button-next',
      prevEl: '.latestEpisodesSwiper .swiper-button-prev',
    },
    breakpoints: {
      640: {
        slidesPerView: 1,
      },
      768: {
        slidesPerView: 2,
      },
      1024: {
        slidesPerView: 3,
      }
    }
  })
}

const headerScroll = document.querySelector('header');
if(header){
  window.addEventListener("scroll", function() {
    if (window.scrollY > 50) {
        header.classList.add("scrolled");
    } else {
        header.classList.remove("scrolled");
    }
});
}

const searchBtn = document.getElementById("searchBtn");
const searchContainer = document.querySelector(".search-container");

if(searchBtn && searchContainer){
  searchBtn.addEventListener("click", function(e) {
    e.preventDefault();
    searchContainer.classList.toggle("active");

    const input = document.getElementById("searchInput");
    if (searchContainer.classList.contains("active") && input) {
      input.focus();
    }
  });
}

const player = document.getElementById("live-radio-player");
const toggleBtn = document.getElementById("radio-toggle");
const playButton = document.querySelector(".play-button");

  document.addEventListener("DOMContentLoaded", function() {
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
    }

    if (playButton) {
      playButton.addEventListener("click", togglePlayer);
    }
  });