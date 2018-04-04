<div class="m-5">
	<div class="alert alert-warning">
		<?php if(!empty($message) || isset($message)):?>
			<h4><?php print_r($message); ?></h4>
		<?php else: ?>
			<div class='text-center text-big'>
					<p>Looks like you landed here by mistake.</p>
					Lets go&nbsp;<a href='/'>home&nbsp;<i class="fa fa-home"></i></a></p>
			</div>
		<?php endif; ?>
	</div>	
</div>