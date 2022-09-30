<?php
/**
 * A single course loop rating
 *
 * @since v.1.0.0
 * @author themeum
 * @url https://themeum.com
 *
 * @package TutorLMS/Templates
 * @version 1.4.3
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$class = isset( $class ) ? ' ' . $class : ' tutor-mb-8';
global $post;
$course_id = get_the_ID();
?>

<div class="tutor-course-ratings<?php echo esc_html( $class ); ?>">
    <div class="tutor-ratings">
        <div class="tutor-ratings-stars">
			<?php
				echo '<span class="date_published">Dodano: <p>' . get_the_date('Y-m-d', $course_id) . '</p></span>';
				
				echo do_shortcode('[post-views]');
			?>
        </div>

		
    </div>
</div>
