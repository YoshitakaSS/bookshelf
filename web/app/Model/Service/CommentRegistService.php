<?php
namespace App\Model\Service;
use App\Model\Dao\Comment;

class CommentRegistService {

    /**
     * レビュー登録画面：コメントを登録する
     * @param array $param
     * @param string $bookid
     */
    public function registCommentInfo($param = [], $bookId = '')
    {
        $dao = new Comment();
        $dao->registComment($param, $bookId);
        return;
    }

    /**
     * 詳細画面用：本の詳細画面のコメントを追加する
     */
    public function addCommentInfo($param = [], $bookId = '')
    {
        $dao = new Comment();
        $dao->addComment($param, $bookId);
        return;
    }
}
