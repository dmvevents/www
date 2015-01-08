	
	
<?php

	//======================================================================
	// EVENTBRITE FUNCTIONS 
	//======================================================================
	
	/**
	 * Connect to eventbrite api
	 *
	 * @return Eventbrite $eb_client -> returns new Eventbrite client connection
	 */ 
	 
	function connectToEventBrite(){
	
		include "Eventbrite.php"; 

		//Connect to database using keys
		$authentication_tokens = array(
		
			//Set you application keys
			'app_key'  => 'HAIS6HATRWWU5HZDA3',
			'user_key' => '12555642292424858818');
			
		//Create connection instance
		$eb_client = new Eventbrite( $authentication_tokens );
		
		return $eb_client;
	}
	
	/**
	 * Call user_list_events method from Eventbrite api
	 *
	 * @param  Eventbrite $eb_client -> Eventbrite client connection
	 * @return object $events -> Returns array of events as objects
	 */ 

	
	function callUserListEvents ($eb_client) {

		//Call user list event method to get list of events	
		try {
			$events = $eb_client->event_list_attendees( array('id'=>'11794300069') );
		} catch ( Exception $e ) {
			// Be sure to plan for potential error cases 
			// so that your application can respond appropriately

			//var_dump($e);
			$events = array();
		}
		
		return $events;
	}
	
	/**
	 * Interate through array and assign variables
	 *
	 * @param  object $events -> Array of events  object to be processed
	 * @return object $events -> rReturns array of events as objects
	 */ 

	
	function createVariables(){
	
		//Insert Query
		$new_query = "INSERT INTO eventBriteMyEvents (
		event_id, 
		resource_uri, 
		event_name, 
		venue_id,venue_city,
		venue_country,
		venue_region,
		venue_address1,
		venue_latitude,
		venue_longitude,
		venue_name) VALUES";
	
		//connect to Eventbrite APU
		$new_eb_client = connectToEventBrite();	
		
		//call user list method and return eventlist 
		$new_event_list = callUserListEvents($new_eb_client);
		
		var_dump($new_event_list);
		/*
		if( isset($new_event_list->attendees)){
	
			
			//connect to MySQL server
			$new_conn = connectToMysql();
			
			//create query to table construction database
			$new_sql = createNewTableQuery();

			//create database -> create a boolen to cheak
			$check_conn = createNewTables($new_conn,$new_sql);
			
			//check if table was created
			if ($check_conn===TRUE){
			
				
				//Create array of insert strings query
				$sql = array(); 
				
				var_dump ($new_event_list);

				
				foreach( $new_event_list->events as $evnt ){
					if( isset($evnt->event ) ){
						
						$sql[] = 	"("	
									.mysqli_real_escape_string($new_conn,$evnt->event->id ).",'"
									.mysqli_real_escape_string($new_conn, $evnt->event->url) ."','"
									.mysqli_real_escape_string($new_conn, $evnt->event->title) ."',"
									.intval($evnt->event->venue->id ).",'"
									.mysqli_real_escape_string($new_conn, $evnt->event->venue->city) ."','"
									.mysqli_real_escape_string($new_conn, $evnt->event->venue->country) ."','"
									.mysqli_real_escape_string($new_conn, $evnt->event->venue->region) ."','"
									.mysqli_real_escape_string($new_conn, $evnt->event->venue->address) ."',"
									.floatval($evnt->event->venue->latitude) .","
									.floatval($evnt->event->venue->longitude) .",'"
									.mysqli_real_escape_string($new_conn, $evnt->event->venue->name) ."')";
									
									
									$new_conn ->query ($new_query."("	
										.intval($evnt->event->id ).",'"
										.mysqli_real_escape_string($new_conn, $evnt->event->url) ."','"
										.mysqli_real_escape_string($new_conn, $evnt->event->title) ."',"
										.intval($evnt->event->venue->id ).",'"
										.mysqli_real_escape_string($new_conn, $evnt->event->venue->city) ."','"
										.mysqli_real_escape_string($new_conn, $evnt->event->venue->country) ."','"
										.mysqli_real_escape_string($new_conn, $evnt->event->venue->region) ."','"
										.mysqli_real_escape_string($new_conn, $evnt->event->venue->address) ."',"
										.floatval($evnt->event->venue->latitude) .","
										.floatval($evnt->event->venue->longitude) .",'"
										.mysqli_real_escape_string($new_conn, $evnt->event->venue->name) ."')") or die ($new_conn->error);
						}
				}
				
			
				//Dump to screen
				//var_dump ($sql);
			
				//mysqli_query($new_conn, $new_query.implode(',', $sql));
			//}
			
			//Dump to screen
			var_dump ($sql);

			//close connection
			mysqli_close($new_conn);
		}
		*/
	}
	
	
	//======================================================================
	// MySQL FUNCTIONS 
	//======================================================================

	
	/**
	 * Connect to MySQL Database
	 *
	 * @return mysqli $conn -> Mysql database connection
	 */ 

	function connectToMysql() {
		
		//Establish database variables 
		$servername = "localhost";
		$username = "lystadmin";
		$password = "lystadmin";
		$dbname = "lyst";

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		
		return $conn;
	}
	
	/**
	 * Define sql query to create table
	 *
	 * @return string $sql -> query to create tables
	 */ 

	function createNewTableQuery() {
		
		//define tables headers
		$sql = "CREATE TABLE eventBriteMyEvents (
		id INT(16) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
		event_id VARCHAR(30) NOT NULL,
		resource_uri VARCHAR(200) NOT NULL,
		event_name TEXT NOT NULL,
		venue_id INT(20) NOT NULL,
		venue_city VARCHAR(20) NOT NULL,
		venue_country VARCHAR(20) NOT NULL,
		venue_region VARCHAR(5),
		venue_address1 VARCHAR(50) NOT NULL,
		venue_latitude DECIMAL(8, 5),
		venue_longitude DECIMAL(8, 5),
		venue_name TEXT NOT NULL)";
		
		return $sql;
	}


	/**
	 * Create new database, else print error
	 *
	 * @param  mysqli $conn -> Mysql database connection
	 * @return boolean $is_conn -> returns true if query was excuted
	 */ 

	 
	function createNewTables ($conn,$sql){
				
		//create new table, if false print error
		if ($conn->query($sql) === TRUE) {
			echo "Table MyEventcreated successfully";
			$is_conn=TRUE;
		} else {
			echo "Error creating table: " . $conn->error;
			$is_conn=FALSE;
		}
		
		return $is_conn;
	}
	
	createVariables();

?>