<?php
/*
Template Name: Single Recipe
*/

get_header();

if (have_posts()) {
    while (have_posts()) {
        echo 'TEST';

        the_post();

        the_title('<h2>', '</h2>');

        if (has_post_thumbnail()) {
            the_post_thumbnail();
        }

        the_content();
    }
}

get_footer();
?>
