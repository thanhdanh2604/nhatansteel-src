<head>
  <meta charset="utf-8">
	<meta name="format-detection" content="telephone=no">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Nhat An Steel</title>
  <link data-n-head="ssr" rel="icon" type="image/x-icon"
    href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/favicon.png">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
    rel="stylesheet">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

  <!-- LightGallery CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lightgallery@2.7.1/css/lightgallery-bundle.min.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/scss/fe-styles.css">
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/custom.css">
</head>
<?php
$current_language = substr(get_locale(), 0, 2);
?>
<!-- Top Bar -->
<div class="top-bar">
  <div class="container">
    <div class="row">
      <div
        class="col-12 col-md-6 d-flex align-items-center justify-content-center justify-content-md-start text-uppercase">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/i-building.svg" alt="icon building">
        <span class="logo company-name" href="#" style="padding-top: 3px;font-weight: 700;"><?php
        if ($current_language == 'vi') {
          echo the_field('company_name', 'option');
        } else {
          echo the_field('company_name_english', 'option');
        } ?></span>
      </div>
      <div class="col-12 col-md-6 d-none d-md-flex justify-content-end align-items-center">
        <a class="nav-link link-brochure ripple-btn" href="<?php echo esc_url(home_url('/thu-vien')); ?>"
          data-tooltip="Tải brochure">Brochure <img
            src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/i-download.svg" alt="icon download">
        </a>
        <div class="social-icons">
          <a href="<?php the_field('facebook', 'option') ?>"><img
              src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/i-facebook.svg" alt="icon facebook"
              width="20"></a>
          <a href="mailto:<?php the_field('company_email', 'option') ?>"><img
              src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/i-email.svg" alt="icon email"
              width="20"></a>
          <div class="language-selector">
            <?php
            if (function_exists('pll_the_languages')) {
              $languages = pll_the_languages(array('raw' => 1));
              if (!empty($languages)) {
                foreach ($languages as $lang) {
                  $class = $lang['current_lang'] ? 'active' : '';
                  $lang_slug = $lang['slug']; // Lấy mã ngôn ngữ (ví dụ: 'vi', 'en')
                  $custom_flag_url = get_stylesheet_directory_uri() . '/assets/images/flag/' . $lang_slug . '.jpg';
                  $lang_name = esc_attr($lang['name']); // Escape tên ngôn ngữ cho văn bản alt
                  $lang_url = esc_url($lang['url']); // Escape URL
            
                  echo '<a class="' . $class . '" href="' . $lang_url . '"><img src="' . $custom_flag_url . '" alt="' . $lang_name . ' flag"></a>';
                }
              }
            }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">
  <div class="container">
    <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">
      <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/logo.svg" alt="Nhat An Steel">
    </a>
    <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
      <span class="navbar-toggler-icon"></span>
    </button> -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mainNav">
      <?php
      wp_nav_menu(
        array(
          'theme_location' => 'primary-menu',
          'container' => false,
          'menu_class' => 'navbar-nav ms-auto mb-2 mb-lg-0',
          'fallback_cb' => false,
          'depth' => 2,
          'walker' => new Bootstrap_NavWalker(), // Custom walker for Bootstrap
        )
      );
      ?>
      <div class="col-12 d-flex d-md-none align-items-center mobile-menu-expand">
        <div class="col-6">
          <a class="nav-link link-brochure ripple-btn" href="<?php echo esc_url(home_url('/thu-vien')); ?>"
            data-tooltip="Tải brochure">Brochure <img
              class="i-download"
              src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/i-download.svg"
              alt="icon download">
          </a>
        </div>
        <div class="col-6 social-icons d-flex justify-content-end align-items-center">
          <div class="d-flex justify-content-center align-items-center flex-wrap">
            <a href="<?php the_field('facebook', 'option') ?>"><img
                src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/i-facebook.svg"
                alt="icon facebook" width="20">
            </a>
            <a href="mailto:<?php the_field('company_email', 'option') ?>"><img
                src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/i-email.svg" alt="icon email"
                width="20">
            </a>
          </div>
          <div class="d-flex justify-content-center align-items-center language-selector">
            <?php
            if (function_exists('pll_the_languages')) {
              $languages = pll_the_languages(array('raw' => 1));
              if (!empty($languages)) {
                foreach ($languages as $lang) {
                  $class = $lang['current_lang'] ? 'active' : '';
                  $lang_slug = $lang['slug']; // Lấy mã ngôn ngữ (ví dụ: 'vi', 'en')
                  $custom_flag_url = get_stylesheet_directory_uri() . '/assets/images/flag/' . $lang_slug . '.jpg';
                  $lang_name = esc_attr($lang['name']); // Escape tên ngôn ngữ cho văn bản alt
                  $lang_url = esc_url($lang['url']); // Escape URL

                  echo '<a class="' . $class . '" href="' . $lang_url . '"><img src="' . $custom_flag_url . '" alt="' . $lang_name . ' flag"></a>';
                }
              }
            }
            ?>
          </div>
        </div>
      </div>
      <div class="nav-item"><a class="nav-link nav-link-search" href="#"><i class="i-search"></i></a></div>
    </div>
  </div>
  </div>
