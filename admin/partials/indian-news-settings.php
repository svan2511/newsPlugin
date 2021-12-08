<h2>Enter Your Api Key Here </h2>
<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
  <input type="text" class="regular-text" placeholder="Enter Key" value="<?php if(get_option( 'news_api_key_val' )) { echo get_option( 'news_api_key_val' ); }?>" name="news_api_key">
  <input type="submit" class="button" value="Submit Key" name="sub_key">
</form>
