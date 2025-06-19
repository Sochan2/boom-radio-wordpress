document.addEventListener("DOMContentLoaded", function () {
  // Swiper Setup
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
        540: { slidesPerView: 2 },
        768: { slidesPerView: 2 },
        1024: { slidesPerView: 4 },
      },
    });
  });

  // Header scroll effect with debounce
  const header = document.querySelector("header");
  
  if (header) {
    window.addEventListener("scroll", function () {
      header.classList.toggle("scrolled", window.scrollY > 50);
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
    if (player) player.classList.toggle("visible");
    if (toggleBtn) toggleBtn.classList.toggle("radio-active");
  }

  if (toggleBtn) {
    toggleBtn.addEventListener("click", togglePlayer);
    toggleBtn.classList.add("bouncing");
  }

  if (playButton) {
    playButton.addEventListener("click", togglePlayer);
  }

  // Streaming schedule logic
  const showTitle = document.getElementById("show-title");
  const showHost = document.getElementById("show-host");
  const showDescription = document.getElementById("show-description");

  const now = new Date();
  const day = now.getDay(); // 0 = Sunday
  const hour = now.getHours();

  const schedule = {
    1: [
      {
        start: 7,
        end: 10,
        title: "Boom's Big Breakfast show",
        host: "- With Northy (Chris)",
      },
      {
        start: 16,
        end: 19,
        title: "The Drive Home show",
        host: "- With Jordan & Jev",
      },
      {
        start: 19,
        end: 22,
        title: "Full Metal Jacket show",
        host: "- With Jordan",
      },
    ],
    2: [
      {
        start: 7,
        end: 10,
        title: "Boom's Big Breakfast show",
        host: "- With George",
      },
      {
        start: 16,
        end: 19,
        title: "The Drive Home show",
        host: "- With Rhylan & Angus",
      },
      { start: 19, end: 22, title: "Backyard show", host: "- With Jev" },
    ],
    3: [
      {
        start: 7,
        end: 10,
        title: "Boom's Big Breakfast show",
        host: "- With Asha & April",
      },
      {
        start: 16,
        end: 19,
        title: "The Drive Home show",
        host: "- With Northy (Chris)",
      },
      { start: 19, end: 22, title: "Urban Jungle show", host: "- With George" },
    ],
    4: [
      {
        start: 7,
        end: 10,
        title: "Boom's Big Breakfast show",
        host: "- With George & Angus",
      },
      {
        start: 16,
        end: 19,
        title: "The Drive Home show",
        host: "- With Asha, April & Bryzer",
      },
      {
        start: 19,
        end: 22,
        title: "The Warm Up show",
        host: "- With Jev & Bryzer",
      },
    ],
    5: [
      { start: 7, end: 10, title: "Boom's Big Breakfast show", host: "- Jev" },
      {
        start: 16,
        end: 19,
        title: "The Drive Home show",
        host: "- With Rhylan & George",
      },
      {
        start: 19,
        end: 22,
        title: "The Hype show",
        host: "- With Bryza & April",
      },
    ],
    6: [{ start: 19, end: 22, title: "Jukebox show", host: "- Asha" }],
    0: [
      {
        start: 19,
        end: 22,
        title: "The Crashout show",
        host: "- Rhylan & George",
      },
    ],
  };

  let currentShow = null;
  if (schedule[day]) {
    currentShow = schedule[day].find(
      (slot) => hour >= slot.start && hour < slot.end
    );
  }

  if (currentShow && showTitle && showHost && showDescription) {
    const { title, host } = currentShow;
    let description = "";

    if (title === "Boom's Big Breakfast show") {
      description = "Every Monday to Friday - 7 to 10am";
    } else if (title === "The Drive Home show") {
      description = "Every Monday to Friday - 4 to 7pm";
    } else {
      description = "Every night from 7–10pm";
    }

    showTitle.textContent = title;
    showHost.textContent = host || "";
    showDescription.textContent = description;
  } else if (showTitle && showHost && showDescription) {
    showTitle.textContent = "Music Only";
    showHost.textContent = "";
    showDescription.textContent = "";
  }
});
