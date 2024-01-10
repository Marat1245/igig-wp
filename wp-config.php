<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать файл в "wp-config.php"
 * и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки базы данных
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Параметры базы данных: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'igig' );

/** Имя пользователя базы данных */
define( 'DB_USER', 'root' );

/** Пароль к базе данных */
define( 'DB_PASSWORD', 'root' );

/** Имя сервера базы данных */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу. Можно сгенерировать их с помощью
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}.
 *
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными.
 * Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '<pjw|_/N|t4FK# $;s?2vMK.z;~.3DMHQ0jgs _x[ HjtlUl8h*w~&e7 JFR,;s@' );
define( 'SECURE_AUTH_KEY',  'H[-p}$va~>@zl[+2C3=M85Mf2eu<g[dvc={[018lqCmXzPHvwt*E@9e0W{i<|W`8' );
define( 'LOGGED_IN_KEY',    'n jns2g-K1{kG]hbGGu.Io4Y|y[974Op;7=9UZrH6LZYQN$ fOrEWls-)E5f#|}g' );
define( 'NONCE_KEY',        'zMX3?CI[G20$z6gkHx1kb txDQFRojN/7nbU-nl-[s0I&(D[`1~qhC]UlR(b-&V]' );
define( 'AUTH_SALT',        'e^Txm[3p-qFjFmR_t;}DE.Vh}U>9{6+HtbQS]G+mg6?VKZIE=a7%kJ*o/#jRJAA<' );
define( 'SECURE_AUTH_SALT', 'n/fx- ?OF0nDVIJ4{/*S,EM`i;)FK6?}JIjZ?%[[=fZ];e;4vhfT4d;EKsE]POm[' );
define( 'LOGGED_IN_SALT',   ',G?t~x[5v4<94DHzAlKq:1]Y8`:DFiO=TVp3D;{G4VJbCM(1k+eE6ZgO&KJ&f C1' );
define( 'NONCE_SALT',       'auzxc0?:UOMKx!I5(nHw:T{{Q:T}uf`I9i.sW}k9]dq>{I8>;)j&O9[vF@7G5+{V' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в документации.
 *
 * @link https://ru.wordpress.org/support/article/debugging-in-wordpress/
 */
define('WP_DEBUG', true);
define('WP_DEBUG_DISPLAY', true);

/* Произвольные значения добавляйте между этой строкой и надписью "дальше не редактируем". */



/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';
