<?php

add_action('wp_enqueue_scripts', 'annex_enqueue_styles');

function annex_enqueue_styles()
{
  wp_enqueue_style(
    'annex-orange',
    get_parent_theme_file_uri('style.css'),
  );
}
