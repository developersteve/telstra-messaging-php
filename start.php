<?php

require('includes/config.php');
require('includes/telstra.php');

$telstra = new telstra($config);

if($_POST['mobile']){

	$prov = $telstra->provision();

	if(!empty($prov)){

		$result = $telstra->sendsms(array(
		    'to' => $_POST['mobile'],
		    'body' => 'Hello World',
		    'from' => $prov['destinationAddress'],
		    'validity' => 1,
		    'scheduledDelivery' => 1,
		    'notifyURL' => '',
		    'replyRequest' => false
		));

		foreach($result['messages'] as $sms){
			if ($sms['deliveryStatus'] == 'MessageWaiting') {
			  echo $sms['to']." has been sent and is waiting in queue.";
			} else {
			  echo 'Send Failed';
			  echo "<pre>".print_r($sms)."</pre>";
			}
		}
	}
}
else echo "Mobile number not set, <a href='./'>To go back</a>";

