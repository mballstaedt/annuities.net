<?php defined('ABSPATH') or die('Cheatin\' Uh?'); ?>

<?php echo $args['before_widget']; ?>
    <?php echo $args['before_title'] . apply_filters('widget_title', $instance['title']). $args['after_title']; ?>

    <ul class="<?php echo esc_attr(apply_filters('incredibbble_social_widget_list_class', 'incredibbble-social')); ?>">
        <?php
        foreach($widget->brands as $id => $brand) {
            if (! isset($instance[$id]) || empty($instance[$id])) {
                continue;
            }

            printf('<li><a href="%1$s" class="%2$s">%3$s</a></li>' . "\n",
                esc_url($instance[$id]),
                esc_attr(apply_filters('incredibbble_social_widget_link_class', 'incredibbble-social-' . $id)),
                $brand['icon']
            );
        }
        ?>  
    </ul>

<?php echo $args['after_widget']; ?>