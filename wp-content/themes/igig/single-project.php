<?php

get_header();
?>
			
				


			<section class=" big-size">
				<div  class=" project__detail">
			<?php if(!empty(have_rows('project__img__wrap'))){ ?>
				 <div class="grid"> 
					
			<?php } else { ?>
				<div class="center__wrap-l-r">
				<?php } ?>
            <div class="text__wrap">
                <div class="center gap-12px fd-c">
                    <h1 class=""><?php wp_title('') ?></h1>


					<div class=""><span class="fz16-med"></span> <?php the_field('project__city'); ?></div>
                    <div class=""><span class="fz16-med">Заказчик:</span> <?php the_field('project__customer');?></div>
                    <div class=""><span class="fz16-med">Вид работ:</span> <?php the_field('project__view');?></div>
                    <div class="mb-40px"><span class="fz16-med">Основные особенности:</span> <?php the_field('project__spec');?></div>
                    <div class="space-between">
					<?php
						// Получаем текущий пост
						$current_post = get_post();

						// Получаем предыдущий пост
						$previous_post = get_previous_post();
						if ($previous_post) { ?>
							<a href="<?php echo get_permalink($previous_post->ID); ?>" class="bottom bottom__blue bottom__next">
								<div class="bottom__anima"></div>
								<div class="bottom__content">
									<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
										<path d="M6.90576 10L11.9149 15.0084L13.0933 13.83L9.25993 9.9967L13.0933 6.16919L11.9149 4.99086L6.90576 10Z"
											fill="#0AA6DD" />
									</svg>
									Предыдущий
								</div>
							</a>
						<?php }

						// Получаем следующий пост
						$next_post = get_next_post();
						if ($next_post) { ?>
							<a href="<?php echo get_permalink($next_post->ID); ?>" class="bottom bottom__blue bottom__next">
								<div class="bottom__anima"></div>
								<div class="bottom__content">
									Следующий
									<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
										<path d="M13.0942 9.99997L8.08507 4.99164L6.90674 6.16997L10.7401 10.0033L6.90674 13.8308L8.08507 15.0091L13.0942 9.99997Z"
											fill="#0AA6DD" />
									</svg>
								</div>
							</a>
						<?php }
						?>

                        
                       
                    </div>
                </div>

            </div>
            <!-- Swiper -->
			<?php if(!empty(have_rows('project__img__wrap'))){ ?>

				<div class="swiper project__detailsSwiper project__details__slider">
                <div class="swiper-wrapper">
				<?php
					// проверяем есть ли в повторителе данные
					if( have_rows('project__img__wrap') ):
						// перебираем данные
						while ( have_rows('project__img__wrap') ) : the_row();
							// отображаем вложенные поля
							$image = get_sub_field('project__img');	?>
							
							<div class="swiper-slide">
								<div class="project__detailsSwiper__bg-img" style="background-image: url(<?php echo $image['url']; ?>);"></div>
							
							</div>

						<?php endwhile;

					else :
						// вложенных полей не найдено
					endif;

					?>

                </div>
                <div class="project__details-button-next">
                    <img src="<? echo get_template_directory_uri() ?>/img/arrow__blue-right.svg" alt="">
                </div>
                <div class="project__details-button-prev">
                    <img src="<? echo get_template_directory_uri() ?>/img/arrow__blue.svg" alt="">
                </div>
                <div class="project__details__pagination__wrap">
                    <div class="project__details-pagination"></div>
                </div>

            </div>


			<?php }	?>
            
        </div>
		</div>
    </section>



<?php
get_footer("contacts");
