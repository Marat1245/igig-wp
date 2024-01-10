<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package igig
 */

?>



<!-- _-------------------------- -->

<section class="big-size  bg__light-grey">
    <div class="footer__call ">

   
        <div class="footer__call__left">
            <h3 class="mb-40px">Получить консультацию</h3>
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
        <div class="footer__call__right">
            <form action="<? echo get_template_directory_uri() ?>/mail.php"  method="POST" id="contact" type="submit" class="form gap-12px fd-c " enctype="multipart/form-data">
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
    <footer class="big-size bg__light-grey line-below ">
        <div class="footer  ">

        
        <div class="space-between center__wrap-l-r ">
            <div class="under-text">Инженерная геолония и геотехника © все права защищены</div>
           
            <a href="<?php echo get_permalink(3);?>" class="under-text">Политика конфиденциальности</a>
        </div>
        </div>
    </footer>


    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="https://unpkg.com/imask"></script>


  

	<?php wp_footer(); ?>
</body>

</html>

