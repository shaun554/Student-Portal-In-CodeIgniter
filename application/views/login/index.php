<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-4 margin mt-5 mb-5 mx-auto"> 
				<?php echo validation_errors(); ?>
				<?php echo form_open('login/index'); ?>
				<?php
				if($verified === FALSE)
				{
					$data['message'] = 'Incorrect username or password';
	        		$this->load->view('messages/failed',$data);
				}
				?>
				<label for="username" class="form-label">Username</label>
			    <input type="input" class="form-control" name="username" placeholder="Enter username" required="true"/><br />
			    <label for="password" class="form-label">Password</label>
			    <input type="password" name="password" id="password"  class="form-control" placeholder="Enter password" required="true"/><br/>
			    <input type="submit" name="submit" class="btn btn-dark" value="Login" />
			    &nbsp;or&nbsp;<a href="/index.php/register">Register</a>
				</form>				
			</div>
		</div>
	</div>
</body>