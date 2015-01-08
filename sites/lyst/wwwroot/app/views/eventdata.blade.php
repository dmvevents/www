@extends('layout')

@section('content')
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
		//convert json object to php associative array
		$data = json_decode($events, true);
	?>

	<?php

		@foreach ($data['event'] as $event)
		
			$resource_uri = $event['resource_uri'];
			$event_name_text = $event['name']['text'];
			$event_name_html = $event['name']['html'];
			$event_id = $event['id']
			$event_description_text = $event['description']['text'];
			$event_descriptioin_html = $event['description']['html'];
			$organizer_description_text = $event['organizer']['description']['text'];
			$organizer_descriptioin_html = $event['organizer']['description']['html'];
			$organizer_id = $event['organizer']['id'];
			$organizer_name = $event['organizer']['name'];
			$venue_id = $event['venue']['id'];
			$venue_city = $event['venue']['address']['city'];
			$venue_country = $event['venue']['address']['country'];
			$venue_region = $event['venue']['address']['region'];
			$venue_address1 = $event['venue']['address']['address_1'];
			$venue_address2 = $event['venue']['address']['address_2'];
			$venue_country = $event['venue']['address']['country_name'];
			$venue_latitude = $event['venue']['latitude'];
			$venue_longitude = $event['venue']['longitude'];
			$venue_name = $event['venue']['name'];
		
		
		
		@endforeach
	?>
@stop