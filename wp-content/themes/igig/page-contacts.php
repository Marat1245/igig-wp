<?php
/*
Template Name: Шаблон "Контакты"
*/

get_header();
?>
 <section class="header__name">
        <div class="header__name__img__wrap">
            <div class="header__name__img" style="background-image: url(<?php the_field('contacts__img'); ?>);"></div>
        </div>
        <div class="header__name__bg"></div>
        <h1 class="center__wrap-all"><?php wp_title('') ?></h1>
    </section>

    <section class=" big-size" style="position: relative;">
        <div class=" footer__call__own  grid">

        
        <div class="footer__call__left ">
            <h3 class="mb-40px"><?php the_field("adress","options")?></h3>
            <div class="gap-12px fd-c">
            <a href="tel:<?php the_field("phone-number","options"); ?>" class="bottom bottom__blue">
                    <div class="bottom__anima"></div>
                    <div><?php the_field("phone-number","options"); ?></div>

                </a>
                <a href="mailto:<?php the_field("email-link","options"); ?>" class="bottom bottom__blue">
                    <div class="bottom__anima"></div>
                    <div><?php the_field("email-link","options"); ?></div>

                </a>
				<?php if(get_field('contacts',"options")): ?>
                    <?php while(has_sub_field('contacts',"options")) : ?>
                        
						<a href="<?php the_sub_field("link","options"); ?>" class="bottom bottom__blue">
							<div class="bottom__anima"></div>
							<div><?php the_sub_field("social__data","options"); ?></div>

						</a>
                <?php endwhile; ?>
                <?php endif; ?> 

				<?php if( have_rows('who',"options") ): ?>
					<?php while( have_rows('who',"options") ): the_row(); ?>
					<div class="footer__call__who">
						<span class="title"><?php the_sub_field('fio',"options"); ?></span>
						<p><?php the_sub_field('job_title',"options"); ?></p>
					</div>
					<?php endwhile; ?>
				<?php endif; ?> 
               
            </div>


        </div>
        <div class="footer__call__right bg__light-grey">
            <div class="bg__light-grey bg__footer__call__right">

            </div>
            <h3 class="mb-40px">Заполните форму и мы свяжемся с вами и ответим на все вопросы</h3>
        <form action="<? echo get_template_directory_uri() ?>/mail.php" method="POST" id="contact" type="submit" class="form gap-12px fd-c " enctype="multipart/form-data">
                <input type="text" name="name" id="name" placeholder="Имя" />
                <input type="text" name="phone" id="phone" placeholder="+7(000)000-00-00" required />
                <div class="input__file">
                    <img src="<? echo get_template_directory_uri() ?>/img/file.svg" alt="">
                    <label for="file" class="label__file ">Прикрепить файл</label>
                    <span></span>
                </div>

                <input type="file" name="file" id="file" class="file"
                    accept=".doc,.docx,.xml,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,image/*,.pdf">


                <button type="submit" id="callback-send" class="bottom__green bottom">
                    <div class="bottom__anima"></div>
                    <span>Отправить</span>

                </button>
                <div class="under-text">
                    Заполняя форму, я соглашаюсь с условиями передачи информации и политикой обработки <a href="<?php echo get_permalink(3);?>"
                        class="under-text">персональных данных</a>
                </div>
            </form>




        </div>
        </div>
    </section>


<?php
get_footer("contacts");
