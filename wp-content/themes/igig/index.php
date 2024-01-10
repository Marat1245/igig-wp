<?php
/*
Template Name: Шаблон "Главная страница"
*/

get_header();
?>

<section class="big-size">
    <div class="hero">

    
        <!-- Swiper -->
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
            <?php if(get_field('header__slider')): ?>
            <?php while(has_sub_field('header__slider')) : ?>

                <div class="swiper-slide">
                    <div class="hero__slide grid">
                        <div class="text__wrap">
                       
                            <h1><?php the_sub_field('hero__title'); ?></h1>
                            <p><?php the_sub_field('hero__descriptions'); ?></p>
                        </div>
                        <div class="hero__img__wrap">
                        
                        
                        <?php $image2 = get_sub_field("hero__img");
                        if( !empty($image2) ): ?>
                           
                            <img src="<?php echo $image2['url']; ?>" alt="<?php echo $image2['alt']; ?>" class="hero__img section__img" />
                           
                        <?php endif; ?>
                            
                        </div>
                    </div>

                </div>

            <?php endwhile; ?>
            <?php endif; ?>


            </div>
            <div class="hero__slider">
                <div class="swiper-button-next">
                    <img src="<?php echo get_template_directory_uri() ?>/img/arrow__blue__bg-right.svg" alt="">
                </div>
                <div class="swiper-button-prev">
                    <img src="<?php echo get_template_directory_uri() ?>/img/arrow__blue__bg-right.svg" alt="">
                </div>
            </div>
           
            <div class="hero__pagination">
                <div class="swiper-pagination"></div>
            </div>

        </div>
    </div>
</section>
    <section class="big-size">
        <div class="grid grid__right ">

        
        <div class="img__wrap">
        <?php $image = get_field("competencies__img");
			if( !empty($image) ): ?>

				<img class="section__img" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

			<?php endif; ?>
        </div>
        <div class="text__wrap padding-for-sector">
            <h2><?php the_field('competencies__title'); ?></h2>
            <?php the_field('competencies__desc'); ?>
          
        </div>
        </div>
    </section>
    <section class="big-size">
        <div class="grid reverse__grid ">

        
        <div class="text__wrap padding-for-sector">
            <h2><?php the_field('serves__title'); ?></h2>
            <?php the_field('serves__descr'); ?>


        </div>
        <div class="img__wrap">
        <?php $image = get_field("serves__img");
			if( !empty($image) ): ?>

				<img class="section__img" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

			<?php endif; ?>
           
        </div>

        </div>
    </section>
    <section class="big-size bg__light-grey">
        <div class="center grid__right bg__light-grey type__03 about__hero">

        
        <div class="center__title__wrap">
            <h2><?php the_field('company__title'); ?></h2>
            <p><?php the_field('company__desc'); ?></p>
        </div>
        <div class="grid center__wrap-l-r">
            <div class="mb-40px__992">
            <?php $image = get_field("company__img");
			if( !empty($image) ): ?>

				<img class="section__img" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

			<?php endif; ?>
                <!-- <img src="./img/04.png" alt="" class="unfull__img"> -->
            </div>
            <div class="text__wrap ">
            <?php the_field('company__subdesc'); ?>

            </div>
        </div>

        </div>
    </section>
    <section class="big-size">
        <div class="news-main center__wrap-l-r">

        
        <div class="mb-40px space-between">
            <h2>Наши новости</h2>
            <div class="arrow__blue__together">
                <div class="news-swiper-button-next arrow">
                    <img src="<?php echo get_template_directory_uri() ?>/img/arrow__blue.svg" alt="">
                </div>
                <div class="news-swiper-button-prev arrow">
                    <img src="<?php echo get_template_directory_uri() ?>/img/arrow__blue-right.svg" alt="">
                </div>
            </div>
        </div>

        <!-- Swiper -->
        <div class="swiper newsSwiper">
            <div class="swiper-wrapper">

    
            <?php  
            
            $query = new WP_Query( [
            'post_type' => 'post',
            'posts_per_page' => 10,

            ]); 
            if ( $query->have_posts() ): while ( $query->have_posts() ) : $query->the_post(); 
            ?>
               









                <?php
                $image = get_field("preview__img", get_the_ID());

                if($image){ ?>
                <!-- Если это ютуб -->
                <div class="swiper-slide bg__light-grey">
                    <a class="news__square " target="_blank" href="<?php the_field("youtube")?>">
                        <div class="news__square__top gap-12px">
                        <div class="youtube__wrap">
                            <div class="youtube__play" style="background-image: url(<? echo get_template_directory_uri() ?>/img/youtube-play.svg);"></div>
                            <img src="<?php echo  $image['url'] ?>" alt="<?php echo  $image['alt'] ?>">
                        </div>
                        

                        <?php } else{   ?>
                            <!-- Если нет изображения -->
                            <div class="swiper-slide bg__light-grey">
                            <a class="news__square" target="_blank" href="<?php the_permalink();?>">
                            <div class="news__square__top gap-12px">

                            <?php   if(has_post_thumbnail( )){   ?>

                            <!-- Если Есть изображения -->
                                <img src="<?php echo the_post_thumbnail_url("large") ?>" alt="">
                                
                            <?php           } 
                    }
                    ?>
                        <!-- Остальная часть  -->
                        <div class="news__title"> <?php the_title();?> </div>
                        <div class="news__desc"> <?php the_excerpt();?></div>
                    </div>
                    <p class="news__data"><?php echo get_the_date("j F Y");?></p>

                </a>
            </div>







            <?php endwhile; else: ?>
                    Записей нет.
                <?php endif; ?>



                









            </div>



        </div>
        </div>
    </section>

<?php

get_footer();
