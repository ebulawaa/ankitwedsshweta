<?php include('config.php');
require 'phpmailer.php';
if(isset($_GET['signup'])){
	$db->where("email_id = ?", Array($_POST['email']));
	$user = $db->get("user");
	if(!empty($user)){
		$responseArray = array('type' => 'warning', 'message' => 'Email id Already exist.');
			header('Content-Type: application/json');
			echo json_encode($responseArray); exit;
	}else{
		$password =generateRandomString();
		$data = Array ("email_id" => $_POST['email'],
		               "password" => $password,
		               "created_at" => Date("Y-m-d H:i:s")
		);
		$id = $db->insert('user', $data);
		if($id)
		{
		    $message2 = '';
		 	$message2 = '<table width="100%" cellpadding="0" cellspacing="0" border="0" style="border-collapse:collapse;margin-top: 20px;"> 
		    <tr>
		        <td class="topContainer" style="padding-left:5px; padding-right:5px; background-color:#FFFFFF;">
		        	            
		            <table class="row" width="600" bgcolor="#ffffff" align="center" cellpadding="0" cellspacing="0" border="0" style="border-collapse:collapse; text-align:left; border-spacing:0; max-width:100%;">
		                <tr>
		                    <td class="oneFromTwo" width="100%" valign="middle" style="border-bottom:1px dotted #dddddd">
		                        <table width="100%" cellpadding="0" cellspacing="0" border="0" style="border-collapse:collapse; border-spacing:0;">
		                            <tr>
		                            	<td class="inner" style="padding-top:5px; padding-right:15px; padding-bottom:5px; padding-left:30px; font-family: Helvetica, Arial, sans-serif; font-size:24px; line-height:100%; color:#ee7716; font-weight:normal;">
		                            		<!--<img src="'.APPLICATION_URL.'images/center-color-logo.png" style="max-height:64px;"/>-->
		                                </td>
		                            </tr>
		                        </table>
		                    </td>
		                </tr>
		            </table>
		            
		        </td>
		    </tr>
		    
		    <tr>
		        <td class="container" style="padding-left:5px; padding-right:5px; padding-bottom:20px; background-color:#FFFFFF;">
		            
		            <!-- Start of banner picture with text under -->
		            <table class="row" width="600" bgcolor="#ffffff" align="center" cellpadding="0" cellspacing="0" border="0" style="border-collapse:collapse; text-align:left; border-spacing:0; max-width:100%;">
		                <tr>
		                    <td style="padding-top: 20px; padding-left:30px; padding-right:30px; padding-bottom:32px; font-family:Arial, Helvetica, sans-serif; font-size:14px; line-height:18pt; color:#333333;">
		                     <p>Dear '.$_POST['email'].',<br>
		                     Greetings of the day, <br><br>
		                     Your accout has been successfully created. For login.<br>email : '.$_POST['email'].'<br>password : '.$password.'<br> Thanks.</p>
		                     <p><br>
			                     Best Regards <br>
								 
							</p>
		                       
		                    </td>
		                </tr>
		            </table>
				          
		            <table class="row" width="600" bgcolor="#FFFFFF" align="center" cellpadding="0" cellspacing="0" border="0" style="border-collapse:collapse; text-align:left; border-spacing:0; max-width:100%;">
		                <tr>
		                    <td class="twoFromThree" width="100%" valign="top" style="border-top:1px #dddddd dotted;">
		                        <table width="100%" cellpadding="0" cellspacing="0" border="0" style="border-collapse:collapse; border-spacing:0;">
		                            <tr>
		                            	<td class="inner2" style="padding-top:25px; padding-left:30px; padding-right:15px; padding-bottom:25px; font-family:Arial, Helvetica, sans-serif; font-size:12px; line-height:15pt; color:#777777; text-align: center;">
		                                	Copyright &copy; '.date('Y').' All rights reserved. 
		                                </td>
		                            </tr>
		                        </table>
		                    </td>
		                </tr>
		            </table>
					
		            
		        </td>
		    </tr>
			
		</table>';
			//Create a new PHPMailer instance
			$mail = new PHPMailer;
			$mail->isSendmail();
			//Set who the message is to be sent from
			$mail->setFrom('mr.echodie@gmail.com', 'boot site');
			//Set who the message is to be sent to
			$mail->addAddress($_POST['email'], '');
			//Set the subject line
			$mail->Subject = "Thank you for signup.";
			//Read an HTML message body from an external file, convert referenced images to embedded,
			//convert HTML into a basic plain-text alternative body
			$mail->msgHTML($message2);			
			//$mail->send();		
			$Res = array();
			$Res['success'] = 'Mail Sent Successfully';
			if (!$mail->send()) {
	    		$Res['success'].= "Mailer Error: " . $mail->ErrorInfo;
			} else {
			    $Res['success'].=  "Message sent!";
			}
			
			$responseArray = array('type' => 'success', 'message' => 'Your account has been successfully created. please check your mail for password. Thanks.');
			header('Content-Type: application/json');
			echo json_encode($responseArray); exit;	
		}
	}
}

