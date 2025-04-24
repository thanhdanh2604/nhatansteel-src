const serviceBoxes = document.querySelectorAll(".service-box");

serviceBoxes.forEach((box) => {
  box.addEventListener("click", () => {
    serviceBoxes.forEach((b) => {
      b.classList.remove("active");
      b.querySelector(".description")?.classList.remove("d-block");
    });
    box.classList.add("active");
  });
});

document.addEventListener("DOMContentLoaded", function () {
  const navbar = document.querySelector(".navbar");
  if (!navbar) return;

  let lastScrollTop = 0;

  window.addEventListener("scroll", function () {
    const currentScroll =
      window.pageYOffset || document.documentElement.scrollTop;

    if (currentScroll > lastScrollTop && currentScroll > 100) {
      // Scroll xuống
      navbar.classList.add("navbar-hide");
    } else {
      // Scroll lên
      navbar.classList.remove("navbar-hide");
    }

    lastScrollTop = currentScroll <= 0 ? 0 : currentScroll;
  });
});

document.addEventListener("DOMContentLoaded", function () {
  const searchBtn = document.querySelector(".nav-link-search");
  const searchOverlay = document.querySelector(".navbar-search-overlay");
  const closeBtn = document.querySelector(".btn-close-search");

  if (searchBtn && searchOverlay && closeBtn) {
    searchBtn.addEventListener("click", (e) => {
      e.preventDefault();
      searchOverlay.classList.add("active");
      searchOverlay.querySelector("input").focus();
    });

    closeBtn.addEventListener("click", () => {
      searchOverlay.classList.remove("active");
    });

    // Optional: bấm ESC để đóng
    document.addEventListener("keydown", (e) => {
      if (e.key === "Escape") {
        searchOverlay.classList.remove("active");
      }
    });
  }
});

document.addEventListener("DOMContentLoaded", function () {
  const dropdowns = document.querySelectorAll(".navbar .dropdown");

  if (window.innerWidth >= 992) {
    dropdowns.forEach((dropdown) => {
      dropdown.addEventListener("mouseenter", function () {
        const menu = this.querySelector(".dropdown-menu");
        menu.classList.add("show");
      });

      dropdown.addEventListener("mouseleave", function () {
        const menu = this.querySelector(".dropdown-menu");
        menu.classList.remove("show");
      });
    });
  }
});

document.addEventListener("DOMContentLoaded", function () {
  document.querySelectorAll(".ripple-btn").forEach((btn) => {
    btn.addEventListener("click", function (e) {
      const ripple = document.createElement("span");
      ripple.classList.add("ripple");
      const rect = this.getBoundingClientRect();
      ripple.style.left = `${e.clientX - rect.left}px`;
      ripple.style.top = `${e.clientY - rect.top}px`;

      this.appendChild(ripple);

      setTimeout(() => {
        ripple.remove();
      }, 600);
    });
  });
});

document.addEventListener("DOMContentLoaded", function () {
  const navbar = document.getElementById("mainNav");

  if (navbar) {
    navbar.addEventListener("show.bs.collapse", () => {
      navbar.classList.add("collapsing");
    });

    navbar.addEventListener("shown.bs.collapse", () => {
      navbar.classList.remove("collapsing");
      navbar.classList.add("show");

      const navItems = navbar.querySelectorAll(".nav-item");
      navItems.forEach((item, index) => {
        item.style.transitionDelay = `${index * 0.05}s`;
        item.classList.add("animated-in");
      });
    });

    navbar.addEventListener("hide.bs.collapse", () => {
      navbar.classList.remove("show");

      const navItems = navbar.querySelectorAll(".nav-item");
      navItems.forEach((item) => {
        item.style.transitionDelay = "";
        item.classList.remove("animated-in");
      });
    });
  }

  // Dropdown animation for mobile
  const dropdownToggles = document.querySelectorAll(
    ".nav-item.dropdown .nav-link.dropdown-toggle"
  );

  dropdownToggles.forEach((toggle) => {
    toggle.addEventListener("click", function (e) {
      const dropdownMenu = this.nextElementSibling;

      if (
        window.innerWidth < 992 &&
        dropdownMenu &&
        dropdownMenu.classList.contains("dropdown-menu")
      ) {
        e.preventDefault();

        if (dropdownMenu.classList.contains("show")) {
          dropdownMenu.classList.remove("dropdown-anim", "show");
        } else {
          document.querySelectorAll(".dropdown-menu.show").forEach((menu) => {
            menu.classList.remove("dropdown-anim", "show");
          });

          dropdownMenu.classList.add("show");
          setTimeout(() => {
            dropdownMenu.classList.add("dropdown-anim");
          }, 10);
        }
      }
    });
  });
});

