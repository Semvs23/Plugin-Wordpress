<?php
/*
 * Plugin Name:       Statements
 * Plugin URI:        https://example.com/plugins/the-basics/
 * Description:       Handle the basics with this plugin.
 * Version:           1.10.3
 * Requires at least: 5.2
 * Author:            Chat-gpt
 * Author URI:        https://author.example.com/
 */

function iu_get_random_statement()
{
    $file_path = plugin_dir_path(__FILE__) . 'statements.json';
    $statements = json_decode(file_get_contents($file_path), true);

    if (!empty($statements)) {
        $random_key = array_rand($statements);
        return $statements[$random_key];
    }
    return "Geen uitspraak beschikbaar.";
}

function iu_display_random_statement()
{
    $statement = iu_get_random_statement();
    return "<div class='random-statement'>" . esc_html($statement) . "</div>";
}
add_shortcode('statement_of_the_day', 'iu_display_random_statement');

function iu_enqueue_styles()
{
    wp_enqueue_style('statement-style', plugin_dir_url(__FILE__) . 'style.css');
}
add_action('wp_enqueue_scripts', 'iu_enqueue_styles');
