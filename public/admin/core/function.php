<?php
// truncate long text
function limit_text($text, $limit) {
    $strings = $text;
		if (strlen($text) > $limit) {
			$words = str_word_count($text, 2);
			$pos = array_keys($words);

			if(sizeof($pos) >$limit) {
				$text = substr($text, 0, $pos[$limit]) . '...';
			}

			return $text;
		}

	return $text;
}
function validateDate($date) {
    $d = DateTime::createFromFormat('Y-m-d G:i:s', $date);
    return $d && $d->format('Y-m-d G:i:s') === $date;
}
// function that returns current user IP
function get_ip() {
	if($_SERVER) {
		if(isset($_SERVER["HTTP_X_FORWARDED_FOR"])) {
			return $_SERVER["HTTP_X_FORWARDED_FOR"];
		}

		else if(isset($_SERVER["HTTP_CLIENT_IP"])) {
			return $_SERVER["HTTP_CLIENT_IP"];
		}

		else if(isset($_SERVER["REMOTE_ADDR"])) {
			return $_SERVER["REMOTE_ADDR"];
		}

		else {
			return '0.0.0.0';
		}
	}

	else {
		if( getenv( 'HTTP_X_FORWARDED_FOR' ) ) {
			return getenv( 'HTTP_X_FORWARDED_FOR' );
		}

		else if( getenv( 'HTTP_CLIENT_IP' ) ) {
			return getenv( 'HTTP_CLIENT_IP' );
		}

		else if( getenv( 'REMOTE_ADDR' ) ) {
			return getenv( 'REMOTE_ADDR' );
		}

		else {
			return '0.0.0.0';
		}
	}
}
function site_url($str) {
	$pattern = "/^https?:\/\//";
	if(!preg_match($pattern, $str)){
		if(!strstr($str, '.')) {
			return '';
		}

		else {
			return 'http://' . $str;
		}
	}

	else {
		if(!strstr($str, '.')) {
			return '';
		}

		else {
			return $str;
		}
	}
}

// alternative to nl2br(), <p> instead of <br>
function nl2p($string) {
    $paragraphs = '';

    foreach (explode(PHP_EOL, $string) as $line) {
        if (trim($line)) {
            $paragraphs .= '<p>' . $line . '</p>';
        }
    }

    return $paragraphs;
}
// using to validate twitter username
function validate_username($username) {
    return preg_match('/^@?([A-Za-z0-9_]{1,15})(?![.A-Za-z])$/', $username);
}
function generatePassword($length = 8) {
    // start with a blank password
    $password = "";

    // define possible characters - any character in this string can be
    // picked for use in the password, so if you want to put vowels back in
    // or add special characters such as exclamation marks, this is where
    // you should do it
    $possible = "2346789bcdfghjkmnpqrtvwxyzBCDFGHJKLMNPQRTVWXYZ";

    // we refer to the length of $possible a few times, so let's grab it now
    $maxlength = strlen($possible);

    // check for length overflow and truncate if necessary
    if($length > $maxlength) {
		$length = $maxlength;
	}

    // set up a counter for how many characters are in the password so far
    $i = 0;

    // add random characters to $password until $length is reached
    while($i < $length) {
		// pick a random character from the possible ones
		$char = substr($possible, mt_rand(0, $maxlength-1), 1);

		// have we already used this character in $password?
		if (!strstr($password, $char)) {
			// no, so it's OK to add it onto the end of whatever we've already got...
			$password .= $char;
			// ... and increase the counter by one
			$i++;
		}
	}

    return $password;
}

function admin_logincheck()
{
	if(!isset($_SESSION['username']) || $_SESSION['username']=='')
	{
		session_destroy();
		header('Location:admin_login.php');
	}
	if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 18000)) {
							// last request was more than 5 minutes ago
		session_unset();     // unset $_SESSION variable for the run-time 
		session_destroy();	// destroy session data in storage
		
		include("login.php");
		echo '<script> alert("Your session expired. Please login again") </script>';
		echo '<script language="JavaScript"> window.location.href ="admin-login.php" </script>';
	}
	$_SESSION['LAST_ACTIVITY'] = time();
}

function removeEmptyspace($str,$replace_word){
	return preg_replace("/\s+/", "$replace_word", $str);
}


function CheckOldorNew($date){
	$timestamp = strtotime($date);
	// echo $timestamp;

	if ($timestamp === false) {
		// Invalid date format
		echo "Invalid date";
	} else {
		// Get the current Unix timestamp
		$currentTimestamp = time();

		if ($timestamp > $currentTimestamp) {
			echo "Soon";
		} elseif ($timestamp < $currentTimestamp) {
			echo "past";
		} else {
			echo "New";
		}
	}
}
function sendSMS($mobile_no, $message){ 
    // Request parameters array  
    $requestParams = array(  
        'api-key' => 'ZYtJAGminuz07Bo2Onqkn4oQJpJBrE50L9cRbCXz',  
        'sender-id' => 'AUKART',
		'sms-type'=>'1',  
        'mobile' => $mobile_no, 
        'message' => $message 
    );  
     
    // Append parameters to API URL  
    $apiURL = 'https://fastsms.expressad.in/api/v1/send_sms'.'?';  
    foreach($requestParams as $key => $val){  
        $apiURL .= $key.'='.urlencode($val).'&';  
    }  
    $apiURL = rtrim($apiURL, "&");  
	// echo $apiURL;
     
    // Send the GET request with cURL  
    $ch = curl_init();  
    curl_setopt($ch, CURLOPT_URL, $apiURL);  
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);  
    $response = curl_exec($ch);  
    curl_close($ch);  
     
    // Return API response 
    return $response; 
}
function slugify($text, $divider = '-')
{
  // replace non letter or digits by divider
  $text = preg_replace('~[^\pL\d]+~u', $divider, $text);

  // transliterate
  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

  // remove unwanted characters
  $text = preg_replace('~[^-\w]+~', '', $text);

  // trim
  $text = trim($text, $divider);

  // remove duplicate divider
  $text = preg_replace('~-+~', $divider, $text);

  // lowercase
  $text = strtolower($text);

  if (empty($text)) {
    return 'n-a';
  }

  return $text;
} 
?>