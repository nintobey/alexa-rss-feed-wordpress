<?php
/**
 * Template Name: alexa feed
 */
$postCount = 5; // The number of posts in the feed
$titlefeed = "My Alexa Feed"; // The name of the feed
$posts = query_posts('showposts=' . $postCount);
header('Content-Type: '.feed_content_type('rss-http').'; charset='.get_option('blog_charset'), true);
echo '<?xml version="1.0" encoding="UTF-8"?'.'>';
?>
<!–– Feed created by nintobey on GitHub -->
<rss version="2.0" <?php do_action('rss2_ns'); ?>>
<channel>
		<ttl>30</ttl>
        <title><?php echo $titlefeed; ?></title>
        <?php while(have_posts()) : the_post(); ?>
                <item>
                        <title><?php the_title_rss(); ?></title>
                        <link><?php the_permalink_rss(); ?></link>
                        <pubDate><?php echo mysql2date('D, d M Y H:i:s +0000', get_post_time('Y-m-d H:i:s', true), false); ?></pubDate>
                        <description><![CDATA[<?php strip_tags(the_excerpt_rss()) ?>]]></description>
                        <?php rss_enclosure(); ?>
                        <?php do_action('rss2_item'); ?>
                </item>
        <?php endwhile; ?>
</channel>
</rss>
