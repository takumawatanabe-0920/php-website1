<?php
/*
Plugin Name: Signature After Content
Description: This plugin appends a signature after the content of each post.
Version: 1.0
Author: Takuma
*/

class SignatureAfterContentPlugin
{
  function __construct()
  {
    add_action('admin_menu', array($this, 'addAdminPage'));
    add_action('admin_init', array($this, 'setupSettings'));
    add_filter('the_content', array($this, 'appendSignature'));

    add_filter('the_content', array($this, 'adToEndOfPost'));
    add_action('wp_enqueue_scripts', array($this, 'enqueue_styles'));
    add_shortcode('donation_banner', array($this, 'render_shortcode'));
  }

  function addAdminPage()
  {
    add_options_page('Signature Settings', 'Signature Settings', 'manage_options', 'signature-settings-page', array($this, 'adminPageHTML'));
  }

  function adminPageHTML()
  {
?>
    <div class="wrap">
      <h1>Signature Settings</h1>
      <form action="options.php" method="POST">
        <?php
        settings_fields('signatureplugin');
        do_settings_sections('signature-settings-page');
        submit_button();
        ?>
      </form>
    </div>
  <?php
  }

  function setupSettings()
  {
    add_settings_section('signature_first_section', null, null, 'signature-settings-page');

    add_settings_field('signature_enabled', 'Enable Signature', array($this, 'enabledHTML'), 'signature-settings-page', 'signature_first_section');
    register_setting('signatureplugin', 'signature_enabled', array('sanitize_callback' => 'sanitize_text_field', 'default' => '1'));

    add_settings_field('signature_text', 'Signature Text', array($this, 'signatureHTML'), 'signature-settings-page', 'signature_first_section');
    register_setting('signatureplugin', 'signature_text', array('sanitize_callback' => 'sanitize_text_field', 'default' => 'Best regards, Admin'));
  }

  function enabledHTML()
  {
  ?>
    <input type="checkbox" name="signature_enabled" value="1" <?php checked(get_option('signature_enabled'), '1') ?>>
  <?php
  }

  function signatureHTML()
  {
  ?>
    <textarea name="signature_text" rows="4" cols="50"><?php echo esc_attr(get_option('signature_text')); ?></textarea>
<?php
  }

  function appendSignature($content)
  {
    if (get_option('signature_enabled', '1')) {
      $signature = '<p>' . esc_html(get_option('signature_text')) . '</p>';
      return $content . $signature;
    }
    return $content;
  }

  function adToEndOfPost($content)
  {
    $content .= '<p>Thank you for reading!</p>';
    // $content .= $this->render_shortcode();
    return $content;
  }

  public function enqueue_styles()
  {
    wp_enqueue_style('donation-banner-css', plugin_dir_url(__FILE__) . 'css/donation-banner.css');
  }

  public function render_shortcode()
  {
    $html = '
            <div class="donation-banner">
                <p>Please support us with a $5 donation!</p>
                <a href="https://example.com/donate" class="donate-button">Donate Now</a>
            </div>';
    return $html;
  }
}

$signatureAfterContentPlugin = new SignatureAfterContentPlugin();
?>