<?php

/**
 * @package TutorLMS/Templates
 * @version 1.4.3
 */


/**
 * Pagination info
 */



$per_page = tutor_utils()->get_option( 'pagination_per_page', 10 );
$paged    = (isset($_GET['current_page']) && is_numeric($_GET['current_page']) && $_GET['current_page'] >= 1) ? $_GET['current_page'] : 1;
$offset     = ($per_page * $paged) - $per_page;

$page_tabs = array(
	'enrolled-courses'                   => __('Enrolled Courses', 'tutor'),
	'enrolled-courses/active-courses'    => __('Active Courses', 'tutor'),
	'enrolled-courses/completed-courses' => __('Completed Courses', 'tutor'),
);

// Default tab set
(!isset($active_tab, $page_tabs[$active_tab])) ? $active_tab = 'enrolled-courses' : 0;

// Get Paginated course list
$courses_list_array = array(
	'enrolled-courses'                   => tutor_utils()->get_enrolled_courses_by_user(get_current_user_id(), array('private', 'publish'), $offset, $per_page),
	'enrolled-courses/active-courses'    => tutor_utils()->get_active_courses_by_user(null, $offset, $per_page),
	'enrolled-courses/completed-courses' => tutor_utils()->get_courses_by_user(null, $offset, $per_page),
);

// Get Full course list
$full_courses_list_array = array(
	'enrolled-courses'                   => tutor_utils()->get_enrolled_courses_by_user(get_current_user_id(), array('private', 'publish')),
	'enrolled-courses/active-courses'    => tutor_utils()->get_active_courses_by_user(),
	'enrolled-courses/completed-courses' => tutor_utils()->get_courses_by_user(),
);


// Prepare course list based on page tab
$courses_list =  $courses_list_array[$active_tab];
$paginated_courses_list =  $full_courses_list_array[$active_tab];


?> 
 <div class="tutor-fs-5 tutor-fw-medium tutor-color-black tutor-mb-16 tutor-capitalize-text"><?php esc_html_e($page_tabs[$active_tab]); ?></div>
<div class="tutor-dashboard-content-inner enrolled-courses tutor-container-flex">


	<?php if ($courses_list && $courses_list->have_posts()) : 
		$active = wc_memberships_is_user_active_member();

				if($active){
				?>
			<?php
			while ($courses_list->have_posts()) :
				$courses_list->the_post();
			?>
			<div class="tutor-card tutor-course-card">
				<?php tutor_load_template( 'loop.thumbnail' ); ?>

				<div class="tutor-card-body">
					<?php tutor_load_template( 'loop.rating' ); ?>
					
					<div class="tutor-course-name tutor-fs-6 tutor-fw-bold tutor-mb-32">
						<a href="<?php echo get_the_permalink(); ?>">
							<?php the_title(); ?>
						</a>
					</div>
					
					<div class="tutor-mt-auto">
						<?php tutor_load_template( 'loop.enrolled-course-progress' ); ?>
					</div>

					
				</div>
			</div>
		
			
		
			
    <?php
				
			endwhile;
			wp_reset_postdata();
			
		}
			
			?>
		<div class="tutor-mt-20">
			<?php
			if ($paginated_courses_list->found_posts > $per_page) :
				$pagination_data = array(
					'total_items' => $paginated_courses_list->found_posts,
					'per_page'    => $per_page,
					'paged'       => $paged,
				);
				tutor_load_template_from_custom_path(
					tutor()->path . 'templates/dashboard/elements/pagination.php',
					$pagination_data
				);
			endif;
			?>
		</div>
	<?php else : ?>
		<?php tutor_utils()->tutor_empty_state(tutor_utils()->not_found_text()); ?>
	<?php endif; ?>
</div>

