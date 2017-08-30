<?php require 'app/View/Student/index.sourcelinks.php'; ?>
		<ul class="upper-menu internal">
			<li><a class="menu-icon" href="/">Back to home</a></li>
			<li><a class="menu-icon" href="/study-group">Change to see study groups list instead</a></li>
		</ul>
		<h1><?php echo $title; ?></h1>
		<a class="add" href="/student/new">Add a new student</a>
		<table class="records">
			<col class="content" span="6"/>
			<col class="action"  span="2"/>
			<tr>
				<th rowspan="2">#</th>
				<th rowspan="2">Name</th>
				<th rowspan="2">Gender</th>
				<th>Place</th>
				<th>Date</th>
				<th rowspan="2">Email</th>
				<th colspan="2" rowspan="2">Actions</th>
			</tr>
			<tr>
				<th colspan="2">of birth</th>
			</tr>
<?php foreach ($students as $student): ?>
			<tr>
<?php foreach ($student as $attr => $val): ?>
				<td><?php echo $val; ?></td>
<?php endforeach; ?>
				<td><a href="/student/<?php echo $student['id']; ?>">Show</a></td>
				<td>
					<form method="POST" action="/student/<?php echo $student['id']; ?>/delete">
						<input type="submit" value="Delete" class="delete"/>
<?php require 'app/View/Student/delete.sourcelinks.php'; ?>
					</form>
				</td>
			</tr>
<?php endforeach; ?>
		</table>
