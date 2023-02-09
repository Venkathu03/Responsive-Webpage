<?php
	header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: POST');
    header("Access-Control-Allow-Headers: X-Requested-With");
    $json = file_get_contents('php://input');
    $obj = json_decode($json,true);
    if(isset($obj['name'])){
		$name = $obj['name'];
		$mobileNumber = $obj['mobileNumber'];
		$emailId = $obj['emailId'];
		$comment = $obj['comment'];

		$senderMailId = "marketmindsagency@gmail.com";
		$senderPassword ="marketminds@123";

		$message='<table width="100%" bgcolor="#dfdfdf" border="0" cellspacing="10" cellpadding="0" style="padding-top:10px;">
                	  <tr>
                		<td><table width="700" border="0" align="center" cellpadding="0" cellspacing="0" style="background:#ffffff; margin-top:0px;">
                			<tr>
                			  <td style="padding-top:0px; padding-bottom:10px;"><table width="75%" border="0" align="center" cellpadding="0" cellspacing="0" style="border:1px solid #e8e9eb;  -webkit-border-radius: 3px; -moz-border-radius: 3px;border-radius: 3px; margin-top:18px">
                				  <tr>
                					<td style="padding:3px;"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" >
                						<tr>
                						  <td>
                						    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="background:#fbfbfb;">
												<tr>
                								    <td height="33" style="font-size:12px;	font-family:Arial, Helvetica, sans-serif;	color:#6d6d6d;	text-align:left;	padding-left:15px;">Name</td>
                								    <td style="font-size:12px;	font-family:Arial, Helvetica, sans-serif;	color:#6d6d6d;	text-align:left;">:</td>
                								    <td  style="font-size:12px;	font-family:Arial, Helvetica, sans-serif;	color:#6d6d6d;	text-align:left;">'.$name.'</td>
                							    </tr>
                						        <tr>
                								    <td height="33" style="font-size:12px;	font-family:Arial, Helvetica, sans-serif;	color:#6d6d6d;	text-align:left;	padding-left:15px;">Mobile Number</td>
                								    <td style="font-size:12px;	font-family:Arial, Helvetica, sans-serif;	color:#6d6d6d;	text-align:left;">:</td>
                								    <td  style="font-size:12px;	font-family:Arial, Helvetica, sans-serif;	color:#6d6d6d;	text-align:left;">'.$mobileNumber.'</td>
                							    </tr>
                							    <tr>
                								    <td height="33" style="font-size:12px;	font-family:Arial, Helvetica, sans-serif;	color:#6d6d6d;	text-align:left;	padding-left:15px;">Email Id</td>
                								    <td style="font-size:12px;	font-family:Arial, Helvetica, sans-serif;	color:#6d6d6d;	text-align:left;">:</td>
                								    <td  style="font-size:12px;	font-family:Arial, Helvetica, sans-serif;	color:#6d6d6d;	text-align:left;">'.$emailId.'</td>
                							    </tr>
                							    <tr>
                								    <td height="33" style="font-size:12px;	font-family:Arial, Helvetica, sans-serif;	color:#6d6d6d;	text-align:left;	padding-left:15px;">Comments</td>
                								    <td style="font-size:12px;	font-family:Arial, Helvetica, sans-serif;	color:#6d6d6d;	text-align:left;">:</td>
                								    <td  style="font-size:12px;	font-family:Arial, Helvetica, sans-serif;	color:#6d6d6d;	text-align:left;">'.$comment.'</td>
                							    </tr>
                							</table></td>
                						</tr>
                					  </table></td>
                				  </tr>
                				</table></td>
                			</tr>
                			<tr>
                			  <td style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#3f3f3f; background:#fafafa; line-height:30px; text-align:center;"><div class="footer-con">
                				  <p><strong>Have a Great Day</strong>, Thanks &amp; Regards, <strong style="color:#0fb2e4;">Market Minds Team</strong></p>
                				</div></td>
                			</tr>
                			<tr>
                			  <td bgcolor="#30B1F2" style="line-height:1px;">&nbsp;</td>
                			</tr>
		                </table>
		               </td>
	                </tr>
	            </table>';
	
        require 'mailer/PHPMailerAutoload.php';
        $mail = new PHPMailer();
        $mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                     // Enable SMTP authentication
        $mail->SMTPDebug  = 0;
        $mail->Username    = $senderMailId;
        $mail->Password    = $senderPassword;
        $mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                          // TCP port to connect to
        $mail->setFrom($senderMailId, 'Support Team');//ur mail id
        $mail->addReplyTo($senderMailId, 'Support Team');//reply back email id
        $mail->addAddress($senderMailId);   // Add a recipient
        $mail->isHTML(true);  // Set email format to HTML
        $mail->Subject = 'New contact us form  - '.$name;
        $mail->Body    = $message;
        $mail->isHTML(true); 
        $mail->send();
        $mail1 = new PHPMailer();
        $mail1->Host        = "smtp.gmail.com";
        $mail1->Port        = 587;
        $mail1->SMTPAuth    = true;
        $mail1->Username    = $senderMailId;
        $mail1->Password    = $senderPassword;
        $mail1->SMTPSecure  = 'ssl';
        $mail1->setFrom($senderMailId, 'Support Team');//ur mail id
        $mail1->addReplyTo($senderMailId, 'Support Team');//reply back email id
        $mail1->addAddress($emailId);   // Add a recipient Add a recipient
        $mail1->isHTML(true);  // Set email format to HTML
		$bodyContent = '<p>Dear '.$name.', <br> Thank you for contacting us. Our support team will contact you at the earliest.</p>';
        $mail1->Subject = 'Thanks Note - Market Minds';
        $mail1->Body    = $bodyContent;
        $mail1->isHTML(true); 
        $mail1->send();
		$data["message"]	=	"Thanks for Contacting us";
		$data["status"]	=	true;
		echo json_encode($data);	
	}else{
	    $data["message"]	=	"Failed to send Email";
		$data["status"]	=	false;
	}
?>
