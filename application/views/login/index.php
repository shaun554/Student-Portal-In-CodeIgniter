<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-4 margin mt-5 mb-5 mx-auto white-container"> 
				<?php echo validation_errors(); ?>
				<?php echo form_open('login/index'); ?>
				<?php
				if($verified === FALSE)
				{
					$data['message'] = 'Incorrect username or password';
	        		$this->load->view('messages/failed',$data);
				}
				?>
				<div class="form-group">
					<label for="username" class="form-label">Username</label>
				    <input type="text" id="username" class="form-control form-input" name="username" required="true"/><br />
				</div>

				<div class="form-group">
				    <label for="password" class="form-label">Password</label>
				    <input type="password" name="password" id="password"  class="form-control form-input" required="true"/><br/>
				</div>
			    <input type="submit" name="submit" class="btn btn-dark" value="Login" />
			    &nbsp;or&nbsp;<a href="/index.php/register">Register</a>
				</form>				
			</div>
		</div>
	</div>
</body>