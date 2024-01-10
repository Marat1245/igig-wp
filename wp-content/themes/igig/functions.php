<?php
/**
 * igig functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package igig
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function igig_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on igig, use a find and replace
		* to change 'igig' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'igig', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'igig' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'igig_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'igig_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function igig_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'igig_content_width', 640 );
}
add_action( 'after_setup_theme', 'igig_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function igig_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'igig' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'igig' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'igig_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function igig_scripts() {
	wp_enqueue_style( 'igig-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'igig-style', 'rtl', 'replace' );

	wp_enqueue_script( 'igig-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'igig_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

add_action('wp_enqueue_scripts', 'my_wp_head_css' ); // хук автоматом сработает во время wp_head
function my_wp_head_css() {
	wp_enqueue_style( 'my_head_style', get_stylesheet_directory_uri() .'/css/style.css', array(), "1.4" );
	wp_enqueue_style( 'lightbox_style', get_stylesheet_directory_uri() .'/css/lightbox.min.css', array(), "1.0" );
}

add_action('wp_enqueue_scripts', 'my_wp_head_scripts');

function my_wp_head_scripts() {
    // Подключение вашего основного скрипта
    wp_enqueue_script('my_main_script', get_template_directory_uri() . '/js/main.js', array('jquery'), '1.1', true);

    // Подключение дополнительного скрипта (например, lightbox)
    wp_enqueue_script('lightbox_script', get_template_directory_uri() . '/js/lightbox.min.js', array('jquery', 'my_main_script'), '1.0', true);
}






if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title'    => 'Общие данные по сайту',
		'menu_title'    => 'Общие данные по сайту',
		'menu_slug'     => 'theme-general-settings',
		'capability'    => 'edit_posts',
		'redirect'      => false
	));
	
}

// Меню
add_action("after_setup_theme", function(){

	// add_theme_support("menu");

	 register_nav_menus([
		"header-menu" => "Подвал сайта"
	 ]);

});


class CSS_Menu_Walker extends Walker {
	var $db_fields = array('parent' => 'menu_item_parent', 'id' => 'db_id');
	
	
	function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
	
		global $wp_query;
		$indent = ($depth) ? str_repeat("t", $depth) : '';
		$class_names = $value = '';
		$classes = empty($item->classes) ? array() : (array) $item->classes;
		
		/* Добавление активного класса */
		if (in_array('menu__li', $classes)) {
			$classes[] = 'menu__li__active';
			unset($classes['menu__li']);
		}
		
		/* Проверка наличия дочерних элементов */
		$children = get_posts(array('post_type' => 'nav_menu_item', 'nopaging' => true, 'numberposts' => 1, 'meta_key' => '_menu_item_menu_item_parent', 'meta_value' => $item->ID));
		if (!empty($children)) {
			$classes[] = 'has-sub';
		}
		
		$class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
		$class_names = $class_names ? ' class=" menu__li ' . esc_attr($class_names) . '"' : '';
		
		$id = apply_filters('nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args);
		$id = $id ? ' id="' . esc_attr($id) . '"' : '';
		
		$output .= $indent . '<li' . $id . $value . $class_names .'>';
		
		$attributes  = ! empty($item->attr_title) ? ' title="'  . esc_attr($item->attr_title) .'"' : '';
		$attributes .= ! empty($item->target)     ? ' target="' . esc_attr($item->target    ) .'"' : '';
		$attributes .= ! empty($item->xfn)        ? ' rel="'    . esc_attr($item->xfn       ) .'"' : '';
		$attributes .= ! empty($item->url)        ? ' href="'   . esc_attr($item->url       ) .'"' : '';
		
		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>';
		$item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
		$item_output .= '</a>';
		$item_output .= '<a'. $attributes .'>';
		$item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;
		
		$output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
	}
	
	function end_el(&$output, $item, $depth = 0, $args = array()) {
		$output .= "</li>";
	}
}


add_filter( 'excerpt_more', function( $more ) {
	return '...';
} );

add_filter( 'excerpt_length', function(){
	return 50;
} );

function custom_excerpt_length($length) {
    // Устанавливаем желаемую длину отрывка в словах
    $desired_length = 35;

    // Проверяем, находимся ли мы на конкретной странице (например, на странице с ID 123)
    if (is_page(33)) {
        return $desired_length;
    }

    // Возвращаем длину отрывка по умолчанию для всех остальных страниц
    return $length;
}

