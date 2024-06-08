<?php
	require_once("library/general.php");
	require_once("library/session.php");
	
	$session = new Session;
	$session->session_exists();
?>
<html>
	<head>
		<title><?php echo General::site_title(); ?></title>
		<script type="text/javascript">
			function show_users()
			{
				var ajax_request = null;
				
				if(window.XMLHttpRequest)
				{
					ajax_request = new XMLHttpRequest();
				}
				else
				{
					ajax_request = new ActiveXObject("Microsoft.XMLHTTP");
				}
				
				ajax_request.onreadystatechange = function(){
					if(ajax_request.readyState == 4 && ajax_request.status == 200 && ajax_request.statusText == "OK")
					{
						document.getElementById("show_users").innerHTML = ajax_request.responseText;
					}
				}
				
				ajax_request.open("GET", "ajax_process.php?action=show_users");
				ajax_request.send();
			}
			
			function send_message()
			{
				var message 		= document.getElementById("message").value;
				var ajax_request 	= null;
				
				if(window.XMLHttpRequest)
				{
					ajax_request = new XMLHttpRequest();
				}
				else
				{
					ajax_request = new ActiveXObject("Microsoft.XMLHTTP");
				}
				
				ajax_request.onreadystatechange = function(){
					if(ajax_request.readyState == 4 && ajax_request.status == 200 && ajax_request.statusText == "OK")
					{
						document.getElementById("message_status").innerHTML = ajax_request.responseText;
						show_messages();
					}
				}
				
				ajax_request.open("POST", "ajax_process.php");
				ajax_request.setRequestHeader("content-type", "application/x-www-form-urlencoded");
				ajax_request.send("action=send_message&message="+message);
			}
			
			function show_messages()
			{
				var ajax_request = null;
				
				if(window.XMLHttpRequest)
				{
					ajax_request = new XMLHttpRequest();
				}
				else
				{
					ajax_request = new ActiveXObject("Microsoft.XMLHTTP");
				}
				
				ajax_request.onreadystatechange = function(){
					if(ajax_request.readyState == 4 && ajax_request.status == 200 && ajax_request.statusText == "OK")
					{
						document.getElementById("show_messages").innerHTML = ajax_request.responseText;
					}
				}
				
				ajax_request.open("GET", "ajax_process.php?action=show_messages");
				ajax_request.send();
			}
			
			show_users();
			show_messages();
			
			var users_set_interval = null;
			var messages_set_interval = null;
			
			users_set_interval = setInterval(show_users, 10000);
			messages_set_interval = setInterval(show_messages, 10000);
		</script>
	</head>
	<body>
		<?php
			General::site_header();
		?>
		<p style="float: right; margin-right: 30px">
			<b>Welcome: </b>
			<span><?php echo $_SESSION["user"]["first_name"]." ".$_SESSION["user"]["last_name"]; ?></span>
			&nbsp; | &nbsp;
			<a href="logout.php" style="text-decoration: none">Logout</a>
		</p>
		<table style="width: 90%; margin: auto" cellpadding="5" cellspacing="5">
			<tr>
				<td style="width: 70%; height: 550px; border: 2px solid teal; position: relative">
					<div>
						<h2 align="center" style="background-color: teal; color: white; padding: 5px; position: absolute; top: -15px; border-radius: 10px; width: 98%">Messages</h2>
						<div style="height: 420px; margin-top: 10px; overflow: auto" id="show_messages">
						</div>
						<div>
							<table>
								<tr>
									<td><textarea id="message" cols="130" placeholder="Type Your Message Here !..."></textarea></td>
									<td><button style="background-color: teal; color: white; padding: 5px; border-radius: 4px" onclick="send_message()">Send Message</button></td>
								</tr>
								<tr>
									<td colspan="2" align="center" id="message_status"></td>
								</tr>
							</table>
						</div>
					</div>
				</td>
				<td style="width: 20%; height: 550px; border: 2px solid teal; position: relative">
					<div>
						<h2 align="center" style="background-color: teal; color: white; padding: 5px; border-radius: 10px; position: absolute; top: -15px; width: 280px">Users</h2>
						<div id="show_users" style="height: 450px; overflow: auto"></div>
					</div>
				</td>
			</tr>
		</table>
	</body>
</html>