<?php

/**
 * Display single login
 *
 * @since v.1.0.0
 * @author themeum
 * @url https://themeum.com
 *
 * @package TutorLMS/Templates
 * @version 1.4.3
 */

if ( ! defined( 'ABSPATH' ) )
	exit;


if(!tutor_utils()->get_option('enable_tutor_native_login', null, true, true)) {
    // Refer to login oage
    header('Location: '.wp_login_url($_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']));
    exit;
}
    
tutor_utils()->tutor_custom_header();
$login_url = tutor_utils()->get_option('enable_tutor_native_login', null, true, true) ? '' : wp_login_url(tutor()->current_url);
?>


<?php do_action('tutor/template/login/before/wrap'); ?>
<div <?php tutor_post_class('tutor-page-wrap'); ?>>
    <div class="tutor-template-segment tutor-login-wrap">

        <div class="tutor-login-form-wrapper">
            <div class="tutor-fs-5 tutor-color-black tutor-mb-32">
                <?php 
                if (get_locale() == 'en_GB'){
                esc_html_e( 'Log in', 'tutor' ); 
                }
                else{
                    esc_html_e( 'Zaloguj się', 'tutor' );  
                }
                ?>
            </div>
            <?php
              
$lost_pass = apply_filters( 'tutor_lostpassword_url', wp_lostpassword_url() );
?>

<form id="tutor-login-form" method="post">
	<?php if ( is_single_course() ) : ?>
		<input type="hidden" name="tutor_course_enroll_attempt" value="<?php echo esc_attr( get_the_ID() ); ?>">
	<?php endif; ?>
	
	<input type="hidden" name="tutor_action" value="tutor_user_login" />
	<input type="hidden" name="redirect_to" value="<?php echo esc_url( tutor()->current_url ); ?>" />

	<div class="tutor-mb-20">
		<input type="text" class="tutor-form-control" placeholder="<?php esc_html_e( 'Username or Email Address', 'tutor' ); ?>" name="log" value="" size="20" />
	</div>

	<div class="tutor-mb-32">
		<input type="password" class="tutor-form-control" placeholder="<?php esc_html_e( 'Password', 'tutor' ); ?>" name="pwd" value="" size="20" />
	</div>

	<div class="tutor-login-error"></div>
	<?php
		do_action( 'tutor_login_form_middle' );
		do_action( 'login_form' );
		apply_filters( 'login_form_middle', '', '' );
	?>
	<div class="tutor-d-flex tutor-justify-between tutor-align-center tutor-mb-40">
		<div class="tutor-form-check">
			<input id="tutor-login-agmnt-1" type="checkbox" class="tutor-form-check-input tutor-bg-black-40" name="rememberme" value="forever" />
			<label for="tutor-login-agmnt-1" class="tutor-fs-7 tutor-color-muted">
				
				<?php 
				if (get_locale() == 'en_GB'){
				esc_html_e( 'Remember', 'tutor' );
				}
				else{
					echo 'Nie wylogowuj mnie'; 
				}
				
				?>
			</label>
		</div>
		<a href="<?php echo $lost_pass; ?>" class="tutor-btn tutor-btn-ghost">
		<?php 	if (get_locale() == 'en_GB'){
			esc_html_e( 'Forgot?', 'tutor' ); 
		}else {
			esc_html_e( 'Przypomnij hasło', 'tutor' ); 
		} ?>
			
		</a>
	</div>

	<?php do_action( 'tutor_login_form_end' ); ?>
	<button type="submit" class="tutor-btn tutor-btn-primary tutor-btn-block">
		<?php if (get_locale() == 'en_GB'){
		esc_html_e( 'Log in', 'tutor' ); }
		else {
			esc_html_e( 'Zaloguj się', 'tutor' );
		}
		?>
	</button>
	<?php if ( get_option( 'users_can_register', false ) ) : ?>
		<?php
			$url_arg = array(
				'redirect_to' => tutor()->current_url,
			);
			if ( is_single_course() ) {
				$url_arg['enrol_course_id'] = get_the_ID();
			}
			?>
		<div class="tutor-text-center tutor-fs-6 tutor-color-secondary tutor-mt-20">
			<?php if (get_locale() == 'en_GB'){
			esc_html_e( 'Don\'t have an account?', 'tutor' ); 
			}else {
				esc_html_e( 'Nie masz konta?', 'tutor' ); 
			}
			?>&nbsp;
			<a href="<?php echo esc_url( add_query_arg( $url_arg, tutor_utils()->student_register_url() ) ); ?>" class="tutor-btn tutor-btn-link">
				<?php 
				 if (get_locale() == 'en_GB'){
				esc_html_e( 'Register Now', 'tutor' ); }
				else {
					esc_html_e( 'Zarejestruj się', 'tutor' );
				}
				
				?>
			</a>
		</div>
	<?php endif; ?>
</form>
<?php 
echo do_shortcode('[]')
?>


            <?php do_action("tutor_after_login_form"); ?>
        </div>
    </div>
</div>
<?php 
    do_action('tutor/template/login/after/wrap');
    //tutor_load_template_from_custom_path(tutor()->path . '/views/modal/login.php');
    tutor_utils()->tutor_custom_footer();

    
?>
    

