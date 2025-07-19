<?php defined('ABSPATH') or die('Cheatin\' Uh?'); ?>

<?php if(is_array($tweets) && ! empty($tweets)) : ?>
    <div class="incredibbble-tweets">
        <div class="tweets">
            <?php foreach($tweets as $tweet) : ?>
            <div class="tweet">
                <span class="tweet_user"><?php echo $tweet['user']; ?></span>
                <span class="tweet_text"><?php echo $tweet['text']; ?></span>
                <time class="tweet_time" datetime="<?php echo date('Y-m-d h-i-s', $tweet['timestamp']); ?>"><?php echo $tweet['human_time_diff']; ?></time>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php else: ?>
    <?php echo esc_html($tweets); ?>
<?php endif; ?>