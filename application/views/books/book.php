<div class="container-fluid">
	<div class="row align-items m-5 white-container">
		<div class="col">

    		<a href="<?php echo $book['url']; ?>" target="_blank"><h3 class="text-center"><?php echo strtoupper($book['name']); ?></h3></a>

    		<img src="" style="width: 150px;height: 200px;border:0px solid #e5e5e5;border-radius: 4px"/>
        	<p class="mt-3"><?php echo $book['subject'];?></p>
        	<div>
        		<h6 class="mb-2 text-muted">By: <span><?php echo $book['author']; ?></span></h6>
        		<?php $tags = explode('#',$book['tag']); ?>

                <?php
                    $distinctTags = array();
                    for($i=0;$i<sizeof($tags);$i++)
                    {
                        if((!in_array(strtolower($tags[$i]), $distinctTags)) && (!empty($tags[$i])))
                        {
                            array_push($distinctTags, strtolower($tags[$i]));
                        }
                    }
                ?>

        		<?php for($i=0;$i<sizeof($distinctTags);$i++): ?>
        			<a href="/index.php/books/filter/<?php echo $distinctTags[$i]; ?>"><span class="badge pl-2 pr-2 pb-1 badge-secondary"><?php echo ucwords($distinctTags[$i]); ?></span></a>
        		<?php endfor; ?>
        	</div>
        	<?php if($this->session->userdata('role') == 'teacher'): ?>
        		<a href="/index.php/teacher/books/edit/<?php echo $book['id']; ?>" class="pull-right btn mt-3">Edit</a>
        	<?php endif; ?>
		</div>
	</div>
</div>