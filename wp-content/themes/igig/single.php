<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package igig
 */

get_header();
?>

<?php if(1 != 1){ ?>

<section class="header__name">

	<div class="header__name__img__wrap">
		<div class="header__name__img" style="background-image: url(<?php echo the_post_thumbnail_url("full") ?>);">
		</div>
	</div>

	<div class="header__name__bg"></div>
	<div class="news_page__wrap-for-title">
		<h1 class="center__wrap-all"><?php  the_title(); ?></h1>
		<div class="news_open__when">

			<div class=" space-between ">
				<?php
			$previous_url = wp_get_referer();
			if ($previous_url) {
				
				echo ' <a class="news_open__back subtext__wrap__bold" href="' . esc_url($previous_url) . '">
							<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
								<path
									d="M6.90625 9.99997L11.9154 15.0083L13.0937 13.83L9.26042 9.99663L13.0937 6.16913L11.9154 4.9908L6.90625 9.99997Z"
									fill="white" />
							</svg>
							назад
						</a>';
			} else {
				// Если нет предыдущей страницы, можно указать альтернативный URL или текст
				echo ' <a class="news_open__back subtext__wrap__bold" href="' . get_permalink(143) . '">
							<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
								<path
									d="M6.90625 9.99997L11.9154 15.0083L13.0937 13.83L9.26042 9.99663L13.0937 6.16913L11.9154 4.9908L6.90625 9.99997Z"
									fill="white" />
							</svg>
							назад
						</a>';
				}
		?>

				<div class="news_open__date subtext__wrap__bold">
					<?php echo get_the_date("j F Y");?>
				</div>
			</div>
		</div>
	</div>

</section>

<?php } ?>

<section class="big-size">

</section>
<section class="">
	<div class="center-l-r">

	</div>
</section>

<section class="big-size">
	<div class="center__wrap-l-r news__text">

		<div class="news-page__content__wrap">
			

				<div class="title">
					<?php the_title();?>
				</div>
				<div class=" space-between ">
					<?php
				$previous_url = wp_get_referer();
				if ($previous_url) {
					
					echo ' <a class="news_open__back subtext__wrap__bold" href="' . esc_url($previous_url) . '" style="color: #454545;">
								<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
									<path
										d="M6.90625 9.99997L11.9154 15.0083L13.0937 13.83L9.26042 9.99663L13.0937 6.16913L11.9154 4.9908L6.90625 9.99997Z"
										fill="#454545" />
								</svg>
								назад
							</a>';
				} else {
					// Если нет предыдущей страницы, можно указать альтернативный URL или текст
					echo ' <a class="news_open__back subtext__wrap__bold" href="' . get_permalink(143) . '" style="color: #454545;">
								<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
									<path
										d="M6.90625 9.99997L11.9154 15.0083L13.0937 13.83L9.26042 9.99663L13.0937 6.16913L11.9154 4.9908L6.90625 9.99997Z"
										fill="#454545" />
								</svg>
								назад
							</a>';
					}
			?>

					<div class="news_open__date subtext__wrap__bold" style="color: var(--dark);">
						<?php echo get_the_date("j F Y");?>
					</div>
				</div>
				<div class="news-page__img__in-content"
					style="background-image: url(<?php echo the_post_thumbnail_url("full") ?>);"></div>
			

			<div class="article__wrap ">
				<div class="mb-40px">
					<? the_content(); ?>
				</div>

				<!-- Swiper -->
				<div class="swiper news_openSwiper">
					<div class="swiper-wrapper">

						<?php if(get_field('artical__slider__wrap')): ?>
						<?php while(has_sub_field('artical__slider__wrap')) : ?>

						<?php $image = get_sub_field("artical__slider__img");
						if( !empty($image) ): ?>
						<div class="swiper-slide">
							<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
						</div>
						<?php endif; ?>
						<?php endwhile; ?>
						<?php endif; ?>

					</div>
					<div class="project__details-button-next news_open-button-next">
						<img src="<? echo get_template_directory_uri() ?>/img/arrow__blue-right.svg" alt="">
					</div>
					<div class="project__details-button-prev news_open-button-prev">
						<img src="<? echo get_template_directory_uri() ?>/img/arrow__blue.svg" alt="">
					</div>
				</div>

			</div>

			<?php if(2 != 1){?>

			<div class="gap-12px fd-c social__all social__all__small-size">
				<!-- Facebook -->
				<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo esc_url(get_permalink()); ?>"
					target="_blank">
					<img src="<? echo get_template_directory_uri() ?>/img/social__01.svg" alt="">
				</a>

				<!-- Twitter -->
				<a href="https://twitter.com/intent/tweet?url=<?php echo esc_url(get_permalink()); ?>&text=<?php echo esc_attr(get_the_title()); ?>"
					target="_blank">
					<img src="<? echo get_template_directory_uri() ?>/img/social__04.svg" alt="">
				</a>

				<!-- Одноклассники -->
				<a href="https://connect.ok.ru/offer?url=<?php echo esc_url(get_permalink()); ?>" target="_blank"><img
						src="<? echo get_template_directory_uri() ?>/img/social__03.svg" alt=""></a>

				<!-- Telegram -->
				<a href="https://t.me/share/url?url=<?php echo esc_url(get_permalink()); ?>&text=<?php echo esc_attr(get_the_title()); ?>"
					target="_blank"><img src="<? echo get_template_directory_uri() ?>/img/social__05.svg" alt=""></a>

				<!-- VKontakte -->
				<a href="https://vk.com/share.php?url=<?php echo esc_url(get_permalink()); ?>" target="_blank">
					<img src="<? echo get_template_directory_uri() ?>/img/social__02.svg" alt="">
				</a>
			</div>
		</div>

		<div class="gap-12px fd-c social__all">
			<!-- Facebook -->
			<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo esc_url(get_permalink()); ?>"
				target="_blank">
				<img src="<? echo get_template_directory_uri() ?>/img/social__01.svg" alt="">
			</a>

			<!-- Twitter -->
			<a href="https://twitter.com/intent/tweet?url=<?php echo esc_url(get_permalink()); ?>&text=<?php echo esc_attr(get_the_title()); ?>"
				target="_blank">
				<img src="<? echo get_template_directory_uri() ?>/img/social__04.svg" alt="">
			</a>

			<!-- Одноклассники -->
			<a href="https://connect.ok.ru/offer?url=<?php echo esc_url(get_permalink()); ?>" target="_blank"><img
					src="<? echo get_template_directory_uri() ?>/img/social__03.svg" alt=""></a>

			<!-- Telegram -->
			<a href="https://t.me/share/url?url=<?php echo esc_url(get_permalink()); ?>&text=<?php echo esc_attr(get_the_title()); ?>"
				target="_blank"><img src="<? echo get_template_directory_uri() ?>/img/social__05.svg" alt=""></a>

			<!-- VKontakte -->
			<a href="https://vk.com/share.php?url=<?php echo esc_url(get_permalink()); ?>" target="_blank">
				<img src="<? echo get_template_directory_uri() ?>/img/social__02.svg" alt="">
			</a>
		</div>
		<?php } ?>
	</div>
