<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package igig
 */

?>

<!-- ---------------------------------------- -->
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
    if (is_single()) {
        // Code for single post/page with articles
        $post_id = get_the_ID();
        $thumbnail_url = get_the_post_thumbnail_url($post_id, 'thumbnail');
        ?>
        <!-- Метатеги Open Graph для шаринга на Facebook -->
        <meta property="og:title" content="<?php the_title(); ?>" />
        <meta property="og:type" content="article" />
        <meta property="og:url" content="<?php echo esc_url(get_permalink()); ?>" />
        <meta property="og:image" content="<?php echo esc_url($thumbnail_url); ?>" />
        <meta property="og:description" content="<?php echo esc_html(get_the_excerpt()); ?>" />

        <!-- Manually specify thumbnail for Facebook -->
        <link rel="image_src" href="<?php echo esc_url($thumbnail_url); ?>" />
        
        <!-- Метатеги Twitter Card -->
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="<?php the_title(); ?>">
        <meta name="twitter:description" content="<?php echo esc_html(get_the_excerpt()); ?>">
        <meta name="twitter:image" content="<?php echo esc_url($thumbnail_url); ?>">

        <!-- Метатеги для Instagram -->
        <meta property="og:site_name" content="Your Site Name" />
        <meta property="og:image" content="<?php echo esc_url($thumbnail_url); ?>" />
        <meta property="og:image:width" content="1200" />
        <meta property="og:image:height" content="630" />

        <!-- Метатеги для Telegram -->
        <meta itemprop="name" content="<?php the_title(); ?>">
        <meta itemprop="description" content="<?php echo esc_html(get_the_excerpt()); ?>">
        <meta itemprop="image" content="<?php echo esc_url($thumbnail_url); ?>">

        <!-- Микроразметка Schema.org -->
        <script type="application/ld+json">
        {
        "@context": "http://schema.org",
        "@type": "NewsArticle",
        "headline": "<?php the_title(); ?>",
        "image": "<?php echo esc_url($thumbnail_url); ?>",
        "description": "<?php echo esc_html(get_the_excerpt()); ?>",
        "url": "<?php echo esc_url(get_permalink()); ?>"
        }
        </script>
        <?php
    } else {
        // Code for other pages without articles
       
       
        $image = get_field("logo__top","options");
        ?>
        <!-- Метатеги Open Graph для шаринга на Facebook -->
        <meta property="og:title" content="<?php echo esc_html(get_bloginfo('name')); ?>" />
        <meta property="og:url" content="<?php echo esc_url(get_permalink()); ?>" />
        <meta property="og:image" content="<?php echo esc_url($image['url']); ?>" />
        <meta property="og:description" content="<?php echo esc_html(get_bloginfo('description')); ?>" />

        <!-- Manually specify thumbnail for Facebook -->
        <link rel="image_src" href="<?php echo esc_url($image['url']); ?>" />
        
        <!-- Метатеги Twitter Card -->
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="<?php echo esc_html(get_bloginfo('name')); ?>">
        <meta name="twitter:description" content="<?php echo esc_html(get_bloginfo('description')); ?>">
        <meta name="twitter:image" content="<?php echo esc_url($image['url']); ?>">

        <!-- Метатеги для Instagram -->
        <meta property="og:site_name" content="<?php echo esc_html(get_bloginfo('name')); ?>" />
        <meta property="og:image" content="<?php echo esc_url($image['url']); ?>" />
        <meta property="og:image:width" content="1200" />
        <meta property="og:image:height" content="630" />

        <!-- Метатеги для Telegram -->
        <meta itemprop="name" content="<?php echo esc_html(get_bloginfo('name')); ?>">
        <meta itemprop="description" content="<?php echo esc_html(get_bloginfo('description')); ?>">
        <meta itemprop="image" content="<?php echo esc_url($image['url']); ?>">

        <!-- Микроразметка Schema.org -->
        <script type="application/ld+json">
        {
        "@context": "http://schema.org",        
        "headline": "<?php echo esc_html(get_bloginfo('name')); ?>",
        "image": "<?php echo esc_url($image['url']); ?>",
        "description": "<?php echo esc_html(get_bloginfo('description')); ?>",
        "url": "<?php echo esc_url(get_permalink()); ?>"
        }
        </script>
        <?php
    }
?>

    <!-- Ваш стандартный код для подключения стилей и скриптов -->
    
    <!-- <title>Document</title> -->
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <!-- <link rel="stylesheet" href="./css/style.css"> -->
		
	<?php wp_head(); ?>
</head>

<body>
<div class="big-size line-under">
    <div>

    
    <nav>
        
        <div class="logo-top">
            <a href="<?php echo home_url(); ?>">
			<?php $image = get_field("logo__top","options");
			if( !empty($image) ): ?>

				<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

			<?php endif; ?>
				
			
        </div>
        <div>
        <ul class="menu">

            <?php wp_nav_menu([
                "container" => false,
                'walker' => new CSS_Menu_Walker()
            ])?>
            </ul>
            <div class="burger__menu">
            <svg xmlns="http://www.w3.org/2000/svg" width="9" height="7" viewBox="0 0 9 7" fill="none">
                <rect y="4" width="0.999999" height="9" rx="0.5" transform="rotate(-90 0 4)" fill="#707274" />
                <rect y="1" width="0.999999" height="6" rx="0.5" transform="rotate(-90 0 1)" fill="#707274" />
                <rect x="7" y="1" width="1" height="2" rx="0.5" transform="rotate(-90 7 1)" fill="#707274" />
                <rect y="7" width="0.999999" height="9" rx="0.5" transform="rotate(-90 0 7)" fill="#707274" />
            </svg>
            </div>
            <div class="menu__mobile">
            <div class="menu__mobile__logo"></div>
            <div class="menu__mobile__close">
                <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" viewBox="0 0 27 27" fill="none">
                    <rect x="7.13611" y="20.5714" width="1" height="19" rx="0.5"
                        transform="rotate(-134.94 7.13611 20.5714)" fill="#707274" />
                    <rect x="20.5712" y="19.8644" width="0.999998" height="19" rx="0.499999"
                        transform="rotate(135 20.5712 19.8644)" fill="#707274" />
                </svg>
            </div>
            <ul class="menu ">
            <?php wp_nav_menu([
                "container" => false,
                'walker' => new CSS_Menu_Walker()
            ])?>

            </ul>
            </div>
        </div>
        
        <div class="burger__fix fz16">
            <div class="burger__menu ">
                <svg xmlns="http://www.w3.org/2000/svg" width="9" height="7" viewBox="0 0 9 7" fill="none">
                    <rect y="4" width="0.999999" height="9" rx="0.5" transform="rotate(-90 0 4)" fill="#fff" />
                    <rect y="1" width="0.999999" height="6" rx="0.5" transform="rotate(-90 0 1)" fill="#fff" />
                    <rect x="7" y="1" width="1" height="2" rx="0.5" transform="rotate(-90 7 1)" fill="#fff" />
                    <rect y="7" width="0.999999" height="9" rx="0.5" transform="rotate(-90 0 7)" fill="#fff" />
                </svg>

            </div>
            Меню
        </div>


    </nav>
    </div>
</div>