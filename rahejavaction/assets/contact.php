<?php

// Email address verification
function isEmail($email) {
	return filter_var($email, FILTER_VALIDATE_EMAIL);
}

if($_POST) {

    // Enter the email where you want to receive the message
    $emailTo = 'developerashishpal@gmail.com';

    $clientName = addslashes(trim($_POST['name']));
    $clientEmail = addslashes(trim($_POST['email']));
    $subject = addslashes(trim($_POST['subject']));
    $message = addslashes(trim($_POST['message']));

    $array = array('nameMessage' => '','emailMessage' => '', 'subjectMessage' => '', 'messageMessage' => '');

    if(!isEmail($clientEmail)) {
        $array['emailMessage'] = 'Invalid email!';
    }
    if($subject == '') {
        $array['subjectMessage'] = 'Empty subject!';
    }
    if($clientName == '') {
        $array['nameMessage'] = 'Empty name!';
    }
    if($message == '') {
        $array['messageMessage'] = 'Empty message!';
    }
    if(isEmail($clientEmail) && $clientName != '' && $subject != '' && $message != '') {
        // Send email
		$headers = "From: " . $clientEmail . " <" . $clientEmail . ">" . "\r\n" . "Reply-To: " . $clientEmail;
		mail($emailTo, $subject . " (Raheja Vaction Enquiry)", $message, $headers);
    }

    echo json_encode($array);

}

?>
