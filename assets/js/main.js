/*=============== SWIPER JS ===============*/
let swiperCards = new Swiper(".trustify-slider", {
  loop: true,
  spaceBetween: 40,
  centeredSlides: true,
  grabCursor: true,
  autoHeight: true,
  observer: true,
  speed: 1000,
  slidesPerView: 'auto',
  loop: true,
  loopedSlides: 1,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
    dynamicBullets: true,
  },

  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },

  breakpoints:{
    600: {
      slidesPerView: 2,
    },
    968: {
      slidesPerView: 3,
    },
  },
});