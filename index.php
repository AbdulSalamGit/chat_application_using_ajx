<?php
	require_once("library/general.php");
	require_once("library/forms.php");
	require_once("library/session.php");
	
	$forms   = new Forms("login_process.php", "POST");
	$session = new Session();
	
	if(isset($_SESSION["user"]) && $_SESSION["user"]["user_id"])
	{
		header("location: hist_chat_application.php");
	}
?>
			<html>
				<head>
					<title><?php echo General::site_title(); ?></title>
				</head>
				<body>
					<?php
						General::site_header();
						
						$forms->login_form();
						
						if(isset($_REQUEST["message"]))
						{
							?>
								<p style="color: <?php echo $_REQUEST["success"]?"green":"red" ?>; font-weight: bolder" align="center"><?php echo $_GET["message"]; ?></p>
							<?php
						}
					?>
				</body>
			</html>