<?php
require __DIR__ . '/customizer.php';
add_action('wp_enqueue_scripts', 'fly_include_style');
function fly_include_style()
{
    wp_enqueue_style('bs4', get_template_directory_uri() . '/assets/scss/bootstrap.css');
    wp_enqueue_style('font-awesome', 'https://use.fontawesome.com/releases/v5.15.4/css/all.css');
    wp_enqueue_style('main', get_template_directory_uri() . '/assets/scss/main.css');
    wp_enqueue_style('main2', get_template_directory_uri() . '/style.css');
    //scripts
    wp_enqueue_script('jquery', get_template_directory_uri() . '/assets/js/jquery-3.6.0.js', '', '1', true);
    wp_enqueue_script('popper', get_template_directory_uri() . '/assets/js/popper.js', '', '1', true);
    wp_enqueue_script('bootstrap-4', get_template_directory_uri() . '/assets/js/bootstrap.js', '', '1', true);
    wp_enqueue_script('custom', get_template_directory_uri() . '/assets/js/main.js', '', '1', true);
}



pll_register_string('YOU CAN REQUEST', 'YOU CAN REQUEST');
pll_register_string('A Free Consultation', 'A Free Consultation');
pll_register_string('Name', 'Name');
pll_register_string('Email', 'Email');

pll_register_string('Transport Type', 'Transport Type');
pll_register_string('Rail transport', 'Rail transport');
pll_register_string('Water transport', 'Water transport');

pll_register_string('Type of freight', 'Type of freight');
pll_register_string('Consignee Collects', 'Consignee Collects');
pll_register_string('Prepay and Add', 'Prepay and Addl');

pll_register_string('Submit', 'Submit');
pll_register_string('Message', 'Message');
pll_register_string('politic text', 'politic text');
pll_register_string('politic link', 'politic link');
pll_register_string('NIP', 'NIP');
pll_register_string('KRS', 'KRS');
pll_register_string('Read more', 'Read more');
pll_register_string('Viber', 'Viber');
pll_register_string('Address', 'Address');
pll_register_string('Phone', 'Phone');
pll_register_string('Company', 'Company');
pll_register_string('Country', 'Country');
pll_register_string('Feedback Form:', 'Feedback Form:');
pll_register_string('Find Us', 'Find Us');


//custom-logo
function fly_custom_logo_setup()
{
    $defaults = array(
        'height' => 100,
        'width' => 400,
        'flex-height' => true,
        'flex-width' => true,
        'header-text' => array('site-title', 'site-description'),
        'unlink-homepage-logo' => true,
    );

    add_theme_support('custom-logo', $defaults);
}

add_action('after_setup_theme', 'fly_custom_logo_setup');

function get_main_menu()
{

    $args = [
        'post_type' => 'nav_menu_item',
        'post_status' => 'publish',
        'order' => 'ASC',
        'orderby' => 'menu_order',
        'output' => ARRAY_A,
        'output_key' => 'menu_order',
        'update_post_term_cache' => false
    ];
    return array(
        'ru' => wp_get_nav_menu_items(10, $args),
        'pl' => wp_get_nav_menu_items(10, $args),
        'en' => wp_get_nav_menu_items(10, $args)

    );
}

function add_option_field_to_general_admin_page()
{
    $options = array('phone', 'adreess', 'contacts-title', 'buiro1', 'buiro2', 'pomoc1', 'pomoc2', 'phone-text');
    foreach ($options as $key => $option):
        register_setting('general', $option);
        add_settings_field(
            $key,
            $option,
            'myprefix_setting_callback_function',
            'general',
            'default',
            array(
                'id' => $key,
                'option_name' => $option
            )
        );
    endforeach;
}

add_action('admin_menu', 'add_option_field_to_general_admin_page');

function myprefix_setting_callback_function($val)
{
    $id = $val['id'];
    $option_name = $val['option_name'];
    ?>
    <input
            type="text"
            name="<?php echo $option_name ?>"
            id="<?php echo $id ?>"
            value="<?php echo esc_attr(get_option($option_name)) ?>"
    />
    <?php
}

function custom_lang_switcher()
{
    $current_lang = pll_current_language();
    $flag = get_template_directory_uri() . '/assets/img/flags/' . $current_lang . '.png';
    $langs_array = pll_the_languages(array('dropdown' => 1, 'hide_current' => 1, 'raw' => 1, 'show_flags ' => 1));

    $html = '<div class="dropdown">
  <button type="button" id="lang" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <img src="' . $flag . '"> ' . $current_lang . '
  </button>
  <div class="dropdown-menu" aria-labelledby="lang">
   ';
    if ($langs_array) :

        foreach ($langs_array as $lang):
            // print_r($lang);
            $html .= '
            <a class="dropdown-item" href="' . $lang['url'] . '">
               <img src="' . $lang['flag'] . '"/> ' . $lang['slug'] . '
            </a>
            ';
        endforeach;
    endif;
    $html .= '</div> </div>';
    return $html;
}

