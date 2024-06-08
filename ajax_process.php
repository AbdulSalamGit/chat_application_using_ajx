<?php
	require_once("library/database_settings.php");
	require_once("library/database.php");
	require_once("library/session.php");
	
	$database = new Database(HOST_NAME, USER_NAME, PASSWORD, DATABASE);
	$session  = new Session;
	
	if(isset($_REQUEST["action"]) && $_REQUEST["action"]=="show_users")
	{
		$query = "SELECT * FROM user WHERE user_id != ".$_SESSION["user"]["user_id"]." ORDER BY is_online DESC";
		
		$result = $database->execute_query($query);
		
		if($result->num_rows)
		{
			while($user = mysqli_fetch_assoc($result))
			{
				?>
					<div style="margin: 10px">
						<table>
							<tr>
								<td><img src="profile_image/<?php echo $user["profile_image"]; ?>" style="width: 50px; height: 50px; border-radius: 10px" /></td>
								<td><label>&nbsp;<?php echo $user["first_name"]." ".$user["last_name"]; ?></label></td>
								<td>
									&nbsp;
									<span style="color: <?php echo $user["is_online"]?"green":"red"; ?>; font-weight: bold"><?php echo $user["is_online"]?"Online":"Offline"; ?></span>
								</td>
							</tr>
							<tr>
								<td colspan="3">
									<span><b>Last Login:</b> <?php echo date("d M Y, h:i:s",$user["last_login"]); ?></span>
									<hr />
								</td>
							</tr>
						</table>
					</div>
				<?php
			}
		}
		else
		{
			?>
				<p style="color: red; font-weight: bolder">No Users Avalibale !...</p>
			<?php
		}
	}
	if(isset($_REQUEST["action"]) && $_REQUEST["action"]=="send_message")
	{
		$query = "INSERT INTO chat (chat_message, sent_by, sent_on) VALUES('".$_POST["message"]."', ".$_SESSION["user"]["user_id"].", '".time()."')";
		
		$result = $database->execute_query($query);
		
		if($result)
		{
			?>
				<label style="color: green; font-weight: bolder">Message Sent !...</label>
			<?php
		}
		else
		{
			?>
				<label style="color: red; font-weight: bolder">Message Not Sent !...</label>
			<?php
		}
	}
	else if(isset($_REQUEST["action"]) && $_REQUEST["action"]=="show_messages")
	{
		$query = "SELECT * FROM chat,user WHERE chat.sent_by=user.user_id ORDER BY chat_id ASC";
		
		$result = $database->execute_query($query);
		
		if($result->num_rows)
		{
			while($data = mysqli_fetch_assoc($result))
			{
				if($data["user_id"] == $_SESSION["user"]["user_id"])
				{
				?>
					<div style="margin: 20px; float: left">
						<table>
							<tr>
								<td><img src="profile_image/<?php echo $data["profile_image"]; ?>" style="width: 50px; height: 50px; border-radius: 10px" /></td>
								<td><label style="font-weight:bolder">&nbsp;<?php echo $data["first_name"]." ".$data["last_name"]; ?></label></td>
							</tr>
							<tr>
								<td></td>
								<td>
									<?php echo date("d F, Y h:i:s", $data["sent_on"]); ?>
								</td>
							</tr>
							<tr>
								<td></td>
								<td>
									<?php echo $data["chat_message"]; ?>
								</td>
							</tr>
						</table>
					</div>
					<p style="clear: both"></p>
				<?php
				}
				else
				{
					?>
					<div style="margin: 20px; float: right">
						<table>
							<tr>
								<td><img src="profile_image/<?php echo $data["profile_image"]; ?>" style="width: 50px; height: 50px; border-radius: 10px" /></td>
								<td><label style="font-weight:bolder">&nbsp;<?php echo $data["first_name"]." ".$data["last_name"]; ?></label></td>
							</tr>
							<tr>
								<td></td>
								<td>
									<?php echo date("d F, Y h:i:s", $data["sent_on"]); ?>
								</td>
							</tr>
							<tr>
								<td></td>
								<td>
									<?php echo $data["chat_message"]; ?>
								</td>
							</tr>
						</table>
					</div>
					<p style="clear: both"></p>
					<?php
				}
			}
		}
		else
		{
			?>
				<p style="color: red; font-weight: bolder">No Messages Avalibale !...</p>
			<?php
		}
	}
?>