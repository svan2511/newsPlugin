<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://github.com/svan2511/Indian-News-Plugin
 * @since      1.0.0
 *
 * @package    Latest_Indian_News
 * @subpackage Latest_Indian_News/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="container">


 <p><?php $max_news = count($global_data_news['articles']); ?>
<label>Title</label>
<input class="widefat" type="text" value="<?php echo $title; ?>" name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>"></p>
  <p><label class="form-check-label" for="flexCheckDefault">
   News For Display
  </label> <input class="widefat" type="number" min="1" max="<?php echo $max_news; ?>" value="<?php echo $news_count; ?>" name="<?php echo $this->get_field_name('news_count'); ?>" id="<?php echo $this->get_field_id('news_count'); ?>">
   </p>
  
  
</div>