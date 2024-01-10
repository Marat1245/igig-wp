<?php
            
            $args = array(
                'post_type'      => 'project',
                'post_status'    => 'publish',
                'posts_per_page' => -1,
                
            );
            $query = new WP_Query($args);

            if ($query->have_posts()) :

                // Инициализация массивов
                $important_with_thumbnail_ids   = array();
                $important_without_thumbnail_ids = array();
                $other_with_thumbnail_ids       = array();
                $other_without_thumbnail_ids    = array();

                 // Инициализация переменных для подсчета
                $count_important = 0;
                $count_with_thumbnail = 0;
                $count_without_thumbnail = 0;

                while ($query->have_posts()) : $query->the_post();

                    $post_id          = get_the_ID();
                    $thumbnail_url    = get_the_post_thumbnail_url($post_id, 'thumbnail');
                    $has_important_label = has_term('important', 'severny', $post_id);

                    if ($has_important_label) {
                        
                        $important_thumbnail_ids[] = $post_id;
                        $count_important++;
                        
                    } else {
                        if ($thumbnail_url) {
                            $other_with_thumbnail_ids[] = $post_id;
                            $count_with_thumbnail++;
                            
                        } else {
                            $other_without_thumbnail_ids[] = $post_id;
                            $count_without_thumbnail++;
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
               
                $n = 0;
                $cntOther = 0; 
                
                while($n < $count_important){
                    $postIdImportant = $important_thumbnail_ids[$n];
                    ?>
                
                <div class="show__project show__project__wrap">
                    
                    <div href="<?php the_permalink($postIdImportant);?>"  class="a show__project__card">
                        <a href="<?php the_permalink($postIdImportant);?>"></a>
                        <div >
                            <div class=" show__project__big ">
                                <div class="show__project__city title"><?php the_field("project__city", $postIdImportant ) ?></div>
                                <div class="show__project__name title"><?php echo get_the_title($postIdImportant )?></div>
                            </div>
                            

                        <?php if(has_post_thumbnail($postIdImportant )){ ?> 
                        
                            <img src="<?php echo get_the_post_thumbnail_url($postIdImportant, 'large');?>" alt="">
                        
                        <?php } else { ?>
                            
                        <img src="<? echo get_template_directory_uri() ?>/img/stub.svg" alt="">
                        
                        <?php }   ?>


                            </div>
                        </div>
                  
                    <div class="b show__project__card">
                    <a href="<?php the_permalink($sorted_posts[$cntOther]);?>"></a>
                        <div >
                            <div class="show__project__small">
                                <div class="show__project__city subtext__wrap__bold"><?php the_field("project__city", $sorted_posts[$cntOther] ) ?></div>
                                <div class="show__project__name fz16 "><?php echo get_the_title($sorted_posts[$cntOther] )?></div>
                            </div>
                            <?php if(has_post_thumbnail($sorted_posts[$cntOther] )){ ?> 
                            
                            <img src="<?php echo get_the_post_thumbnail_url($sorted_posts[$cntOther], 'large');?>" alt="">
                        
                        <?php } else { ?>
                            
                        <img src="<? echo get_template_directory_uri() ?>/img/stub.svg" alt="">
                        
                        <?php }   ?>
                        </div>
                    </div>
                    <?php $cntOther++; ?>
                    <div class="c show__project__card">
                        <a href="<?php the_permalink($sorted_posts[$cntOther]);?>"></a>
                        <div >
                            <div class="show__project__small">
                                <div class="show__project__city subtext__wrap__bold"><?php the_field("project__city", $sorted_posts[$cntOther] ) ?></div>
                                <div class="show__project__name fz16 "><?php echo get_the_title($sorted_posts[$cntOther] )?></div>
                            </div>
                            <?php if(has_post_thumbnail($sorted_posts[$cntOther] )){ ?> 
                            
                            <img src="<?php echo get_the_post_thumbnail_url($sorted_posts[$cntOther], 'large');?>" alt="">
                        
                        <?php } else { ?>
                            
                        <img src="<? echo get_template_directory_uri() ?>/img/stub.svg" alt="">
                        
                        <?php }   ?>
                        </div>
                    </div>
                    <?php $cntOther++; ?>
                   
                   
                       
                    
                </div>
                
                            

                <?php $n++;   }

          
            

            $nOther = $count_important * 2 ;
            $countOther = $count_with_thumbnail + $count_without_thumbnail;

            while($nOther < ($countOther - 2)){
                
                ?>
            <div class="show__project__without-big">

            
            <div class="show__project show__project__wrap">

                <div class="show__project__card">
                    <a href="<?php the_permalink($sorted_posts[$nOther ]);?>"></a>
                        <div >
                            <div class="show__project__small">
                                <div class="show__project__city subtext__wrap__bold"><?php the_field("project__city", $sorted_posts[$nOther ] ) ?></div>
                                <div class="show__project__name fz16 "><?php echo get_the_title($sorted_posts[$nOther ] )?></div>
                            </div>
                            <?php if(has_post_thumbnail($sorted_posts[$nOther ] )){ ?> 
                            
                            <img src="<?php echo get_the_post_thumbnail_url($sorted_posts[$nOther ], 'large');?>" alt="">
                        
                        <?php } else { ?>
                            
                        <img src="<? echo get_template_directory_uri() ?>/img/stub.svg" alt="">
                        
                        <?php }   ?>
                        </div>
                    </div>
                   
                    <?php $nOther ++; ?>
                <div class="show__project__card">
                    <a href="<?php the_permalink($sorted_posts[$nOther ]);?>"></a>
                    <div >
                        <div class="show__project__small">
                            <div class="show__project__city subtext__wrap__bold"><?php the_field("project__city", $sorted_posts[$nOther ] ) ?></div>
                            <div class="show__project__name fz16 "><?php echo get_the_title($sorted_posts[$nOther ] )?></div>
                        </div>
                        <?php if(has_post_thumbnail($sorted_posts[$nOther ] )){ ?> 
                        
                        <img src="<?php echo get_the_post_thumbnail_url($sorted_posts[$nOther ], 'large');?>" alt="">
                    
                    <?php } else { ?>
                        
                    <img src="<? echo get_template_directory_uri() ?>/img/stub.svg" alt="">
                    
                    <?php }   ?>
                    </div>
                </div>
                <?php $nOther ++; ?>
                <div class="show__project__card">
                    <a href="<?php the_permalink($sorted_posts[$nOther ]);?>"></a>
                    <div >
                        <div class="show__project__small">
                            <div class="show__project__city subtext__wrap__bold"><?php the_field("project__city", $sorted_posts[$nOther ] ) ?></div>
                            <div class="show__project__name fz16 "><?php echo get_the_title($sorted_posts[$nOther ] )?></div>
                        </div>
                        <?php if(has_post_thumbnail($sorted_posts[$nOther ] )){ ?> 
                        
                        <img src="<?php echo get_the_post_thumbnail_url($sorted_posts[$nOther ], 'large');?>" alt="">
                    
                    <?php } else { ?>
                        
                    <img src="<? echo get_template_directory_uri() ?>/img/stub.svg" alt="">
                    
                    <?php }   ?>
                    </div>
                </div>
                <?php $nOther ++; ?>                   
                
            </div>
            </div>
                        

        <?php   }

            else :
                echo '<p>No projects found.</p>';
            endif;
            wp_reset_postdata();
            ?>


