<?php

/**
 * Only permit execution from the command-line.
 */
if (php_sapi_name() !== 'cli') {
    echo "This script must be called from the command line.";
    exit(1);
}

require_once __DIR__ . '/vendor/autoload.php';

/**
 * Get the feed list and set up SimplePie.
 */
$simplepie = new SimplePie();
$feedUrls = array_filter(file(__DIR__ . '/feeds.csv', FILE_IGNORE_NEW_LINES));
$simplepie->set_feed_url($feedUrls);
$ua = 'Mozilla/4.0 (compatible; Sourdust Feed Aggregator https://github.com/samwilson/sourdust-feed-aggregator)';
$simplepie->set_useragent($ua);

/**
 * Set up caching.
 */
$cacheDir = __DIR__ . '/cache';
if (!is_dir($cacheDir)) {
    mkdir($cacheDir);
}
$simplepie->set_cache_location($cacheDir);

/**
 * Run the actual feed aggregation and check for errors.
 */
$simplepie->init();
if ($simplepie->error()) {
    echo "Errors:\n    " . join("\n    ", $simplepie->error());
}

/**
 * Get feed data.
 */
$feeds = [];
foreach ($simplepie->get_items() as $item) {
    $feeds[$item->get_feed()->get_title()] = $item->get_feed();
}
ksort($feeds);

/**
 * Create the output HTML and cache it for use by the syntax component.
 */
$loader = new \Twig_Loader_Filesystem([__DIR__]);
$twig = new \Twig_Environment($loader);
$twig->enableDebug();
$twig->addExtension(new \Twig_Extension_Debug());
// Render all templates.
foreach (glob(__DIR__ . '/*.twig') as $tpl) {
    if (strpos('_example', $tpl) !== false) {
        continue;
    }
    $template = $twig->loadTemplate(basename($tpl));
    $out = $template->render([
        'simplepie' => $simplepie,
        'date_RFC2822' => date('r'),
        'date_ISO8601' => date('c'),
        'feeds' => $feeds,
    ]);
    $name = pathinfo($tpl, PATHINFO_FILENAME);
    file_put_contents(__DIR__ . '/' . $name, $out);
}
