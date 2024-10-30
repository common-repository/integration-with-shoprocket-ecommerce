<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Shoprocket
 * @subpackage Shoprocket/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<div class="wrap">
    <h2>Shoprocket Plugin Settings</h2>
    <?php
    $shoprocket_help = 'Shoprocket integrates the <a href="https://shoprocket.co">Shoprocket</a> service into your WP
        site. You must have a Shoprocket account to use this. If you do not, then please 
        <a href="https://shoprocket.co/signup"> sign up for Shoprocket</a>. Then, add your Shoprocket
        ID to the plugin settings.';
    _e("<div><p>" . $shoprocket_help . "</p></div>");?>
    <form action="options.php" method="post" name="shoprocketForm">
        <?php
            settings_fields('shoprocket_options_group');
            do_settings_sections('shoprocket_settings_page');
            submit_button();
        ?>        
    </form>
</div>
