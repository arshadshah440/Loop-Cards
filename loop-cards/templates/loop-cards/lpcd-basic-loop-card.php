<?php
// if file is being called directly or not in the wordpress
if (! defined('ABSPATH')) exit; // Exit if accessed directly

/* 
 * Basic Loop Cards
 * @subpackage Loop Cards/templates/Loop Cards
 * @since 1.0.0
 * @author Arshad Shah
 * 
 * This template can be overridden by copying it to yourtheme/Loop Cards/BasicLoopcard.php
 */

// title of post
$title = get_the_title();
$excerpt = get_the_excerpt();
$excerpt = wp_trim_words($excerpt, 20);
$post_url = get_the_permalink();
$last_updated = get_the_date();
$post_categories = get_the_category();
$authorname = get_the_author();
$author_id = get_the_author_meta('ID');
$author_url = get_author_posts_url($author_id);
$featuredimage_url = get_the_post_thumbnail_url();
$backupimgurl = esc_url(LOOPCARD_PLUGIN_URL . '/includes/public/img/backupimg.png');
$category_name = '';
$category_link = '';
if (!empty($post_categories)) {
    $category_name = $post_categories[0]->name;
    $category_link = get_category_link($post_categories[0]->term_id);
}
?>

<div class="lpcd-card">
    <div class="lpcd-card-head">
        <a href="<?php echo esc_url($post_url); ?>">
            <div class="lpcd-card-product-img">
                <img src="<?php echo esc_url(!empty($featuredimage_url) ? $featuredimage_url : $backupimgurl); ?>" alt="<?php echo esc_attr__('Featured Image', 'loop-cards'); ?>">
            </div>
        </a>
    </div>

    <div class="lpcd-card-body">
        <a href="<?php echo esc_url($post_url); ?>">
            <h3 class="lpcd-card-title"><?php echo esc_html($title); ?></h3>
        </a>
        <p class="lpcd-card-text"><?php echo esc_html($excerpt); ?></p>

        <div class="lpcd-wrapper">
            <?php if (!empty($category_name)) { ?>
                <div class="lpcd-card-category">
                    <img src="<?php echo esc_url(LOOPCARD_PLUGIN_URL . '/includes/public/img/icon-ethereum.png'); ?>" alt="<?php echo esc_attr__('Category Icon', 'loop-cards'); ?>" class="lpcd-card-icon">
                    <span><a href="<?php echo esc_url($category_link); ?>"><?php echo esc_html($category_name); ?></a></span>
                </div>
            <?php } ?>

            <div class="lpcd-card-countdown">
                <img src="<?php echo esc_url(LOOPCARD_PLUGIN_URL . '/includes/public/img/icon-clock.png'); ?>" alt="<?php echo esc_attr__('Clock Icon', 'loop-cards'); ?>" class="lpcd-card-icon">
                <span><?php echo esc_html($last_updated); ?></span>
            </div>
        </div>
    </div>

    <div class="lpcd-card-footer">
        <img src="<?php echo esc_url(get_avatar_url($author_id)); ?>" alt="<?php echo esc_attr__('Author Avatar', 'loop-cards'); ?>" class="lpcd-card-author-img">

        <p class="lpcd-card-author-name"><?php echo esc_html__('Creation of', 'loop-cards'); ?> <a href="<?php echo esc_url($author_url); ?>"><?php echo esc_html($authorname); ?></a></p>
    </div>
</div>