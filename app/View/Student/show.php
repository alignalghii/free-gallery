<?php require $isUpdateMode ? 'app/View/Student/show-update.sourcelinks.php'
                            : 'app/View/Student/show-create.sourcelinks.php';
?>
		<ul class="upper-menu internal">
			<li><a class="menu-icon" href="/student">Back to students list</a></li>
		</ul>
		<h1><?php echo $title; ?></h1>
		<h2>Watch or fill</h2>
		<form method="POST" action="<?php echo $actionUri; ?>">
			<ul>
<?php if ($isUpdateMode): ?>
				<li>Identity: <?php echo $student['id']; ?></li>
<?php endif; ?>
				<li>
					<span class="mandatory">Name:<sup>*</sup></span>
					<input type="text" name="name" value="<?php echo $student['name']; ?>" placeholder="Not necessarily unique!"/>
<?php if ($validationErrors['name']): ?>
					<span class="error"><?php echo $validationErrors['name']; ?></span>
<?php endif; ?>
				</li>
				<li>
					Is male?
					<input type="checkbox" name="is_male"<?php if ($student['is_male']): ?> checked<?php endif; ?>/>
				</li>
				<li>
					Place of birth:
					<input type="text" name="place_of_birth" value="<?php echo $student['place_of_birth']; ?>"/>
				</li>
				<li>
					Date of birth:
					<input type="text" name="date_of_birth" value="<?php echo $student['date_of_birth']; ?>" placeholder="yyyy-mm-dd"/>
<?php if ($validationErrors['date_of_birth']): ?>
					<span class="error"><?php echo $validationErrors['date_of_birth']; ?></span>
<?php endif; ?>
				</li>
				<li>
					<span class="mandatory unique">Email:<sup>*1</sup></span>
					<input type="text" name="email" value="<?php echo $student['email']; ?>" placeholder="Unique! Format: xy@host.com"/>
<?php if ($validationErrors['email']): ?>
					<span class="error"><?php echo $validationErrors['email']; ?></span>
<?php endif; ?>
				</li>
			</ul>
			<a href="<?php echo $actionUri; ?>">Reset</a>
			<input type="submit" value="<?php echo $actionLabel; ?>"/>
<?php if ($errorSummaryMsg): ?>
			<span class="errorSummary"><?php echo $errorSummaryMsg; ?></span>
<?php endif; ?>
		</form>
<?php require $isUpdateMode ? 'app/View/Student/update.sourcelinks.php'
                            : 'app/View/Student/create.sourcelinks.php';
?>
		<h2>Notations and constraint rules</h2>
		<ul>
			<li>Fields decorated with an asterisk<sup>*</sup> superscript and typeset with <span class="mandatory">boldface font</span> are mandatory!</li>
			<li>Fields decorated with a small 1 number superscipt<sup>1</sup> and typeset with <span class="unique">italic font</span> must be unique among all records!</li>
			<li>Values in fields like date, email etc. must adhere to their respective format, just like in real life.</li>
		</ul>
