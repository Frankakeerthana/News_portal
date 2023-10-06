<?php
/**
 * News functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package News
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
function news_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on News, use a find and replace
		* to change 'news' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'news', get_template_directory() . '/languages' );

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
            'menu-1' => esc_html__( 'Primary', 'news' ), // Primary menu location
            'menu-2' => esc_html__( 'Secondary', 'news' ) // Secondary menu location
        )
	);    
    // function register_custom_menu() {
    //     register_nav_menu('header_menu', 'Header Menu');
    // }
    // add_action('after_setup_theme', 'register_custom_menu');

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
			'news_custom_background_args',
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
add_action( 'after_setup_theme', 'news_setup' );


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function news_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'news_content_width', 640 );
}
add_action( 'after_setup_theme', 'news_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function news_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'news' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'news' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'news_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function news_scripts() {
	wp_enqueue_style( 'news-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'news-style', 'rtl', 'replace' );
    //wp_enqueue_style('datatables-css', get_template_directory_uri() . '/css/jquery.dataTables.min.css');
   // wp_enqueue_script('datatables-js', get_template_directory_uri() . '/js/jquery.dataTables.min.js', array('jquery'), '1.13.6', true);   
	wp_enqueue_script( 'news-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'news_scripts' );

function custom_scripts_news(){
    wp_enqueue_style('bootstrap-css-test', get_template_directory_uri() . '/css/bootstrap.min.css');
     wp_enqueue_script('news-jquery-test', get_template_directory_uri() . '/js/jquery-3.6.3.min.js', array('jquery'), '3.6.3', true);
    // wp_enqueue_script('news-jquery-test-frank', get_template_directory_uri() . '/js/jquery-3.7.1.min.js', array('jquery'), '3.7.1', true);
    wp_enqueue_script('bootstrap-bundle-test', get_template_directory_uri() . '/js/bootstrap.bundle.min.js', array('jquery'), '5.0.2', true);
}
add_action( 'wp_enqueue_scripts', 'custom_scripts_news' );
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

/* Custom Post Types */

function create_entertainment_post_type() {
    $labels = array(
        'name' => 'Entertainment',
        'singular_name' => 'Entertainment',
        'menu_name' => 'Entertainment',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Entertainment',
        'edit_item' => 'Edit Entertainment',
        'new_item' => 'New Entertainment',
        'view_item' => 'View Entertainment',
        'search_items' => 'Search Entertainment',
        'not_found' => 'No Entertainment found',
        'not_found_in_trash' => 'No Entertainment found in Trash',
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-video-alt2', // You can change the menu icon
        'rewrite' => array('slug' => 'entertainment'), // Custom URL slug
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'comments'),
        'show_in_rest' => true, // Enable REST API support
		'capability_type' => 'entertainment', // Custom capability type
        //'map_meta_cap' => true, // Map meta capabilities
		'capabilities' => array(
            'publish_posts' => 'publish_entertainment',
            'edit_posts' => 'edit_entertainment',
            'edit_others_posts' => 'edit_other_entertainment',
            'delete_posts' => 'delete_entertainment',
            'read_private_posts' => 'read_private_entertainment',
            'edit_post' => 'edit_entertainment',
            'delete_post' => 'delete_entertainment',
            'read_post' => 'read_entertainment',
        ),
    );
	//error_log(print_r($args, true));
    register_post_type('entertainment', $args);
}

add_action('init', 'create_entertainment_post_type');

// Custom post type for live updates
function create_live_updates_post_type() {
    $labels = array(
        'name' => 'Live Updates',
        'singular_name' => 'Live Update',
        'menu_name' => 'Live Updates',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Live Update',
		'edit' => 'Edit',
        'edit_item' => 'Edit Live Update',
        'new_item' => 'New Live Update',
        'view_item' => 'View Live Update',
        'search_items' => 'Search Live Updates',
        'not_found' => 'No Live Updates found',
        'not_found_in_trash' => 'No Live Updates found in Trash',
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
		'hierarchical' => true, // Hierarchical structure
        'has_archive' => true,
        'menu_icon' => 'dashicons-megaphone', // You can change the menu icon
        'rewrite' => array('slug' => 'live-updates'), // Custom URL slug
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'comments'),
		'show_in_rest' => true, // Enable REST API support
        'capability_type' => 'live-updates', // Use standard post capabilities
		//'map_meta_cap' => true,
		/* set the capabilities for both plural AND single, e.g. */
        'capabilities' => array(
            'publish_posts' => 'publish_live-updates',
            'edit_posts' => 'edit_live-updates',
            'edit_others_posts' => 'edit_other_live-updates',
            'delete_posts' => 'delete_live-updates',
            'read_private_posts' => 'read_private_live-updates',
            'edit_post' => 'edit_live-updates',
            'delete_post' => 'delete_live-updates',
            'read_post' => 'read_live-updates',
        ),
    );
	//error_log(print_r($args, true));
    register_post_type('live-updates', $args);
}

