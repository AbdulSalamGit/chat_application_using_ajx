<?php
	session_start();

	class Session
	{
		public function set_session($data)
		{
			$_SESSION["user"] = $data;
		}

		public function destroy_session()
		{
			unset($_SESSION["user"]);

			session_destroy();
		}

		public function session_exists()
		{
			if(isset($_SESSION["user"]))
			{
				return true;
			}
			else
			{
				header("location: index.php?message=Login Into Your Account!...&success=0");
			}
		}
	}
?>



