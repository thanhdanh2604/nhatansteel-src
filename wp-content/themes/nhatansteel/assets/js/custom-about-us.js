// js for tap active
document.addEventListener("DOMContentLoaded", () => {
  // COMMON fade + highlight logic for tabs
  function createTabSystem({
    tabSelector,
    contentSelector,
    highlightId,
    mobiletabListSelector,
    mobileContentWrapperSelector,
  }) {
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
      ["click", "mouseenter"].forEach((evt) => {
        tab.addEventListener(evt, () => {
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
    });

    function removeAllActiveMobileContentItem() {
      const contentElements = document.querySelectorAll(
        `${mobiletabListSelector} ${mobileContentWrapperSelector}`
      );
      contentElements.forEach((content) => {
        content.classList.remove("active");
      });
    }

    const mobileTabItems = document.querySelectorAll(
      `${mobiletabListSelector} li ${tabSelector}`
    );
    if (mobileTabItems) {
      mobileTabItems.forEach((tab) => {
        ["click", "mouseenter"].forEach((evt) => {
          tab.addEventListener(evt, () => {
            // Remove previos active items
            removeAllActiveMobileContentItem();
            const contentElement = tab.parentElement.querySelector(
              mobileContentWrapperSelector
            );
            contentElement.classList.add("active");
          });
        });
      });
    }

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
    mobiletabListSelector: ".m-vision-tab-list",
    mobileContentWrapperSelector: ".vision-content-wrap",
  });

  // Init for Mission
  createTabSystem({
    tabSelector: ".mission-tab",
    contentSelector: ".mission-content",
    highlightId: "highlightBarMission",
    mobiletabListSelector: ".m-mission-tab-list",
    mobileContentWrapperSelector: ".mission-content-wrap",
  });

  // Init for Core Values
  createTabSystem({
    tabSelector: ".core-tab",
    contentSelector: ".core-content",
    highlightId: "highlightBarCore",
    mobiletabListSelector: ".m-core-values-tab-list",
    mobileContentWrapperSelector: ".core-content-wrap",
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

  const contentDiv = document.getElementById("chairmanMessage");
  const toggleBtn = document.getElementById("toggleMessageBtn");
  const originalHTML = contentDiv.innerHTML.trim();
  const wordLimit = 34;

  const isMobile = window.innerWidth < 576;

  if (isMobile) {
    const temp = document.createElement("div");
    temp.innerHTML = originalHTML;
    const plainText = temp.innerText || temp.textContent;

    const words = plainText.split(/\s+/);
    if (words.length > wordLimit) {
      const truncated = words.slice(0, wordLimit).join(" ") + "…";

      contentDiv.setAttribute("data-full", originalHTML);
      contentDiv.setAttribute("data-truncated", truncated);
      contentDiv.innerText = truncated;

      toggleBtn.addEventListener("click", function () {
        const isExpanded = contentDiv.classList.toggle("expanded");
        contentDiv.innerHTML = isExpanded
          ? contentDiv.getAttribute("data-full")
          : contentDiv.getAttribute("data-truncated");

        toggleBtn.classList.toggle("rotated", isExpanded);
      });
    } else {
      toggleBtn.style.display = "none";
    }
  } else {
    toggleBtn.style.display = "none";
  }
});
