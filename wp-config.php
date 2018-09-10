<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'wpsage');

/** Имя пользователя MySQL */
define('DB_USER', 'root');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', '12345');

/** Имя сервера MySQL */
define('DB_HOST', 'localhost');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8mb4');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '[A (gSiV~~<J{,A^xBf9kSDj~1dM:)I3K8@_XUy|vG2q&nmh<P(@`iPX>AZGbWl!');
define('SECURE_AUTH_KEY',  'BpLY}dt+$Ms9 $A{_w!Qs#PG.&C[``Tyr$%<+Y*L|rJZtP>*j-e)4h`x{FkvG$Dn');
define('LOGGED_IN_KEY',    ':ixV*6k:7K(vhX[9`qKfaW8}t@Tr}dK&#pdIRk|KC`g<sw$q`8o`#[7sz<=X413]');
define('NONCE_KEY',        'u{G0,iP[:TpghIGM5yzl9D7;!O$]%h%+_~50s-p4*ZLp;?=;U;gPHW,ScI{Q.L)T');
define('AUTH_SALT',        'U.-T86(l(2T%Qmx8Sj:a|Uuu/6+`!wBP}X&xB(vOCAZ^]+4wz)j*H|f!U`#cL;(0');
define('SECURE_AUTH_SALT', '|~zxuXm!+-T#&-j)ROjceJwFs}r$x?U._sl^XMzR!44cj#Cf=#L8$2CH^Q:;#NiB');
define('LOGGED_IN_SALT',   ']8a%hOP8V2RL32%j)O~[/Fe;)0:L}gD[uoN%r+W[XiT3HReRY/O`Y``/Dek+S`?u');
define('NONCE_SALT',       'r]uQQkEVDFg-^j[92_Wc]{7><H*$Qf{DXX]4w2P|YS~V.p>tIPvt8oyyG7N`N_qn');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
