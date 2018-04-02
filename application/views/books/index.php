<div class="container-fluid">
	<div class="row align-items mt-5 mb-5 ml-5">
		<span class="mt-2"><strong>Filter By:&nbsp;</strong></span>
		
		<?php
			$distinctTags = array();
			foreach ($tags as $tag)
			{
				$tagsArray = explode("#", $tag['tag']);
				for($i=0;$i<sizeof($tagsArray);$i++)
				{
					if((!in_array(strtolower($tagsArray[$i]), $distinctTags)) && (!empty($tagsArray[$i])))
					{
						array_push($distinctTags, strtolower($tagsArray[$i]));
					}
				}
			}
		?>
		
		<div class="ml-3">
			<ul class="nav nav-pills">
			<li class="nav-item">
			    <a class="nav-link" href="/index.php/books/">All</a>
			  </li>
			<?php sort($distinctTags); ?>
			<?php for($i=0;$i<sizeof($distinctTags);$i++): ?>
			  <li class="nav-item">
			    <a class="nav-link" href="/index.php/books/filter/<?php echo $distinctTags[$i]; ?>"><?php echo ucwords($distinctTags[$i]); ?></a>
			  </li>
			<?php endfor; ?>
			</ul>
		</div>
		
	</div>
</div>

<div class="container-fluid">
	<div class="row align-items mt-5 mb-5 ml-5">
		<?php if($books): ?>
			<?php foreach ($books as $book): ?>
			<div class="card-deck col-md-4 card-books">
				<div class="card white-container mb-3 p-3 card-border">
			        <div class="card-block">
		        		<a href="<?php echo $book['url']; ?>" target="_blank"><h5 class="card-title"><?php echo substr($book['name'],0,26); ?></h5></a>
				        	<p class="card-text"><?php echo $book['subject'];?></p>
				        	<div>
				        		<h6 class="card-subtitle mb-2 text-muted">By: <span><?php echo $book['author']; ?></span></h6>
				        	</div>
				        	<div>
					        	<a href="/index.php/book/<?php echo $book['id']; ?>" class="btn btn-link card-link mt-3">More</a>
					        	<?php if($this->session->userdata('role') == 'teacher'): ?>
					        		<a href="/index.php/teacher/books/edit/<?php echo $book['id']; ?>" class="pull-right btn card-link mt-3">Edit</a>
					        	<?php endif; ?>
				        	</div>
				        	<!-- <div class="bottom-align">
				        		<?php $tags = explode('#',$book['tag']); ?>

				        		<?php for($i=0;$i<sizeof($tags);$i++): ?>
				        			<a href="/index.php/books/<?php echo $tags[$i]; ?>"><span class="badge pl-2 pr-2 pb-1 badge-secondary"><?php echo ucwords($tags[$i]); ?></span></a>
				        		<?php endfor; ?>

				        	</div> -->
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