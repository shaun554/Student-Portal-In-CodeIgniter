
<div class="m-5 white-container">

	<?php
		if($this->input->post('submit') != null)
        {
			if($verified == FALSE)
			{
				if((!isset($data['message']) || ($data['message'] == null)))
				{
					$data['message'] = 'Book not added. Please try again later.';
				}
	    		$this->load->view('messages/failed',$data);
			}
			else
			{
				if((!isset($data['message']) || ($data['message'] == null)))
				{
					$data['message'] = $this->input->post('name').' added';
				}
				$this->load->view('messages/success',$data);
			}
		}
	?>
	
	<h4><?php echo $title; ?></h4>
	<div class="mt-3">
		<?php 	echo validation_errors(); ?>

		<?php echo form_open('teacher/add'); ?>

		<div class="form-row align-items-center">
			<div class="form-group col-md-6">
			    <label for="name" class="form-label">Name</label>
			    <input type="input" id="name" name="name" class="form-control form-input" required/>
			    <small id="name" class="form-text text-muted">Hint: Enter name of the book</small><br/>
			</div>

			<div class="form-group col-md-6">
			    <label for="url" class="form-label">URL</label>
			    <input type="input" id="url" name="url" class="form-control form-input" required/>
			    <small id="url" class="form-text text-muted">Hint: Enter a link to the pdf file</small><br/>
			</div>

			<div class="form-group col-md-4">
			    <label for="subject" class="form-label">Subject</label>
			    <input type="input" id="subject" name="subject" class="form-control form-input" required/>
			    <small id="url" class="form-text text-muted">Hint: Enter the subject of the book</small><br/>
			</div>

			<div class="form-group col-md-4">
			    <label for="author" class="form-label">Author</label>
			    <input type="input" id="author" name="author" class="form-control form-input" required/>
			    <small id="author" class="form-text text-muted">Hint: Enter "NA" if not known</small><br/>
			</div>

			<div class="form-group col-md-4">
			    <label for="tag" class="form-label">Tag</label>
			    <input type="input" id="tag" name="tag" class="form-control form-input" required/>
			    <small id="author" class="form-text text-muted">Hint: Separate individual tags with a hash tag "#"</small><br/>
			</div>
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
				<th hidden="true">Tag</th>
				<th hidden="true">URL</th>
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
				<td hidden="true"><?php echo trim($book['tag']); ?></td>
				<td class="text-center" hidden="true"><?php echo $book['url']; ?></td>
				<td class="text-center"><a href="<?php echo $book['url']; ?>" class="btn btn-success btn-lg" target="_blank"><i class="fa fa-external-link text-white"></i></a></td>
				<td class="text-center"><a href="/index.php/teacher/books/edit/<?php echo $book['id']; ?>" class="btn btn-primary btn-lg"><i class="fa fa-pencil text-white"></i></a></td>
				<td class="text-center"><a href="/index.php/teacher/books/delete/<?php echo $book['id']; ?>" class="btn btn-danger btn-lg"><i class="fa fa-remove text-white"></i></a></td>
			</tr>
		<?php endforeach; ?>			
		</tbody>
	</table>
</div>