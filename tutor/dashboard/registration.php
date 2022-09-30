<?php
/**
 * @package TutorLMS/Templates
 * @version 1.4.3
 */

?>

<?php if(!get_option( 'users_can_register', false )): ?> 
    <?php 
        $args = array(
            'image_path'    => tutor()->url.'assets/images/construction.png',
            'title'         => __('Oooh! Access Denied', 'tutor'),
            'description'   => __('You do not have access to this area of the application. Please refer to your system  administrator.', 'tutor'),
            'button'        => array(
                'text'      => __('Go to Home', 'tutor'),
                'url'       => get_home_url(),
                'class'     => 'tutor-btn'
            )
        );
        tutor_load_template('feature_disabled', $args); 
    ?>
<?php else: ?>

<?php do_action('tutor_before_student_reg_form');
?>
    <form method="post" enctype="multipart/form-data" id="tutor-registration-from">
        <input type="hidden" name="tutor_course_enroll_attempt" value="<?php echo isset( $_GET['enrol_course_id'] ) ? (int)$_GET['enrol_course_id'] : '';?>">
        <?php do_action('tutor_student_reg_form_start');?>

        <?php wp_nonce_field( tutor()->nonce_action, tutor()->nonce ); ?>
        <input type="hidden" value="tutor_register_student" name="tutor_action"/>

        <?php
        
        $errors = apply_filters('tutor_student_register_validation_errors', array());
        if (is_array($errors) && count($errors)){
            echo '<div class="tutor-alert-warning tutor-mb-12"><ul class="tutor-required-fields">';
            foreach ($errors as $error_key => $error_value){
                echo "<li>{$error_value}</li>";
            }
            echo '</ul></div>';
        }
        ?>

      
                    <input type="hidden" name="first_name" value="first-name" autocomplete="given-name">
               
                    <input type="hidden" name="last_name" value="last-name"  autocomplete="family-name">
               

       

        <div class="tutor-form-row">
            <div class="tutor-form-col-6">
                <div class="tutor-form-group">
                    <label>
                        <?php _e('User Name', 'tutor'); ?>
                        <span class="requirement-star">*</span>
                    </label>

                    <input type="text" name="user_login" class="tutor_user_name" value="<?php esc_attr_e(tutor_utils()->input_old('user_login')); ?>" required autocomplete="username">
                </div>
            </div>

            <div class="tutor-form-col-6">
                <div class="tutor-form-group">
                    <label>
                        <?php _e('E-Mail', 'tutor'); ?>
                        <span class="requirement-star">*</span>
                    </label>

                    <input type="text" name="email" value="<?php esc_attr_e(tutor_utils()->input_old('email')); ?>"  required autocomplete="email">
                </div>
            </div>

        </div>

        <div class="tutor-form-row">
            <div class="tutor-form-col-6">
                <div class="tutor-form-group">
                    <label>
                        <?php _e('Password', 'tutor'); ?>
                        <span class="requirement-star">*</span>
                    </label>

                    <input type="password" name="password" value="<?php esc_attr_e(tutor_utils()->input_old('password')); ?>" required autocomplete="new-password">
                </div>
            </div>

            <div class="tutor-form-col-6">
                <div class="tutor-form-group">
                    <label>
                        <?php _e('Password confirmation', 'tutor'); ?>
                        <span class="requirement-star">*</span>
                    </label>

                    <input type="password" name="password_confirmation" value="<?php esc_attr_e(tutor_utils()->input_old('password_confirmation')); ?>" required autocomplete="new-password">
                </div>
            </div>
        </div>


        <div class="tutor-form-row">
            <div class="tutor-form-col-12">
                <div class="tutor-form-group">
                <?php
                    //providing register_form hook
                    do_action('tutor_student_reg_form_middle');
                    do_action('register_form');
                ?>
                </div>
            </div>
        </div>    

        <?php do_action('tutor_student_reg_form_end');?>

        <?php
            $tutor_toc_page_link = tutor_utils()->get_toc_page_link();
        ?>
        
        <?php if( null !== $tutor_toc_page_link ) : ?>
        <div class="checkbox-cnt tutor-mb-24">
            <span class="wpcf7-form-control-wrap" data-name="your-accept"><span class="wpcf7-form-control wpcf7-acceptance optional"><span class="wpcf7-list-item"><label><input type="checkbox" name="your-accept" value="1" aria-invalid="false" class="form-checkbox">
            <?php if(get_locale()=='en_GB'){ ?>
            <span class="wpcf7-list-item-label">Accept the <a target="_blank" href="<?php echo $tutor_toc_page_link?>" title="<?php _e('statute', 'tutor'); ?>"><?php _e('statute', 'tutor'); ?></a> of site vids4you.pl</span></label></span></span></span>
           <?php } else { ?>
            <span class="wpcf7-list-item-label">Akceptuję <a target="_blank" href="<?php echo $tutor_toc_page_link?>" title="<?php _e('regulamin', 'tutor'); ?>"><?php _e('regulamin', 'tutor'); ?></a> strony vids4you.pl</span></label></span></span></span>
            <?php } ?>
        </div>
            <?php endif; ?>
        <div>
        
            <button type="submit" id="registration-verify" name="tutor_register_student_btn" value="register" class="tutor-btn tutor-btn-primary"><?php _e('Register', 'tutor'); ?></button>
        </div>
  


    </form>
    <?php 
 
    do_action('tutor_after_student_reg_form');?>
<?php endif;
 

?>


