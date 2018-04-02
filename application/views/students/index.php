<div class="m-5 white-container">
	<h4>List of all students</h4>
	<table class="table table-hover table-responsive table-striped" id="list-of-books">
		<thead>
			<tr>
				<th>Sr. No</th>
				<th>Name </th>
				<th>Email</th>
				<th>Enable/Disable</th>
			</tr>			
		</thead>
		<tbody>
		<?php $count=1; $students = array($students); ?>
		<?php foreach ($students as $student): ?>
			<tr>
				<td class="text-center"><?php echo $count++; ?></td>
				<td><?php echo $student['name']; ?></td>
				<td><?php echo $student['email']; ?></td>
				<td class="text-center"><a href="<?php #echo $book['url']; ?>" class="btn" target="_blank"><i class="fa fa-external-link"></i></a></td>
			</tr>
		<?php endforeach; ?>			
		</tbody>
	</table>
</div>