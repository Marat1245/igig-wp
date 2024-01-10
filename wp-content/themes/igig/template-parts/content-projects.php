<?php
            
            $args = array(
                'post_type'      => 'project',
                'post_status'    => 'publish',
                'posts_per_page' => -1,
                
            );
            $query = new WP_Query($args);

            if ($query->have_posts()) :

                // Инициализация массивов
                $important_thumbnail_ids   = array();
                $other_with_thumbnail_ids       = array();
                $other_without_thumbnail_ids    = array();


                while ($query->have_posts()) : $query->the_post();

                    $post_id          = get_the_ID();
                    $thumbnail_url    = get_the_post_thumbnail_url($post_id, 'thumbnail');
                    $has_important_label = has_term('important', 'severny', $post_id);

                    if ($has_important_label) {
                         $important_thumbnail_ids[] = $post_id;
                    } else {
                        if ($thumbnail_url) {
                            $other_with_thumbnail_ids[] = $post_id;
                            
                        } else {
                            $other_without_thumbnail_ids[] = $post_id;
                        }
                    }
                  
                    // Теперь $sorted_posts содержит элементы сначала из $posts_with_thumbnail, затем из $posts_without_thumbnail
                endwhile;
                wp_reset_postdata();

                // Now you have four arrays:
                // $important_with_thumbnail_ids, $important_without_thumbnail_ids,
                // $other_with_thumbnail_ids, $other_without_thumbnail_ids
               // Объединение массивов после завершения цикла
                $sorted_posts = array_merge($other_with_thumbnail_ids, $other_without_thumbnail_ids);
                $sorted_posts_all[] = $important_thumbnail_ids;
                $sorted_posts_all[] = $sorted_posts;

                $countImp = count($sorted_posts_all[0]);
                $countOth = count($sorted_posts_all[1]);


                
                $letters_for_sort_big_card = 0;
                $id_for_small_card = 0;
                $check_to_important_card = 0;

                $futer_project = '<div class="block-small">
                                <div class="block-text block-city fz16">Проект в разработке</div>
                                <div class="block-small__gradient"></div>
                                <div class="block-small__img" style="background-image: url(' . get_template_directory_uri() . '/img/stub.svg)"></div>
                            </div>';

                ?>
                
            

    <?php while( $check_to_important_card < $countImp){ ?>
        <div class="block-wrap show__project__wrap">
          
                

                
                <?php if (isset($sorted_posts_all[1][$id_for_small_card])) { ?>

                    <div class="block-1 block-small">
                        <a href="<?php the_permalink($sorted_posts_all[1][$id_for_small_card]);?>">
                            <div class="block-text block-city"><?php the_field("project__city", $sorted_posts_all[1][$id_for_small_card] ); ?></div>
                            <div class="block-text block-name"><?php echo get_the_title($sorted_posts_all[1][$id_for_small_card]); ?></div>
                            <div class="block-small__gradient"></div>
                            <?php if(has_post_thumbnail($sorted_posts_all[1][$id_for_small_card])){ ?> 
                                <div class="block-small__img" style="background-image: url(<?php echo get_the_post_thumbnail_url($sorted_posts_all[1][$id_for_small_card], 'large');?>); "></div>
                            <?php  } else { ?>
                                <div class="block-small__img" style="background-image: url(<? echo get_template_directory_uri() ?>/img/stub.svg "></div>
                            
                            <?php  }  ?>
                        </a>
                    </div>
               

                <?php $id_for_small_card++; } else { // Если данные в массиве закончились  
                    echo $futer_project; 
                    $check_to_important_card = $countImp; // Завершаем цикл
                }    ?>


                <?php if (isset($sorted_posts_all[1][$id_for_small_card])) { ?>

                <div class="block-2 block-small">
                    <a href="<?php the_permalink($sorted_posts_all[1][$id_for_small_card]);?>">
                        <div class="block-text block-city"><?php the_field("project__city", $sorted_posts_all[1][$id_for_small_card] ); ?></div>
                        <div class="block-text block-name"><?php echo get_the_title($sorted_posts_all[1][$id_for_small_card]); ?></div>
                        <div class="block-small__gradient"></div>
                        <?php if(has_post_thumbnail($sorted_posts_all[1][$id_for_small_card])){ ?> 
                            <div class="block-small__img" style="background-image: url(<?php echo get_the_post_thumbnail_url($sorted_posts_all[1][$id_for_small_card], 'large');?>); "></div>
                        <?php  } else { ?>
                            <div class="block-small__img" style="background-image: url(<? echo get_template_directory_uri() ?>/img/stub.svg "></div>
                        
                        <?php  }  ?>
                    </a>
                </div>


                <?php $id_for_small_card++; } else { // Если данные в массиве закончились  
                echo $futer_project; 
                $check_to_important_card = $countImp; // Завершаем цикл
                }    ?>
                <div class="block-3 block-big">
                    <a href="<?php the_permalink($sorted_posts_all[0][$letters_for_sort_big_card]);?>">
                        <div class="block-text block-city"><?php the_field("project__city", $sorted_posts_all[0][$letters_for_sort_big_card] ) ?></div>
                        <div class="block-text block-name"><?php echo get_the_title($sorted_posts_all[0][$letters_for_sort_big_card] )?></div>
                        <div class="block-small__gradient"></div>
                        <?php if(has_post_thumbnail($sorted_posts_all[0][$letters_for_sort_big_card])){ ?> 
                            <div class="block-small__img" style="background-image: url(<?php echo get_the_post_thumbnail_url($sorted_posts_all[0][$letters_for_sort_big_card], 'large');?>); "></div>
                        <?php  } else { ?>
                            <div class="block-small__img" style="background-image: url(<? echo get_template_directory_uri() ?>/img/stub.svg"></div>
                           
                        <?php  }  ?>
                    </a>
                    
                </div>
                <?php $letters_for_sort_big_card++; ?>


                <?php if (isset($sorted_posts_all[1][$id_for_small_card])) { ?>
                    <?php if (isset($sorted_posts_all[1][$id_for_small_card])) { ?>

                    <div class="block-4 block-small">
                        <a href="<?php the_permalink($sorted_posts_all[1][$id_for_small_card]);?>">
                            <div class="block-text block-city"><?php the_field("project__city", $sorted_posts_all[1][$id_for_small_card] ); ?></div>
                            <div class="block-text block-name"><?php echo get_the_title($sorted_posts_all[1][$id_for_small_card]); ?></div>
                            <div class="block-small__gradient"></div>
                            <?php if(has_post_thumbnail($sorted_posts_all[1][$id_for_small_card])){ ?> 
                                <div class="block-small__img" style="background-image: url(<?php echo get_the_post_thumbnail_url($sorted_posts_all[1][$id_for_small_card], 'large');?>); "></div>
                            <?php  } else { ?>
                                <div class="block-small__img" style="background-image: url(<? echo get_template_directory_uri() ?>/img/stub.svg "></div>
                            
                            <?php  }  ?>
                        </a>
                    </div>


                    <?php $id_for_small_card++; } else { // Если данные в массиве закончились  
                    echo $futer_project; 
                    $check_to_important_card = $countImp; // Завершаем цикл
                    }   ?>

                    <?php if (isset($sorted_posts_all[1][$id_for_small_card])) { ?>

                    <div class="block-5 block-small">
                        <a href="<?php the_permalink($sorted_posts_all[1][$id_for_small_card]);?>">
                            <div class="block-text block-city"><?php the_field("project__city", $sorted_posts_all[1][$id_for_small_card] ); ?></div>
                            <div class="block-text block-name"><?php echo get_the_title($sorted_posts_all[1][$id_for_small_card]); ?></div>
                            <div class="block-small__gradient"></div>
                            <?php if(has_post_thumbnail($sorted_posts_all[1][$id_for_small_card])){ ?> 
                                <div class="block-small__img" style="background-image: url(<?php echo get_the_post_thumbnail_url($sorted_posts_all[1][$id_for_small_card], 'large');?>); "></div>
                            <?php  } else { ?>
                                <div class="block-small__img" style="background-image: url(<? echo get_template_directory_uri() ?>/img/stub.svg "></div>
                            
                            <?php  }  ?>
                        </a>
                    </div>


                    <?php $id_for_small_card++; } else { // Если данные в массиве закончились  
                    echo $futer_project; 
                    $check_to_important_card = $countImp; // Завершаем цикл
                    }   ?>
                                <?php if (isset($sorted_posts_all[1][$id_for_small_card])) { ?>

                    <div class="block-6 block-small">
                        <a href="<?php the_permalink($sorted_posts_all[1][$id_for_small_card]);?>">
                            <div class="block-text block-city"><?php the_field("project__city", $sorted_posts_all[1][$id_for_small_card] ); ?></div>
                            <div class="block-text block-name"><?php echo get_the_title($sorted_posts_all[1][$id_for_small_card]); ?></div>
                            <div class="block-small__gradient"></div>
                            <?php if(has_post_thumbnail($sorted_posts_all[1][$id_for_small_card])){ ?> 
                                <div class="block-small__img" style="background-image: url(<?php echo get_the_post_thumbnail_url($sorted_posts_all[1][$id_for_small_card], 'large');?>); "></div>
                            <?php  } else { ?>
                                <div class="block-small__img" style="background-image: url(<? echo get_template_directory_uri() ?>/img/stub.svg "></div>
                            
                            <?php  }  ?>
                        </a>
                    </div>


                    <?php $id_for_small_card++; } else { // Если данные в массиве закончились  
                    echo $futer_project; 
                    $check_to_important_card = $countImp; // Завершаем цикл
                    }   
                } else {
                    $check_to_important_card = $countImp;
                }
                    
                    
                ?>
              
                
                

         
        </div> 
    <?php  $check_to_important_card++; }  ?>
    <div class="block-wrap__for-other-cards show__project__wrap">
    <?php   while(isset($sorted_posts_all[1][$id_for_small_card])){ ?>
            
            
        
            <div class="block-small">
                <a href="<?php the_permalink($sorted_posts_all[1][$id_for_small_card]);?>">
                    <div class="block-text block-city"><?php the_field("project__city", $sorted_posts_all[1][$id_for_small_card] ); ?></div>
                    <div class="block-text block-name"><?php echo get_the_title($sorted_posts_all[1][$id_for_small_card]); ?></div>
                    <div class="block-small__gradient"></div>
                    <?php if(has_post_thumbnail($sorted_posts_all[1][$id_for_small_card])){ ?> 
                        <div class="block-small__img" style="background-image: url(<?php echo get_the_post_thumbnail_url($sorted_posts_all[1][$id_for_small_card], 'large');?>); "></div>
                    <?php  } else { ?>
                        <div class="block-small__img" style="background-image: url(<? echo get_template_directory_uri() ?>/img/stub.svg "></div>
                    
                    <?php  }  ?>
                </a>
            </div>
       
    
    
    
    
    <?php $id_for_small_card++;   }?>
    </div> 




















                

          
            

            
                        

        <?php  

            else :
                echo '<p>No projects found.</p>';
            endif;
            wp_reset_postdata();
            ?>


