<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-4 margin mt-5 mb-5 mx-auto"> 
				<?php echo validation_errors(); ?>
				<?php echo form_open('register/register'); ?>
				<label for="name" class="form-label">Name</label>
			    <input type="input" class="form-control" name="name" placeholder="Enter name" required="true"/><br />
			    <label for="email" class="form-label">Username</label>
			    <input type="email" class="form-control" name="email" placeholder="Enter email" required="true"/><br />
			    <label for="password" class="form-label">Password</label>
			    <input type="password" name="password" id="password"  class="form-control" placeholder="Enter password" required="true"/><br/>
			    <input type="submit" name="submit" class="btn btn-dark" value="Register" />
				</form>				
			</div>
		</div>
	</div>
</body>