function fly_search()
{
    $items .= '
        <li class="bordered">
        <a href="#search"><i class="fas fa-search"></i></a>        
        </li>
           ' . custom_lang_switcher() . '
        ';


    return $items;
}


//brecrumbs

function the_breadcrumb()
{

    $sep = '<span>/</span>';

    if (!is_front_page()) {

        // Start the breadcrumb with a link to your homepage
        echo '<ul class="breadcrumbs-inner">';
        echo '<li><a href="';
        echo get_option('home');
        echo '">';
        bloginfo('name');
        echo '</a></li>' . $sep;

        // Check if the current page is a category, an archive or a single page. If so show the category or archive name.
        if (is_category() || is_single()) {
            the_category('title_li=');
        } elseif (is_archive() || is_single()) {
            if (is_day()) {
                printf(__('%s', 'text_domain'), get_the_date());
            } elseif (is_month()) {
                printf(__('%s', 'text_domain'), get_the_date(_x('F Y', 'monthly archives date format', 'text_domain')));
            } elseif (is_year()) {
                printf(__('%s', 'text_domain'), get_the_date(_x('Y', 'yearly archives date format', 'text_domain')));
            } else {
                _e('Blog Archives', 'text_domain');
            }
        }

        // If the current page is a single post, show its title with the separator
        if (is_single()) {
            echo $sep;
            the_title();
        }

        // If the current page is a static page, show its title.
        if (is_page()) {
            echo the_title();
        }

        // if you have a static page assigned to be you posts list page. It will find the title of the static page and display it. i.e Home >> Blog
        if (is_home()) {
            global $post;
            $page_for_posts_id = get_option('page_for_posts');
            if ($page_for_posts_id) {
                $post = get_post($page_for_posts_id);
                setup_postdata($post);
                the_title();
                rewind_posts();
            }
        }

        echo '</ul>';
    }
}

function get_page_about()
{
    $lang = pll_current_language();
    if ($lang == 'ru'):
        $id = 10;
        return get_post($id);
    elseif ($lang == 'pl'):
        $id = 139;
        return get_post($id);
    elseif ($lang = 'en'):
        $id = 202;
        return get_post($id);
    endif;

}

function get_page_contact()
{
    $id = 18;
    return get_post($id);
}

function convertClearText($text)
{
    $paragraph = explode(".", $text);
    foreach ($paragraph as $p) {
        echo '<p>' . $p . '</p>';
    }

}

function FooterMenu()
{
    $args = [
        'nopaging' => true,
        'post_type' => 'nav_menu_item',
        'post_status' => 'publish',
        'order' => 'ASC',
        'orderby' => 'menu_order',
        'output' => ARRAY_A,
        'output_key' => 'menu_order',
        'update_post_term_cache' => false
    ];

    return wp_get_nav_menu_items('main-menu', $args);
}


function write_from_db()
{
    global $wpdb;
    if(isset($_POST['custom_user_form'])) :
        $data = $_POST['custom_user_form'];
        if ($data != null):
            $email = bloginfo('admin_email');
            wp_mail($email, 'nowe zamówienie ze strony', $data);
            return $wpdb->insert("wp_client_table",
                ['name' => sanitize_text_field($data['name']),
                    'company' => sanitize_text_field($data['company']),
                    'phone' => sanitize_text_field($data['phone']),
                    'email' => sanitize_text_field($data['mail']),
                    'address' => sanitize_text_field($data['address']),
                    'country' => sanitize_text_field($data['country']),
                    'type_delivery' => sanitize_text_field($data['typeDel']),
                    'message' => sanitize_text_field($data['message']),
                    'date' => date("F j, Y, g:i a"),
                    'service' => sanitize_text_field($data['typePage'])

                ],
                ['%s']

            );
        endif;
    endif;

}

add_action('wp', 'write_from_db');

function ak_create_custom_post_type() {
    $labels = array(
        'name' => _x( 'Custom posts', 'Custom posts type' ),
        'singular_name' => _x( 'Custom post', 'Custom posts type' ),
        'menu_name' => __( 'Custom posts' ),
        'all_items' => __( 'All custom posts' ),
        'view_item' => __( 'View custom post' ),
        'add_new_item' => __( 'Add custom post' ),
        'add_new' => __( 'Add new' ),
        'edit_item' => __( 'Edit custom post' ),
        'update_item' => __( 'Update custom post' ),
        'search_items' => __( 'Search custom post' ),
        'not_found' => __( 'Not found' ),
        'not_found_in_trash' => __( 'Not found in trash' ),
    );

    $args = array(
        'label' => __( 'custom_post' ),
        'description' => __( 'Custom post' ),
        'labels' => $labels,
        'supports' => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', 'page-attributes','post-formats'),
        'has_archive' => true,
        'taxonomies' => array( 'custom_posts' ),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 5,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    );

    register_post_type( 'custom', $args );

}
add_action( 'init', 'ak_create_custom_post_type', 0 );

