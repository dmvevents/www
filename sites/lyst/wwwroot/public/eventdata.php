<?php

	//======================================================================
	// CONNECTION METHODS
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
	 * Connect to eventbrite api
	 *
	 * @return Eventbrite $eb_client -> returns new Eventbrite client connection
	 */ 
	 
	function connectToEventBrite(){
	
		include "Eventbrite.php"; 

		//Connect to database using keys
		$authentication_tokens = array(
		
			//Set you application keys
			'app_key'  => 'U6MUTGOKE53PBF247W',
			'user_key' => '139148252588073398907');
			
		//Create connection instance
		$eb_client = new Eventbrite( $authentication_tokens );
		
		return $eb_client;
	}
	
	//Global connect to Eventbrite API
	$eb_client = connectToEventBrite();	
	
	//Global connect to MySQL server
	$conn = connectToMysql();
	
	//======================================================================
	// METHOD TO CREATE DATABASE 
	//======================================================================
	
	/**
	 * Create new database, else print error
	 *
	 * @param  mysqli $conn -> Mysql database connection
	 * @return boolean $is_conn -> returns true if query was excuted
	 */ 
	 
	function createNewTable ($sql){
	
		global $conn;
				
		//create new table, if false print error
		if ($conn->query($sql) === TRUE) {
			
			echo "Table created successfully";
			$is_conn=TRUE;
		} else {
		
			echo "Error creating table: " .$conn->error;
			$is_conn=FALSE;
		}
		
		return $is_conn;
	}
	
	//======================================================================
	// METHODS TO CONSTUCT EVENT QUERY
	//======================================================================
	
	/**
	 * Call user_list_events method from Eventbrite api
	 *
	 * @param  Eventbrite $eb_client -> Eventbrite client connection
	 * @return object $events -> Returns array of events as objects
	 */ 

	function getListOfEvents () {

		global $eb_client;
		
		//Call user list event method to get list of events	
		try {
			$events = $eb_client->user_list_events();
		} catch ( Exception $e ) {
			
			// Be sure to plan for potential error cases 
			// so that your application can respond appropriately

			//var_dump($e);
			$events = array();
		}
		
		return $events;
	}
	
	//----------------------------------------------------------------------
	// Methods to create query for new event table
	//----------------------------------------------------------------------
	
	/**
	 * Define sql query to create table
	 *
	 * @return string $sql -> query to create tables
	 */ 
	 
	function getEventTableFields() {
		
		$sql = "CREATE TABLE eventBriteMyEvents (
		id INT(16) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL, 
		event_id VARCHAR(30) NOT NULL UNIQUE KEY,
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
	
	//----------------------------------------------------------------------
	// Methods to create query to insert event data from EB into table 
	//----------------------------------------------------------------------
	
	function getEventFeildsToInsert (){
	
		//Insert Query Feilds
		$sql = "INSERT INTO eventBriteMyEvents (
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
		
		return $sql;
	
	}
	
	function getEventDataToInsert ($event_list){
		
		global $conn;
		
		//Create array of insert strings query
		$sql = array(); 
	
		foreach( $event_list->events as $evnt ){
			if( isset($evnt->event ) ){
				$sql[] = 	"("	
					.mysqli_real_escape_string($conn,$evnt->event->id ).",'"
					.mysqli_real_escape_string($conn, $evnt->event->url) ."','"
					.mysqli_real_escape_string($conn, $evnt->event->title) ."',"
					.intval($evnt->event->venue->id ).",'"
					.mysqli_real_escape_string($conn, $evnt->event->venue->city) ."','"
					.mysqli_real_escape_string($conn, $evnt->event->venue->country) ."','"
					.mysqli_real_escape_string($conn, $evnt->event->venue->region) ."','"
					.mysqli_real_escape_string($conn, $evnt->event->venue->address) ."',"
					.floatval($evnt->event->venue->latitude) .","
					.floatval($evnt->event->venue->longitude) .",'"
					.mysqli_real_escape_string($conn, $evnt->event->venue->name) ."')";
					
					createAttendeeList($evnt->event->id);

			}
		}
		
		return $sql;
	}
	
	//======================================================================
	// METHODS TO CONSTUCT ATTENDEE QUERY
	//======================================================================
	
	function getAttendeeList($id) {
		
		global $eb_client;
	
		try {
			$attendees = $eb_client->event_list_attendees( array('id'=>$id) );
		} catch ( Exception $e ){ 
		
			//var_dump($e);
			$attendees = array();
		}
		
		return $attendees;
	}
	
	//----------------------------------------------------------------------
	// Methods to create query to constuct attendee table
	//----------------------------------------------------------------------
	
	function getAttendeeTableFields() {
		
		//Define tables headers
		$sql = "CREATE TABLE eventBriteAttendees (
			id INT(16) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL, 
			first_name VARCHAR(30) NOT NULL,
			last_name VARCHAR(30) NOT NULL,
			birth_date VARCHAR(30),
			age VARCHAR(30),
			gender VARCHAR(10),	
			email VARCHAR(100) NOT NULL,
			cell_phone VARCHAR(20),
			home_address VARCHAR(100),
			home_address_2 VARCHAR(30),
			home_city VARCHAR(100),
			home_country VARCHAR(20),
			home_country_code VARCHAR(10),
			home_phone VARCHAR(30),
			home_postal_code VARCHAR(10),
			home_region VARCHAR(30),
			created VARCHAR(30),
			modified VARCHAR(30),
			attendee_id VARCHAR(20),
			ticket_id VARCHAR(20),
			event_id VARCHAR(30),
			event_date VARCHAR(30),
			order_id VARCHAR(20),
			order_type VARCHAR(60),
			amount_paid VARCHAR(30),
			quantity VARCHAR(30),
			blog VARCHAR(30),
			company VARCHAR(30),
			job_title VARCHAR(30),
			website TEXT )";
		
		return $sql;
	}
	
	//----------------------------------------------------------------------
	// Methods to create query to insert attendee data from EB into tables 
	//----------------------------------------------------------------------
	
	function getAttendeeFieldsToInsert() {
		
		//Insert Query Feilds
		$sql = "INSERT INTO eventBriteAttendees ( 
			first_name,
			last_name,
			birth_date,
			age ,
			gender,	
			email,
			cell_phone,
			home_address,
			home_address_2,
			home_city,
			home_country,
			home_country_code,
			home_phone,
			home_postal_code,
			home_region,
			created,
			modified,
			attendee_id,
			ticket_id,
			event_id,
			event_date,
			order_id,
			order_type,
			amount_paid,
			quantity,
			blog,
			company,
			job_title,
			website) VALUES";
		
		return $sql;
	}
	
	function getAttendeeDataToInsert ($attendee_list) {
		
		global $conn;
		
		//Create array of attendees to insert in to database
		$sql = array(); 
		
		foreach( $attendee_list->attendees as $attend ){
			if( isset($attend->attendee ) ){
								
					$sql[] = "('"
					.mysqli_real_escape_string($conn,$attend->attendee->first_name) ."','"
					.mysqli_real_escape_string($conn,$attend->attendee->last_name) ."','"
					.mysqli_real_escape_string($conn,$attend->attendee-> birth_date) ."','"
					.mysqli_real_escape_string($conn,$attend->attendee-> age) ."','"
					.mysqli_real_escape_string($conn,$attend->attendee->gender) ."','"	
					.mysqli_real_escape_string($conn,$attend->attendee->email) ."','"
					.mysqli_real_escape_string($conn,$attend->attendee->cell_phone) ."','"
					.mysqli_real_escape_string($conn,$attend->attendee->home_address) ."','"
					.mysqli_real_escape_string($conn,$attend->attendee->home_address_2) ."','"
					.mysqli_real_escape_string($conn,$attend->attendee->home_city) ."','"
					.mysqli_real_escape_string($conn,$attend->attendee->home_country) ."','"
					.mysqli_real_escape_string($conn,$attend->attendee->home_country_code) ."','"
					.mysqli_real_escape_string($conn,$attend->attendee->home_phone) ."','"
					.mysqli_real_escape_string($conn,$attend->attendee->home_postal_code) ."','"
					.mysqli_real_escape_string($conn,$attend->attendee->home_region) ."','"
					.mysqli_real_escape_string($conn,$attend->attendee-> created) ."','"
					.mysqli_real_escape_string($conn,$attend->attendee-> modified) ."','"
					.mysqli_real_escape_string($conn,$attend->attendee->id) ."','"
					.mysqli_real_escape_string($conn,$attend->attendee->ticket_id) ."','"
					.mysqli_real_escape_string($conn,$attend->attendee->event_id) ."','"
					.mysqli_real_escape_string($conn,$attend->attendee->event_date) ."','"
					.mysqli_real_escape_string($conn,$attend->attendee->order_id) ."','"
					.mysqli_real_escape_string($conn,$attend->attendee->order_type) ."','"
					.mysqli_real_escape_string($conn,$attend->attendee->amount_paid) ."','"
					.mysqli_real_escape_string($conn,$attend->attendee->quantity ) ."','"
					.mysqli_real_escape_string($conn,$attend->attendee->blog) ."','"
					.mysqli_real_escape_string($conn,$attend->attendee->company) ."','"
					.mysqli_real_escape_string($conn,$attend->attendee->job_title) ."','"
					.mysqli_real_escape_string($conn,$attend->attendee->website) ."')";

			}
		}
		return $sql;
	}
	
	
	//======================================================================
	// Methods To Insert Data 
	//======================================================================
	
	function insertAllRows ($feilds, $data){
	
		global $conn;
		
		//Run tables insert query			
		$conn-> query($feilds.implode(',', $data)) or die ($conn -> error);
	}
	
	function insertRows($feilds, $data){
		
		global $conn;
						
		foreach ($data as $new_row){

			$conn -> query($feilds.$new_row);
			
			if ($conn->error) echo $conn->error."<br>\r\n";		
		}
	}
	
	//======================================================================
	// Main method to conctruct query and insert data
	//======================================================================
	
	/**
	 * Interate through array and assign variables
	 *
	 * @param  object $events -> Array of events  object to be processed
	 * @return object $events -> rReturns array of events as objects
	 */ 

	function createEventList (){
		
		global $eb_client;
		global $conn;
		$event_list = getListOfEvents();
		$feilds_to_insert = getEventFeildsToInsert ();
		$feild_data = getEventDataToInsert($event_list);
		$table_fields = getEventTableFields();	

		
		if( isset($event_list->events)){
				
			//Check to see if table exsist
			$result = $conn -> query ("SHOW TABLES LIKE 'eventBriteMyEvents'");
			$tableExists = $result -> num_rows > 0;
			
			if (!$tableExists){
			
				echo "Event table does not exist, creating it now ...<br>\r\n";
				
				//create query for table feild construction
				
				//create database -> create a boolean to check
				$check_conn = createNewTable($table_fields);	
			
				//check if table was created
				if ($check_conn===TRUE)
					insertAllRows ($feilds_to_insert, $feild_data);		
			}
			else{
				
				echo "Events table exist, adding data ...<br>\r\n";
				insertRows($feilds_to_insert, $feild_data);
			}
		}
	}
	
	function createAttendeeList($id){
	
		global $eb_client;
		global $conn;
		$attendee_list = getAttendeeList($id);
		$feilds_to_insert = getAttendeeFieldsToInsert ();
		$feild_data = @getAttendeeDataToInsert($attendee_list);
		$table_fields = getAttendeeTableFields();	
		
		if ( isset($attendee_list->attendees)){
		
			//Check to see if table exsist
			$result = $conn -> query ("SHOW TABLES LIKE 'eventBriteAttendees'");
			$tableExists = $result -> num_rows > 0;
		
			//Check to see if table does not exist
			//create database -> create a boolean to check
			if (!$tableExists){
			
				echo "Table does not exist, creating it now ...<br>\r\n";
				$check_conn = createNewTable ($table_fields);
				
				//check if table was created
				if ($check_conn===TRUE)
					insertAllRows ($feilds_to_insert, $feild_data);
			}
			else {		
				echo "Attendee table exist, adding data ...<br>\r\n";
				insertRows($feilds_to_insert, $feild_data);			
			}
		}
	}

	//======================================================================
	// Call main methods
	//======================================================================
	

	//Create Eventlist
	createEventList ();
	
	//Close connection 
	mysqli_close($conn);
?>