<?php
/*
Template Name: Шаблон "Новости"
*/

get_header();
?>
   <section class="header__name">
        <div class="header__name__img__wrap">
            <div class="header__name__img" style="background-image: url(<?php the_field('news-all__img'); ?>);"></div>
        </div>
        <div class="header__name__bg"></div>
        <h1 class="center__wrap-all">Новости</h1>
    </section>

    <section class="big-size">
        <div class="news-main news__all center__wrap-l-r ">

        


    
    <?php  
    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    $query = new WP_Query( [
        'paged' => $paged,
    'post_type' => 'post',
    'posts_per_page' => 6,

    ]); 
    $cnt = 0;
    if ( $query->have_posts() ): while ( $query->have_posts() ) : $query->the_post(); 
    $cnt++;
    switch($cnt){ 
        case("1") :?>



           
    <?php
        $image = get_field("preview__img", get_the_ID());

        if($image){ ?>
        
        <a class="grid__2-block square__big" target="_blank"  href="<?php the_field("youtube")?>">

        <div class="big__text__wrap">
            <div class="news__square__top gap-12px mb-40px">
                <div class="title"><?php the_title();?></div>
                <div class="news__desc"><?php the_excerpt();?></div>
            </div>
            <p class="news__data mb-40px"><?php echo get_the_date("j F Y");?></p>
        </div>
        <div class="youtube__wrap">
            <div class="youtube__play" style="background-image: url(<? echo get_template_directory_uri() ?>/img/youtube-play-big.svg);"></div>
            <img src="<?php echo  $image['url'] ?>" alt="<?php echo  $image['alt'] ?>" class="news__all__big-img">
        </div>
                   
            
        
            

            <?php } else{   ?>
                
                
        <?php if(has_post_thumbnail( )){ ?> 
            <a class="grid__2-block square__big" target="_blank" href="<?php the_permalink();?>">

            <div class="">
                <div class="news__square__top gap-12px mb-40px">
                    <div class="title"><?php the_title();?></div>
                    <p class="news__desc"><?php the_excerpt();?></p>
                </div>
                <p class="news__data mb-40px"><?php echo get_the_date("j F Y");?></p>
            </div>
            
           <img src="<?php the_post_thumbnail_url("large");?>" alt="" class="news__all__big-img">
                  
            
        



        <?php } else { ?>
            <a class="grid__1-block bg__light-grey news__square" target="_blank" href="<?php the_permalink();?>">

            <div class="">
                <div class="news__square__top gap-12px mb-40px">
                    <div class="title"><?php the_title();?></div>
                    <div class="news__desc"><?php the_excerpt();?></div>
                </div>
                <p class="news__data mb-40px"><?php echo get_the_date("j F Y");?></p>
            </div>
               
            <?php }}   ?>
        
        
            
         

    </a>
    <div class="grid__2-1-block"> 







        
        

































        
        <?php 
        break;
        case("2") :?>
        
        
            
                    
                <?php
                $image = get_field("preview__img", get_the_ID());

                if($image){ ?>
                <a class="news__square bg__light-grey" target="_blank" href="<?php the_field("youtube")?>">
                    <div class="news__square__top gap-12px">
                    <div class="youtube__wrap">
                        <div class="youtube__play" style="background-image: url(<? echo get_template_directory_uri() ?>/img/youtube-play.svg);"></div>
                        <img src="<?php echo  $image['url'] ?>" alt="<?php echo  $image['alt'] ?>">
                    </div>
                   

                    <?php } else{   ?>
                     <a class="news__square  bg__light-grey" target="_blank" href="<?php the_permalink();?>">
                     <div class="news__square__top gap-12px">
                     <?php   if(has_post_thumbnail( )){   ?>
                   
                            <img src="<?php echo the_post_thumbnail_url("large") ?>" alt="">
                          
                        <?php           } 
                }
                ?>
                
                   
                    <div class="title"> <?php the_title();?> </div>
                    <div class="news__desc"> <?php the_excerpt();?></div>
                </div>
                <p class="news__data"><?php echo get_the_date("j F Y");?></p>

            </a>
                    
        
        <?php 
        break;
        case("3") :?>
          <?php
                $image = get_field("preview__img", get_the_ID());

                if($image){ ?>
                <a class="news__square " target="_blank" href="<?php the_field("youtube")?>">
                    <div class="news__square__top gap-12px">
                    <div class="youtube__wrap">
                        <div class="youtube__play" style="background-image: url(<? echo get_template_directory_uri() ?>/img/youtube-play.svg);"></div>
                        <img src="<?php echo  $image['url'] ?>" alt="<?php echo  $image['alt'] ?>">
                    </div>
                   

                    <?php } else{   ?>
                     <a class="news__square" target="_blank" href="<?php the_permalink();?>">
                     <div class="news__square__top gap-12px">
                     <?php   if(has_post_thumbnail( )){   ?>
                   
                            <img src="<?php echo the_post_thumbnail_url("large") ?>" alt="">
                          
                        <?php           } 
                }
                ?>
                
                   
                    <div class="news__title"> <?php the_title();?> </div>
                    <div class="news__desc"> <?php the_excerpt();?></div>
                </div>
                <p class="news__data"><?php echo get_the_date("j F Y");?></p>

            </a>
    
    <?php   ?>
        </div>
        
        
        <div class="grid__3-block">
            <?php 
            break;
            case("4") :?>
              <?php
                $image = get_field("preview__img", get_the_ID());

                if($image){ ?>
                <a class="news__square " target="_blank" href="<?php the_field("youtube")?>">
                    <div class="news__square__top gap-12px">
                    <div class="youtube__wrap">
                        <div class="youtube__play" style="background-image: url(<? echo get_template_directory_uri() ?>/img/youtube-play.svg);"></div>
                        <img src="<?php echo  $image['url'] ?>" alt="<?php echo  $image['alt'] ?>">
                    </div>
                   

                    <?php } else{   ?>
                     <a class="news__square" target="_blank" href="<?php the_permalink();?>">
                     <div class="news__square__top gap-12px">
                     <?php   if(has_post_thumbnail( )){   ?>
                   
                            <img src="<?php echo the_post_thumbnail_url("large") ?>" alt="">
                          
                        <?php           } 
                }
                ?>
                
                   
                    <div class="news__title"> <?php the_title();?> </div>
                    <div class="news__desc"> <?php the_excerpt();?></div>
                </div>
                <p class="news__data"><?php echo get_the_date("j F Y");?></p>

            </a>
            <?php 
            break;
            case("5") :?>
              <?php
                $image = get_field("preview__img", get_the_ID());

                if($image){ ?>
                <a class="news__square bg__light-grey" target="_blank" href="<?php the_field("youtube")?>">
                    <div class="news__square__top gap-12px">
                    <div class="youtube__wrap">
                        <div class="youtube__play" style="background-image: url(<? echo get_template_directory_uri() ?>/img/youtube-play.svg);"></div>
                        <img src="<?php echo  $image['url'] ?>" alt="<?php echo  $image['alt'] ?>">
                    </div>
                   

                    <?php } else{   ?>
                     <a class="news__square bg__light-grey" target="_blank" href="<?php the_permalink();?>">
                     <div class="news__square__top gap-12px">
                     <?php   if(has_post_thumbnail( )){   ?>
                   
                            <img src="<?php echo the_post_thumbnail_url("large") ?>" alt="">
                          
                        <?php           } 
                }
                ?>
                
                   
                    <div class="news__title"> <?php the_title();?> </div>
                    <div class="news__desc"> <?php the_excerpt();?></div>
                </div>
                <p class="news__data"><?php echo get_the_date("j F Y");?></p>

            </a>
            <?php 
            break;
            case("6") :?>
              <?php
                $image = get_field("preview__img", get_the_ID());

                if($image){ ?>
                <a class="news__square bg__light-grey" target="_blank" href="<?php the_field("youtube")?>">
                    <div class="news__square__top gap-12px">
                    <div class="youtube__wrap">
                        <div class="youtube__play" style="background-image: url(<? echo get_template_directory_uri() ?>/img/youtube-play.svg);"></div>
                        <img src="<?php echo  $image['url'] ?>" alt="<?php echo  $image['alt'] ?>">
                    </div>
                   

                    <?php } else{   ?>
                     <a class="news__square bg__light-grey" target="_blank" href="<?php the_permalink();?>">
                     <div class="news__square__top gap-12px">
                     <?php   if(has_post_thumbnail( )){   ?>
                   
                            <img src="<?php echo the_post_thumbnail_url("large") ?>" alt="">
                          
                        <?php           } 
                }
                ?>
                
                   
                    <div class="news__title"> <?php the_title();?> </div>
                    <div class="news__desc"> <?php the_excerpt();?></div>
                </div>
                <p class="news__data"><?php echo get_the_date("j F Y");?></p>

            </a>
            <?php 
            break;?>

        </div>


   <?php }   ?>

 
   
    <?php endwhile; else: ?>
        Записей нет.
    <?php endif; ?>
            
  
    </div>
    </section>
    <section class="big-size">
        <div  class="center__wrap-l-r">

        
        <!-- пагинация -->
        <div class="pagination">
                <?php
                    echo paginate_links( array(
                        'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
                        'total'        => $query->max_num_pages,
                        'current'      => max( 1, get_query_var( 'paged' ) ),
                        'format'       => '?paged=%#%',
                        'show_all'     => false,
                        'type'         => 'plain',
                        'link_before'      => '<div class="bottom__anima"></div>',
                        'end_size'     => 2,
                        'mid_size'     => 1,
                        'prev_next'    => true,
                        'prev_text'    => sprintf( '<i></i> %1$s', __( 'Назад', 'text-domain' ) ),
                        'next_text'    => sprintf( '%1$s <i></i>', __( 'Дальше', 'text-domain' ) ),
                        'add_args'     => false,
                        'add_fragment' => '',
                    ) );
                ?>
            </div>

            <?php wp_reset_postdata(); ?>
            </div>
    </section>


<?php
get_footer('contacts');
