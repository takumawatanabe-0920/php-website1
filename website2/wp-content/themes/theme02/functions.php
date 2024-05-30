<?php

add_action('wp_enqueue_scripts', 'annex_enqueue_styles');
// add_action('wp_enqueue_scripts', 'annex_enqueue_scripts');

function annex_enqueue_styles()
{
  wp_enqueue_style(
    'annex-orange',
    get_parent_theme_file_uri('style.css'),
  );
}

// function annex_enqueue_scripts()
// {
//   wp_enqueue_script(
//     'annex-orange',
//     get_parent_theme_file_uri('script.js'),
//   );
// }
