<?php
/*
Plugin Name: Интерактивная карта
Description: Интерактивная карта
Version: 1.0
Author: Name
*/

// Созлаем меню и подключаем стили через хук
function map_admin_menu() {
    // добавляем пунк меню 
    add_menu_page(
        'Карта',           // Page title
        'Карта',           // Menu title
        'edit_posts',       // Capability
        'map-admin-tab',     // Menu slug
        'map_admin_page',    // Callback function to display the page
        'dashicons-location',   // Icon for the menu item
        30,                    
    );

    // admin_enqueue_scripts - принято подключать стили и тд
    // map_enqueue_styles - внизу подключаем
    add_action('admin_enqueue_scripts', 'map_enqueue_styles');

    // подключаем скрипт
    add_action('admin_enqueue_scripts', 'map_enqueue_scripts');
    
}
// admin_menu - Позволяет изменить элементы админ-меню.
add_action('admin_menu', 'map_admin_menu');







// Добавление колонок в таблицу административного интерфейса только на странице вашего плагина
// $columns - создается что бы передавать данные
function map_admin_columns($columns) {
    // Проверяем, находимся ли мы на странице вашего плагина
    // is_admin() - проверяет находится ли пользователь в админ-панели сайта (консоль или любая другая страница админки)
    if (is_admin() && isset($_GET['page']) && $_GET['page'] === 'map-admin-tab') {
        $columns['x_coordinate'] = 'Координата X';
        $columns['y_coordinate'] = 'Координата Y';
        $columns['actions'] = 'Действия';
    }
    return $columns;
}

// add_filter - функция которая позволяет отфильтровать данные в какой нибуть момент
// manage_project_posts_columns 
add_filter('manage_project_posts_columns', 'map_admin_columns');










// Заполнение колонок значениями
function map_admin_column_content($column, $post_id) {
    switch ($column) {
        // в кологку х - добавляем сои координаты
        case 'x_coordinate':
            // get_post_meta - получает значение произвольного поля записи (поста). Позволяет также получить все метаполя.
            //  Передача true в качестве третьего параметра означает, что вы хотите получить одиночное значение мета-поля, а не массив всех значений.
            $x_coordinate = get_post_meta($post_id, '_x_coordinate', true);
            echo $x_coordinate;
            break;

        case 'y_coordinate':
            $y_coordinate = get_post_meta($post_id, '_y_coordinate', true);
            echo $y_coordinate;
            break;

        case 'actions':
            echo '<button class="addSquare" data-post-id="' . $post_id . '">Добавить</button>';
            break;


    }
}
add_action('manage_project_posts_custom_column', 'map_admin_column_content', 10, 2);







