<div class="col-md-4 m-5">
	<h4><?php echo $title; ?></h4>

	<?php echo validation_errors(); ?>

	<?php echo form_open('books/add'); ?>
	    <label for="name">Name</label>
	    <input type="input" name="name" class="form-control" placeholder="Enter book name" required/><br />

	    <label for="url">URL</label>
	    <input type="input" name="url" class="form-control" placeholder="Enter book url" required/><br />

	    <label for="subject">Subject</label>
	    <input type="input" name="subject" class="form-control" placeholder="Enter book subject" required/><br />

	    <label for="author">Author</label>
	    <input type="input" name="author" class="form-control" placeholder="Enter book author" required/><br />

	    <input type="submit" name="submit" class="btn btn-dark" value="Add" />
	</form>
</div>

<div class="col-md-12 m-5">
	<h4>List of all books</h4>
	<table class="table table-responsive table-hover table-striped">
		<tr>
			<th>Sr. No</th>
			<th>Name </th>
			<th>Subject</th>
			<th>Author</th>
			<th>URL</th>
			<th>Edit</th>
		</tr>
	<?php $count=1; ?>
	<?php foreach ($books as $book): ?>
		<tr>
			<td><?php echo $count++; ?></td>
			<td><?php echo $book['name']; ?></td>
			<td><?php echo $book['subject']; ?></td>
			<td><?php echo $book['author']; ?></td>
			<td><a href="<?php echo $book['url']; ?>"><i class="fa fa-book"></i></a></td>
			<td><a href=""><i class="fa fa-pencil"></i></a></td>
		</tr>
	<?php endforeach; ?>
	</table>	
</div>