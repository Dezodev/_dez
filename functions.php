<?php
/*
 *  Author: DezoDev | @dezodev
 *  URL: http://dezodev.tk/
 */

/* Theme Support
**=====================================*/

$theme_variant = get_theme_mod('theme_variant_name', 'base');

if (!isset($content_width)) {
	$content_width = 900;
}

class DezoTheme_Main {
	function __construct() {
		// Setup theme
		$this->add_action('after_setup_theme', 'dezo_setup');

		// Scripts & styles
		$this->add_action('wp_enqueue_scripts', 'theme_scripts');

		// Navigation
		$this->add_action('after_setup_theme', 'require_menu_walker');
		$this->add_action('init', 'register_site_menu');
		$this->add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);

		// Sidebar
		$this->add_action('init', 'register_theme_sidebar');

		// Comments
		$this->add_action('get_header', 'enable_threaded_comments');
		$this->add_filter('comment_form_fields', 'dezo_move_comment_field_to_bottom');

		// Images
		$this->add_filter( 'post_thumbnail_html', 'remove_img_size_attribute', 10 );
		$this->add_filter( 'image_send_to_editor', 'remove_img_size_attribute', 10 );

		// Customizer
		$this->add_action( 'customize_register', 'dezo_customize_register' );
	}

	public function dezo_setup() {
		if (function_exists('add_theme_support')) {
			// Add Menu Support
			add_theme_support('menus');

			// Add default posts and comments RSS feed links to head.
			add_theme_support( 'automatic-feed-links' );

			// Add title support
			add_theme_support('title-tag');

			// Add Thumbnail Theme Support
			add_theme_support('post-thumbnails');
			add_image_size('cover', 1500, 643, true); // Cover
			add_image_size('xlarge', 1000, 429, true); // XLarge Thumbnail - 21:9
			add_image_size('large', 750, 322, true); // Large Thumbnail - 21:9
			add_image_size('large-169', 750, 421, true); // Large Thumbnail - 16:9
			add_image_size('medium-169', 320, 180, true); // Medium Thumbnail - 16:9
			add_image_size('small', 150, 150, true); // Small Thumbnail - 1:1

			// Site header image
			add_theme_support('custom-header', [
				'width'         => 1500,
				'height'        => 643,
				'default-image' => get_template_directory_uri() . '/images/header.jpg',
				'uploads'       => true,
				'flex-width' => false,
				'flex-height' => false,
			]);

			// Comments
			add_theme_support('html5', ['comment-list']);

			// Custom logo
			add_theme_support('custom-logo', array(
				'height'      => 70,
				'width'       => 300,
				'flex-width' => true,
			));

			// Localisation Support
			load_theme_textdomain('dezodev', get_template_directory() . '/languages');
		}
	}

	public function theme_scripts() {
		$templ_dir = get_bloginfo('template_url');
		$templ_ver = '0.0.1';

		/* -- CSS -- */
		$css_includes = [
			[
				'name'          => 'dez-theme-style',
				'url'           => $templ_dir. '/dist/css/global.css',
				'dependencies'  => false,
				'version'       => time(),
				'media'         => 'all'
			],
		];

		foreach ($css_includes as $css_include) {
			wp_register_style( $css_include['name'], $css_include['url'], $css_include['dependencies'], $css_include['version'], $css_include['media'] );
			wp_enqueue_style( $css_include['name'] );
		}

		/* -- JS -- */
		$js_includes = [
			[
				'name'          => 'dez-theme-script',
				'url'           => $templ_dir.'/dist/js/global.js',
				'dependencies'  => array(),
				'version'       => time(),
				'inFooter'      => true
			],
			[
				'name'          => 'dez-font-awesome',
				'url'           => 'https://kit.fontawesome.com/e6cf48bc6b.js',
				'dependencies'  => array(),
				'version'       => time(),
				'inFooter'      => false
			],
		];

		foreach ($js_includes as $js_include) {
			wp_register_script( $js_include['name'], $js_include['url'], $js_include['dependencies'], $js_include['version'], $js_include['inFooter'] );
			wp_enqueue_script( $js_include['name'] );
		}
	}

	public function require_menu_walker () {
		if ( !file_exists(get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php') ) {
			// file does not exist... return an error.
			return new WP_Error(
				'class-wp-bootstrap-navwalker-missing',
				__(
					'It appears the class-wp-bootstrap-navwalker.php file may be missing.',
					'wp-bootstrap-navwalker'
				)
			);
		} else {
			// file exists... require it.
			require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';
		}
	}

	public function register_site_menu() {
		register_nav_menus(array(
			'header-menu' => 'Menu principal', // Main Navigation
			'footer-menu' => 'Menu en pied de page', // Main Navigation
		));
	}

	public function dezo_nav ($location) {
		if (empty($location)) return false;
		$args = [];

		switch ($location) {
			case 'header-menu':
				$args = [
					'theme_location'  => $location,
					'container'       => 'ul',
					'depth'           => 2, // 1 = no dropdowns, 3 = with dropdowns.
					'container_id'    => 'bs-example-navbar-collapse-1',
					'menu_class'      => 'navbar-nav mr-auto',
					'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
					'walker'          => new WP_Bootstrap_Navwalker()
				];
				break;
			case "footer-menu":
				$args = [
					'theme_location'	=> $location,
					'container'			=> 'ul',
					'depth'				=> 1,
					'menu_class'		=> 'list-inline mb-0',
					'add_li_class'		=> 'list-inline-item',
				];
				break;
		}

		wp_nav_menu($args);
	}

	public function add_additional_class_on_li($classes, $item, $args) {
		if($args->add_li_class) {
			$classes[] = $args->add_li_class;
		}
		return $classes;
	}

	public function register_theme_sidebar() {
		register_sidebar([
			'id' => 'footer-sidebar',
			'name' => 'Footer',
			'before_widget' => '<div class="footer-widget col-12 col-sm-6 col-md %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<p class="footer-widget-title">',
			'after_title' => '</p>',
		]);
	}

	// Pagination
	public function dezo_pagination($echo) {
		global $wp_query;
		$big = 999999999; // need an unlikely integer
		$pages = paginate_links(array(
			'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'format' => '?paged=%#%',
			'current' => max( 1, get_query_var('paged') ),
			'total' => $wp_query->max_num_pages,
			'type'  => 'array',
			'prev_next'   => true,
		));
		if(is_array($pages)) {
			$paged = (get_query_var('paged') == 0) ? 1 : get_query_var('paged');
			$html = '<ul class="pagination">';
			foreach ( $pages as $page ) {
				$suppClass = (strpos($page, 'current') !== false)? ' active' : '';
				$page = str_replace('page-numbers', 'page-numbers page-link', $page);
				$html .= "<li class=\"page-item$suppClass\">$page</li>";
			}
			$html .= '</ul>';
			if ( $echo ) {
				echo $html;
			} else {
				return $html;
			}
		}
	}

		// Enable Threaded Comments
	public function enable_threaded_comments() {
		if (!is_admin()) {
			if (is_singular() and comments_open() and (get_option('thread_comments') == 1)) {
				wp_enqueue_script('comment-reply');
			}
		}
	}

		// Move comment field to bottom
	public function dezo_move_comment_field_to_bottom($fields) {
		$comment_field = $fields['comment'];
		unset( $fields['comment'] );
		$fields['comment'] = $comment_field;

		$cookies_field = $fields['cookies'];
		unset( $fields['cookies'] );
		$fields['cookies'] = $cookies_field;

		return $fields;
	}

	// Posts
	public function display_post_meta_info($link_to_comment = false) {
		$cat_list = get_the_category();
		$cat_len = sizeof($cat_list);

	?>
		<!-- <pre><code><?php print_r($cat_list) ?></code></pre> -->
		<div class="post-meta-infos">
			<div class="row">
				<div class="col-auto post-date">
					<time datetime="<?php the_time('c'); ?>">
						<?php the_time(get_option('date_format').' '.get_option('time_format')); ?>
					</time>
				</div>

				<?php if(get_theme_mod('dezo_post_meta_authors_display', 'show') == 'show') : ?>
					<div class="col-auto post-author">
						<i class="far fa-user-circle mr-1"></i>
						<?php the_author_posts_link(); ?>
					</div>
				<?php else : ?>
					<div class="col-auto post-author">
						<i class="far fa-user-circle mr-1"></i>
						<?= get_the_author() ?>
					</div>
				<?php endif ?>

				<?php if (comments_open(get_the_ID())): ?>
					<div class="col-auto post-comments">
						<i class="far fa-comment-alt mr-1"></i>
						<?php if($link_to_comment) echo '<a href="#comments-section" class="smooth-scroll">' ?>
						<?php echo get_comments_number() ?>
						<?php if($link_to_comment) echo '</a>' ?>
					</div>
				<?php endif; ?>

				<?php if ($cat_len > 0) : ?>
					<div class="col-auto ml-auto post-categories">
						<i class="fas fa-hashtag mr-1"></i>
						<?php
							$i = 1;
							foreach ($cat_list as $cat){
								echo '<a href="'. get_category_link($cat) .'">'. $cat->name .'</a>';
								if ($i != $cat_len) echo ', ';
								$i++;
							}
						?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	<?php
	}

	public function remove_img_size_attribute( $html ) {
		$html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
		return $html;
	}

	public function dezo_customize_register( $wp_customize ) {
		// Add sections
		$wp_customize->add_section('dezo_theme_options', [
			'title' 	=> __('Theme options', 'dezodev'),
			'description' => __('Allows you to customize settings for Theme.', 'dezodev'),
			'priority'	=> 30,
		]);

		// Add settings
		$all_settings = [
			[
				'name'			=> 'theme_variant_name',
				'type'			=> 'select',
				'section'		=> 'dezo_theme_options',
				'setting_args'	=> [ 'default' => 'base', ],
				'label'			=> __( 'Name of the theme variant', 'dezodev' ),
				'choices'		=> [
					'base'		=> 'Base',
					'dezodev'	=> 'DezoDev',
				]
			],
			[
				'name'			=> 'facebook_page_url',
				'type'			=> 'url',
				'section'		=> 'dezo_theme_options',
				'setting_args'	=> [ 'default' => null, ],
				'label'			=> __( 'Facebook page URL', 'dezodev' ),
				'description'	=> null,
				'input_attrs'	=> [
					'placeholder'	=> 'https://facebook.com/sample'
				],
			],
			[
				'name'			=> 'twitter_page_url',
				'type'			=> 'url',
				'section'		=> 'dezo_theme_options',
				'setting_args'	=> [ 'default' => null, ],
				'label'			=> __( 'Twitter page URL', 'dezodev' ),
				'description'	=> null,
				'input_attrs'	=> [
					'placeholder'	=> 'https://twitter.com/sample'
				],
			],
			[
				'name'			=> 'instagram_page_url',
				'type'			=> 'url',
				'section'		=> 'dezo_theme_options',
				'setting_args'	=> [ 'default' => null, ],
				'label'			=> __( 'Instagram page URL', 'dezodev' ),
				'description'	=> null,
				'input_attrs'	=> [
					'placeholder'	=> 'https://instagram.com/sample'
				],
			],
			[
				'name'			=> 'github_page_url',
				'type'			=> 'url',
				'section'		=> 'dezo_theme_options',
				'setting_args'	=> [ 'default' => null, ],
				'label'			=> __( 'GitHub page URL', 'dezodev' ),
				'description'	=> null,
				'input_attrs'	=> [
					'placeholder'	=> 'https://github.com/sample'
				],
			],
		];


		foreach ($all_settings as $set) {
			$wp_customize->add_setting($set['name'] , array_merge(
				$set['setting_args'],
				[ 'transport' => 'refresh', ]
			));

			switch ($set['type']) {
				case 'text':
				case 'url':
					$wp_customize->add_control($set['name'], [
						'type' => $set['type'],
						'section' => $set['section'],
						'label' => $set['label'],
						'description' => $set['description'],
						'input_attrs' => $set['input_attrs'],
					]);
					break;
				case 'select':
					$wp_customize->add_control($set['name'], [
						'type' => $set['type'],
						'section' => $set['section'],
						'label' => $set['label'],
						'description' => $set['description'],
						'input_attrs' => $set['input_attrs'],
						'choices' => $set['choices'],
					]);
					break;
				case 'color':
					$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, $set['name'], [
						'label'      => $set['label'],
						'section'    => $set['section'],
						'settings'   => $set['name'],
					]));
					break;
			}
		}

	}

		// Custom Comments Callback
	public function dezo_comments( $comment, $args, $depth ) {
		$tag = ( 'div' === $args['style'] ) ? 'div' : 'li';
		$comm_id = get_comment_ID();
		$comm_auth_name = get_comment_author();
		$this_post = get_post();

		if ($args['avatar_size'] != 0) {
			$comm_avatar_url = get_avatar_url($comment, [
				'size' => $args['avatar_size']
			]);
		} else {
			$comm_avatar_url = null;
		}

		echo "<$tag id=\"comment-$comm_id\" class=\"". join(' ', get_comment_class()) ."\">";
	?>
		<div class="comment-container" id="div-comment-<?= $comm_id ?>">
			<header class="comment-header row">
				<?php if (!empty($comm_avatar_url)): ?>
					<div class="col-auto comment-avatar">
						<img src="<?php echo $comm_avatar_url ?>" class="comment-author-avatar rounded-circle" alt="Commentaire de <?php echo $comm_auth_name ?>">
					</div>
				<?php endif; ?>
				<div class="col pl-0">
					<h5 class="comment-author-name">
						<?php echo $comm_auth_name ?>
					</h5>
					<p class="comment-extra-info mb-0">
						<time datetime="<?php comment_time( 'c' ); ?>">
							<?php echo get_comment_date(). ' ' .get_comment_time(); ?>
						</time>
						<?php if($this_post->post_author == $comment->user_id) echo ' &bull; '. __('Post author', 'dezodev') ?>
					</p>
				</div>
			</header>

			<?php if ($comment->comment_approved == false) : ?>
				<div class="alert alert-info comment-awaiting-moderation" role="alert">
					<?php _e('Your comment is awaiting moderation.', 'dezodev'); ?>
				</div>
			<?php endif; ?>

			<div class="comment-body">
				<div class="comment-content">
					<?php comment_text(); ?>
				</div>
			</div>

			<footer class="comment-footer">
				<?php
					comment_reply_link( array_merge( $args, array(
						'add_below' => 'div-comment',
						'depth'     => $depth,
						'max_depth' => $args['max_depth'],
					)));
				?>

				<?php edit_comment_link( __('Edit', 'dezodev')); ?>
			</footer>
		</div>
	<?php
	}

	public function dezo_get_page_type() {
		global $wp_query;
		$loop = 'notfound';

		if ( $wp_query->is_page ) {
			$loop = is_front_page() ? 'front' : 'page';
		} elseif ( $wp_query->is_home ) {
			$loop = 'home';
		} elseif ( $wp_query->is_single ) {
			$loop = ( $wp_query->is_attachment ) ? 'attachment' : 'single';
		} elseif ( $wp_query->is_category ) {
			$loop = 'category';
		} elseif ( $wp_query->is_tag ) {
			$loop = 'tag';
		} elseif ( $wp_query->is_tax ) {
			$loop = 'tax';
		} elseif ( $wp_query->is_archive ) {
			if ( $wp_query->is_day ) {
				$loop = 'day';
			} elseif ( $wp_query->is_month ) {
				$loop = 'month';
			} elseif ( $wp_query->is_year ) {
				$loop = 'year';
			} elseif ( $wp_query->is_author ) {
				$loop = 'author';
			} else {
				$loop = 'archive';
			}
		} elseif ( $wp_query->is_search ) {
			$loop = 'search';
		} elseif ( $wp_query->is_404 ) {
			$loop = 'notfound';
		}

		return $loop;
	}

	private function add_action($action, $fn, $priority = 10, $accepted_args = 1) {
		add_action($action, array(&$this, $fn), $priority, $accepted_args);
	}

	private function add_filter($tag, $fn, $priority = 10, $accepted_args = 1) {
		add_filter($tag, array(&$this, $fn), $priority, $accepted_args);
	}
}

$GLOBALS['DezoTheme_Main'] = new DezoTheme_Main();