// Отображаем кастомную админ панель
function map_admin_page() {  ?> 

    <div class="wrap">
        <h1>Проекты</h1>
        <div class='highlighted__wrap'>
            <div class="loader"></div>
            <div>
                <div>                
                    <span class="highlighted__title">Кликните на флажок для изменения данных</span>
                </div>
                <div>                
                    <span class="highlighted__city"></span>
                </div>
            </div>

            <div class="highlighted_btn">
               
            </div>

            
        </div>
        <div class="int__map__wrap">
            <div class="int__map project-row">
                




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
                        src="<?php echo plugins_url('/images/pin.svg', __FILE__); ?>"                    
                        class="black-square big-pin ui-draggable ui-draggable-handle" 
                        data-post-id="<?php echo get_the_ID(); ?>" 
                        style="top:<?php echo get_post_meta(get_the_ID(), '_y_coordinate', true); ?>%; 
                        left:<?php echo get_post_meta(get_the_ID(), '_x_coordinate', true); ?>%;">
                    </img>
                <?php else : ?>
                    <!-- Если нет ярлыка "important", выводим другую картинку -->
                    <img 
                        src="<?php echo plugins_url('/images/pin-small.svg', __FILE__); ?>"                    
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



                <!-- Отображаем карту -->
                <img class="map" src="<?php echo get_template_directory_uri(); ?>/img/map.png" alt="">
            </div>
        </div>
        <!-- <div><button class="saveData">Сохранить</button></div> -->






        <!-- Теперь выводим колонки с данными -->
        <?php if ($query->have_posts()) : ?>
            <table class="wp-list-table widefat fixed striped">
                <thead>
                    <tr>
                        <th>Заголовок</th>
                        <th>Направления</th>
                        
                        <th>Город</th>
                        <th>X, Y</th>
                        
                        <th>Действия</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Проходим по цику постов -->
                    <?php while ($query->have_posts()) : $query->the_post(); ?>
                        <tr>
                            <td><?php the_title(); ?></td>





                            <td>
                                <?php
                                // содали переменную $categories
                                // get_the_terms()  получили элементы таксонамии по ID и слагу severny(который мы назначили на странице функции)
                                // Получаем элементы таксономии 'severny' для текущей записи (поста)
                                $categories = get_the_terms(get_the_ID(), 'severny');

                                // Проверяем, существуют ли какие-либо элементы таксономии
                                if ($categories) {
                                    // Создаем пустой массив для хранения имен категорий
                                    $category_names = array();

                                    // Проходим по каждому элементу таксономии
                                    foreach ($categories as $category) {
                                        // Добавляем имя текущей категории в массив $category_names
                                        $category_names[] = $category->name;
                                    }

                                    // Выводим имена категорий, объединенные запятой и пробелом
                                    echo implode(', ', $category_names);
                                }
                                ?>
                            </td>





                            <td><?php the_field("project__city") ?></td>
                            <td><?php echo get_post_meta(get_the_ID(), '_x_coordinate', true); echo ", "; echo get_post_meta(get_the_ID(), '_y_coordinate', true); ?></td>
                            

                            <td class="td__btn" data-post-id="<?php echo get_the_ID(); ?>" >
                                <?php 
                                    if(get_post_meta(get_the_ID(), '_y_coordinate', true) > 0 || get_post_meta(get_the_ID(), '_y_coordinate', true) > 0 ){ 
                                        
                                ?>
                                
                                    <button class="addSquare" data-post-id="<?php echo get_the_ID(); ?>">Изменить</button>
                                    <button class="deleteSquare" data-post-id="<?php echo get_the_ID(); ?>">Удалить</button>
                                <?php    } else { ?>
                                    <button class="addSquare" data-post-id="<?php echo get_the_ID(); ?>">Добавить</button>
                                    
                                <?php    }  ?>
                            </td>
                        </tr>
                      
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else : echo '<p>No projects found.</p>';
        endif;

       // Нужно выводить если есть функция post
        wp_reset_postdata();
        ?>
    </div>
    <style>
        .wrap {
            padding: 20px;
        }
    </style>

<?php }











// Function to enqueue styles
function map_enqueue_styles() {
    // Enqueue your custom stylesheet
    wp_enqueue_style('custom-admin-styles', plugins_url('css/custom-admin-styles.css', __FILE__));
}

// Function to enqueue scripts
function map_enqueue_scripts() {
    if (is_admin() && isset($_GET['page']) && $_GET['page'] === 'map-admin-tab') {

   
    // Enqueue your custom script
    wp_enqueue_script('jquery');
    wp_enqueue_script('jquery-ui-draggable');

    // Добавляем скрипт custom-additional-script.js, который включает функциональность drag-and-drop
    wp_enqueue_script('custom-additional-script', plugins_url('js/custom-additional-script.js', __FILE__), '', true);

    // Локализация переменных скрипта
    // wp_localize_script - передаем данный в скрипт

    

    $important_post_ids = array();

    $args = array(
        'post_type'      => 'project',
        'post_status'    => 'publish',
        'posts_per_page' => -1,
    );
    
    $query = new WP_Query($args);
    
    if ($query->have_posts()) {
        while ($query->have_posts()) : $query->the_post();
    
            // Проверяем, есть ли ярлык "important" у текущего поста
            $has_important_label = has_term('important', 'severny', get_the_ID());
    
            if ($has_important_label) {
                $important_post_ids[] = get_the_ID();
            }
    
        endwhile;
    
        wp_reset_postdata();
    }
    
    
    wp_localize_script('custom-additional-script', 'map_script_vars', array(
         // что передаем
        'ajaxurl' => admin_url('admin-ajax.php'), // URL для admin-ajax.php
        'plugin_url' => plugins_url('', __FILE__),
        "important_post_ids" => $important_post_ids,
        
    ));

    }
}

