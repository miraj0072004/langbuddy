<?php
// Need the utilities file:
require('includes/utilities.inc.php');

$pageTitle = 'Register';
include('includes/header.inc.php'); //could be a diffreent header

/*
set_include_path(get_include_path() . PATH_SEPARATOR . '/usr/local/pear/share/pear/');
require('HTML/QuickForm2.php');

$form = new HTML_QuickForm2 ('loginForm');




// Add the user name:
$u_name = $form->addElement('text', 'user_name');
$u_name -> setLabel('User Name');
$u_name -> addFilter('trim');
$u_name -> addRule('required', 'Please enter a User Name.');


// Add the email address:
$email = $form->addElement('text', 'email');
$email->setLabel('Email Address');
$email->addFilter('trim');
$email->addRule('required', 'Please enter your email address.');
$email->addRule('email', 'Please enter your email address.');
//$form->registerRule('check_user_exist','function','check_email_exist');
//$email->addRule('check_user_exist','This email address is already registered');


// Add the password field:
$password_1 = $form->addElement('password', 'pass1');
$password_1->setLabel('Password');
$password_1->addFilter('trim');
$password_1->addRule('required', 'Please enter your password.');
//$password_1->registerRule('verify_password','function','compare_passwords','pass2');
//$password_1->addRule('verify_password','Your password did not match the confirmed password!');

// Add the repeat password field:
$password_2 = $form->addElement('password', 'pass2');
$password_2->setLabel('Password (again)');
$password_2->addFilter('trim');
$password_2->addRule('required', 'Please confirm your password.');

// Add the submit button:
$form->addElement('submit', 'submit', array('value'=>'Login'));

function check_email_exist($element,$value)
{
   
    global $pdo;
    $q="select count(*) from users_tab where email = '$value'";
    $r = $pdo->query($q);
    
    if ($r->fetchColumn()>0)
    {
      return false;  
    }
    
    return true;    
    
}

function compare_passwords($element,$value,$arg)
{
    global $form;
    
    if ($value==$form->getElementValue($arg))
    {
        return true;
    }
    
    return false;   
    
}

//echo "test register";
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
  if ($form->validate())
  {
   $a	=	md5(uniqid(rand( ), true));
   $q	=	"INSERT INTO users_tab (user_name, email, password, date_added, user_type,active) VALUES (:user_name, :email, :password, NOW(), :user_type,:active)";   $stmt = $pdo->prepare($q);
   $r = $stmt->execute(array(':user_name' => $u_name->getValue(), ':email' => $email->getValue(),':password' => $password_1->getValue(),':user_type' => 'public',':active' => $a));
       
       if ($r)
       {
           $body	=	"Thank you for registering	at	<whatever site>. To activate your account, please click on this link:\n\n";
           $body .= BASE_URL . 'activate.php?x='	.	urlencode($email->getValue())	.	"&y=$a";
           mail($email->getValue(), 'Registration Confirmation', $body, 'From: admin@sitename.com');

           // Finish the page:
           echo '<h3>Thank you for registering!	A	confirmation email has been sent to
                        your address. Please click on the link in that email in order to activate your
                        account.</h3>';
           include ('includes/footer.inc.php'); // Include the HTML footer.
           exit(); // Stop the page.
       }
       else
       {
            echo '<p class="error">You could not be registered due to	a	system error. We
            apologize for any inconvenience.</p>';
       }   
      
  }
}
*/

if ($_SERVER['REQUEST_METHOD'] == 'POST') { // Handle the form.


	
	// Trim all the incoming data:
	$trimmed = array_map('trim', $_POST);

	// Assume invalid values:
	$un = $e = $p = FALSE;
	
	// Check for a first name:
	if (preg_match ('/^[A-Z \'.-]{2,20}$/i', $trimmed['user_name'])) {
		$un = $trimmed['user_name'];
	} else {
		echo '<p class="error">Please enter your user name!</p>';
	}

	
	// Check for an email address:
	if (filter_var($trimmed['email'], FILTER_VALIDATE_EMAIL)) {
		$e = $trimmed['email'];
	} else {
		echo '<p class="error">Please enter a valid email address!</p>';
	}

	// Check for a password and match against the confirmed password:
	if (preg_match ('/^\w{4,20}$/', $trimmed['password1']) ) {
		if ($trimmed['password1'] == $trimmed['password2']) {
			$p = $trimmed['password1'];
		} else {
			echo '<p class="error">Your password did not match the confirmed password!</p>';
		}
	} else {
		echo '<p class="error">Please enter a valid password!</p>';
	}
	
	if ($un && $e && $p) { // If everything's OK...

		// Make sure the email address is available:
		$q = "SELECT count(*) FROM users_tab WHERE email='$e'";
//		$r = mysqli_query ($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));
        
        $r=$pdo->query($q);
		
		 if ($r->fetchColumn()==0){ // Available.

			// Create the activation code:
			$a = md5(uniqid(rand(), true));

			// Add the user to the database:
			$q = "INSERT INTO users_tab (email, password, user_name,user_type, active, date_added) VALUES (:email, :password, :user_name,:user_type, :active, NOW())";
             
			$stmt = $pdo->prepare($q);
            $r = $stmt->execute(array(':user_name' => $un, ':email' => $e,':password' => $p,':user_type' => 'public',':active' => $a));

			if ($r == 1) { // If it ran OK.

				// Send the email:
				$body = "Thank you for registering at <whatever site>. To activate your account, please click on this link:\n\n";
				$body .= BASE_URL . 'activate.php?x=' . urlencode($e) . "&y=$a";
				mail($trimmed['email'], 'Registration Confirmation', $body, 'From: admin@sitename.com');
				
				// Finish the page:
				echo '<h3>Thank you for registering! A confirmation email has been sent to your address. Please click on the link in that email in order to activate your account.</h3>';
				//echo "you entered the password $p and its saved as ". SHA1('$p');
				include ('includes/footer.inc.php'); // Include the HTML footer.
				exit(); // Stop the page.
				
			} else { // If it did not run OK.
				echo '<p class="error">You could not be registered due to a system error. We apologize for any inconvenience.</p>';
			}
			
		} else { // The email address is not available.
			echo '<p class="error">That email address has already been registered. If you have forgotten your password, use the link at right to have your password sent to you.</p>';
		}
		
	} else { // If one of the data tests failed.
		echo '<p class="error">Please try again.</p>';
	}

	

}

include('views/register.html');
include('includes/footer.inc.php'); // could be a differnt footer


?>