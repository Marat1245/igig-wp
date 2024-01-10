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


    <footer class=" big-size bg__light-grey line-below">
        <div class="footer   center__wrap-l-r">

        
        <div class="space-between ">
            <div class="under-text">Инженерная геолония и геотехника © все права защищены</div>
           
            <a href="<?php echo get_permalink(3);?>" class="under-text">Политика конфиденциальности</a>
        </div>
        </div>
    </footer>


    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="https://unpkg.com/imask"></script>


    <script src="<? echo get_template_directory_uri() ?>/js/main.js"></script>

	<?php wp_footer(); ?>
</body>

</html>