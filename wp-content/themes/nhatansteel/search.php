<?php
/**
 * Search Results Template
 */

get_header();

$current_language = substr(get_locale(), 0, 2);
$search_query = get_search_query();
$total_results = $wp_query->found_posts;

// Text labels
$page_title = $current_language == 'vi' ? 'Kết quả tìm kiếm' : 'Search Results';
$search_for = $current_language == 'vi' ? 'Tìm kiếm cho' : 'Search results for';
$no_results = $current_language == 'vi' ? 'Không tìm thấy kết quả nào' : 'No results found';
$try_again = $current_language == 'vi' ? 'Vui lòng thử lại với từ khóa khác' : 'Please try again with different keywords';
$results_found = $current_language == 'vi' ? 'kết quả được tìm thấy' : 'results found';
?>

<section class="search-results-banner">
    <div class="container">
        <div class="banner-text">
            <h1><?php echo $page_title; ?></h1>
            <p class="breadcrumb-text mb-0">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <?php echo $current_language == 'vi' ? 'Trang chủ' : 'Home'; ?>
                </a> / 
                <span><?php echo $page_title; ?></span>
            </p>
        </div>
    </div>
</section>

<section class="search-results-section py-5">
    <div class="container">
        <?php if (!empty($search_query)): ?>
            <div class="search-info mb-4">
                <h2><?php echo $search_for; ?>: "<?php echo esc_html($search_query); ?>"</h2>
                <p class="text-muted"><?php echo $total_results . ' ' . $results_found; ?></p>
            </div>
        <?php endif; ?>

        <?php if (have_posts()): ?>
            <div class="search-results-grid">
                <div class="row g-4">
                    <?php while (have_posts()): the_post(); ?>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="search-result-item">
                                <?php if (get_post_type() == 'project'): ?>
                                    <!-- Project Result -->
                                    <div class="result-project">
                                        <div class="result-image">
                                            <?php 
                                            $image_url = get_the_post_thumbnail_url(get_the_ID(), 'medium_large');
                                            if (!$image_url) {
                                                $gallery = get_field('gallery');
                                                if (!empty($gallery) && is_array($gallery)) {
                                                    $image_url = $gallery[0]['url'];
                                                }
                                            }
                                            if (!$image_url) {
                                                $image_url = get_stylesheet_directory_uri() . '/assets/images/img.jpg';
                                            }
                                            ?>
                                            <a href="<?php the_permalink(); ?>">
                                                <img src="<?php echo esc_url($image_url); ?>" 
                                                     alt="<?php the_title_attribute(); ?>" 
                                                     class="img-fluid hover-zoom">
                                            </a>
                                            <div class="result-type project-type">
                                                <?php echo $current_language == 'vi' ? 'Dự án' : 'Project'; ?>
                                            </div>
                                        </div>
                                        <div class="result-content">
                                            <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                            <div class="project-meta">
                                                <?php 
                                                $investor = get_field('investor');
                                                $location = get_field('location');
                                                if ($investor): ?>
                                                    <p><strong><?php echo $current_language == 'vi' ? 'Chủ đầu tư:' : 'Investor:'; ?></strong> <?php echo wp_kses($investor, ['br' => []]); ?></p>
                                                <?php endif; ?>
                                                <?php if ($location): ?>
                                                    <p><strong><?php echo $current_language == 'vi' ? 'Địa điểm:' : 'Location:'; ?></strong> <?php echo wp_kses($location, ['br' => []]); ?></p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php else: ?>
                                    <!-- Post Result -->
                                    <div class="result-post">
                                        <div class="result-image">
                                            <?php 
                                            $image_url = get_the_post_thumbnail_url(get_the_ID(), 'medium_large');
                                            if (!$image_url) {
                                                $image_url = get_stylesheet_directory_uri() . '/assets/images/img.jpg';
                                            }
                                            ?>
                                            <a href="<?php the_permalink(); ?>">
                                                <img src="<?php echo esc_url($image_url); ?>" 
                                                     alt="<?php the_title_attribute(); ?>" 
                                                     class="img-fluid hover-zoom">
                                            </a>
                                            <div class="result-type post-type">
                                                <?php echo $current_language == 'vi' ? 'Tin tức' : 'News'; ?>
                                            </div>
                                        </div>
                                        <div class="result-content">
                                            <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                            <div class="post-meta">
                                                <span class="post-date"><?php echo get_the_date(); ?></span>
                                            </div>
                                            <div class="post-excerpt">
                                                <?php echo wp_trim_words(get_the_excerpt(), 20); ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>

            <!-- Pagination -->
            <div class="search-pagination mt-5">
                <?php
                the_posts_pagination(array(
                    'mid_size' => 2,
                    'prev_text' => '« ' . ($current_language == 'vi' ? 'Trước' : 'Previous'),
                    'next_text' => ($current_language == 'vi' ? 'Tiếp' : 'Next') . ' »',
                ));
                ?>
            </div>

        <?php else: ?>
            <!-- No Results -->
            <div class="no-results text-center py-5">
                <i class="bi bi-search fs-1 text-muted mb-3"></i>
                <h3><?php echo $no_results; ?></h3>
                <p class="text-muted"><?php echo $try_again; ?></p>
                
                <!-- Search Again Form -->
                <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="search-again-form mt-4">
                    <div class="input-group justify-content-center">
                        <input type="search" 
                               name="s" 
                               class="form-control" 
                               style="max-width: 400px;"
                               placeholder="<?php echo ($current_language == 'vi') ? 'Nhập từ khóa khác...' : 'Try different keywords...'; ?>">
                        <button type="submit" class="btn btn-primary">
                            <?php echo $current_language == 'vi' ? 'Tìm kiếm' : 'Search'; ?>
                        </button>
                    </div>
                </form>
                
                <!-- Show recent posts as suggestions -->
                <div class="mt-5">
                    <h4><?php echo $current_language == 'vi' ? 'Có thể bạn quan tâm:' : 'You might be interested in:'; ?></h4>
                    <div class="row g-3 mt-3">
                        <?php 
                        $recent_posts = get_posts(array(
                            'post_type' => array('post', 'project'),
                            'post_status' => 'publish',
                            'numberposts' => 6,
                            'orderby' => 'date',
                            'order' => 'DESC'
                        ));
                        
                        foreach ($recent_posts as $post): 
                            setup_postdata($post);
                            $image_url = get_the_post_thumbnail_url($post->ID, 'medium');
                            if (!$image_url && get_post_type() == 'project') {
                                $gallery = get_field('gallery', $post->ID);
                                if (!empty($gallery) && is_array($gallery)) {
                                    $image_url = $gallery[0]['sizes']['medium'];
                                }
                            }
                            if (!$image_url) {
                                $image_url = get_stylesheet_directory_uri() . '/assets/images/img.jpg';
                            }
                        ?>
                            <div class="col-6 col-md-4 col-lg-2">
                                <div class="suggestion-item">
                                    <a href="<?php echo get_permalink($post->ID); ?>">
                                        <img src="<?php echo esc_url($image_url); ?>" 
                                             alt="<?php echo get_the_title($post->ID); ?>" 
                                             class="img-fluid rounded mb-2">
                                        <h6 class="small"><?php echo get_the_title($post->ID); ?></h6>
                                        <small class="text-muted">
                                            <?php echo get_post_type() == 'project' 
                                                ? ($current_language == 'vi' ? 'Dự án' : 'Project')
                                                : ($current_language == 'vi' ? 'Tin tức' : 'News'); ?>
                                        </small>
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; 
                        wp_reset_postdata(); ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>

