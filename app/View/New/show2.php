<ul class="upper-menu internal">
			<li><a class="menu-icon" href="/">Dev portal</a></li>
			<li><a class="menu-icon" href="/samples">Sale email link samples</a></li>
			<li><a class="menu-icon" href="/focus2-js/<?php echo $saleId; ?>/<?php echo $pictureId; ?>">JavaScript version</a></li>
		</ul>
		<div id="header">
			Igthorn &amp; Toadie Ltd
		</div
		><div id="left-pane"
			><div id="big-one"
				><img class="fitbox big" src="<?php echo $focusedPicture['src']; ?>"
			/></div>
			<span id="small-ones"
				><a href="/focus2/<?php echo $saleId; ?>/<?php echo $prevId; ?>"<?php if (!isset($prevId)): ?> class="hidden"<?php endif; ?>><img class="navigation small" id="left" src="/assets/img/left.png"/></a
<?php foreach ($pictures as $picture): ?>
<?php if ($picture['id'] == $focus): ?>
				><img id="focus-small" class="fitbox" src="<?php echo $picture['src']; ?>"/
<?php else: ?>
				><a href="/focus2/<?php echo $saleId; ?>/<?php echo $picture['id']; ?>"><img class="fitbox small" src="<?php echo $picture['src']; ?>"/></a
<?php endif; ?>
<?php endforeach; ?>
				><a href="/focus2/<?php echo $saleId; ?>/<?php echo $nextId; ?>"><img class="navigation small<?php if (!isset($nextId)): ?> hidden<?php endif; ?>" id="right" src="/assets/img/right.png"/></a
			></span
		></div
		><div id="info">
			<h2>Sale data</h2>
			<ul>
				<li>Sent email: <?php echo $sale['sent_email']; ?></li>
				<li>Due till: <?php echo $sale['due_date']; ?></li>
				<li>
					Leader:
					<ul>
						<li>Name: <?php echo $sale['leader_name']; ?></li>
					</ul>
				</li>
				<li>
					Department:
					<ul>
						<li>Address: <?php echo $sale['department_address']; ?></li>
					</ul>
				</li>
			</ul>
		</div>
