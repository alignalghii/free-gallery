<?php require 'app/View/StudyGroup/index.sourcelinks.php'; ?>
		<ul class="upper-menu internal">
			<li><a class="menu-icon" href="/">Back to home</a></li>
			<li><a class="menu-icon" href="/student">Change to see students list instead</a></li>
		</ul>
		<h1><?php echo $title; ?></h1>
		<a class="add" href="/study-group/new">Add a new study group</a>
		<table class="records">
			<col class="content" span="5"/>
			<col class="action"  span="2"/>
			<tr>
				<th>#</th>
				<th>Name</th>
				<th>Leader</th>
				<th>Subject</th>
				<th>Created</th>
				<th colspan="2">Actions</th>
			</tr>
<?php foreach ($studyGroups as $studyGroup): ?>
			<tr>
<?php foreach ($studyGroup as $attr => $val): ?>
				<td><?php echo $val; ?></td>
<?php endforeach; ?>
				<td><a href="/study-group/<?php echo $studyGroup['id']; ?>">Show</a></td>
				<td>
					<form method="POST" action="/study-group/<?php echo $studyGroup['id']; ?>/delete">
						<input type="submit" value="Delete" class="delete"/>
<?php require 'app/View/StudyGroup/delete.sourcelinks.php'; ?>
					</form>
				</td>
			</tr>
<?php endforeach; ?>
		</table>
