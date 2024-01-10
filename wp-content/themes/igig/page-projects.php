<?php
/*
Template Name: Шаблон "Знаковые проекты"
*/

get_header();
?>
<?php


?>

<section >
    <div class="header__name">

    

        <div class="header__name__img__wrap">
           
            <div class="header__name__img" style="background-image: url(<?php the_field('project-all__img'); ?>);"></div>		
        </div>
        <div class="header__name__bg"></div>
        <h1 class="center__wrap-all"><?php wp_title('') ?></h1>
    </div>
</section>

<section class="big-size">
    <div class="center grid__right type__03">

    
        <div class="center__title__wrap">
            <p class="subtext__wrap__bold"><?php the_field('project-all__desc'); ?></p>
        </div>


        </div>
    </section>

    <section class="big-size">
        <div class="center__wrap-l-r map__wrap">

       
        <div class="map wrap">
        <img class="map__bg" src="<? echo get_template_directory_uri() ?>/img/map.svg" alt="">
             <!-- Тут мы выводим пины -->
                <?php
                
                $args = array(
                'post_type' => 'project',
                'post_status' => 'publish',
                'posts_per_page' => -1,
                );
                $query = new WP_Query($args);
                
                if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post();

                        // Проверяем, есть ли ярлык "important" у текущего поста
                        $has_important_label = has_term('important', 'severny', get_the_ID());


                        $important_post_ids = array();
                        if ($has_important_label) {
                        $important_post_ids[] = get_the_ID();
                        }

                        // Получаем значения координат
                        $x_coordinate = get_post_meta(get_the_ID(), '_x_coordinate', true);
                        $y_coordinate = get_post_meta(get_the_ID(), '_y_coordinate', true);

                        if($x_coordinate > 0 || $y_coordinate > 0){

                        if ($has_important_label) :
                        // Если есть ярлык "important", выводим одну картинку
                        ?>
                        <img 
                                src="<?php echo plugins_url('/my-map-sm/images/pin.svg'); ?>"                    
                                class="black-square big-pin ui-draggable ui-draggable-handle pin" 
                                data-post-id="<?php echo get_the_ID(); ?>" 
                                style="top:<?php echo get_post_meta(get_the_ID(), '_y_coordinate', true); ?>%; 
                                left:<?php echo get_post_meta(get_the_ID(), '_x_coordinate', true); ?>%;">
                        </img>
                        <?php else : ?>
                        <!-- Если нет ярлыка "important", выводим другую картинку -->
                        <img 
                                src="<?php echo plugins_url('/my-map-sm/images/pin-small.svg'); ?>"                    
                                class="black-square ui-draggable ui-draggable-handle" 
                                data-post-id="<?php echo get_the_ID(); ?>" 
                                style="top:<?php echo get_post_meta(get_the_ID(), '_y_coordinate', true); ?>%; 
                                left:<?php echo get_post_meta(get_the_ID(), '_x_coordinate', true); ?>%;">
                        </img>
                        <?php  endif; } else {

                        } ?>

                <?php endwhile; ?>
                <?php else : 
                echo '<p>No projects found.</p>';
                endif;

                wp_reset_postdata();
                ?>    

    </div>
<div class="">
    <div class="card__project">

    
        <div class="card__project__wrap fz16">
                <div class="card__project__slider">

                </div>
                <!-- Swiper -->
                <div class="swiper projectSwiper">
                        <div class="swiper-wrapper">
                                
                        </div>
                        <div class="project-button-next">
                                <img src="<? echo get_template_directory_uri() ?>/img/arrow__blue-right.svg" alt="">
                        </div>
                        <div class="project-button-prev">
                                <img src="<? echo get_template_directory_uri() ?>/img/arrow__blue.svg" alt="">
                        </div>
                </div> 

                <div class="loader"></div>
                <div class="subtext__wrap__bold title"></div>
                <div><span class="fz16-med ">Город:</span> <span class="city"></span></div>
                <div><span class="fz16-med ">Заказчик:</span> <span class="customer"></span></div>
                <div><span class="fz16-med">Вид работ:</span> <span class="view"></span></div>
                <div><span class="fz16-med">Основные особенности:</span><span class="spec"></span> </div>
                <div class="add"></div>
                </div>
        </div>
</div>

        </div>
        </div>
        </div>
    </section>
    <section class="big-size">
        <div class="project__list center__wrap-l-r">

        
        <div class="center">
                <ul class="subtext__wrap__bold " id="sortable-list">
                        
                
                <?php
                $terms = get_terms('severny');

                foreach ($terms as $term) {

                        $category_name_parts = explode(' ', $term->name);
                       

                        // Получаем последнее слово
                        $last_word = end($category_name_parts);
                        $first_word = $category_name_parts[0];

                    // Проверяем, не является ли ярлык "important"
                    if ($term->slug !== 'important') { ?>
                        <li data-slug="<?php echo esc_attr($term->slug) ?>"><?php echo $first_word?> <span><?php echo $last_word?></span></li>
                <?php }
                }
                ?>
                <li class="project__list__act" data-slug="all">Все<span>проекты</span></li>
                </ul>
                <select name="type-project" id="type-project" class="bottom select mb-40px">
                        
                        <option data-slug="all" value="all">Все проекты</option>  
                         <!-- Выводим последнее слово внутри <span> -->
                         <?php
                        $terms = get_terms('severny');

                        foreach ($terms as $term) {

                                

                        // Проверяем, не является ли ярлык "important"
                        if ($term->slug !== 'important') { ?>
                                <option data-slug="<?php echo esc_attr($term->slug) ?>"  value="<?php echo $term->slug ?>"><?php echo $term->name ?></option> 
                        <?php }
                        }
                        ?>        
                                     
                </select>
                <div class="loader"></div>
                    <div id="project-container">
                        
                        <?php get_template_part( "template-parts/content", "projects")?> 
                    </div>
                      
           

        </div>
        </div>
    </section>

<?php
get_footer();
