<?php 
	if($information): 
?>
<div class="m-5 white-container">
	<?php
		if($this->input->post('submit') != null)
        {
			if($verified == FALSE)
			{
				$data['message'] = 'Book not edited. Please try again later.';
	    		$this->load->view('messages/failed',$data);
			}
			else
			{
				$data['message'] = $this->input->post('name').' edited';
				$this->load->view('messages/success',$data);
			}
		}
	?>
	<h4><?php echo $title; ?></h4>

	<div class="mt-3">
		<?php 	echo validation_errors(); ?>

		<?php echo form_open('teacher/editBook/'.$information["id"]); ?>


			<div class="form-row align-items-center">
				<div class="form-group col-md-6">
				    <label for="name" class="form-label">Name</label>
				    <input type="input" id="name"  value="<?php echo $information['name']; ?>" name="name" class="form-control form-input" required/>
				    <small id="name" class="form-text text-muted">Hint: Enter name of the book</small><br/>
				</div>

				<div class="form-group col-md-6">
				    <label for="url" class="form-label">URL</label>
				    <input type="input" id="url" value="<?php echo $information['url']; ?>" name="url" class="form-control form-input" required/>
				    <small id="url" class="form-text text-muted">Hint: Enter a link to the pdf file</small><br/>
				</div>

				<div class="form-group col-md-4">
				    <label for="subject" class="form-label">Subject</label>
				    <input type="input" id="subject" value="<?php echo $information['subject']; ?>" name="subject" class="form-control form-input" required/>
				    <small id="url" class="form-text text-muted">Hint: Enter the subject of the book</small><br/>
				</div>

				<div class="form-group col-md-4">
				    <label for="author" class="form-label">Author</label>
				    <input type="input" id="author" value="<?php echo $information['author']; ?>" name="author" class="form-control form-input" required/>
				    <small id="author" class="form-text text-muted">Hint: Enter "NA" if not known</small><br/>
				</div>

				<div class="form-group col-md-4">
				    <label for="tag" class="form-label">Tag</label>
				    <input type="input" value="<?php echo $information['tag']; ?>" id="tag" name="tag" class="form-control form-input" />
				    <small id="author" class="form-text text-muted">Hint: Separate individual tags with a hash tag "#"</small><br/>
				</div>
			</div>
		    <input type="submit" name="submit" class="btn btn-dark" value="Update" />
		</form>		
	</div>
</div>
<?php
	else:
        $data['message'] = "<div class='text-center'>Looks like you landed here by mistake.<br/>Lets go <a href='/'>home&nbsp;<i class='fa fa-home'></i></a></div>";
        $this->load->view('messages/warning',$data);   
        $this->load->view('includes/footer');		
	endif;
?>