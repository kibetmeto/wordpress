<?php
/*
Plugin Name: Tesla News Plugin
Description: Fetches and displays Tesla-related news articles with extended features.
Version: 1.1
Author: Anthony Metto
*/


function tnp_enqueue_scripts()
{
    wp_enqueue_style('tnp-style', plugins_url('css/style.css', __FILE__));
    wp_enqueue_script('tnp-script', plugins_url('js/scripts.js', __FILE__), array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'tnp_enqueue_scripts');

function tnp_add_admin_menu()
{
    add_options_page('Tesla News Settings', 'Tesla News', 'manage_options', 'tesla_news', 'tnp_options_page');
}
add_action('admin_menu', 'tnp_add_admin_menu');

function tnp_settings_init()
{
    register_setting('tnpOptions', 'tnp_options');
    add_settings_section('tnp_settings_section', 'Settings', null, 'tesla_news');
    add_settings_field('tnp_articles_count', 'Number of Articles to Display', 'tnp_articles_count_render', 'tesla_news', 'tnp_settings_section');
}
add_action('admin_init', 'tnp_settings_init');

function tnp_articles_count_render()
{
    $options = get_option('tnp_options');
    ?>
    <input type="number" name="tnp_options[tnp_articles_count]"
        value="<?php echo esc_attr($options['tnp_articles_count'] ?? 5); ?>" />
    <?php
}

function tnp_options_page()
{
    ?>
    <form action="options.php" method="post">
        <?php
        settings_fields('tnpOptions');
        do_settings_sections('tesla_news');
        submit_button();
        ?>
    </form>
    <?php
}

function tnp_display_news($atts)
{
    $options = get_option('tnp_options');
    $api_key = '03de599cfda844c99a9594b9049e8350';
    $current_date = date('Y-d-m');
    $request_url = "https://newsapi.org/v2/everything?q=tesla&from=$current_date&sortBy=publishedAt&apiKey=$api_key";

    $response = wp_remote_get(
        $request_url,
        array(
            'headers' => array(
                'User-Agent' => 'Tesla News Plugin/1.0 (kibet.metto@gmail.com)'
            ),
            'timeout' => 20
        )
    );


    if (is_wp_error($response)) {
        return '<p>Error: ' . esc_html($response->get_error_message()) . '</p>';
    }

    $data = json_decode(wp_remote_retrieve_body($response), true);
    if ($data['status'] !== 'ok') {
        return '<p>Error: ' . esc_html($data['message']) . '</p>';
    }

    $articles = array_slice($data['articles'], 0, intval($options['tnp_articles_count'] ?? 5));
    $output = '<div class="tnp-news">';

    foreach ($articles as $article) {
        $output .= '<div class="tnp-article">';
        $output .= '<h2><a href="' . esc_url($article['url']) . '" target="_blank">' . esc_html($article['title']) . '</a></h2>';
        $output .= '<p>' . esc_html($article['description']) . '</p>';
        $output .= '<p><img src="' . esc_url($article['urlToImage']) . '" alt="News Image"></p>';
        $output .= '<p>Published at: ' . esc_html(date('F j, Y, g:i a', strtotime($article['publishedAt']))) . '</p>';
        $output .= '<p><a href="' . esc_url($article['url']) . '" target="_blank" class="tnp-share-btn">Share</a></p>';
        $output .= '</div>';
    }

    $output .= '</div>';
    return $output;
}



add_shortcode('tesla_news', 'tnp_display_news');