</nav>

<div class="navbar-search-overlay">
  <div class="search-container">
    <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="search-form">
      <input type="search" 
             name="s" 
             class="form-control search-input"
             placeholder="<?php echo ($current_language == 'vi') ? 'Tìm kiếm...' : 'Search...'; ?>"
             value="<?php echo get_search_query(); ?>"
             autocomplete="off">
      <input type="hidden" name="post_type" value="any">
      <button type="submit" class="btn btn-search-submit" aria-label="Search" style="display: none;">
        <i class="bi bi-search"></i>
      </button>
      <button type="button" class="btn btn-close-search" aria-label="Close"><i class="bi bi-x-lg"></i></button>
    </form>
    
    <!-- Live search results container -->
    <div id="live-search-results" class="live-search-results" style="display: none;">
      <div class="search-loading">
        <i class="bi bi-hourglass-split"></i> <?php echo ($current_language == 'vi') ? 'Đang tìm kiếm...' : 'Searching...'; ?>
      </div>
      <div class="search-results-container"></div>
    </div>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.querySelector('.search-input');
    const liveResults = document.getElementById('live-search-results');
    const resultsContainer = document.querySelector('.search-results-container');
    const loadingElement = document.querySelector('.search-loading');
    let searchTimeout;

    if (searchInput) {
        searchInput.addEventListener('input', function() {
            const query = this.value.trim();
            
            clearTimeout(searchTimeout);
            
            if (query.length >= 2) {
                liveResults.style.display = 'block';
                loadingElement.style.display = 'block';
                resultsContainer.innerHTML = '';
                
                searchTimeout = setTimeout(() => {
                    performLiveSearch(query);
                }, 300);
            } else {
                liveResults.style.display = 'none';
            }
        });

        // Hide results when clicking outside
        document.addEventListener('click', function(e) {
            if (!e.target.closest('.search-container')) {
                liveResults.style.display = 'none';
            }
        });
    }

    function performLiveSearch(query) {
        fetch('<?php echo admin_url('admin-ajax.php'); ?>', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: new URLSearchParams({
                action: 'live_search',
                query: query,
                nonce: '<?php echo wp_create_nonce('live_search_nonce'); ?>'
            })
        })
        .then(response => response.json())
        .then(data => {
            loadingElement.style.display = 'none';
            
            if (data.success && data.data.length > 0) {
                resultsContainer.innerHTML = data.data.map(item => `
                    <div class="live-search-item" onclick="window.location.href='${item.url}'">
                        <div class="d-flex align-items-center">
                            <img src="${item.image}" alt="${item.title}" style="width: 60px; height: 45px; object-fit: cover; border-radius: 4px; margin-right: 15px;">
                            <div>
                                <h6 class="mb-1 fw-bold">${item.title}</h6>
                                <small class="text-muted">${item.type}</small>
                            </div>
                        </div>
                    </div>
                `).join('');
            } else {
                resultsContainer.innerHTML = `
                    <div class="live-search-item text-center">
                        <p class="mb-0 text-muted"><?php echo $current_language == 'vi' ? 'Không tìm thấy kết quả' : 'No results found'; ?></p>
                    </div>
                `;
            }
        })
        .catch(error => {
            console.error('Search error:', error);
            loadingElement.style.display = 'none';
        });
    }
});
</script>

<style>
.live-search-results {
    position: absolute;
    top: 100%;
    left: 0;
    right: 0;
    background: white;
    border-radius: 8px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    max-height: 400px;
    overflow-y: auto;
    z-index: 1000;
}

.search-loading {
    padding: 20px;
    text-align: center;
    color: #666;
}

.live-search-item {
    padding: 15px;
    border-bottom: 1px solid #eee;
    cursor: pointer;
    transition: background-color 0.2s ease;
}

.live-search-item:hover {
    background-color: #f8f9fa;
}

.live-search-item:last-child {
    border-bottom: none;
}

.search-container {
    position: relative;
}
</style>