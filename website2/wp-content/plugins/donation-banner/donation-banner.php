<?php
/*
Plugin Name: Donation Banner
Description: Adds a donation banner block to the post editor.
Version: 1.0
Author: Your Name
*/

class DonationBanner
{
  function __construct()
  {
    add_action('enqueue_block_editor_assets', array($this, 'adminAssets'));
    add_action('wp_enqueue_scripts', array($this, 'enqueue_styles'));
  }

  function adminAssets()
  {
    wp_enqueue_script(
      'donation-banner-block',
      plugin_dir_url(__FILE__) . 'build/index.js',
      array('wp-blocks', 'wp-element', 'wp-editor'),
      filemtime(plugin_dir_path(__FILE__) . 'build/index.js')
    );
  }

  function enqueue_styles()
  {
    wp_enqueue_style(
      'donation-banner-style',
      plugin_dir_url(__FILE__) . 'css/style.css',
      array(),
      filemtime(plugin_dir_path(__FILE__) . 'css/style.css')
    );
  }
}

new DonationBanner();
