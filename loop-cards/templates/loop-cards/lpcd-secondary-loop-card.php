<?php
// if file is being called directly or not in the wordpress
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/* 
 * Secondary Loop Cards
 * @subpackage Loop Cards/templates/Loop Cards
 * @since 1.0.0
 * @author Arshad Shah
 * 
 * This template can be overridden by copying it to yourtheme/Loop Cards/BasicLoopcard.php
 */

// title of post
$title = get_the_title();
$excerpt = get_the_excerpt();
$excerpt = wp_trim_words($excerpt, 10);

$post_url = get_the_permalink();
$last_updated = get_the_date();
$post_categories = get_the_category();
$authorname = get_the_author();
$author_id = get_the_author_meta('ID');
$author_url = get_author_posts_url($author_id);
$featuredimage_url = get_the_post_thumbnail_url();
$backupimgurl= esc_url(LOOPCARD_PLUGIN_URL . '/includes/public/img/backup300.png');

$category_name = '';
$category_link = '';
if (!empty($post_categories)) {
    $category_name = $post_categories[0]->name;
    $category_link = get_category_link($post_categories[0]->term_id);
}
?>

<div class="lpcd-row lpcd-justify-content-center lpcd-p-lg-5 lpcd-p-2">
    <div class="lpcd-blog-post lpcd-col-10 lpcd-col-sm-12 lpcd-p-3 lpcd-bg-light lpcd-shadow lpcd-d-flex lpcd-align-items-center lpcd-rounded-3">
        <div class="lpcd-blog-post-img">
            <img src="<?php echo esc_url(!empty($featuredimage_url) ? $featuredimage_url : $backupimgurl); ?>" alt="<?php echo esc_attr__('Featured Image', 'loop-cards'); ?>" class="lpcd-img-fluid lpcd-rounded-3">
        </div>
        <div class="lpcd-blog-post-info">
            <h3 class="lpcd-blog-post-title"><?php echo esc_html($title); ?></h3>
            <p class="lpcd-blog-post-text lpcd-my-3">
                <?php echo esc_html($excerpt); ?>
            </p>
            <a href="<?php echo esc_url($post_url); ?>" class="lpcd-btn lpcd-btn-warning"><?php echo esc_html__('Read More', 'loop-cards'); ?></a>
        </div>
    </div>
</div>