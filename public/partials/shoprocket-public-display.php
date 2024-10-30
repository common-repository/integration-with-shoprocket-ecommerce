<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Shoprocket
 * @subpackage Shoprocket/public/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<?php echo '<input type="hidden" name="sr-companyid" id="sr-companyid" value="' . $this->options['shoprocket_id'] . '"  />';?>
<div id="sr-basket-widget" class="">
    <div class="sr-basket-widget-inner" id="sr-basket-button">
        Cart <span class="sr-confirm-amount"> (0) </span>
    </div>
</div>