add_action('init', 'create_live_updates_post_type');

// Function to get districts based on the selected state
function get_districts() {
	$page_id = 53;
    $state_id = $_POST['state_id'];
	$group_field = get_field('districts',$page_id);
	$output = '<option value="">Select an option</option>';
	while ( have_rows('districts',$page_id) ){ the_row();		
    // Determine the ACF field to fetch based on the state_id
    $state_field = '';
	// Check if $state_id matches any of the specified state IDs
	if ($state_id == 'andhra_pradesh' || $state_id == 'telangana' || $state_id == 'arunachal_pradesh'|| $state_id == 'assam'|| $state_id == 'bihar'|| $state_id == 'chhattisgarh'|| $state_id == 'goa'|| $state_id == 'gujarat'|| $state_id == 'haryana' || $state_id == 'himachal_pradesh'|| $state_id == 'jharkhand'|| $state_id == 'karnataka'|| $state_id == 'kerala' || $state_id == 'madhya_pradesh' || $state_id == 'maharashtra'|| $state_id == 'manipur' || $state_id == 'meghalaya'|| $state_id == 'mizoram'|| $state_id == 'nagaland') {
		$state_field = $state_id;
	}
	if ($state_field) {
		$districts = get_sub_field($state_field);
        if ($districts) {			
        foreach ($districts as $district) { 
            $output .= '<option value="' . esc_attr($district['value']) . '">' . esc_html($district['label']) . '</option>';
        }
        }
	}
    } 
    echo $output;
    wp_die(); 
}

add_action('wp_ajax_get_districts', 'get_districts');
add_action('wp_ajax_nopriv_get_districts', 'get_districts');

// Function to get constituencies based on the selected districts
function get_constituencies() {
	$page_id = 53;
    $district_id = $_POST['district_id'];
	$group_field = get_field('constituencies',$page_id);
	//var_dump($group_field);
	$output = '<option value="">Select an option</option>';
	while ( have_rows('constituencies',$page_id) ){ the_row();		
    // Determine the ACF field to fetch based on the district_id
    $district_field = '';
	// Check if $district_id matches any of the specified district IDs
	if ($district_id == 'anantapur'||$district_id == 'chittor' || $district_id == 'warangal_urban' ) {
		$district_field = $district_id;
	}
	if ($district_field) {
		$constituencies = get_sub_field($district_field);
        if ($constituencies) {			
        foreach ($constituencies as $constituency) { 
            $output .= '<option value="' . esc_attr($constituency['value']) . '">' . esc_html($constituency['label']) . '</option>';
        }
        }
	}
    } 
    echo $output;
    wp_die(); 
}

add_action('wp_ajax_get_constituencies', 'get_constituencies');
add_action('wp_ajax_nopriv_get_constituencies', 'get_constituencies');

// Register Custom Post Type
function candidate_post_type() {
    $labels = array(
        'name'               => 'Candidates',
        'singular_name'      => 'Candidate',
        'menu_name'          => 'Candidates',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Candidate',
        'edit_item'          => 'Edit Candidate',
        'new_item'           => 'New Candidate',
        'view_item'          => 'View Candidate',
        'view_items'         => 'View Candidates',
        'search_items'       => 'Search Candidates',
        'not_found'          => 'No candidates found',
        'not_found_in_trash' => 'No candidates found in trash',
    );
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'candidate' ),
        'capability_type'    => 'post',
        'menu_icon'          => 'dashicons-businessman',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'supports'           => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'page-attributes', 'comments', 'excerpt' ),
    );
    register_post_type( 'candidate', $args );
}
add_action( 'init', 'candidate_post_type' );

// Register Custom Taxonomy
function constituency_taxonomy() {
    $labels = array(
        'name'                       => 'Constituencies',
        'singular_name'              => 'Constituency',
        'menu_name'                  => 'Constituencies',
        'all_items'                  => 'All Constituencies',
        'edit_item'                  => 'Edit Constituency',
        'view_item'                  => 'View Constituency',
        'update_item'                => 'Update Constituency',
        'add_new_item'               => 'Add New Constituency',
        'new_item_name'              => 'New Constituency Name',
        'parent_item'                => 'Parent Constituency',
        'parent_item_colon'          => 'Parent Constituency:',
        'search_items'               => 'Search Constituencies',
        'popular_items'              => 'Popular Constituencies',
        'separate_items_with_commas' => 'Separate constituencies with commas',
        'add_or_remove_items'        => 'Add or remove constituencies',
        'choose_from_most_used'      => 'Choose from the most used constituencies',
        'not_found'                  => 'No constituencies found',
    );
    $args = array(
        'labels'            => $labels,
        'hierarchical'      => true,
        'public'            => true,
        'show_ui'           => true,
        'show_in_nav_menus' => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'constituency' ),
    );
    register_taxonomy( 'constituency', array( 'candidate' ), $args );
}
add_action( 'init', 'constituency_taxonomy' );

