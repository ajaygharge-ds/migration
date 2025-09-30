jQuery(document).ready(function ($) {
  // LENIS
    const lenisScroll = new Lenis({
    duration: 1.2,
    easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
    direction: "vertical",
    gestureDirection: "vertical",
    smooth: true,
    mouseMultiplier: 1,
    smoothTouch: false,
    touchMultiplier: 2,
    infinite: false,
  });

  let last = 0;
  function raf(time) {
    lenisScroll.raf(time);
    if (time - last > 100) {
      AOS.refreshHard();
      last = time;
    }
    requestAnimationFrame(raf);
  }
  requestAnimationFrame(raf);

  // SWIPER (mySwiper)
  new Swiper(".swiper", {
    slidesPerView: 1,
    spaceBetween: 40,
    loop: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    breakpoints: {
      480: {
        slidesPerView: 1.5,
      },
      769: {
        slidesPerView: "auto",
        spaceBetween: 48,
      },
      890: {
        slidesPerView: 2.5,
        spaceBetween: 60,
      },
      1025: {
        slidesPerView: 3,
        spaceBetween: 48,
      },
    },
  });

  // STICKY HEADER
  function handleStickyHeader() {
    const $header = $(".bs-header");
    const $banner = $(".bs-banner");
    let scrollPos = $(window).scrollTop();

    const bannerHeight = $banner.length ? $banner.outerHeight() : 0;

    if (scrollPos > bannerHeight || scrollPos > 20) {
      $header.css("transform", "translateY(-100%)");
    } else {
      $header.css("transform", "translateY(0%)");
    }

    $(window).on("scroll", function () {
      const scrolled = $(this).scrollTop();

      $header.toggleClass("bg-sticky", scrolled > 20);

      $header.css("transform", scrolled >= scrollPos && scrollPos > 15 ? "translateY(-100%)" : "translateY(0%)");

      scrollPos = scrolled;
    });
  }

  //calendry
  function bookDemoModal() {
    $("#bookDemo").on("click", function (e) {
      e.preventDefault();
      $("#calendlyModal").fadeIn();
      $("body").addClass("no-scroll");
      $("iframe").css("display", "block");
      $(".close-icon").css("display", "block");
      lenisScroll.stop();
    });

    $(".close-icon").on("click", function () {
      $("#calendlyModal").fadeOut();
      $("body").removeClass("no-scroll");
      $("iframe").css("display", "none");
      $(".close-icon").css("display", "none");
      lenisScroll.start();
    });

    $(document).on("click", function (e) {
      if ($(e.target).is("#calendlyModal")) {
        $("#calendlyModal").fadeOut();
        $("iframe").css("display", "none");
        $(".close-icon").css("display", "none");
        $("body").removeClass("no-scroll");
        lenisScroll.start();
      }
    });
  }

  // card-flip

  // function flipCard() {
  // if (window.innerWidth < 769) {
  //   $(".btn-product").each(function () {
  //     $(this).on("click", function (e) {
  //       e.preventDefault();
  //       $(this).closest(".mod-img-desc").find(".mod-img-desc-inner").addClass("btn-product-flip");
  //     });
  //   });
  // }
  // }
  // //flipback
  // function flipBackCard() {
  // if (window.innerWidth < 769) {
  //   $(".btn-close-product").each(function () {
  //     $(this).on("click", function (e) {
  //       e.preventDefault();
  //       $(this).closest(".mod-img-desc").find(".mod-img-desc-inner").removeClass("btn-product-flip");
  //     });
  //   });
  // }
  // }

  //video-modal
  function videoModal() {
    if (window.innerWidth < 769) {
      $(".video-play").on("click", function (e) {
        e.preventDefault();
        $("#videoModal").fadeIn();
        $(".modal-content iframe").css("display", "block");
        $(".close-model").css("display", "block");
        $("body").addClass("no-scroll");
        lenisScroll.stop();
      });

      $(".close-icon").on("click", function () {
        $("#videoModal").fadeOut();
        $(".modal-content iframe").css("display", "none");
        $(".close-icon").css("display", "none");
        $("body").removeClass("no-scroll");
      lenisScroll.start();
      });

      $(document).on("click", function (e) {
        if ($(e.target).is("#videoModal")) {
          $("#videoModal").fadeOut();
          $(".modal-content iframe").css("display", "none");
          $("close-icon").css("display", "none");
          $("body").removeClass("no-scroll");
          lenisScroll.start();
        }
      });
    }
  }

  //
  function animateCountUp(el) {
    const target = +el.getAttribute("data-count");
    let current = target < 10 ? 0.1 : 0;
    const increment = target / 100;
    const duration = 3000;
    const stepTime = duration / 100;

    const counter = setInterval(() => {
      current += increment;
      if (current >= target) {
        el.textContent = target;
        clearInterval(counter);
      } else {
        if (target < 10) {
          el.textContent = Number.isInteger(Math.round(current * 10) / 10) ? Math.round(current) : (Math.round(current * 10) / 10).toFixed(1);
        } else {
          el.textContent = Math.floor(current);
        }
      }
    }, stepTime);
  }

  const observer = new IntersectionObserver(
    (entries, obs) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          animateCountUp(entry.target);
          obs.unobserve(entry.target);
        }
      });
    },
    {
      threshold: 0.6,
    }
  );

  document.querySelectorAll(".count-up").forEach((el) => {
    observer.observe(el);
  });

  // MOBILE NAV
  $(".humburger").on("click", function () {
    $(this).toggleClass("active");
    $("nav").toggleClass("nav-active");

    if ($("nav").hasClass("nav-active")) {
      $("body").css("overflow", "hidden");
      lenisScroll.stop();
    } else {
      $("body").css("overflow", "");
      lenisScroll.start();
    }
  });

  ///video
  if (window.innerWidth > 768) {
    $(".video-play").on("click", function () {
      $(".frame-wrap iframe").css("display", "block");
      $(".close-icon").css("display", "block");
      $(".close-icon").fadeIn();
      // lenisScroll.stop();
    });

    $(".close-icon").on("click", function () {
      $(".frame-wrap iframe").css("display", "none");
      $(".close-icon").css("display", "none");
      $(".close-icon").fadeOut();
      // lenisScroll.start();
    });
  }

  // INIT
  function init() {
    handleStickyHeader();
    bookDemoModal();
    videoModal();
    // flipCard();
    // flipBackCard();
  }
  init();

  // AOS INIT
  AOS.init({
    once: true,
  });
});