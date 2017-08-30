<?php require 'app/View/Home/index.sourcelinks.php'; ?>
		<ul class="upper-menu internal">
			<li><a class="menu-icon" href="/student">Students list</a></li>
			<li><a class="menu-icon" href="/study-group">Study groups list</a></li>
		</ul>
		<h1><?php echo $title; ?></h1>
		This is an educational site for web programming with some narrow topics.
		Technically, the site itself is <a href="/doc/sample-webapp">a tiny web application</a>, a sample barely surpassing the level of a simple CRUD.
		But there is a self-made web application framework underlying the sample application. This provides the real topics of the site.
		<h2>Topics</h2>
		How to implement and use a <a href="/doc/custom-framework">standalone tiny embryonic web application framework</a>.
		<ul>
			<li>Loose coupling, modularity, code reuse: the sourcecode presents either familiar ad hoc techniques in a somewhat distilled form, or some standard ideas implemented in a simplified form. Some of these ideas come from <a href="http://symfony.com/">Symfony</a>.</li>
			<li>How to use ideas from declarative, functional programming paradigm in web programming, and how to implemet them in PHP. Most ideas are taken from <a href="https://www.haskell.org/">Haskell</a> world, and terminologies follow the conventions there.</li>
		</ul>
		There is also another goal and feature of this site &mdash; <a href="/doc/selfdoc">experimenting with a self-documenting content structure</a>:
		<ul>
			<li>Provide a sourcecode link structure for each functionality just in place on the user interface.</li>
			<li>For each functionality, arrange the sourcode link structure according to a call tree, maybe refined to represent the logics and architecture.</li>
		</ul>
		<h2>Contents, site map</h2>
		<ul>
		</ul>
