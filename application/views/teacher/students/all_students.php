<div class="m-5 white-container">
	<h4>List of all Students</h4>
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
		
			<tr>
				<td class="text-center"><?php echo $count++; ?></td>
				<td><?php #echo $book['name']; ?></td>
				<td><?php #echo $book['subject']; ?></td>
				<td><?php #echo $book['author']; ?></td>
				<td class="text-center"><a href="<?php #echo $book['url']; ?>" class="btn" target="_blank"><i class="fa fa-external-link"></i></a></td>
				<td class="text-center"><a href="/index.php/teacher/books/edit/<?php #echo $book['id']; ?>" class="btn"><i class="fa fa-pencil"></i></a></td>
				<td class="text-center"><a href="" class="btn"><i class="fa fa-remove"></i></a></td>
			</tr>
		
		</tbody>
	</table>
</div>