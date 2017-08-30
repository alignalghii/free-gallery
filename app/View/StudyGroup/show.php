<?php require $isUpdateMode ? 'app/View/StudyGroup/show-update.sourcelinks.php'
                            : 'app/View/StudyGroup/show-create.sourcelinks.php';
?>
		<ul class="upper-menu internal">
			<li><a class="menu-icon" href="/study-group">Back to study groups list</a></li>
		</ul>
		<h1><?php echo $title; ?></h1>
		<h2>Watch or fill</h2>
		<form method="POST" action="<?php echo $actionUri; ?>">
			<ul>
<?php if ($isUpdateMode): ?>
				<li>Identity: <?php echo $studyGroup['id']; ?></li>
<?php endif; ?>
				<li>
					<span class="mandatory unique">Name:<sup>*1</sup></span>
					<input type="text" name="name" value="<?php echo $studyGroup['name']; ?>" placeholder="Mandatory and unique!"/>
<?php if ($validationErrors['name']): ?>
					<span class="error"><?php echo $validationErrors['name']; ?></span>
<?php endif; ?>
				</li>
				<li>
					Leader:
					<input type="text" name="leader" value="<?php echo $studyGroup['leader']; ?>"/>
				</li>
				<li>
					<span class="mandatory">Subject:<sup>*</sup></span>
					<input type="text" name="subject" value="<?php echo $studyGroup['subject']; ?>" placeholder="Mandatory! (Not necessarily unique.)"/>
<?php if ($validationErrors['subject']): ?>
					<span class="error"><?php echo $validationErrors['subject']; ?></span>
<?php endif; ?>
				</li>
				<li>
					<span class="mandatory">Created:<sup>*</sup></span>
					<input type="text" name="created" value="<?php echo $studyGroup['created']; ?>" placeholder="Mandatory! Format: yyyy-mm-dd hh:mm:ss"/>
<?php if ($validationErrors['created']): ?>
					<span class="error"><?php echo $validationErrors['created']; ?></span>
<?php endif; ?>
				</li>
			</ul>
			<a href="<?php echo $actionUri; ?>">Reset</a>
			<input type="submit" value="<?php echo $actionLabel; ?>"/>
<?php if ($errorSummaryMsg): ?>
			<span class="errorSummary"><?php echo $errorSummaryMsg; ?></span>
<?php endif; ?>
		</form>
<?php require $isUpdateMode ? 'app/View/StudyGroup/update.sourcelinks.php'
                            : 'app/View/StudyGroup/create.sourcelinks.php';
?>
		<h2>Notations and constraint rules</h2>
		<ul>
			<li>Fields decorated with an asterisk<sup>*</sup> superscript and typeset with <span class="mandatory">boldface font</span> are mandatory!</li>
			<li>Fields decorated with a small 1 number superscipt<sup>1</sup> and typeset with <span class="unique">italic font</span> must be unique among all records!</li>
			<li>Values in fields like date, email etc. must adhere to their respective format, just like in real life.</li>
		</ul>
