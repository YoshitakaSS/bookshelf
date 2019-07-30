<?php

namespace App\Http\Controllers;

use App\Config\TopListSort;
use Illuminate\Http\Request;
use App\Model\Service\Book\BookTopService;
use App\Model\Service\CommentTopService;
class TopController extends Controller

{
    /**
     * TOP画面
     */
    public function indexAction()
    {
        // 本の情報を取得する
        $bookService = new BookTopService();
        $bookLists = $bookService->getBookListForTop();

        // コメントの情報を取得する
        $commentService = new CommentTopService();
        $commentItems = $commentService->getCommentListForTop($bookLists);

        return view('book.top.index')->with('items', $commentItems);
    }

    /**
     * TOP画面：サジェスト機能
     * Ajax用
     */
    public function suggestAction()
    {
        $keyword = $_GET['k'] ?? '';

        if (empty($keyword)) {
            return;
        }

        // 本の情報を取得する
        $bookService = new BookTopService();
        $bookLists = $bookService->getBookListForTopBySearch($keyword);

        return $bookLists;
    }

    /**
     * TOP画面：ソート機能
     */
    public function sortAction(Request $req)
    {
        $commentItems = [];
        $bookService = new BookTopService();
        $commentService = new CommentTopService();

        $sort = $req->sort ?? 0;
        $sortParam = '';

        switch ($sort) {
            case 0: // 最新順
                $bookLists = $bookService->getBookListForTop();
                $commentItems = $commentService->getCommentListForTop($bookLists);
                $sortParam = $sort;
                break;

            case 1: // おすすめ順
                $bookLists = $bookService->getBookListForTopByRandomSort();
                $commentItems = $commentService->getCommentListForTop($bookLists);
                $sortParam = $sort;
                break;
            // case 2: // レビューが多い順
            //     $bookLists = $bookService->getBookListForTop();
            //     $commentItems = $commentService->getCommentListForTopByMaxCountSort($bookLists);
            //     $sortParam = $sort;
            //     break;
            default:
                return abort(404);
                break;
        }

        return view('book.top.index')
                    ->with('items', $commentItems)
                    ->with('sortParam', $sortParam);

    }

    /**
     * 概要画面
     * 静的画面のため、viewのみ返す
     */
    public function aboutAction()
    {
        return view('book.top.about');
    }
}
