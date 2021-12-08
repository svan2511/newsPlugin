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


 <ul class="list-group">
 <?php $i=1;  foreach( $global_data['articles'] as $single_news )  { 
 if($i<= $instance['news_count'] ) { ?>
  <li class="list-group-item disabled" aria-disabled="true">
  <img src="<?php echo $single_news['urlToImage']; ?>" />
  <p> <?php echo $single_news['title']; ?>  <a target="_blank" href="<?php echo $single_news['url']; ?>"><b>Read More</b></a></p>

  </li>
 <?php } $i++;  } ?>
</ul>
</div>