add_filter('excerpt_length', 'custom_excerpt_length');



// Добавляем кнопку в редактор TinyMCE
function add_custom_button() {
    if (!current_user_can('edit_posts') && !current_user_can('edit_pages')) {
        return;
    }

    if ('true' == get_user_option('rich_editing')) {
        add_filter('mce_external_plugins', 'add_custom_button_script');
        add_filter('mce_buttons', 'register_custom_button');
    }
}

function add_custom_button_script($plugin_array) {
    $plugin_array['custom_button'] = get_template_directory_uri() . '/js/custom-button.js';
    return $plugin_array;
}

function register_custom_button($buttons) {
    array_push($buttons, 'custom_button');
    return $buttons;
}

add_action('admin_enqueue_scripts', 'add_custom_button');







// Создаем кастомыне посты
function custom_post_type() {
    $labels = array(
        'name'               => 'Новый проект',
        'singular_name'      => 'Проект',
        'add_new'            => 'Добавить новый',
        'add_new_item'       => 'Добавить новый проект',
        'edit_item'          => 'Редактировать проект',
        'new_item'           => 'Новый проект',
        'all_items'          => 'Все проекты',
        'view_item'          => 'Просмотреть проект',
        'search_items'       => 'Искать проект',
        'not_found'          => 'Проект не найден',
        'not_found_in_trash' => 'В корзине проектов не найдено',
        'menu_name'          => 'Проекты',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_rest'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'project'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array('title', 'editor', 'thumbnail'),
        'menu_icon'          => 'dashicons-location', // Измените иконку по вашему выбору
        'taxonomies'         => array('severny'),
    );

	// зарегистрировали кастомный пост
    register_post_type('project', $args);

    // Добавляем таксономию "Северный"
    register_taxonomy('severny', 'project', array(
        'label'        => 'Направления',
        'rewrite'      => array('slug' => 'severny'),
        'hierarchical' => false,
		'show_in_nav_menus' => true,
        'show_ui'           => true,
        'show_tagcloud'     => true,
        'show_admin_column' => true,
		"show_in_rest"      => true,



    ));
}

add_action('init', 'custom_post_type');

















// Изменяем запрос при сортировке по колонке "Направления"
function custom_taxonomy_column_orderby($query) {
    if (!is_admin()) {
        return;
    }

    $orderby = $query->get('orderby');

    if ('severny' === $orderby) {
        $query->set('orderby', 'severny');
        $query->set('meta_key', '');
    }
}

add_action('pre_get_posts', 'custom_taxonomy_column_orderby');




// ===============

// AJAX-обработчик для сохранения координат
function save_coordinates_callback() {
    $post_id = $_POST['post_id'];
    $x_coordinate = $_POST['x_coordinate'];
    $y_coordinate = $_POST['y_coordinate'];

    // Сохраняем координаты в метаполя
    update_post_meta($post_id, '_x_coordinate', $x_coordinate);
    update_post_meta($post_id, '_y_coordinate', $y_coordinate);

    echo 'Coordinates saved successfully';
    wp_die();
}

// Регистрация хука для AJAX-запроса
add_action('wp_ajax_save_coordinates', 'save_coordinates_callback');











function get_post_data_callback() {
    // Получаем ID поста из AJAX-запроса
    $post_id = $_POST['post_id'];

    // Получаем данные поста
    $post_data = array(
        'title' => get_the_title($post_id),
		'city' => get_field("project__city", $post_id),
        // Добавьте код для получения других данных поста
    );

    // Отправляем данные в формате JSON
    wp_send_json($post_data);

    // Обязательно завершаем выполнение скрипта после отправки данных
    wp_die();
}

// Обработчик AJAX-запроса для получения данных поста
add_action('wp_ajax_get_post_data', 'get_post_data_callback');
add_action('wp_ajax_nopriv_get_post_data', 'get_post_data_callback');







function custom_enqueue_scripts() {
    global $post;
    wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js', array('jquery'), '', true);

    // Передаем данные из PHP в JavaScript
    wp_localize_script('main', 'custom_script_vars', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
    ));
}
add_action('wp_enqueue_scripts', 'custom_enqueue_scripts');

