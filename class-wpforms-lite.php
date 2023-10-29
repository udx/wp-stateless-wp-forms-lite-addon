<?php
/**
 * Compatibility Plugin Name: Contact Form by WPForms – Drag & Drop Form Builder for WordPress
 * Compatibility Plugin URI: https://wordpress.org/plugins/wpforms-lite/
 *
 * Compatibility Description: Disables filename randomization for WPForms pages.
 *
 */

namespace WPSL\WPForms;

use wpCloud\StatelessMedia\Compatibility;

class WPForms extends Compatibility {
  protected $id = 'wpforms';
  protected $title = 'WPForms';
  protected $constant = 'WP_STATELESS_COMPATIBILITY_WPFORMS';
  protected $description = 'Ensures compatibility with WPForms.';
  protected $plugin_file = ['wpforms-lite/wpforms.php', 'wpforms/wpforms.php'];

  /**
   * @param $sm
   */
  public function module_init($sm) {
    // exclude randomize_filename from wpforms page
    if (!empty($_GET['page']) && $_GET['page'] == 'wpforms-builder') {
        remove_filter('sanitize_file_name', array("wpCloud\StatelessMedia\Utility", 'randomize_filename'), 10);
    }
  }
}
