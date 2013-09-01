<?php
/*
Template Name: pimorse
*/
get_header(); ?>
<div class="entry-content-page">
<div id="container">
	<div id="content" role="main" class="cSarchive">
		<h1 style="text-align: center; font-size:24pt; font-size:1.5rem; margin-top:0px;"><?php the_title();?></h1>
                <?php
                        require_once('recaptcha-php/recaptchalib.php');
                        require_once('pimorse-config.php');
                	

                        if(isset($_POST["msg"])) {

                               $resp = recaptcha_check_answer ($privatekey,
                                      $_SERVER["REMOTE_ADDR"],
                                      $_POST["recaptcha_challenge_field"],
                                      $_POST["recaptcha_response_field"]);

                               if ($resp->is_valid) {
                                      $result = file_get_contents($myURL . 'morse.php?msg=' . urlencode($_POST["msg"]));
                                      echo $result;
                               } else {
                                        echo "<div class=\"morsemsg\">The reCAPTCHA wasn't entered correctly. Please try it again.</div>";
                               }
                               
                        }
                ?>
                <?php the_content();?>
               	<form action="index.php?page_id=1155" method="post">
			<input type="text" name="msg" size="80" maxlength="160" style="margin: 16px; margin: 1rem;"></br>
                        <script type="text/javascript">  
                        var RecaptchaOptions = {  
                           theme : 'clean'  
                        };  
                        </script>  

                        <?php
                        	require_once('recaptcha-php/recaptchalib.php');
                        	echo "<center>" . recaptcha_get_html($publickey) . "</center>";
                        ?>
			<input type="submit" value="Send Morse Code" name="submit" style="margin: 16px; margin: 1rem;">
		</form>
                <?php
                        if(isset($_GET["nolimit"])) {
                               echo "<h2>Complete Messages Log</h2>";
                               echo file_get_contents($myURL . 'log.php');
                        } else {
                               echo "<h2>Latest 15 Messages</h2>";
                               echo file_get_contents($myURL . 'log.php?limit=15');
                               echo "<a href=\"index.php?page_id=1155&nolimit=true\"> Click here to see the complete log file</a>";
                        }
                ?>

	</div><!-- #content -->
</div><!-- #container -->
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
