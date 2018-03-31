<div class="container-fluid">
	<div class="row align-items m-5 white-container">
		<div class="col">
    		<a href="<?php echo $book['url']; ?>" target="_blank"><h3 class="text-center"><?php echo strtoupper($book['name']); ?></h3></a>

    		<img src="" style="width: 150px;height: 200px;border:2px solid black;"/>
        	<p class="mt-3"><?php echo $book['subject'];?></p>
        	<div>
        		<h6 class="mb-2 text-muted">By: <span><?php echo $book['author']; ?></span></h6>
        		<?php $tags = explode('#',$book['tag']); ?>

        		<?php for($i=0;$i<sizeof($tags);$i++): ?>
        			<a href="/index.php/books/<?php echo $tags[$i]; ?>"><span class="badge pl-2 pr-2 pb-1 badge-secondary"><?php echo ucwords($tags[$i]); ?></span></a>
        		<?php endfor; ?>
        	</div>
        	<?php if($this->session->userdata('role') == 'teacher'): ?>
        		<a href="/index.php/teacher/books/edit/<?php echo $book['id']; ?>" class="pull-right btn mt-3">Edit</a>
        	<?php endif; ?>
		</div>
	</div>
</div>