<?php
	$method = $_SERVER['REQUEST_METHOD'];

	if ($method == "POST") {
		$requestBody = file_get_contents('php://input');
		$json = json_decode($requestBody);

		$text = $json->result->parameters->text;

		switch ($text) {
			case 'hi':
				$speech = "Howdy, good to meet you";
				break;
			case 'Bye':
				$speech = "Good time i had with you";
				break;
			case 'anything':
				$speech = "i can get you anything you care for";
				break;
			
			default:
				$speech = "I don't really understand everything you ask me but i'm learning more";
				break;
		}

		$response = new \stdClass();

		$response->speech = $speech;

		$response->displayText = $speech;

		$response->source = "webhook";

		echo json_encode($response);
	}else{
		echo "Method Not Aloowed";
	}
?>