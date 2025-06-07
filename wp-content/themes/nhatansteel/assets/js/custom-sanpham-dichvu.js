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
// Tab system for Structure Detail
document.addEventListener("DOMContentLoaded", () => {
  const tabLinks = document.querySelectorAll(
    ".structure-detail-section .nav-link"
  );
  const tabPanes = document.querySelectorAll(
    ".structure-detail-section .tab-pane"
  );

  tabLinks.forEach((link) => {
    link.addEventListener("click", () => {
      const target = link.dataset.tab;

      tabLinks.forEach((l) => l.classList.remove("active"));
      link.classList.add("active");

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
  const sidebars = document.querySelectorAll(".steel-tabs-sidebar");
  const sidebarWrappers = document.querySelectorAll(
    ".steel-tabs-sidebar-wrapper"
  );
  const sections = document.querySelectorAll(".section-block");
  const headerOffset = document.querySelector("nav")?.offsetHeight || 120;

  sidebars.forEach((sidebar, index) => {
    const sidebarWrapper = sidebarWrappers[index];
    const sidebarLinks = sidebar.querySelectorAll("a");
console.log(sidebarLinks)
    // Smooth scroll khi click menu
    sidebarLinks.forEach((link) => {
      link.addEventListener("click", (e) => {
        e.preventDefault();
        const target = document.querySelector(link.getAttribute("href"));
        if (target) {
          const y =
            target.getBoundingClientRect().top +
            window.pageYOffset -
            headerOffset;
          window.scrollTo({ top: y, behavior: "smooth" });
        }

        sidebarLinks.forEach((l) => l.classList.remove("active"));
        link.classList.add("active");
      });
    });

    // Scroll highlight & cuộn sidebar theo
    window.addEventListener("scroll", () => {
      const scrollPosition = window.pageYOffset + headerOffset + 1;

      sections.forEach((section) => {
        const id = section.getAttribute("id");
        const link = sidebar.querySelector(`a[href="#${id}"]`);
        if (
          section.offsetTop <= scrollPosition &&
          section.offsetTop + section.offsetHeight > scrollPosition
        ) {
          sidebarLinks.forEach((l) => l.classList.remove("active"));
          if (link) {
            link.classList.add("active");

            if (sidebarWrapper) {
              const linkOffsetTop = link.offsetTop;
              const wrapperHeight = sidebarWrapper.clientHeight;
              const targetScrollTop =
                linkOffsetTop - wrapperHeight / 2 + link.offsetHeight / 2;

              sidebarWrapper.scrollTo({
                top: targetScrollTop,
                behavior: "smooth",
              });
            }
          }
        }
      });
    });
  });
});