document.addEventListener("DOMContentLoaded", () => {
  const sidebarLinks = document.querySelectorAll(".about-sidebar a");
  const sections = document.querySelectorAll(".section-block");
  const headerOffset = 80;

  function isDesktop() {
    return window.innerWidth >= 992;
  }

  function scrollWithOffset(el, offset = 80) {
    const y = el.getBoundingClientRect().top + window.scrollY - offset;
    window.scrollTo({ top: y, behavior: "smooth" });
  }

  // Click menu
  sidebarLinks.forEach((link) => {
    link.addEventListener("click", (e) => {
      e.preventDefault();
      const target = document.querySelector(link.getAttribute("href"));
      if (target) {
        scrollWithOffset(target, headerOffset); // luôn scroll tới nội dung, kể cả trên mobile
      }

      sidebarLinks.forEach((l) => l.classList.remove("active"));
      link.classList.add("active");
    });
  });

  // Scroll highlight
  window.addEventListener("scroll", () => {
    const fromTop = window.scrollY + headerOffset + 1;

    sections.forEach((section) => {
      const id = section.getAttribute("id");
      const link = document.querySelector(`.about-sidebar a[href="#${id}"]`);

      if (
        section.offsetTop <= fromTop &&
        section.offsetTop + section.offsetHeight > fromTop
      ) {
        sidebarLinks.forEach((l) => l.classList.remove("active"));
        if (link) {
          link.classList.add("active");

          if (isDesktop()) {
            link.scrollIntoView({
              behavior: "smooth",
              block: "nearest",
            });
          }
        }
      }
    });
  });
});

document.addEventListener("DOMContentLoaded", () => {
  // COMMON fade + highlight logic for tabs
  function createTabSystem({ tabSelector, contentSelector, highlightId }) {
    const tabs = document.querySelectorAll(tabSelector);
    const contents = document.querySelectorAll(contentSelector);
    const highlightBar = document.getElementById(highlightId);

    function updateHighlight(tab) {
      if (!highlightBar || !tab) return;
      const tabRect = tab.getBoundingClientRect();
      const parentRect =
        tab.parentElement.parentElement.getBoundingClientRect();
      const offsetLeft =
        tabRect.left - parentRect.left + tab.offsetWidth / 2 - 40;
      highlightBar.style.left = `${offsetLeft}px`;
    }

    const initialTab = document.querySelector(`${tabSelector}.active`);
    if (initialTab) updateHighlight(initialTab);

    tabs.forEach((tab) => {
      tab.addEventListener("click", () => {
        const target = tab.dataset.tab;

        tabs.forEach((t) => t.classList.remove("active"));
        tab.classList.add("active");

        contents.forEach((c) => {
          c.classList.remove("active");
          c.classList.add("d-none");
        });

        const targetContent = document.getElementById(target);
        if (targetContent) {
          targetContent.classList.remove("d-none");
          setTimeout(() => targetContent.classList.add("active"), 10);
        }

        updateHighlight(tab);
      });
    });

    window.addEventListener("resize", () => {
      const currentTab = document.querySelector(`${tabSelector}.active`);
      if (currentTab) updateHighlight(currentTab);
    });
  }

  // Init for Vision
  createTabSystem({
    tabSelector: ".vision-tab",
    contentSelector: ".vision-content",
    highlightId: "highlightBar",
  });

  // Init for Mission
  createTabSystem({
    tabSelector: ".mission-tab",
    contentSelector: ".mission-content",
    highlightId: "highlightBarMission",
  });

  // Init for Core Values
  createTabSystem({
    tabSelector: ".core-tab",
    contentSelector: ".core-content",
    highlightId: "highlightBarCore",
  });
});

document.addEventListener("DOMContentLoaded", () => {
  const tabButtons = document.querySelectorAll(".tab-btn");
  const tabPanes = document.querySelectorAll(".tab-pane");

  tabButtons.forEach((btn) => {
    btn.addEventListener("click", () => {
      const target = btn.dataset.tab;

      // Toggle tab button active
      tabButtons.forEach((b) => b.classList.remove("active"));
      btn.classList.add("active");

      // Show content pane
      tabPanes.forEach((pane) => {
        pane.classList.add("d-none");
        pane.classList.remove("active");
      });

      const activePane = document.getElementById(target);
      if (activePane) {
        activePane.classList.remove("d-none");
        setTimeout(() => activePane.classList.add("active"), 10);
      }
    });
  });
});

