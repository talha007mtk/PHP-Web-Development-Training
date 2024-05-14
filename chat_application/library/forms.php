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
				<div class="container">
					<h1>LOGIN</h1>
						<form action="<?php echo $this->action; ?>" method="<?php echo $this->get_method(); ?>">
									<input type="email" name="email" placeholder="Email Address" autofocus required />
									<input type="password" name="password" placeholder="Password" required />
									<div class="label">
					                    <div class="rememberMe">
					                        <label>Didn't Have An Account?</label>
					                    </div>
					                    <label for="signup"><a href="register.php">Sign Up</a></label>
					                </div>
									<input type="submit" value="Login" name="login_form" />
						</form>
							<?php
					            if(isset( $_GET['message'])){
					                $message = htmlspecialchars($_GET["message"]);
					                echo "<p class='message'>$message</p>";
					            }
					            ?>
				</div>
			<?php
		}

		public function register_form()
		{
			?>
				<div class="container">
						<form action="<?php echo $this->action; ?>" method="<?php echo $this->get_method(); ?>" enctype="multipart/form-data">
							<h1>REGISTER</h1>
									<input type="text" name="first_name" placeholder="First Name" required />
									<input type="text" name="last_name" placeholder="Last Name" required />
									<input type="email" name="email" placeholder="Email Address" required />
									<input type="password" name="password" placeholder="Password" required />
									<input type="file" name="profile_image" required>
									<div class="label">
					                    <div class="rememberMe">
					                        <label>Already Have An Account?</label>
					                    </div>
					                    <label for="login"><a href="index.php">Login</a></label>
					                </div>
									<input type="submit" value="Register" name="register_form" />
									</td>
						</form>
							<?php
					            if(isset( $_GET['message'])){
					                $message = htmlspecialchars($_GET["message"]);
					                echo "<p class='message'>$message</p>";
					            }
					            ?>
				</div>
			<?php
		}
		
	}
?>



