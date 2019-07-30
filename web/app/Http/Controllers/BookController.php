<?php

namespace App\Http\Controllers;
use App\Http\Requests\CommentRequest;
use App\Model\Service\Book\BookRegistrationService;
use App\Model\Service\CommentRegistService;

class BookController extends Controller
{
    //

    public function indexAction()
    {
        return view('book.regist.index');
    }

    /**
     * レビュー登録用アクション
     */
    public function registAction(CommentRequest $req)
    {
        $bookParam = [
            'bookTitle' => $req->bktitle ?? 'タイトル不明',
            'bookDescription' => $req->bkdesc ?? '',
            'bookimg' => $req->img ?? '/img/no_image.png',
            'bookPrice' => $req->price ?? '価格不明',
            'bookAuthor' => $req->author ?? '',
            'bookPublisher' => $req->publisher ?? '',
            'bookGoogleLink' => $req->glink ?? '',
            'bookAmazonLink' => $req->alink ?? '',
        ];

        $commentParam = [
            'userName' => $req->username ?? '名無し',
            'reviewTitle' => $req->reviewtitle,
            'reviewtext' => $req->reviewtext,
            'star' => $req->star,
        ];

        $bookService = new BookRegistrationService();
        $bookId = $bookService->registBookInfo($bookParam);

        $commentService = new CommentRegistService();
        $commentService->registCommentInfo($commentParam, $bookId);

        return redirect('/top');
    }

    /**
     * Ajax用アクション
     */
    public function booklistAction()
    {
        // 検索語句
        $query = $_GET['s'];

        // 値がなかったら何も返さない
        if (empty($query)) {
            return;
        }

        $query = urlencode($query);

        $service = new BookRegistrationService();

        return $service->getBookInfoList($query);
    }
}
