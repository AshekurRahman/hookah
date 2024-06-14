<!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> data-spy="scroll" data-target=".navbar__area">
    <!-- Preloader Start -->
    <?php
    $preloader_status = get_theme_mod('hookah_preloader_status', 'enable');
    if ($preloader_status === 'enable') : ?>
    <div class="preloader">
        <svg class="smoke">
            <filter id="fire">
                <feTurbulence id="turbulence" baseFrequency="0.1 0.1" numOctaves="2" seed="3">
                    <animate attributeName="baseFrequency" dur="10s" values="0.1 0.1; 0.12 0.12" repeatCount="indefinite"></animate>
                </feTurbulence>
                <feDisplacementMap in="SourceGraphic" scale="12"></feDisplacementMap>
            </filter>
        </svg>
        <div class="loader">
            <svg class="loader__svg">
                <text class="loader__text" text-anchor="middle" x="50%" y="75%"><?php _e('Hookah','hookah'); ?></text>
            </svg>
        </div>
    </div>
    <?php endif; ?>
    <!-- Preloader End -->

    <?php wp_body_open(); ?>

    <main class="main_wrapper">
        <div class="page__wrapper">
            <?php get_template_part('components/layouts/nav_menu'); ?>
