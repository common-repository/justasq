<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       justasq.me
 * @since      1.0.0
 *
 * @package    Justasq
 * @subpackage Justasq/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="wrap">
  <h2><?php echo esc_html(get_admin_page_title()); ?></h2>
  <form method="post" name="justasq_widget" action="options.php">
    <?php
      $options = get_option($this->plugin_name);

      $widget_enable = $options['widget_enable'];
      $widget_id = $options['widget_id'];
  
      settings_fields($this->plugin_name);
      do_settings_sections($this->plugin_name);
    ?>

    <fieldset>
      <legend class="screen-reader-text"><span><?php _e('Enable widget', $this->plugin_name);?></span></legend>
      <label for="<?php echo $this->plugin_name;?>-widget_enable">
        <input type="checkbox" class="show-child-if-checked" id="<?php echo $this->plugin_name;?>-widget_enable" name="<?php echo $this->plugin_name;?>[widget_enable]" value="1" <?php checked($widget_enable, 1);?>/>
        <span><?php esc_attr_e('Enable widget', $this->plugin_name);?></span>
      </label>
      <fieldset class="<?php if( '1' != $widget_enable ) echo 'hidden';?>" >
        <p><?php _e('Type in your JustAsq Widget ID here. You can get the ID from your account on <a href="https://missioncontrol.justasq.me">Mission Control</a>.', $this->plugin_name);?></p>
        <legend class="screen-reader-text"><span><?php _e('JustAsq Widget ID', $this->plugin_name);?></span></legend>
        <input type="text" class="regular-text" id="<?php echo $this->plugin_name;?>-widget_id" name="<?php echo $this->plugin_name;?>[widget_id]" value="<?php if(!empty($widget_id)) esc_attr_e($widget_id, $this->plugin_name);?>" placeholder="<?php esc_attr_e('123abc', $this->plugin_name);?>" />
      </fieldset>
    </fieldset>

    <br />
    <a href="#" id="instructionsLink">Click for instructions</a>
    <ol class="hidden" id="instructions">
      <li>Click on generate code for the widget you want to embed on your site.<br /><?php echo '<img src="' . plugins_url( 'images/step-1.jpg', dirname(__FILE__) ) . '" width="70%" /> '; ?></li>
      <li>Open the WordPress integration panel by clicking on the title.<br /><?php echo '<img src="' . plugins_url( 'images/step-2.jpg', dirname(__FILE__) ) . '" width="70%" /> '; ?></li>
      <li>Copy the ID for your widget and paste it in above.<br /><?php echo '<img src="' . plugins_url( 'images/step-3.jpg', dirname(__FILE__) ) . '" width="70%" /> '; ?></li>
    </ol>

    <?php submit_button('Save all changes', 'primary', 'submit', TRUE); ?>
  </form>
</div>
