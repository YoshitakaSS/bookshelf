<?php
namespace App\Config;

class Cookie {

    protected $cookieArray = [];

    protected $cookieName = 'recent_book';

    public static function setCookieInfo($bookId)
    {
        $this->cookieArray[] = setcookie(
            'current_book',                 // cookie名
            $bookId,                        // cookie値
            time() + (7 * 24 * 60 * 60),    // 保存期間
            '/'                             // 保存場所
        );
    }

}
