		<h1><?php echo $title; ?></h1>
		<h2>Offer</h2>
		<ul>
			<li>Sent email: <?php echo $offer['sent_email']; ?></li>
			<li>Due till: <?php echo $offer['due_date']; ?></li>
		</ul>
		<h3>Advisor</h3>
		<ul>
			<li>Name: <?php echo $offer['advisor_name']; ?></li>
		</ul>
		<h3>Flat</h3>
		<ul>
			<li>Address: <?php echo $offer['flat_address']; ?></li>
		</ul>
		<h4>Pictures</h4>
		<button id="left">Left</button>
		<button id="right">Right</button>
		<ul id="pics">
<?php foreach ($pictures as $picture): ?>
			<li>
				<img class="slide <?php echo $picture['id'] == $focus ? 'focus' : 'thumbnail'; ?>" src="<?php echo $picture['src']; ?>"/>
			</li>
<?php endforeach; ?>
		</ul>
