<?php
/*
Plugin Name: Are You Paying Attention
Description: This is a plugin that checks if you are paying attention.
Version: 1.0
Author: Takuma
*/

if (!defined('ABSPATH')) {
  exit;
}

class AreYouPayingAttention
{
  function __construct()
  {
    add_action('enqueue_block_editor_assets', array($this, 'adminAssets'));
    // add_filter('the_content', array($this, 'adToEndOfPost'));
  }

  function adminAssets()
  {
    wp_enqueue_script('ournewblocktype', plugin_dir_url(__FILE__) . 'build/index.js', array('wp-blocks', 'wp-element'));
  }

  // function adToEndOfPost($content)
  // {
  //   $content .= '<p>Thank you for reading!!!</p>';
  //   return $content;
  // }
}

$areYouPayingAttention = new AreYouPayingAttention();
