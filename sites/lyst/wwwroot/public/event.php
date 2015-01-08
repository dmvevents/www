<style type="text/css">
.eb_event_list_item{
  padding-top: 20px;
}
.eb_event_list_title{
  position: absolute;
  left: 220px;
  width: 300px;
  overflow: hidden;
}
.eb_event_list_date{
  padding-left: 20px;
}
.eb_event_list_time{
  position: absolute;
  left: 150px;
}
.eb_event_list_location{
  position: absolute;
  left: 520px;
}
</style>

<?php
    include "Eventbrite.php"; 

    $authentication_tokens = array(
        'app_key'  => 'HAIS6HATRWWU5HZDA3',
        'user_key' => '12555642292424858818');

    $eb_client = new Eventbrite( $authentication_tokens );
?>

<?php 
    try {
        $events = $eb_client->user_list_events();
    } catch ( Exception $e ) {
        // Be sure to plan for potential error cases 
        // so that your application can respond appropriately

        //var_dump($e);
        $events = array();
    }
?>

<?php
$custom_render_function = function($evnt){
    $time = strtotime($evnt->start_date);
    if( isset($evnt->venue) && isset( $evnt->venue->name )){ 
        $venue_name = $evnt->venue->name;
    }else{
        $venue_name = 'online';
    }   
    $event_html = "<div class='eb_event_list_item' id='evnt_div_"
                . $evnt->id ."'><span class='eb_event_list_date'>"
                . strftime('%a, %B %e', $time) . "</span><span class='eb_event_list_time'>" 
                . strftime('%l:%M %P', $time) . "</span><a class='eb_event_list_title' href='"
                . $evnt->url."'>".$evnt->title."</a><span class='eb_event_list_location'>"
                . $venue_name . "</span></div>\n";
    return $event_html;
}
?>

<?= $event_list_html = Eventbrite::eventList( $events, $custom_render_function);?>