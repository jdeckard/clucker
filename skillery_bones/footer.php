<?php if ( ( is_home() || is_front_page() ) && is_user_logged_in() ) : ?>
		<div class="knowledge_bubble pane">
			<h1><a href="http://clucker.calculat.es/?p=4">Keep Your Birds Healthy</a></h1>
			<p>By taking three simple steps, you can reduce the risk of disease-causing germs going to or coming from your farm or home. <a href="http://clucker.calculat.es/?p=4">read more</a></p>
		</div>
<?php endif; ?>
	</div><!-- #main -->
</div><!-- #wrapper -->
</div><!-- #clouds -->
</div><!-- #sky -->
<div id="horizon">
<?php if ( !is_user_logged_in() ) : ?>
	<div id="fence"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/backyard-chicken-app.png" alt="The Backyard Chicken App" /></div>
	<footer>
		<a href="#" id="join" onclick="$(this).hide();$('#log').show();return content('#register');"><strong>Join Now!</strong></a>
		<a href="#" id="log" class="hide" onclick="$(this).hide();$('#join').show();return content('#login');"><strong>Login</strong></a>
	</footer>
<?php endif; ?>
	<p class="copyright"><?=get_bloginfo("name");?> &copy; Copyright <?=date("Y");?>.</p>
<?php wp_footer(); ?>
</div><!-- #horizon -->
</body>
</html>