</section>

<section class="big-size bg__light-grey">
	<div class="news-page center__wrap-all bg__light-grey">

		<div class="mb-40px space-between">
			<h2>Другие новости</h2>
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
            $current_post_id = get_the_ID(); // Получаем ID текущей новости

            $query = new WP_Query([
                'post_type'      => 'post',
                'posts_per_page' => 10,
            ]);

            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post();

                    // Проверяем, если текущая запись совпадает с текущей новостью, пропускаем ее
                    if ($current_post_id === get_the_ID()) {
                        continue;
                    }
                    ?>

				<div class="swiper-slide bg__white">
					<a class="news__square" target="_blank" href="<?php the_permalink(); ?>">
						<div class="news__square__top gap-12px">

							<?php
                                $image = get_field("preview__img");

                                if ($image) { ?>
							<!-- Если это ютуб -->
							<div class="youtube__wrap">
								<div class="youtube__play"
									style="background-image: url(<? echo get_template_directory_uri() ?>/img/youtube-play.svg);">
								</div>
								<img src="<?php echo $image['url'] ?>" alt="<?php echo $image['alt'] ?>">
							</div>
							<?php } else { ?>
							<!-- Если нет изображения -->
							<?php if (has_post_thumbnail()) { ?>
							<!-- Если Есть изображения -->
							<img src="<?php echo the_post_thumbnail_url("large") ?>" alt="">
							<?php } ?>
							<?php } ?>

							<!-- Остальная часть  -->
							<div class="news__title"> <?php the_title(); ?> </div>
							<div class="news__desc"> <?php the_excerpt(); ?></div>
						</div>
						<p class="news__data"><?php echo get_the_date("j F Y"); ?></p>
					</a>
				</div>

				<?php endwhile;
                wp_reset_postdata();
            		else : ?>
				<p>Записей нет.</p>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>

<?php
get_footer("contacts");


