<?php

/**
 * Plugin Name
 *
 * @package           PluginPackage
 * @author            Your Name
 * @copyright         2019 Your Name or Company Name
 * @license           GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:       Alecad Tuto Plugin
 * Plugin URI:        https://github.com/alecad-tuto-plugin
 * Description:       Alecad Plugin Development tutorial practice plugin
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Ashraf Uddin
 * Author URI:        https://ashrafbd.com
 * Text Domain:       alcd-plgn
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Update URI:        https://github.com/alecad-tuto-plugin/
 */

defined('ABSPATH') or die('You can\t be here');

class AlecadTutoPlugin
{
    public function __construct()
    {
        add_action('init', [$this, 'alcd_plgn_custom_post_type']);
    }

    public function activate()
    {
        echo 'Plugin activated';
    }

    public function deactivate()
    {
        echo 'Plugin deactivated';
    }

    public function alcd_plgn_custom_post_type()
    {
        register_post_type('books',
            [
                'labels' => [
                    'name' => __('Books', 'alcd-plgn'),
                    'singular_name' => __('Book', 'alcd-plgn'),
                ],
                'public' => true,
                'has_archive' => true,
                'rewrite' => array('slug' => 'books'),
            ]
        );
    }

}

if (class_exists('AlecadTutoPlugin')) {
    $alecadTutoPlugin = new AlecadTutoPlugin();
}

//activation
register_activation_hook(__FILE__, [$alecadTutoPlugin, 'activate']);

//deactivation
register_deactivation_hook(__FILE__, [$alecadTutoPlugin, 'deactivate']);
