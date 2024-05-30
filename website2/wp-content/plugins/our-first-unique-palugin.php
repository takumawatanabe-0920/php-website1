<?php

/*
Plugin Name: Our First Unique Plugin
Description: This is our first unique plugin.
Version: 1.0
Author: Takuma
Text Domain: wcpdomain
Domain Path: /languages
*/

class WordCountAndTimePlugin
{
  function __construct()
  {
    add_action('admin_menu', array($this, 'adminPage'));
    add_action('admin_init', array($this, 'settings'));
    add_filter('the_content', array($this, 'ifWrap'));
    add_filter('the_content', array($this, 'createHTML'));
    add_action('plugins_loaded', array($this, 'languages'));
  }

  function languages()
  {
    load_plugin_textdomain('wcpdomain', false, dirname(plugin_basename(__FILE__)) . '/languages');
  }

  function ifWrap()
  {
    if (
      is_main_query() and is_single() and (
        get_option('wcp_wordcount', '1')
        or get_option('wcp_charactercount', '1')
        or get_option('wcp_readtime', '1')
      )
    ) {
    }
  }

  function settings()
  {
    add_settings_section('wcp_first_section', null, null, 'word-count-settings-page');
    add_settings_field('wcp_location', 'Display Location', array($this, 'locationHTML'), 'word-count-settings-page', 'wcp_first_section');
    register_setting('wordcountplugin', 'wcp_location', array('sanitize_callback' => array($this, 'sanitizeLocation'), 'default' => '0'));

    add_settings_field('wcp_headline', 'Headline', array($this, 'headlineHTML'), 'word-count-settings-page', 'wcp_first_section');
    register_setting('wordcountplugin', 'wcp_headline', array('sanitize_callback' => 'sanitize_text_field', 'default' => 'Post Statistics'));

    add_settings_field('wcp_wordcount', 'Word Count', array($this, 'wordCountHTML'), 'word-count-settings-page', 'wcp_first_section');
    register_setting('wordcountplugin', 'wcp_wordcount', array('sanitize_callback' => 'sanitize_text_field', 'default' => '0'));

    add_settings_field('wcp_charactercount', 'Character Count', array($this, 'characterCountHTML'), 'word-count-settings-page', 'wcp_first_section');
    register_setting('wordcountplugin', 'wcp_charactercount', array('sanitize_callback' => 'sanitize_text_field', 'default' => '0'));

    add_settings_field('wcp_readtime', 'read time', array($this, 'readTimeHTML'), 'word-count-settings-page', 'wcp_first_section');
    register_setting('wordcountplugin', 'wcp_readtime', array('sanitize_callback' => 'sanitize_text_field', 'default' => '1'));
  }

  function sanitizeLocation($input)
  {
    if ($input !== '0' and $input !== '1') {
      add_settings_error('wcp_location', 'wcp_location_error', 'Display location must be either beginning or end of post.');
      return get_option('wcp_location');
    }
    return $input;
  }

  function locationHTML()
  {
?>
    <select name="wcp_location">
      <option value="0" <?php selected(get_option('wcp_location'), '0') ?>>
        Beginning of post
      </option>
      <option value="1" <?php selected(get_option('wcp_location'), '1') ?>>
        End of post
      </option>
    </select>
  <?php
  }

  function headlineHTML()
  {
  ?>
    <input type="text" name="wcp_headline" value="<?php echo esc_attr(get_option('wcp_headline')) ?>">
  <?php
  }

  function wordCountHTML()
  {
  ?>
    <input type="checkbox" name="wcp_wordcount" value="1" <?php checked(get_option('wcp_wordcount'), '1') ?>>
  <?php
  }

  function characterCountHTML()
  {
  ?>
    <input type="checkbox" name="wcp_charactercount" value="1" <?php checked(get_option('wcp_charactercount'), '1') ?>>
  <?php
  }

  function readTimeHTML()
  {
  ?>
    <input type="checkbox" name="wcp_readtime" value="1" <?php checked(get_option('wcp_readtime'), '1') ?>>
  <?php
  }

  function adminPage()
  {
    add_options_page('Word Count Settings', __('Word Count', 'wcpdomain'), 'manage_options', 'word-count-settings-page', array($this, 'ourHtml'));
  }

  function ourHtml()
  {
  ?>
    <div class="wrap">
      <h1>
        Word Count Settings
      </h1>
      <form action="options.php" method="POST">
        <?php
        settings_fields('wordcountplugin');
        do_settings_sections('word-count-settings-page');
        submit_button();
        ?>
    </div>
<?php
  }

  function createHTML($content)
  {
    $html = '<h3>' . get_option('wcp_headline', 'Post Statistics') . '</h3><p>';

    if (get_option('wcp_wordcount', '1') or get_option('wcp_readtime', '1')) {
      $wordCount = str_word_count(strip_tags($content));
    }

    if (get_option('wcp_wordcount', '1')) {
      $html .= __('This post has', 'wcpdomain') . ' ' . $wordCount . ' ' . __('words.', 'wcpdomain') . '<br>';
    }

    if (get_option('wcp_charactercount', '1')) {
      $html .= 'This post has ' . strlen(strip_tags($content)) . ' characters. <br>';
    }

    if (get_option('wcp_readtime', '1')) {
      $html .= 'This post will take about ' . round($wordCount / 225) . ' minute(s) to read. <br>';
    }

    if (get_option('wcp_location', '0') === '0') {
      $html .= $html . $content;
    }

    return $content . $html . '</p>';
  }
}

$wordCountAndTimePlugin = new WordCountAndTimePlugin();
