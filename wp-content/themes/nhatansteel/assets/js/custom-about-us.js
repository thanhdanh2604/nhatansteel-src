
// js for tap active
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
// tap sidebar
document.addEventListener("DOMContentLoaded", () => {
  const sidebarLinks = document.querySelectorAll(".about-sidebar a");
  const sections = document.querySelectorAll(".section-block");
  const headerOffset = document.querySelector("nav")?.offsetHeight || 100;

  function isDesktop() {
    return window.innerWidth >= 992;
  }

  function scrollWithOffset(el, headerOffset) {
    const y = el.getBoundingClientRect().top + window.scrollY - headerOffset;
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
// timeline
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