document.addEventListener("DOMContentLoaded", () => {
  const headerOffset = 80;

  function isDesktop() {
    return window.innerWidth >= 992;
  }

  function scrollWithOffset(el, offset = 80) {
    const y = el.getBoundingClientRect().top + window.scrollY - offset;
    window.scrollTo({ top: y, behavior: "smooth" });
  }

  document
    .querySelectorAll(".steel-tabs-sidebar .about-wrapper")
    .forEach((wrapper) => {
      const sidebarLinks = wrapper.querySelectorAll(".steel-tabs-sidebar a");
      const sections = wrapper.querySelectorAll(".section-block");

      // Click: scroll và active
      sidebarLinks.forEach((link) => {
        link.addEventListener("click", (e) => {
          e.preventDefault();
          const target = document.querySelector(link.getAttribute("href"));
          if (target) {
            scrollWithOffset(target, headerOffset);
          }

          sidebarLinks.forEach((l) => l.classList.remove("active"));
          link.classList.add("active");
        });
      });

      // Sử dụng IntersectionObserver để cập nhật active
      const observerOptions = {
        root: null,
        rootMargin: `-${headerOffset}px 0px 0px 0px`,
        threshold: 0.1,
      };

      const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
          const id = entry.target.getAttribute("id");
          const link = wrapper.querySelector(`.about-sidebar a[href="#${id}"]`);
          if (entry.isIntersecting) {
            sidebarLinks.forEach((l) => l.classList.remove("active"));
            if (link) {
              link.classList.add("active");
              if (isDesktop()) {
                link.scrollIntoView({
                  behavior: "smooth",
                  block: "nearest",
                });
              }
            }
          }
        });
      }, observerOptions);

      sections.forEach((section) => {
        observer.observe(section);
      });
    });
});

// Khởi tạo LightGallery cho ảnh trong tab
document.addEventListener("DOMContentLoaded", function () {
  // Khởi tạo Flickity
  var flkty = new Flickity(".main-carousel", {
    cellAlign: "center",
    contain: true,
    wrapAround: true,
    pageDots: false,
    imagesLoaded: true,
  });

  // Khởi tạo LightGallery
  lightGallery(document.getElementById("gallery"), {
    selector: "a.carousel-cell",
    plugins: [lgZoom, lgThumbnail],
    download: false,
    mobileSettings: {
      controls: true,
      showCloseIcon: true,
      download: false,
    },
  });
});

document.addEventListener("DOMContentLoaded", () => {
  const timelineItems = document.querySelectorAll(".timeline-item");

  timelineItems.forEach((item) => {
    const desc = item.dataset.desc;
    const year = item.dataset.year;

    const contentBox = item.querySelector(".hover-content");
    if (contentBox) {
      contentBox.innerHTML = `
        <strong style="display:block; font-size: 25px; margin-bottom: 0px;">${year}</strong>
        <span>${desc}</span>
      `;
    }
  });
});

document.addEventListener("DOMContentLoaded", () => {
  const progress = document.querySelector(".timeline-progress");
  const items = document.querySelectorAll(".timeline-item");

  function updateProgress() {
    const active = document.querySelector(".timeline-item:hover");
    if (active) {
      const rect = active.getBoundingClientRect();
      const parentRect = active.parentElement.getBoundingClientRect();
      const width = rect.left + rect.width / 2 - parentRect.left;
      progress.style.width = width + "px";
    }
  }

  items.forEach((item) => {
    item.addEventListener("mouseenter", updateProgress);
    item.addEventListener("mouseleave", () => {
      progress.style.width = "0";
    });
  });
});

document.addEventListener("DOMContentLoaded", () => {
  const dropdowns = document.querySelectorAll(".navbar .dropdown-toggle");

  dropdowns.forEach((toggle) => {
    toggle.addEventListener("click", function (e) {
      if (window.innerWidth >= 992) {
        // Nếu đang ở desktop, cho click chuyển trang luôn
        window.location.href = this.getAttribute("href");
      }
    });
  });
});

function animateCounter(element, target, duration = 2000) {
  let start = 0;
  let startTime = null;

  function updateCounter(timestamp) {
    if (!startTime) startTime = timestamp;
    const progress = timestamp - startTime;
    const current = Math.min(
      start + (progress / duration) * (target - start),
      target
    );

    // Format with dots instead of commas and add "+"
    element.textContent = Math.floor(current)
      .toString()
      .replace(/\B(?=(\d{3})+(?!\d))/g, ".");

    if (current < target) {
      requestAnimationFrame(updateCounter);
    }
  }

  requestAnimationFrame(updateCounter);
}

document.addEventListener("DOMContentLoaded", () => {
  const counters = document.querySelectorAll(".count-number");
  counters.forEach((counter) => {
    const target = parseInt(counter.dataset.target, 10);
    animateCounter(counter, target, 1500);
  });
});

// Trigger khi vào viewport
function triggerCounters() {
  const counters = document.querySelectorAll(".count-number");
  const options = {
    threshold: 0.6,
  };

  const observer = new IntersectionObserver((entries, obs) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        animateCounter(entry.target);
        obs.unobserve(entry.target); // chỉ chạy 1 lần
      }
    });
  }, options);

  counters.forEach((counter) => observer.observe(counter));
}

// Run after DOM loaded
document.addEventListener("DOMContentLoaded", triggerCounters);

document.addEventListener("DOMContentLoaded", () => {
  const scrollBtn = document.getElementById("scrollToTop");

  // Hiện nút khi scroll xuống
  window.addEventListener("scroll", () => {
    if (window.scrollY > 300) {
      scrollBtn.classList.add("show");
    } else {
      scrollBtn.classList.remove("show");
    }
  });

  // Bấm để scroll lên top
  scrollBtn.addEventListener("click", () => {
    window.scrollTo({
      top: 0,
      behavior: "smooth",
    });
  });
});
