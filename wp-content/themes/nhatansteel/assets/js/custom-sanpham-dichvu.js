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
    ".structure-detail-section .tab-content-detail"
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
// change breadcrumb
document.addEventListener("DOMContentLoaded", function () {
    const tabButtons = document.querySelectorAll(".tab-btn");
    const breadcrumbText = document.querySelector(".breadcrumb-dynamic");
    tabButtons.forEach((btn) => {
      btn.addEventListener("click", function () {
        if (breadcrumbText) {
          breadcrumbText.textContent = this.textContent;
        }
      });
    });
  });

  
// Xử lý anchor link và offset cho sticky header
document.addEventListener("DOMContentLoaded", () => {
  // Hàm cuộn đến element với offset
  function scrollToElementWithOffset(element, offset = 100) {
    const elementPosition = element.getBoundingClientRect().top;
    const offsetPosition = elementPosition + window.pageYOffset - offset;

    window.scrollTo({
      top: offsetPosition,
      behavior: "smooth"
    });
  }

  // Xử lý anchor link từ URL
  function handleAnchorFromURL() {
    const hash = window.location.hash;
    if (hash) {
      const targetElement = document.querySelector(hash);
      if (targetElement) {
        // Delay để đảm bảo trang đã load hoàn toàn
        setTimeout(() => {
          scrollToElementWithOffset(targetElement, 120);
        }, 100);
      }
    }
  }

  // Xử lý khi trang load
  handleAnchorFromURL();

  // Xử lý khi URL thay đổi (popstate)
  window.addEventListener('popstate', handleAnchorFromURL);

  // Xử lý click trên các link anchor trong trang
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
      e.preventDefault();
      const targetId = this.getAttribute('href');
      const targetElement = document.querySelector(targetId);
      
      if (targetElement) {
        // Cập nhật URL
        history.pushState(null, null, targetId);
        
        // Cuộn đến element
        scrollToElementWithOffset(targetElement, 120);
      }
    });
  });
});
// Kiểm tra param của trình duyệt có biến servies=yes không
document.addEventListener("DOMContentLoaded", () => {
  const urlParams = new URLSearchParams(window.location.search);
  console.log(urlParams);
  if (urlParams.get("services") === "yes") {
    const serviceTab = document.querySelector('.tab-btn[data-tab="service"]');
    const productTab = document.querySelector('.tab-btn[data-tab="product"]');
    if (serviceTab) {
      serviceTab.classList.add("active");
      productTab.classList.remove("active");
      const targetPane = document.getElementById("service");
      const productPane = document.getElementById("product");
      if (productPane) {
        productPane.classList.add("d-none");
        productPane.classList.remove("active");
      }
      if (targetPane) {
        targetPane.classList.remove("d-none");
        setTimeout(() => targetPane.classList.add("active"), 10);
      }
    } 
  }
});