<?php
	class Forms
	{
		public $action	=	NULL;
		public $method	=	NULL;

		public function __construct($action, $method)
		{
			$this->action = $action;
			$this->method = $method;
		}

		public function set_action($action)
		{
			$this->action = $action;
		}

		public function set_method($method)
		{
			$this->method = $method;
		}

		public function get_action()
		{
			return $this->action;
		}

		public function get_method()
		{
			return $this->method;
		}

		public function login_form()
		{
			?>
				<div align="center">
					<fieldset style="width: 400px">
						<legend>Login Your Account !...</legend>
						<form action="<?php echo $this->action; ?>" method="<?php echo $this->get_method(); ?>">
							<table>
								<tr>
									<td><b>Email: </b><span style="color: red; font-weight: bolder;">*</span></td>
									<td><input type="email" name="email" placeholder="Enter Your Email Address" required /></td>
								</tr>
								<tr>
									<td><b>Password: </b><span style="color: red; font-weight: bolder;">*</span></td>
									<td><input type="password" name="password" placeholder="Enter Your Password" required /></td>
								</tr>
								<tr>
									<td colspan="2" align="center" style="padding: 20px;">
										<input type="submit" value="Login" name="login_form" style="background-color: green; color: white; border-radius: 10px; padding: 5px;" />
										<input type="reset" value="Cancel" name="reset" style="background-color: red; color: white; border-radius: 10px; padding: 5px;" />
									</td>
								</tr>
							</table>
						</form>
					</fieldset>
				</div>
			<?php
		}
	}
?>



