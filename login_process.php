<?php
	require_once("library/database_settings.php");
	require_once("library/database.php");
	require_once("library/session.php");
	
	$database = new Database(HOST_NAME, USER_NAME, PASSWORD, DATABASE);
	$session  = new Session;
	
	$query = "SELECT * FROM user WHERE email='".$_POST["email"]."' AND password='".sha1($_POST["password"])."'";

	$result = $database->execute_query($query);
	
	if($result->num_rows)
	{
		$user = mysqli_fetch_assoc($result);
		
		$session->set_session($user);
		
		$query = "UPDATE user SET is_online=1 WHERE user_id=".$_SESSION["user"]["user_id"];
		
		$result = $database->execute_query($query);
		
		if($result)
		{
			header("location: hist_chat_application.php");
		}
	}
	else
	{
		header("location: index.php?message=Invalid Email/Password Try Again Later !...&success=0");
	}
?>