		<ul class="upper-menu internal">
			<li><a class="menu-icon" href="/">Back to home</a></li>
			<li><a class="menu-icon" href="/samples">Back to offer email link samples</a></li>
			<li><a class="menu-icon" href="/focus-js/<?php echo $offerId; ?>/<?php echo $pictureId; ?>">JavaScript version</a></li>
		</ul>
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
		<a id="left" <?php if (isset($prevId)): ?>href="<?php echo "/focus/$offerId/$prevId"; ?>"<?php else: ?>style="visibility: hidden"<?php endif; ?>>Left</a>
		<a id="right" <?php if (isset($nextId)): ?>href="<?php echo "/focus/$offerId/$nextId"; ?>"<?php else: ?>style="visibility: hidden"<?php endif; ?>>Right</a>
		<ul id="pics">
<?php foreach ($pictures as $picture): ?>
			<li>
				<img class="slide <?php echo $picture['id'] == $focus ? 'focus' : 'thumbnail'; ?>" src="<?php echo $picture['src']; ?>"/>
			</li>
<?php endforeach; ?>
		</ul>