// Обработчик AJAX-запроса
add_action('wp_ajax_get_custom_post_data', 'get_custom_post_data_callback');
add_action('wp_ajax_nopriv_get_custom_post_data', 'get_custom_post_data_callback');

function get_custom_post_data_callback() {
    $post_id = intval($_POST['post_id']);
    $post_title = get_the_title($post_id);
    $customer_name = get_field('project__customer', $post_id);
	$customer_city = get_field('project__city', $post_id);
    $customer_view = get_field('project__view', $post_id);
    $customer_spec = get_field('project__spec', $post_id);
    $customer_add = get_field('project__add', $post_id);

    
    $image_urls = array();

    if( have_rows('project__img__wrap', $post_id) ):

		// перебираем данные
	   while ( have_rows('project__img__wrap', $post_id) ) : the_row();
	
		   // отображаем вложенные поля
		   $image_urls[] = get_sub_field('project__img');
	
	   endwhile;
	
	else :
	
	   // вложенных полей не найдено
	
	endif;

    wp_send_json_success(array(
        'post_title' => $post_title,
        'customer_name' => $customer_name,
		'customer_city' => $customer_city,
        'customer_view' => $customer_view,
        'customer_spec' => $customer_spec,
        'customer_add' => $customer_add,
        'image_urls' => $image_urls, // Добавлен массив с URL изображений
    ));
}




// Регистрация AJAX-обработчика в WordPress
add_action('wp_ajax_get_projects_by_slug', 'get_projects_by_slug');
add_action('wp_ajax_nopriv_get_projects_by_slug', 'get_projects_by_slug');





