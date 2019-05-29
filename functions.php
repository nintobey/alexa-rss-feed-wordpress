<?php
add_action('init', 'alexaRSS');
function alexaRSS(){
   add_feed('alexafeed', 'alexaRSSgen');
}
function alexaRSSgen(){
   get_template_part('feed', 'alexafeed');
}
function removeScriptFromRSS($content) {
$content = preg_replace("/Read More/", "", strip_tags($content));
return $content;
}
add_filter('the_content_feed', 'removeScriptFromRSS');
add_filter('the_excerpt_rss', 'removeScriptFromRSS');
?>
