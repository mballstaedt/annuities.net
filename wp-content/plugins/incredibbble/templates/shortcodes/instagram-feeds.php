<?php

defined('ABSPATH') or die('Cheatin\' Uh?');
?>

<?php if(is_array($feeds) && ! empty($feeds)) : ?>
    <div class="incredibbble-instagram-feeds">
        <div class="instagram-feeds">
            <?php
            foreach($feeds as $feed) {
                $srcset = array();

                $images = $feed['images'];

                usort($images, function($a, $b) {
                    return $a['width'] - $b['width'];
                });

                foreach ($images as $key => $value) {
                    $srcset[] = $value['url'] . ' ' . $value['width'] . 'w';
                }

                if ($attributes['lazyload']) {
                    printf('<div class="instagram-feed"><a href="%1$s" rel="nofollow"><img width="%2$s" height="%3$s" data-src="%4$s" data-srcset="%5$s" data-sizes="auto" alt="" class="lazyload"></a></div>' . "\n",
                        esc_url($feed['url']),
                        absint($images[0]['width']),
                        absint($images[0]['height']),
                        esc_url($images[0]['url']),
                        esc_attr(join(', ', $srcset))
                    );
                }
                else {
                    printf('<div class="instagram-feed"><a href="%1$s" rel="nofollow"><img width="%2$s" height="%3$s" src="%4$s" alt=""></a></div>' . "\n",
                        esc_url($feed['url']),
                        absint($feed['images'][$attributes['size']]['width']),
                        absint($feed['images'][$attributes['size']]['height']),
                        esc_url($feed['images'][$attributes['size']]['url'])
                    );
                }
            }
            ?>
        </div>
    </div>
<?php else: ?>
    <?php echo esc_html($feeds); ?>
<?php endif; ?>