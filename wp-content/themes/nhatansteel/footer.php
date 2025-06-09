
<footer class="footer text-white">
  <div class="footer-top py-4">
    <div class="container">
      <div class="row align-items-start">
        <div class="col-12 col-md-3 mb-3 text-center text-md-start">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/logo-footer.svg" alt="Nhat An Steel" class="mb-3" width="148">
          <hr style="">
          <div class="social-icon">
            <a href="<?php the_field('facebook','option')?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/social/FB icon.svg" alt=""></a>
            <a href="<?php the_field('linkedin','option')?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/social/Linkedin icon.svg" alt=""></a>
            <a href="<?php the_field('youtube','option')?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/social/youtube 1.svg" alt=""></a>
          </div>
        </div>
        <div class="col-12 col-md-5 mb-3">
            <div class="footer-heading">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/i-building.svg" alt="building" width="20">
                <div class="footer-heading-text">
                    <h6>Trụ sở chính</h6>
                    <p><?php the_field('company_address','option')?></p>
                </div>
            </div>
          <p><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/i-call.svg" alt="building" width="20"> <strong>Điện thoại:</strong> <?php the_field('company_phone','option')?></p>
          <p><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/i-printer.svg" alt="printer" width="20"> <strong>Fax:</strong> <?php the_field('company_fax','option')?></p>
        </div>
        <div class="col-12 col-md-4 mb-3">
            <div class="footer-heading">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/i-industry.svg" alt="industry" width="20">
                <div class="footer-heading-text">
                    <h6>Nhà máy</h6>
                    <p><?php the_field('factory_address','option')?></p>
                </div>
            </div>
          <p><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/i-call.svg" alt="building" width="20"> <strong>Điện thoại:</strong> <?php the_field('factory_phone','option')?></p>
          <p><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/i-printer.svg" alt="printer" width="20"> <strong>Fax:</strong> <?php the_field('factory_fax','option')?></p>
        </div>
      </div>
    </div>
  </div>
  <div class="footer-bottom text-center">
     © Bản quyền thuộc về <a href="<?php echo home_url(); ?>"><?php the_field('company_name','option')?></a>
  </div>
</footer>

<button id="scrollToTop" class="scroll-to-top" aria-label="Scroll to top">
  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
    <path d="M5 15l7-7 7 7"></path>
  </svg>
</button>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<!-- LightGallery JS -->
<script src="https://cdn.jsdelivr.net/npm/lightgallery@2.7.1/lightgallery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/lightgallery@2.7.1/plugins/zoom/lg-zoom.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/lightgallery@2.7.1/plugins/thumbnail/lg-thumbnail.min.js"></script>

<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/fe.js"></script>
