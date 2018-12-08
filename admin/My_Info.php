<?php

class My_Info extends WP_Widget{

    function __construct(){
        $widget_ops =[
            'classname' => 'the_html_class',
            'description' => "This is the description"
        ];

        parent::__construct('the_html_id','XXXXXXXXXXXX',$widget_ops);
    }

    public function form($instance){
        $defaults = [
            'title' => 'Give a Title',
            'movie' => 'Movie name',
            'song' => '',
            'address' => ''
        ];

        $instance = wp_parse_args(
            (array) $instance,
             $defaults
        );

        $title = $instance['title'];
        $movie = $instance['movie'];
        $song = $instance['song'];
        $address = $instance['address']; 
        ?>
        <!-- HTML BEGINS -->
        <p>
            Title:
            <input class="widefat" name="<?= $this->get_field_name('title')?>" type="text" value="<?= esc_attr($title)?>">
        </p>
        <p>
            Favorite Movie:
            <input type="text" class="widefat" name="<?= $this->get_field_name('movie')?>"value="<?= esc_attr($movie)?>">
        </p>
        <p>
            Favorite Song:
            <textarea class="widefat" name="<?= $this->get_field_name('song')?>" id="" cols="30" rows="10"><?= esc_attr($song)?></textarea>
        </p>
        <p>
            Address:
            <input type="text" class="widefat" name="<?= $this->get_field_name('address')?>" value="<?= esc_attr($address)?>">
        </p>
        <!-- HTML Ends -->
        <?php
    }

    public function widget($args, $instance){

        extract($args);
        echo $before_widget;
        $title = apply_filters('widget_title', $instance['title']);
        $movie = empty($instance['movie']) ?
         '&nbsp' : $instance['movie'];
        $song = empty($instance['song']) ? '&nbsp;' : $instance['song'];
        
        $address = empty($instance['address']) ? '&nbsp' : $instance['address'];

        if (!empty($title)) {
            echo $before_title.$title.$after_title;
        }
        echo "<p>Fav Movie: $movie</p>"; 
        echo "<p>Fav Song: $song</p>"; 
        echo "<p>Address: $address</p>"; 
        echo $after_widget;
    }

    public function update($new_instance, $old_instance){
        $instance =$old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['movie'] = strip_tags($new_instance['movie']);
        $instance['address'] = strip_tags($new_instance['address']);
        $instance['song'] = strip_tags($new_instance['song']);

        return $instance;
    }

}