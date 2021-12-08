<?php 


class Indian_news extends WP_Widget
{
	
	public function __construct()
	{ 
		parent::__construct('indian-news','Indian News');
		add_action('widgets_init', function(){
			
			register_widget('Indian_news');
		});
		
	}
	
	
	public function form( $instance )
	{
		//echo "<pre>";print_r($instance);die;
		$title = isset($instance['title']) ? $instance['title']:"";
		$news_count = isset($instance['news_count']) ? $instance['news_count']: 2;
		$allnews = $this->get_all_news();
		$global_data_news = json_decode($allnews,true);
		
		ob_start();
		include( plugin_dir_path( __FILE__ ) . 'partials/latest-indian-news-admin-display.php');
		$layout_data = ob_get_contents();
        ob_end_clean();
		echo $layout_data;
				
		
		
	}
	// Method which save data in database for this widget
	
	 public function update( $new_instance , $old_instance )
	{
		$instance['title'] = isset($new_instance['title']) ? $new_instance['title']:"";
		$instance['news_count'] = isset($new_instance['news_count']) ? $new_instance['news_count']:"";
		//echo "<pre>";print_r($instance);die;
		return $instance;
	} 
	
	// Method which display data on frontend for this widget
	
	 public function widget( $args , $instance )
	{
				//echo "<pre>";print_r($instance);die;
				echo $args['before_title'];
				if(isset($instance['title']))
				{
					echo $instance['title'];
				}
				echo $args['after_title'];
				$news = $this->get_all_news();
				echo $args['before_widget'];
				$global_data = json_decode($news,true);
				//echo "<pre>";print_r($global_data);die;
				if($global_data['status'] == "error")
				{
					ob_start();
				    include( plugin_dir_path( __FILE__ ) . 'partials/latest-indian-news-front-display-error.php');
				}
				else
				{
				ob_start();
				include( plugin_dir_path( __FILE__ ) . 'partials/latest-indian-news-front-display.php');
				}
				$front_data = ob_get_contents();
				ob_end_clean();
				echo $front_data;
				echo $args['after_widget'];	
				
				
				
	}

    public function get_all_news()
	{
		$api_key = get_option( 'news_api_key_val' );
		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, "https://newsapi.org/v2/top-headlines?country=in&apiKey=$api_key");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

		$result = curl_exec($ch);
	
		if (curl_errno($ch)) {
			//die('here');
			echo 'Error:' . curl_error($ch);
		}
		curl_close ($ch);
		return $result;
	}
	
}

$Indian_news = new Indian_news();