function get_projects_by_slug() {
    $slug = $_POST['slug'];

	if($slug != "all"){
		$args = array(
			'post_type'      => 'project',
			'post_status'    => 'publish',
			'posts_per_page' => -1,
			'tax_query'      => array(
				array(
					'taxonomy' => 'severny',
					'field'    => 'slug',
					'terms'    => $slug,
				),
			),
		);
	} else{
		$args = array(
			'post_type'      => 'project',
			'post_status'    => 'publish',
			'posts_per_page' => -1,
			
		);
	}
   

    $query = new WP_Query($args);

    ob_start(); // Захват вывода
	if ($query->have_posts()) :

		// Инициализация массивов
		$important_thumbnail_ids   = array();
		$other_with_thumbnail_ids       = array();
		$other_without_thumbnail_ids    = array();


		while ($query->have_posts()) : $query->the_post();

			$post_id          = get_the_ID();
			$thumbnail_url    = get_the_post_thumbnail_url($post_id, 'thumbnail');
			$has_important_label = has_term('important', 'severny', $post_id);

			if ($has_important_label) {
				 $important_thumbnail_ids[] = $post_id;
			} else {
				if ($thumbnail_url) {
					$other_with_thumbnail_ids[] = $post_id;
					
				} else {
					$other_without_thumbnail_ids[] = $post_id;
				}
			}
		  
			// Теперь $sorted_posts содержит элементы сначала из $posts_with_thumbnail, затем из $posts_without_thumbnail
		endwhile;
		wp_reset_postdata();

		// Now you have four arrays:
		// $important_with_thumbnail_ids, $important_without_thumbnail_ids,
		// $other_with_thumbnail_ids, $other_without_thumbnail_ids
	   // Объединение массивов после завершения цикла
		$sorted_posts = array_merge($other_with_thumbnail_ids, $other_without_thumbnail_ids);
		$sorted_posts_all[] = $important_thumbnail_ids;
		$sorted_posts_all[] = $sorted_posts;

		$countImp = count($sorted_posts_all[0]);
		$countOth = count($sorted_posts_all[1]);


		
		$letters_for_sort_big_card = 0;
		$id_for_small_card = 0;
		$check_to_important_card = 0;

		$futer_project = '<div class="block-small">
						<div class="block-text block-city fz16">Проект в разработке</div>
						<div class="block-small__gradient"></div>
						<div class="block-small__img" style="background-image: url(' . get_template_directory_uri() . '/img/stub.svg)"></div>
					</div>';

		?>
		
	

<?php while( $check_to_important_card < $countImp){ ?>
<div class="block-wrap show__project__wrap">
  
		

		
		<?php if (isset($sorted_posts_all[1][$id_for_small_card])) { ?>

			<div class="block-1 block-small">
				<a href="<?php the_permalink($sorted_posts_all[1][$id_for_small_card]);?>">
					<div class="block-text block-city"><?php the_field("project__city", $sorted_posts_all[1][$id_for_small_card] ); ?></div>
					<div class="block-text block-name"><?php echo get_the_title($sorted_posts_all[1][$id_for_small_card]); ?></div>
					<div class="block-small__gradient"></div>
					<?php if(has_post_thumbnail($sorted_posts_all[1][$id_for_small_card])){ ?> 
						<div class="block-small__img" style="background-image: url(<?php echo get_the_post_thumbnail_url($sorted_posts_all[1][$id_for_small_card], 'large');?>); "></div>
					<?php  } else { ?>
						<div class="block-small__img" style="background-image: url(<? echo get_template_directory_uri() ?>/img/stub.svg "></div>
					
					<?php  }  ?>
				</a>
			</div>
	   

		<?php $id_for_small_card++; } else { // Если данные в массиве закончились  
			echo $futer_project; 
			$check_to_important_card = $countImp; // Завершаем цикл
		}    ?>


		<?php if (isset($sorted_posts_all[1][$id_for_small_card])) { ?>

		<div class="block-2 block-small">
			<a href="<?php the_permalink($sorted_posts_all[1][$id_for_small_card]);?>">
				<div class="block-text block-city"><?php the_field("project__city", $sorted_posts_all[1][$id_for_small_card] ); ?></div>
				<div class="block-text block-name"><?php echo get_the_title($sorted_posts_all[1][$id_for_small_card]); ?></div>
				<div class="block-small__gradient"></div>
				<?php if(has_post_thumbnail($sorted_posts_all[1][$id_for_small_card])){ ?> 
					<div class="block-small__img" style="background-image: url(<?php echo get_the_post_thumbnail_url($sorted_posts_all[1][$id_for_small_card], 'large');?>); "></div>
				<?php  } else { ?>
					<div class="block-small__img" style="background-image: url(<? echo get_template_directory_uri() ?>/img/stub.svg "></div>
				
				<?php  }  ?>
			</a>
		</div>


		<?php $id_for_small_card++; } else { // Если данные в массиве закончились  
		echo $futer_project; 
		$check_to_important_card = $countImp; // Завершаем цикл
		}    ?>
		<div class="block-3 block-big">
			<a href="<?php the_permalink($sorted_posts_all[0][$letters_for_sort_big_card]);?>">
				<div class="block-text block-city"><?php the_field("project__city", $sorted_posts_all[0][$letters_for_sort_big_card] ) ?></div>
				<div class="block-text block-name"><?php echo get_the_title($sorted_posts_all[0][$letters_for_sort_big_card] )?></div>
				<div class="block-small__gradient"></div>
				<?php if(has_post_thumbnail($sorted_posts_all[0][$letters_for_sort_big_card])){ ?> 
					<div class="block-small__img" style="background-image: url(<?php echo get_the_post_thumbnail_url($sorted_posts_all[0][$letters_for_sort_big_card], 'large');?>); "></div>
				<?php  } else { ?>
					<div class="block-small__img" style="background-image: url(<? echo get_template_directory_uri() ?>/img/stub.svg"></div>
				   
				<?php  }  ?>
			</a>
			
		</div>
		<?php $letters_for_sort_big_card++; ?>


		<?php if (isset($sorted_posts_all[1][$id_for_small_card])) { ?>
			<?php if (isset($sorted_posts_all[1][$id_for_small_card])) { ?>

			<div class="block-4 block-small">
				<a href="<?php the_permalink($sorted_posts_all[1][$id_for_small_card]);?>">
					<div class="block-text block-city"><?php the_field("project__city", $sorted_posts_all[1][$id_for_small_card] ); ?></div>
					<div class="block-text block-name"><?php echo get_the_title($sorted_posts_all[1][$id_for_small_card]); ?></div>
					<div class="block-small__gradient"></div>
					<?php if(has_post_thumbnail($sorted_posts_all[1][$id_for_small_card])){ ?> 
						<div class="block-small__img" style="background-image: url(<?php echo get_the_post_thumbnail_url($sorted_posts_all[1][$id_for_small_card], 'large');?>); "></div>
					<?php  } else { ?>
						<div class="block-small__img" style="background-image: url(<? echo get_template_directory_uri() ?>/img/stub.svg "></div>
					
					<?php  }  ?>
				</a>
			</div>


			<?php $id_for_small_card++; } else { // Если данные в массиве закончились  
			echo $futer_project; 
			$check_to_important_card = $countImp; // Завершаем цикл
			}   ?>

			<?php if (isset($sorted_posts_all[1][$id_for_small_card])) { ?>

			<div class="block-5 block-small">
				<a href="<?php the_permalink($sorted_posts_all[1][$id_for_small_card]);?>">
					<div class="block-text block-city"><?php the_field("project__city", $sorted_posts_all[1][$id_for_small_card] ); ?></div>
					<div class="block-text block-name"><?php echo get_the_title($sorted_posts_all[1][$id_for_small_card]); ?></div>
					<div class="block-small__gradient"></div>
					<?php if(has_post_thumbnail($sorted_posts_all[1][$id_for_small_card])){ ?> 
						<div class="block-small__img" style="background-image: url(<?php echo get_the_post_thumbnail_url($sorted_posts_all[1][$id_for_small_card], 'large');?>); "></div>
					<?php  } else { ?>
						<div class="block-small__img" style="background-image: url(<? echo get_template_directory_uri() ?>/img/stub.svg "></div>
					
					<?php  }  ?>
				</a>
			</div>


			<?php $id_for_small_card++; } else { // Если данные в массиве закончились  
			echo $futer_project; 
			$check_to_important_card = $countImp; // Завершаем цикл
			}   ?>
						<?php if (isset($sorted_posts_all[1][$id_for_small_card])) { ?>

			<div class="block-6 block-small">
				<a href="<?php the_permalink($sorted_posts_all[1][$id_for_small_card]);?>">
					<div class="block-text block-city"><?php the_field("project__city", $sorted_posts_all[1][$id_for_small_card] ); ?></div>
					<div class="block-text block-name"><?php echo get_the_title($sorted_posts_all[1][$id_for_small_card]); ?></div>
					<div class="block-small__gradient"></div>
					<?php if(has_post_thumbnail($sorted_posts_all[1][$id_for_small_card])){ ?> 
						<div class="block-small__img" style="background-image: url(<?php echo get_the_post_thumbnail_url($sorted_posts_all[1][$id_for_small_card], 'large');?>); "></div>
					<?php  } else { ?>
						<div class="block-small__img" style="background-image: url(<? echo get_template_directory_uri() ?>/img/stub.svg "></div>
					
					<?php  }  ?>
				</a>
			</div>


			<?php $id_for_small_card++; } else { // Если данные в массиве закончились  
			echo $futer_project; 
			$check_to_important_card = $countImp; // Завершаем цикл
			}   
		} else {
			$check_to_important_card = $countImp;
		}
			
			
		?>
	  
		
		

 
</div> 
<?php  $check_to_important_card++; }  ?>
<div class="block-wrap__for-other-cards show__project__wrap">
<?php   while(isset($sorted_posts_all[1][$id_for_small_card])){ ?>
	
	

	<div class="block-small">
		<a href="<?php the_permalink($sorted_posts_all[1][$id_for_small_card]);?>">
			<div class="block-text block-city"><?php the_field("project__city", $sorted_posts_all[1][$id_for_small_card] ); ?></div>
			<div class="block-text block-name"><?php echo get_the_title($sorted_posts_all[1][$id_for_small_card]); ?></div>
			<div class="block-small__gradient"></div>
			<?php if(has_post_thumbnail($sorted_posts_all[1][$id_for_small_card])){ ?> 
				<div class="block-small__img" style="background-image: url(<?php echo get_the_post_thumbnail_url($sorted_posts_all[1][$id_for_small_card], 'large');?>); "></div>
			<?php  } else { ?>
				<div class="block-small__img" style="background-image: url(<? echo get_template_directory_uri() ?>/img/stub.svg "></div>
			
			<?php  }  ?>
		</a>
	</div>





<?php $id_for_small_card++;   }?>
</div> 













	
				

<?php   

	else :
		echo '<p>No projects found.</p>';
	endif;
	wp_reset_postdata();
	

    $html_output = ob_get_clean(); // Получение захваченного вывода

    wp_send_json_success(array('html' => $html_output));
}


