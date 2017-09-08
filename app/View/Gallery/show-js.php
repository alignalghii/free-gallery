		<ul class="upper-menu internal">
			<li><a class="menu-icon" href="/">Back to home</a></li>
			<li><a class="menu-icon" href="/samples">Back to offer email link samples</a></li>
			<li><a class="menu-icon" href="/focus/<?php echo $offerId; ?>/<?php echo $pictureId; ?>" id="fallback">Plain version</a></li>
		</ul>
		<h1><?php echo $title; ?></h1>
		<table class="records">
			<tr>
				<th>Offer</th>
				<th>Advisor</th>
				<th>Flat</th>
			</tr>
			<tr>
				<td>
					<ul>
						<li>Sent email: <?php echo $offer['sent_email']; ?></li>
						<li>Due till: <?php echo $offer['due_date']; ?></li>
					</ul>
				</td>
				<td>
					<ul>
						<li>Name: <?php echo $offer['advisor_name']; ?></li>
					</ul>
				</td>
				<td>
					<ul>
						<li>Address: <?php echo $offer['flat_address']; ?></li>
					</ul>
				</td>
			</tr>
		</table>
		<h2 id="focus-label">Focusing picture #<?php echo $pictureId; ?></h2>
		<button id="left">Left</button>
		<button id="right">Right</button>
		<ul id="pics">
<?php foreach ($pictures as $picture): ?>
			<li>
				<img id="pic<?php echo $picture['id']; ?>" class="slide <?php echo $picture['id'] == $focus ? 'focus' : 'thumbnail'; ?>" src="<?php echo $picture['src']; ?>"/>
			</li>
<?php endforeach; ?>
		</ul>
