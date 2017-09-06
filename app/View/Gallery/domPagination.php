		<ul class="upper-menu internal">
			<li><a class="menu-icon" href="/">Back to home</a></li>
			<li><a href="/samples">Email link samples</a></li>
		</ul>
		<h1><?php echo $title; ?></h1>
		<button id="left">Left</button>
		<button id="right">Right</button>
		<ul id="pics">
<?php foreach ($itemContents as $i => $itemContent): ?>
			<li id="<?php echo $i; ?>"><?php echo $itemContent; ?></li>
<?php endforeach; ?>
		</ul>
