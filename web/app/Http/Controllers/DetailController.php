<?php

namespace App\Http\Controllers;

use App\Http\Requests\DetailCommentRequest;
use App\Model\Service\Book\BookDetailService;
use App\Model\Service\CommentDetailService;
use App\Model\Service\CommentRegistService;
use PHPUnit\Framework\Constraint\Exception;
use App\Config\Cookie;

class DetailController extends Controller
{
    /**
     * @param int $bookId 本のID
     */
    public function indexAction($bookId)
    {
        $info = [];
        // 本の情報を取得する
        $bookService = new BookDetailService();
        $info['bookItem'] = $bookService->getBookListForDetail($bookId);

        if (empty($info['bookItem'])) {
            return abort(404, 'URLが無効か、指定いただいた本はまだ登録されていません。');
        }

        // コメントの情報を取得する
        $commentService = new CommentDetailService();
        $info['commentItems'] = $commentService->getCommentListForDetail($info['bookItem']['bookId']);

        return view('book.detail.index')->with('info', $info);
    }


    /**
     * 詳細画面 コメント登録機能
     * @param string $bookid 本のID
     */
    public function registCommentAction(DetailCommentRequest $req, $bookId)
    {
        if (empty($bookId)) {
            return;
        }

        $commentParam = [
            'userName' => $req->username ?? '名無し',
            'reviewTitle' => $req->reviewtitle,
            'reviewtext' => $req->reviewtext,
            'star' => $req->star,
        ];

        try {
            $commentService = new CommentRegistService();
            $commentService->registCommentInfo($commentParam, $bookId);
            return redirect()->action('DetailController@indexAction', $bookId);
        } catch (Exception $e) {
            echo $e. 'コメントの取得処理に失敗しました';
        }
    }
}
