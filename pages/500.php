<?php if ($this->getConfig('site', 'env') === 'development' and isset($e) and $e instanceof Exception) : ?>

	<h1>An Error Occured</h1>
	<ul>
		<li><b>Message:</b> <?php echo $e->getMessage(); ?></li>
		<li><b>Line:</b> <?php echo $e->getLine(); ?></li>
		<li><b>File:</b> <?php echo $e->getFile(); ?></li>
	</ul>
	<pre><?php print_r(debug_backtrace()); ?></pre>

<?php else: ?>

	<h1>Internal Server Error</h1>

<?php endif; ?>