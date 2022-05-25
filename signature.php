<?php
	// ! REFERÊNCIAS
	// * DOCUMENTAÇÃO https://marketplace.zoom.us/docs/sdk/native-sdks/web/build/signature
	// * API KEYS https://marketplace.zoom.us/develop/create

	// Sua api secret JWT
	$apiSecret = 'EclcUwax37gxRdtD4wdRk4EINiO61bvg2SS8';

	$meetingData = json_decode(file_get_contents('php://input'), true);

	$apiKey = isset( $meetingData['meetingData']['apiKey'] ) ? $meetingData['meetingData']['apiKey'] : '';
	$meetingNumber = isset( $meetingData['meetingData']['meetingNumber'] ) ? $meetingData['meetingData']['meetingNumber'] : '';
	$role = isset( $meetingData['meetingData']['role'] ) ? $meetingData['meetingData']['role'] : '';

	print generate_signature( $apiKey, $apiSecret, $meetingNumber, $role);
	function generate_signature ( $api_key, $api_secret, $meeting_number, $role){
	date_default_timezone_set('America/Sao_Paulo');
		$time = time() * 1000 - 30000; //tempo em milisegundos
		$data = base64_encode($api_key . $meeting_number . $time . $role);
		$hash = hash_hmac('sha256', $data, $api_secret, true);
		$_sig = $api_key . '.' . $meeting_number . '.' . $time . '.' . $role . '.' . base64_encode($hash);
		//Signature em base64
		return rtrim(strtr(base64_encode($_sig), '+/', '-_'), '=');
	}
?>