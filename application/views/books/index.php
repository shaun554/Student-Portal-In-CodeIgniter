<div class="container-fluid">
	<div class="row align-items mt-5 mb-5 ml-5">
		<!-- <div class="pull-right">
			<a href="/index.php/	books/add"><button class="btn btn-dark">Add book</button></a>
		</div> -->
		<?php if($books): ?>
			<?php foreach ($books as $book): ?>
			<div class="card-deck col-md-4">
				<div class="card mb-3 p-3 card-border">
			        <div class="card-block">	
		        		<a href="<?php echo $book['url']; ?>" target="_blank"><h5 class="card-title"><?php echo $book['name']; ?></h5></a>
				        	<p class="card-text"><?php echo $book['subject'];?></p>
				        	<div>
				        		<h6 class="card-subtitle mb-2 text-muted">By: <span><?php echo $book['author']; ?></span></h6>
				        		<?php $tags = explode('#',$book['tag']); ?>

				        		<?php for($i=0;$i<sizeof($tags);$i++): ?>
				        			<a href=""><span class="badge pl-2 pr-2 badge-secondary"><?php echo ucwords($tags[$i]); ?></span></a>
				        		<?php endfor; ?>
				        	</div>
				        	<a href="" target="_blank" class="btn btn-link card-link mt-3">More</a>
			        </div>
				</div>				
			</div>
			<?php endforeach; ?>
		<?php else: ?>
			<div class="mx-auto text-center">
				<i class="fa fa-coffee fa-4x"></i>
				<h2>There is nothing here</h2>
				<br/>
				<h5>Lets go <a href="/"><strong class="text-uppercase">Home</strong></a></h5>
			</div>
		<?php endif; ?>
	</div>
</div>