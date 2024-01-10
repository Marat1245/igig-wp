<?php
/*
Template Name: Шаблон "О компании"
*/

get_header();
?>
 <section class="">
    <div class="header__name ">

   
        <div class="header__name__img__wrap">


		    <div class="header__name__img" style="background-image: url(<?php the_field('about__img'); ?>);"></div>			
		
            
        </div>
        <div class="header__name__bg"></div>
        <h1 class="center__wrap-all"><?php wp_title('') ?></h1>
    </div>
</section>

    <section class="big-size bg__light-grey">
        <div class="center grid__right  type__03">

        
        <div class="center__title__wrap">
            <h2><?php the_field('about__title'); ?></h2>
            <p><?php the_field('about__desc'); ?></p>
        </div>

        </div>
    </div>
    </section>
    <section class="big-size">
        <div class="grid reverse__grid ">
        <div class="text__wrap padding-for-sector">
            <h2><?php the_field('about__adv__title'); ?></h2>
            <?php the_field('about__adv__desc'); ?>
        </div>
        <div class="img__wrap">
			<?php $image2 = get_field("about__adv__img");
			if( !empty($image2) ): ?>
				
				<img src="<?php echo $image2['url']; ?>" alt="<?php echo $image2['alt']; ?>" class="section__img" />
				
			<?php endif; ?>
        </div>

        </div>
    </section>
    <section class="bg__light-grey big-size">
        <div class="center  bg__light-grey ">

        
        <div class="center__wrap-l-r">
            <h2 class="mb-40px ">  <?php the_field('about__opt__title'); ?></h2>
            <div class="grid__3-block">
			<?php if(get_field('about__opt__repeat')): ?>
			<?php while(has_sub_field('about__opt__repeat')) : ?>
				<div class="card card__adv">
                    <div class="subtext__wrap__bold"><?php the_sub_field('about__opt__repeat__title'); ?></div>
                    <p><?php the_sub_field('about__opt__repeat__desc'); ?></p>
                </div>
			<?php endwhile; ?>
			<?php endif; ?>
             
            </div>
        </div>

        </div>
    </section>
    <section class="big-size">
        <div class="grid grid__right ">

        
        <div class="img__wrap">
			<?php $image2 = get_field("about__type__img");
			if( !empty($image2) ): ?>
				
				<img src="<?php echo $image2['url']; ?>" alt="<?php echo $image2['alt']; ?>" class="section__img" />
				
			<?php endif; ?>
        </div>
        <div class="text__wrap padding-for-sector">
            <h2><?php the_field('about__type__title'); ?></h2>
			<?php the_field('about__type__desc'); ?>
            

            <a class="bottom__green bottom section__btn" download href="<?php the_field('about__type__file'); ?>">
                <div class="bottom__anima"></div>
                <div>
                    <img src="<? echo get_template_directory_uri() ?>/img/download.svg" alt="">
                    <span>Скачать презентацию</span>
                </div>

            </a>


        </div>
        </div>
    </section>

    <section class="big-size bg__light-grey">
        <div class="center ">

        
        <div class="center__wrap-l-r">
            <h2 class="mb-40px "><?php the_field('about__lis__title'); ?></h2>
            <div class=" license">
			<?php if(get_field('about__lis__img__wrap')): ?>
			<?php while(has_sub_field('about__lis__img__wrap')) : ?>

				<?php $image2 = get_sub_field("about__lis__img");
					if( !empty($image2) ): ?>
						
						<a href="<?php echo $image2['url']; ?>"  data-lightbox="roadtrip"><img src="<?php echo $image2['url']; ?>" alt="<?php echo $image2['alt']; ?>"  /></a>
						
				<?php endif; ?>
					

			<?php endwhile; ?>
			<?php endif; ?>

            </div>
        </div>

        </div>
    </section>
    <?php if(!empty(get_field('about__team__title'))){

     ?>
    <section class="bg__light-grey big-size ">
        <div class=" center " >

        
        <div class="center__wrap-l-r">
            <h2 class="mb-40px "><?php the_field('about__team__title') ?></h2>
            <div class="team">
			<?php if(get_field('about__team__wrap')): ?>
			<?php while(has_sub_field('about__team__wrap')) : ?>
				<div class="dossier">
				<?php $image2 = get_sub_field("about__team__img");
					if( !empty($image2) ): ?>
						
						<img src="<?php echo $image2['url']; ?>" alt="<?php echo $image2['alt']; ?>"  />
						
				<?php endif; ?>
                    <div class="fz16 dossier__title"><?php the_sub_field('about__team__fio'); ?></div>
                    <div class="fz16 dossier__subtitle"><?php the_sub_field('about__team__title-job'); ?></div>
                </div>
			<?php endwhile; ?>
			<?php endif; ?>
               

            </div>
        </div>
        </div>
    </section>
    <?php  }?>
    <section class="big-size">
        <div class="grid reverse__grid ">

        
        <div class="text__wrap padding-for-sector">
            <h2><?php the_field('about__pr__title') ?></h2>
			<?php the_field('about__pr__desc') ?>
           
            <a class="bottom__green bottom section__btn" href="<?php get_permalink( 234); ?>">
                <div class="bottom__anima"></div>
                <div>

                    <span>Все проекты</span>
                    <img src="<?php echo get_template_directory_uri() ?>/img/long_up_right.svg" alt="">
                </div>

            </a>

        </div>
        <div class="img__wrap">
		<?php $image2 = get_field("about__pr__img");
			if( !empty($image2) ): ?>
				
				<img src="<?php echo $image2['url']; ?>" alt="<?php echo $image2['alt']; ?>" class="section__img" />
				
			<?php endif; ?>
        </div>

        </div>
    </section>


<?php
get_footer();