function getUserIP()
{
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }

    return $ip;
}
function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
if(isset($_GET['login'])){

	$db->where("email_id = ? AND password = ?", Array($_POST['email'], $_POST['password']));
	$user = $db->get("user");
	if(!empty($user)){
		$_SESSION["user"]['id'] = $user[0]['id'];
		$_SESSION["user"]['email'] = $user[0]['email_id'];
		$responseArray = array('type' => 'success', 'message' => 'Login Successfully.');
			header('Content-Type: application/json');
			echo json_encode($responseArray); exit;
	}else{
		$responseArray = array('type' => 'danger', 'message' => 'Invalid email id or password.');
			header('Content-Type: application/json');
			echo json_encode($responseArray); exit;
	}
}
if(isset($_GET['logout'])){
	unset($_SESSION["user"]);
	echo '<meta http-equiv="refresh" content="0;URL=login.php" />';
	exit;
}
if(isset($_GET['savemessage'])){
	$ip = getUserIP();
	// if(!isset($_SESSION['user'])){
	// 	echo '<meta http-equiv="refresh" content="0;URL=login.php" />';
	// }	
	// echo "<pre>";print_r($_POST);die;
	$data = Array (
				//"user_id" => $_SESSION["user"]['id'],
		            "name" => $_POST['inputName'],
		            "email" => $_POST['inputEmail'],
		            'message'=>trim(strip_tags($_POST['inputMessage'])),
		            "create_at" => Date("Y-m-d H:i:s"),
		             "ip"=>$ip
		);
	$id = $db->insert('rohitwedsankita', $data);
	if($id){
		// echo '<meta http-equiv="refresh" content="0;URL=msg.php" />';
		// echo "<script>window.location.reload(); </script>";
		// $html ='<table id="datatable-buttons" class="table table-bordered table-striped" role="grid"  width="100%">
  //                     <thead>
  //                       <tr>
  //                         <th>Sr.</th>
  //                         <th>Name</th>
  //                         <th>Message</th>
  //                       </tr>
  //                     </thead>
  //                     <tbody>';
                      	
  //             		$db->where("user_id = ?", Array($_SESSION["user"]['id']));
		// 			$messages = $db->get("messages");
		// 			$i=1;
		// 			foreach ($messages as $key => $value) {
		// 				$html .= '<tr><td>'.$i.'</td><td>'.$value['name'].'</td><td>'.$value['message'].'</td></tr>';
		// 				$i++;
		// 			}
                      	
  //                   $html .='</tbody>
  //                   </table>';
		// $responseArray = array('type' => 'success', 'message' => 'Your message successfully saved.','result'=>$html);
		// 	header('Content-Type: application/json');
			$responseArray = [];
			$responseArray['status'] = 1;
			echo json_encode($responseArray); exit;

	}
}
if(isset($_GET['changepassword'])){
	if(!isset($_SESSION['user'])){
		echo '<meta http-equiv="refresh" content="0;URL=login.php" />';
	}
	if($_POST['inputNewPassword']==$_POST['inputConfirmPassword']){
		$db->where("id = ? AND password = ?", Array($_SESSION["user"]['id'], $_POST['inputOldpassword']));
		$user = $db->get("user");
		if(!empty($user)){
			$db->where ("id", $_SESSION["user"]['id']);
			$db->update("user", Array ("password" => $_POST['inputNewPassword']));
			$responseArray = array('type' => 'success', 'message' => 'Password Successfully Changed.');
			header('Content-Type: application/json');
			echo json_encode($responseArray); exit;
		}else{
			$responseArray = array('type' => 'danger', 'message' => 'Invalid Old password.');
			header('Content-Type: application/json');
			echo json_encode($responseArray); exit;
		}
	}else{
		$responseArray = array('type' => 'warning', 'message' => 'New password and Confirm Password are not same');
			header('Content-Type: application/json');
			echo json_encode($responseArray); exit;
	}
}
die();
//https://github.com/ThingEngineer/PHP-MySQLi-Database-Class/blob/master/tests/mysqliDbTests.php
?>