<?php get_header(); ?>
<?php if ( is_home() || is_front_page() ) : if ( !is_user_logged_in() ) : ?>
<form id="login" class="wall pane" action="http://clucker.calculat.es/wp-login.php" method="post">
	<input type="text" id="email" name="log" class="txt" value="email" onfocus="toggval('email','email');" onblur="toggval('email','email');" />
	<input type="text" id="pwd" class="txt" value="password" onfocus="showpass();" />
	<input type="password" name="pwd" id="reelpwd" class="txt" style="display:none;" onblur="toggpass();" />
	<input type="submit" class="btn" value="Login" />
	<input type="hidden" name="redirect_to" value="http://clucker.calculat.es/" />
	<input type="hidden" name="testcookie" value="1" />
</form>
<form id="register" class="pane wall hide">
	<!--<input type="text" id="remail" class="txt" value="email" onfocus="toggval('email','remail');" onblur="toggval('email','remail');" />
	<input type="submit" class="btn" value="Join Now" />-->
	<p><strong>Clucker!</strong> was developed as part of the <a href="http://spaceappschallenge.org/project/clucker/">2013 NASA Space Apps Challenge</a>. It is only a prototype. You can not register but you may login using email "test@clucker.calculat.es" and password "testuser" to try it out!</p>
</form>
<?php else : ?>
<div id="dashboard" class="pane">
	<a href="#" onclick="return content('#add_chicken');" class="bigg_but"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/add_chicken.png" /></a>
	<a href="#" onclick="return content('#add_egg');" class="bigg_but"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/add_eggs.png" /></a>
	<a href="#" onclick="refresh_stats();return content('#charts');" class="bigg_but"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/charts_reports.png" /></a>
	<a href="#" onclick="get_chickens();return content('#manage_flock');" class="bigg_but"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/manage_flock.png" /></a>
</div>
<form id="add_chicken" class="pane wall hide" action="http://clucker.calculat.es/" method="post">
	<h1>Add a Chicken</h1>
	<input type="text" name="chicken_name" id="chickname" class="txt" value="chicken's name" onfocus="toggval('chicken\'s name','chickname');" onblur="toggval('chicken\'s name','chickname');" />
	<input type="submit" class="btn" value="Add Chicken" />
	<p class="next">Go to.. <a href="#" onclick="get_chickens();return content('#manage_flock');"><em>Manage Flock</em></a>
</form>
<form id="add_egg" class="pane wall hide" action="http://clucker.calculat.es/" method="post">
	<h1>Add Eggs</h1>
	<input type="text" id="eggcount" name="eggcount" class="txt" value="number of eggs collected" onfocus="toggval('number of eggs collected','eggcount');" onblur="toggval('number of eggs collected','eggcount');" />
	<select class="txt" name="date" id="date">
		<option value="<?=date('Y-m-d 00:00:01');?>">Today</option>
		<option value="<?=date('Y-m-d 00:00:01',strtotime("yesterday"));?>">Yesterday</option>
		<option value="<?=date('Y-m-d 00:00:01',strtotime("2 days ago"));?>">2 Days Ago</option>
		<option value="<?=date('Y-m-d 00:00:01',strtotime("3 days ago"));?>">3 Days Ago</option>
	</select>
	<input type="submit" class="btn" value="Add Eggs" />
	<p class="next">Go to.. <a href="#" onclick="refresh_stats();return content('#charts');"><em>Charts &amp; Reports</em></a>
</form>
<div id="charts" class="pane hide">
	<h1>Charts &amp; Reports</h1>
	<div class="stat" id="today"><p class="number"><?=get_count("DAY",false);?></p>Eggs Today</a></div>
	<div class="stat" id="week"><p class="number"><?=get_count("WEEK",false);?></p>Eggs this Week</a></div>
	<div class="stat" id="month"><p class="number"><?=get_count("MONTH",false);?></p>Eggs this Month</a></div>
	<div class="stat" id="year"><p class="number"><?=get_count("YEAR",false);?></p>Eggs this Year</a></div>
	<p class="next">Go to.. <a href="#" onclick="return content('#add_egg');"><em>Add Eggs</em></a>
</div>
<form id="manage_flock" class="pane hide">
	<h1>Manage Flock</h1>
	<div id="chicklist"></div>
	<p class="next">Go to.. <a href="#" onclick="return content('#add_chicken');"><em>Add a Chicken</em></a>
</form>
<?php endif; else : global $post; ?>
	<div id="content">
	<h1><?=$post->post_title;?></h1>
	<?=$post->post_content;?>
	</div>
<?php endif; ?>
<?php get_footer(); ?>
<div id="sql"></div>