<?php
namespace App\Model\Service;
use App\Model\Dao\Comment;

class CommentDetailService {

    /**
     * レビュー用の星
     * @param array
     */
    protected $starList = [
        '★☆☆☆☆',
        '★★☆☆☆',
        '★★★☆☆',
        '★★★★☆',
        '★★★★★',
    ];

    /**
     * 詳細画面：コメント一覧を取得する
     */
    public function getCommentListForDetail($bookId)
    {
        $dao = new Comment();
        $commentList = $dao->getCommentList($bookId);

        return $this->processCommentInfoForDetail($commentList);
    }

    /**
     * コメント情報を加工する
     * @param array $commentList bookidに基づいたコメント一覧
     */
    public function processCommentInfoForDetail($commentList)
    {
        $item = [];

        foreach ($commentList as $list) {
            $item[] = [
                'commentTitle' => $list['comment_title'],
                'commentDetail' => $list['comment_detail'],
                'userName' => $list['user_name'],
                'star' => $this->starList[$list['star'] - 1],
            ];
        }
        return $item;
    }
}
?>
