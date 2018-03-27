
<div class="col-md-4 m-5 white-container">
	<h4><?php echo $title; ?></h4>

	<div class="mt-3">
		<?php echo validation_errors(); ?>

		<?php echo form_open('teacher/add'); ?>

		<?php
			if($verified === FALSE)
			{
				$data['message'] = 'Book not added. Please try again later.';
	    		$this->load->view('messages/failed',$data);
			}
		?>

			<div class="form-group">
			    <label for="name" class="form-label">Name</label>
			    <input type="input" name="name" class="form-control form-input" required/>
			    <small id="name" class="form-text text-muted">Hint: Enter name of the book</small><br/>
			</div>

			<div class="form-group">
			    <label for="url" class="form-label">URL</label>
			    <input type="input" name="url" class="form-control form-input" required/>
			    <small id="url" class="form-text text-muted">Hint: Enter a link to the pdf file</small><br/>
			</div>

			<div class="form-group">
			    <label for="subject" class="form-label">Subject</label>
			    <input type="input" name="subject" class="form-control form-input" required/>
			    <small id="url" class="form-text text-muted">Hint: Enter the subject of the book</small><br/>
			</div>

			<div class="form-group">
			    <label for="author" class="form-label">Author</label>
			    <input type="input" name="author" class="form-control form-input" required/>
			    <small id="author" class="form-text text-muted">Hint: Enter "NA" if not known</small><br/>
			</div>
		    <input type="submit" name="submit" class="btn btn-dark" value="Add" />
		</form>		
	</div>
</div>

<div class="m-5 white-container">
	<h4>List of all books</h4>
	<table class="table table-hover table-responsive table-striped" id="list-of-books">
		<thead>
			<tr>
				<th>Sr. No</th>
				<th>Name </th>
				<th>Subject</th>
				<th>Author</th>
				<th>URL</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>			
		</thead>
		<tbody>
		<?php $count=1; ?>
		<?php foreach ($books as $book): ?>
			<tr>
				<td class="text-center"><?php echo $count++; ?></td>
				<td><?php echo $book['name']; ?></td>
				<td><?php echo $book['subject']; ?></td>
				<td><?php echo $book['author']; ?></td>
				<td class="text-center"><a href="<?php echo $book['url']; ?>" class="btn" target="_blank"><i class="fa fa-external-link"></i></a></td>
				<td class="text-center"><a href="" class="btn"><i class="fa fa-pencil"></i></a></td>
				<td class="text-center"><a href="" class="btn"><i class="fa fa-remove"></i></a></td>
			</tr>
		<?php endforeach; ?>			
		</tbody>
	</table>	
</div>