<style>
.search-results-banner {
    background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
    color: white;
    padding: 80px 0;
}

.banner-text h1 {
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 1rem;
}

.breadcrumb-text a {
    color: rgba(255,255,255,0.8);
    text-decoration: none;
}

.breadcrumb-text a:hover {
    color: white;
}

.search-result-item {
    background: white;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    height: 100%;
}

.search-result-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.15);
}

.result-image {
    position: relative;
    overflow: hidden;
    height: 200px;
}

.result-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.result-image:hover img {
    transform: scale(1.05);
}

.result-type {
    position: absolute;
    top: 10px;
    right: 10px;
    padding: 5px 10px;
    border-radius: 5px;
    color: white;
    font-size: 12px;
    font-weight: bold;
}

.project-type {
    background-color: #28a745;
}

.post-type {
    background-color: #007bff;
}

.result-content {
    padding: 20px;
}

.result-content h5 {
    margin-bottom: 15px;
    font-weight: 600;
}

.result-content h5 a {
    color: #333;
    text-decoration: none;
    transition: color 0.3s ease;
}

.result-content h5 a:hover {
    color: #007bff;
}

.project-meta p,
.post-meta {
    margin-bottom: 8px;
    color: #666;
    font-size: 14px;
}

.post-excerpt {
    color: #888;
    font-size: 14px;
    line-height: 1.5;
}

.search-info h2 {
    color: #333;
    font-size: 1.8rem;
    margin-bottom: 0.5rem;
}

.search-pagination {
    display: flex;
    justify-content: center;
}

.no-results i {
    color: #dee2e6;
}

.search-again-form .input-group {
    max-width: 500px;
    margin: 0 auto;
}

.suggestion-item {
    text-align: center;
    transition: transform 0.3s ease;
}

.suggestion-item:hover {
    transform: translateY(-3px);
}

.suggestion-item a {
    text-decoration: none;
    color: inherit;
}

.suggestion-item img {
    height: 120px;
    object-fit: cover;
    width: 100%;
}

@media (max-width: 768px) {
    .banner-text h1 {
        font-size: 2rem;
    }
    
    .result-image {
        height: 180px;
    }
    
    .result-content {
        padding: 15px;
    }
    
    .suggestion-item img {
        height: 100px;
    }
}
</style>

<?php get_footer(); ?>
