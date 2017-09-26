<ul class="upper-menu internal">
			<li><a               class="menu-icon" href="/">Dev portal</a></li>
			<li><a               class="menu-icon" href="/samples">Sale email link samples</a></li>
			<li><a id="fallback" class="menu-icon" href="/focus2/<?php echo $saleId; ?>/<?php echo $pictureId; ?>">Plain version</a></li>
		</ul>
		<div id="header">
			Igthorn &amp; Toadie Ltd
		</div
		><div id="left-pane"
			><div id="big-one"
				><img id="focus" class="fitbox big" src="<?php echo $focusedPicture['src']; ?>"
			/></div>
			<span id="small-ones" data-count="<?php echo count($triagedPictures); ?>" data-triage-left="<?php echo $triageCfg['left']; ?>" data-triage-right="<?php echo $triageCfg['right']; ?>"
				><a href="/focus2-js/<?php echo $saleId; ?>/<?php echo $prevId; ?>"<?php if (!isset($prevId)): ?> class="hidden"<?php endif; ?>><img id="left" class="navigation small" src="/assets/img/left.png"/></a
<?php foreach ($triagedPictures as $i => $triagedPicture): ?>
<?php if ($triagedPicture[0] == 'focus'): ?>
				><a class="slide focus" data-order="<?php echo $i; ?>" data-href="/focus2-js/<?php echo $saleId; ?>/<?php echo $pictureId; ?>"><img id="focus-small" class="fitbox" data-dbid="<?php echo $triagedPicture[1]['id']; ?>" src="<?php echo $triagedPicture[1]['src']; ?>"/></a
<?php else: ?>
				><a class="slide <?php echo $triagedPicture[0]; ?>" data-order="<?php echo $i; ?>" href="/focus2-js/<?php echo $saleId; ?>/<?php echo $triagedPicture[1]['id']; ?>"><img class="fitbox small" data-dbid="<?php echo $triagedPicture[1]['id']; ?>" src="<?php echo $triagedPicture[1]['src']; ?>"/></a
<?php endif; ?>
<?php endforeach; ?>
				><a href="/focus2-js/<?php echo $saleId; ?>/<?php echo $nextId; ?>"<?php if (!isset($nextId)): ?> class="hidden"<?php endif; ?>><img id="right" class="navigation small" src="/assets/img/right.png"/></a
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
