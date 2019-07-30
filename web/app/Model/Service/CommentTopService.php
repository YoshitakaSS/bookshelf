<?php
namespace App\Model\Service;
use App\Model\Dao\Comment;

class CommentTopService {

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
     * TOP画面：コメント一覧を取得する
     * @param array $bookLists 本の情報
     */
    public function getCommentListForTop($bookLists)
    {
        $commentItems = [];

        $dao = new Comment();

        foreach ($bookLists as $list) {
            $commentItems[] = $dao->getCommentList($list['bookId']);
        }

        return $this->processInfoForTop($commentItems, $bookLists);
    }

    /**
     * TOP画面：コメント一覧コメント順を取得する
     * @param array $bookLists 本の情報
     */
    public function getCommentListForTopByMaxCountSort($bookLists)
    {
        $dao = new Comment();
        $commentList = $dao->getCommentListByMaxCommentSort();
        dd($commentList);
    }

    /**
     * TOP画面：コメント一覧をviewに投げる形で生成し直す
     *
     */
    public function processInfoForTop($commentItems, $bookLists)
    {
        $items = [];

        foreach ($commentItems as $key => $clist) {
            $items[] = [
                'bookId' => $clist[0]['book_id'],
                'commentTitle' => $clist[0]['comment_title'],
                'commentDetail' => $clist[0]['comment_detail'],
                'userName' => $clist[0]['user_name'],
                'star' => $this->starList[$clist[0]['star'] - 1],
                'url' => '/detail/book/' . $clist[0]['book_id'],
            ];

            if (strcmp($items[$key]['bookId'], $bookLists[$key]['bookId']) == 1) {
                continue;
            }
            $items[$key]['book'] = $bookLists[$key];
        }

        return $items;
    }
}
?>
