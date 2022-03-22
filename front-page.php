<?php get_header(); ?>
<?php
get_template_part('components/main-title',
null,
[
    'title_text' => 'Dylan Roussin',
    'sub_text' => 'UI/UX Designer.',
    'bio_text' => "Hi, I'm Dylan and am currently a student at Drexel University studying User Experience and Interaction Design."
]
);
?>
<?php
get_template_part('components/featured-items');
?>
<?php get_footer();