function get_candidates() {
    $constituency_id = $_POST['constituency_id'];
    $state_id = $_POST['state_id']; // Get the selected state from AJAX request
    $district_id = $_POST['district_id']; // Get the selected district from AJAX request
    $post_permalink = get_permalink($post_id);
    // Get the term (constituency) object using the slug
    $constituency_term = get_term_by('slug', $constituency_id, 'constituency'); 
        // Check if the term (constituency) exists
        if ($constituency_term) {
            // Query candidates based on the selected constituency term and custom post type
            $candidates_args = array(
                'post_type' => 'candidate', // Replace with your custom post type name
                'posts_per_page' => -1, // Retrieve all candidates
                'tax_query' => array(
                    array(
                        'taxonomy' => 'constituency', // Replace with your custom taxonomy name
                        'field' => 'term_id',
                        'terms' => $constituency_term->term_id,
                    ),
                ),
            );
        $candidates_query = new WP_Query($candidates_args);
        if ($candidates_query->have_posts()) {
            // Start building the HTML table
            $output = '<table class="table table-bordered table-striped">';
            $output .= '<thead><tr><th>Name</th><th>State</th><th>District</th><th>Constituency</th></tr></thead>';
            $output .= '<tbody>';

            while ($candidates_query->have_posts()) {
                $candidates_query->the_post();
                // Get the post ID
                $post_id = get_the_ID();
                $candidate_permalink = get_permalink($post_id);
                // Get candidate data (you can customize this based on your post type fields)
                $candidate_name = get_the_title();
                // Append candidate data to the table row
                $output .= '<tr>';
                $output .= '<td><a href="' . esc_url($candidate_permalink) . '">' . esc_html($candidate_name) . '</a></td>';
                $output .= '<td>' .  esc_html(str_replace('_', ' ', $state_id)) . '</td>';
                $output .= '<td>' .  esc_html(str_replace('_', ' ', $district_id)) . '</td>';
                //$output .= '<td>' . esc_html($constituency_id) . '</td>';
                $output .= '<td>' . esc_html($constituency_term->name) . '</td>';
                $output .= '</tr>';
            }
            $output .= '</tbody>';
            $output .= '</table>';
        } else {
            // No candidates found for the selected constituency term
            $output = '<p>No candidates found for this constituency.</p>';
        }
    } else {
        // Term (constituency) not found
        $output = '<p>Invalid constituency selected.</p>';
    }

    // Send the HTML response back to the AJAX request
    echo $output;

    // Always exit to avoid further processing
    wp_die();
}
add_action('wp_ajax_get_candidates', 'get_candidates');
add_action('wp_ajax_nopriv_get_candidates', 'get_candidates');


// Fetch all the course details from all courses page
function get_candidate_details(){
    //$page_url = '';
    $post_id = get_the_ID();
    $output = array();
    if($post_id > 0){
      if( have_rows('candidate_details',$post_id) ):
        while( have_rows('candidate_details',$post_id) ): the_row();
             // $title = the_title();
             // $post_content = the_content();
              $parties = get_sub_field('party');
              $crimal_cases = get_sub_field('crimal_cases');
              $education = get_sub_field('education');
              $age = get_sub_field('age');
              $total_assests = get_sub_field('total_assests');
              $liabilities =  get_sub_field('liabilities');
              $output[] = array("party"=>$parties,"crimal_cases"=>$crimal_cases,"education"=>$education,"age"=>$age,"total_assests"=>$total_assests,"liabilities"=>$liabilities);
            endwhile;
          endif; 
    }
    return $output;
}

function filter_blog_cards() {
    //check_ajax_referer('ajax-nonce', 'nonce');
    $category_slug = sanitize_text_field($_POST['category']);
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => -1,
        'tax_query' => array(
            array(
                'taxonomy' => 'category',
                'field' => 'slug',
                'terms' => $category_slug,
                'operator' => 'IN',
            ),
        ),
    );
    $query = new WP_Query($args);
    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();
            // Output your blog card HTML here
            // You can use the same HTML structure as in your original code
            get_template_part('template-parts/blog-card');
        endwhile;
        wp_reset_postdata();
    else :
        echo 'No posts found';
    endif;
    die();
}
add_action('wp_ajax_filter_blog_cards', 'filter_blog_cards');
add_action('wp_ajax_nopriv_filter_blog_cards', 'filter_blog_cards');


function create_custom_table() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'custom_feedback'; // Add a prefix to your table name to ensure uniqueness.

    // Check if the table already exists, if not, create it.
    if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
        $sql = "CREATE TABLE $table_name (
            id mediumint(9) NOT NULL AUTO_INCREMENT,
            name VARCHAR(255) NOT NULL,
            email VARCHAR(255) NOT NULL,
            phone VARCHAR(20) NOT NULL,
            comment TEXT NOT NULL,
            submission_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (id)
        );";

        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
    }
}

// Hook the function to the 'init' action. This ensures the table is created when WordPress is initialized.
add_action('init', 'create_custom_table');
