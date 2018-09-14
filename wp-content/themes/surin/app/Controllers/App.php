<?php

namespace App\Controllers;

use function PHPSTORM_META\elementType;
use Sober\Controller\Controller;

class App extends Controller
{
    public function siteName()
    {
        return get_bloginfo('name');
    }

    /**
     * Устанавливает заголовок
     *
     * @return string|void
     */
    public static function title()
    {
        if (is_home()) {
            if ($home = get_option('page_for_posts', true)) {
                return get_the_title($home);
            }
            return __('Latest Posts', 'sage');
        }
        if (is_archive()) {
            return get_the_archive_title();
        }
        if (is_search()) {
            return sprintf(__('Search Results for %s', 'sage'), get_search_query());
        }
        if (is_404()) {
            return __('Not Found', 'sage');
        }
        return get_the_title();
    }

    /**
     * Получаем ссылку сайта к которому подключаемся по API
     *
     * @return null|string|string[]
     */
    public static function getSite()
    {
        $site = esc_attr( get_option('api_site'));
        return preg_replace("#/$#", "", $site);
    }

    /**
     * Возврашает json постов
     *
     * @return mixed
     */
    public static function postResponse()
    {
        $url = self::getSite() . '/api/posts/' . self::getPageCount(). '/' . self::getPageId();
        $content = wp_remote_request( $url );


        if ($content->errors) {
            return null;
        }

        $posts = json_decode($content['body'])->posts;

        if (empty($posts)) {
            return null;
        }

        return $posts;
    }

    /**
     * Возврашает постраничную навигацию
     *
     * @return array|string|void
     */
    public static function getPagination()
    {
        $result = wp_remote_request(self::getSite() . '/api/post/count/');

        if ($result->errors) {
            return null;
        }

        $count = json_decode($result['body'])->count;
        $total = round($count / self::getPageCount());
        if ($count > self::getPageCount() && $total == 1) {
            $total = 2;
        }

        $pagination = paginate_links( array(
            'base' => str_replace( $count, '%#%', esc_url( '/api-post/%#%/' ) ),
            'current' => self::getPageId(),
            'total' => $total,
            'prev_next' => false,
        ) );

        return $pagination;
    }

    /**
     * Получаем контент одного поста
     *
     * @return mixed
     */
    public static function postSingleResponse()
    {
        $content = wp_remote_request( self::getSite() . '/api/post/show/' . self::getPageId() );
        if ($content->errors) {
            return null;
        }

        return json_decode($content['body'])->post;
    }

    /**
     * Получаем Id страницы
     *
     * @return int
     */
    private static function getPageId()
    {
        $url = explode('/', $_SERVER['REQUEST_URI']);
        $url = array_filter($url);

        return $url[2] ? $url[2] : 1;
    }

    /**
     * Получаем количество постов а странице по API
     *
     * @return null|string|string[]
     */
    public static function getPageCount()
    {
        return esc_attr( get_option('api_count_post_page'));
    }
}
