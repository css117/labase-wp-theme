<?php
/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.4.0
 * @author     Thomas Griffin <thomasgriffinmedia.com>
 * @author     Gary Jones <gamajo.com>
 * @copyright  Copyright (c) 2014, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/thomasgriffin/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 */
require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'labase_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register two plugins - one included with the TGMPA library
 * and one from the .org repo.
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function labase_register_required_plugins() {

    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(

        // This is an example of how to include a plugin pre-packaged with a theme.
        /*array(
            'name'               => 'Contact Form 7', // The plugin name.
            'slug'               => 'contact-form-7', // The plugin slug (typically the folder name).
            'source'             => get_stylesheet_directory() . '/lib/plugins/contact-form-7.4.1.1.zip', // The plugin source.
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
            'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher.
            'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
            'external_url'       => '', // If set, overrides default API URL and points to an external URL.
        ),*/

    array(
            'name'      => 'SF Move Login',
            'slug'      => 'sf-move-login',
            'required'  => true,
        ),
    array(
            'name'      => 'Contact Form 7',
            'slug'      => 'contact-form-7',
            'required'  => true,
        ),
    array(
            'name'      => 'Contact Form 7 Dynamic extension',
            'slug'      => 'contact-form-7-dynamic-text-extension',
            'required'  => false,
        ),
    array(
            'name'      => 'iThemes Security',
            'slug'      => 'better-wp-security',
            'required'  => true,
        ),
    array(
            'name'      => 'W3 Total cache',
            'slug'      => 'w3-total-cache',
            'required'  => true,
        ),
    array(
            'name'      => 'WP Migrate DB',
            'slug'      => 'wp-migrate-db',
            'required'  => true,
        ),
    array(
            'name'      => 'SSH SFTP Updater Support',
            'slug'      => 'ssh-sftp-updater-support',
            'required'  => true,
        ),
		array(
            'name'      => 'WordPress SEO by Yoast',
            'slug'      => 'wordpress-seo',
            'required'  => true,
        ),
		array(
            'name'      => 'WordPress LESS',
            'slug'      => 'wp-less',
            'required'  => true,
        ),
    array(
            'name'      => 'ACF',
            'slug'      => 'advanced-custom-fields',
            'required'  => true,
        ),
    array(
            'name'      => 'ACF Repeater',
            'slug'      => 'acf-repeater',
            'required'  => true,
        ),
    array(
            'name'      => 'Flamingo',
            'slug'      => 'flamingo',
            'required'  => true,
        ),
		array(
            'name'      => 'Regenerate Thumbnails',
            'slug'      => 'regenerate-thumbnails',
            'required'  => true,
        ),
		array(
            'name'      => 'WP Sitemap Page',
            'slug'      => 'wp-sitemap-page',
            'required'  => true,
        ),
		array(
            'name'      => 'WP Better Email',
            'slug'      => 'wp-better-emails',
            'required'  => true,
        ),
		array(
            'name'      => 'Admin menu editor',
            'slug'      => 'admin-menu-editor',
            'required'  => false,
        ),
		array(
            'name'      => 'Enhanced Media Library',
            'slug'      => 'enhanced-media-library',
            'required'  => false,
        ),
		array(
            'name'      => 'Image des catégories',
            'slug'      => 'categories-images',
            'required'  => false,
        ),
		array(
            'name'      => 'TinyMCE Advanced',
            'slug'      => 'tinymce-advanced',
            'required'  => false,
        ),
		array(
            'name'      => 'ReOrder Post Within Categories',
            'slug'      => 'reorder-post-within-categories',
            'required'  => false,
        ),
    );

    /**
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are added into a sprintf, so see the comments at the
     * end of each line for what each argument will be.
     */
    $config = array(
        'default_path' => '',                      // Default absolute path to pre-packaged plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => 'Désactiver les notifications',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
        'strings'      => array(
            'page_title'                      => __( 'Installation des Plugins', 'tgmpa' ),
            'menu_title'                      => __( 'Installer les plugins', 'tgmpa' ),
            'installing'                      => __( 'Installation du plugin: %s', 'tgmpa' ), // %s = plugin name.
            'oops'                            => __( 'Oups, il y a eu un bug.', 'tgmpa' ),
            'notice_can_install_required'     => _n_noop( 'Ce thème requiert: %1$s.', 'Ce thème requiert: %1$s.' ), // %1$s = plugin name(s).
            'notice_can_install_recommended'  => _n_noop( 'Ce thème recommande: %1$s.', 'Ce thème recommande: %1$s.' ), // %1$s = plugin name(s).
            'notice_cannot_install'           => _n_noop( 'Désolé, mais les permissions pour installer le plugin sont insuffisantes. Contactez les autorités concernées.', 'Désolé, mais les permissions pour installer les plugins sont insuffisantes. Contactez les autorités concernées.' ), // %1$s = plugin name(s).
            'notice_can_activate_required'    => _n_noop( 'Un plugin requis est inactif: %1$s.', 'Certains plugins requis sont inactifs: %1$s.' ), // %1$s = plugin name(s).
            'notice_can_activate_recommended' => _n_noop( 'Un plugin recommandé est inactif: %1$s.', 'Certains plugins recommandés sont inactifs: %1$s.' ), // %1$s = plugin name(s).
            'notice_cannot_activate'          => _n_noop( 'Désolé, mais les permissions pour installer le plugin sont insuffisantes. Contactez les autorités concernées.', 'Désolé, mais les permissions pour installer les plugins sont insuffisantes. Contactez les autorités concernées.' ), // %1$s = plugin name(s).
            'notice_ask_to_update'            => _n_noop( 'Ce plugin devrait être mis-à-jour: %1$s.', 'Ces plugins devraient être mis-à-jour: %1$s.' ), // %1$s = plugin name(s).
            'notice_cannot_update'            => _n_noop( 'Désolé, mais les permissions pour installer le plugin sont insuffisantes. Contactez les autorités concernées.', 'Désolé, mais les permissions pour installer les plugins sont insuffisantes. Contactez les autorités concernées.' ), // %1$s = plugin name(s).
            'install_link'                    => _n_noop( "Commencer l'installation", "Commencer les installations" ),
            'activate_link'                   => _n_noop( "Commencer l'activation", "Commencer les activations" ),
            'return'                          => __( "Retourner à l'installateur", 'tgmpa' ),
            'plugin_activated'                => __( 'Le plugin a été activé.', 'tgmpa' ),
            'complete'                        => __( 'Tous les plugins ont été activés. %s', 'tgmpa' ), // %s = dashboard link.
            'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
        )
    );

    tgmpa( $plugins, $config );

}
