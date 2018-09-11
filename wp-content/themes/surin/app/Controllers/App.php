<?php

namespace App\Controllers;

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
     * Возврашает json постов
     *
     * @return mixed
     */
    public static function postResponse()
    {
        // TODO: Улучшить мметод
        $url = $_SERVER['REQUEST_URI'];
        $url = explode('/', $url);
        $url = array_filter($url);

        $pageId = $url[2] ? $url[2] : 1;

        $content = wp_remote_request( 'http://127.0.0.1:8000/api/posts/' . $pageId);

        if ($content->errors) {
            return null;
        }

        return json_decode($content['body'])->posts;
    }

    /**
     * Возврашает постраничную навигацию
     *
     * @return array|string|void
     */
    public static function getPagination()
    {
        // TODO: Улучшить мметод
        $url = $_SERVER['REQUEST_URI'];
        $url = explode('/', $url);
        $url = array_filter($url);

        $pageId = $url[2] ? $url[2] : 1;

        $result = wp_remote_request('http://127.0.0.1:8000/api/count/posts/');
        if ($result->errors) {
            return null;
        }

        $count = json_decode($result['body'])->count;
        $total = round($count / 2);

        $pagination = paginate_links( array(
            'base' => str_replace( $count, '%#%', esc_url( '/api-post/%#%/' ) ),
            'format' => '1',
            'current' => $pageId,
            'total' => $total,
            'posts_per_page' => 3,
            'prev_next' => false,
        ) );

        return $pagination;
    }

    /**
     * @return mixed
     */
    public static function postSingleResponse()
    {
        // TODO: Улучшить мметод
        $url = $_SERVER['REQUEST_URI'];
        $url = explode('/', $url);
        $url = array_filter($url);

        $pageId = $url[2] ? $url[2] : 1;

        $content = wp_remote_request( 'http://127.0.0.1:8000/api/post/' . $pageId );
        if ($content->errors) {
            return null;
        }

        return json_decode($content['body'])->post;
    }
}
