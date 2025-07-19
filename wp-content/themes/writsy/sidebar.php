<?php 
/**
 * The template for the sidebar containing the main widget area.
 *
 * @package Writsy
 * @since   1.0.0
 */

defined('ABSPATH') or die('Cheatin\' Uh?');
?>

<?php if (is_active_sidebar('sidebar-1')) : ?>
    <aside id="secondary" class="sidebar widget-area" role="complementary">
        <?php dynamic_sidebar('sidebar-1'); ?>
    </aside>
<?php endif; ?>