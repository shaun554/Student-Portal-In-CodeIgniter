<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-4 margin mt-5 mb-5 mx-auto white-container"> 
				<?php echo validation_errors(); ?>
				<?php echo form_open('register/register'); ?>
				<div class="form-group">
					<label for="name" class="form-label">Name</label>
				    <input type="input" id="name" class="form-control form-input" name="name" required="true"/>
				</div>

				<div class="form-group">
				    <label for="email" class="form-label">Username</label>
				    <input type="email" id="email" class="form-control form-input" name="email" required="true"/>
				</div>

				<div class="form-group">
				    <label for="password" class="form-label">Password</label>
				    <input type="password" name="password" id="password"  class="form-control form-input" required="true"/><br/>
				</div>

			    <input type="submit" name="submit" class="btn btn-dark" value="Register" />
				</form>				
			</div>
		</div>
	</div>
</body>