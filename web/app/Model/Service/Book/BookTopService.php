<?php

namespace App\Model\Service\Book;
use App\Model\Dao\Book;

class BookTopService {

    /**
     * TOP画面：本の一覧を取得する
     */
    public function getBookListForTop()
    {
        $dao = new Book();
        $lists = $dao->getBookListInfoForTop();
        return $this->processInfoForTop($lists);
    }

    /**
     * TOP画面；検索した本のタイトルを元に一覧を取得する
     * @param string $param 検索文字
     */
    public function getBookListForTopBySearch($keyword)
    {
        $dao = new Book();
        $lists = $dao->getBookListInfoForTopBySearch($keyword);
        return $this->processInfoForTop($lists);
    }

    /**
     * TOP画面；本の一覧を取得する（ソート：おすすめ順）
     */
    public function getBookListForTopByRandomSort()
    {
        $dao = new Book();
        $lists = $dao->getBookListInfoForTopByRandomSort();
        return $this->processInfoForTop($lists);
    }

    /**
     * 配列に不要な情報を含んでいるのでその他を削除する
     * @param array $list 取得した本の情報
     */
    public function processInfoForTop($lists)
    {
        $bookListsInfo = [];

        foreach($lists as $list) {
            $bookListsInfo[] = [
                'bookId' => $list['book_id'],
                'title' => $list['title'],
                'description' => $list['description'],
                'publisher' => $list['publisher'],
                'author' => $list['author'],
                'thumbnail' => $list['image_link'],
                'price' => $list['price'],
                'gooLink' => $list['google_store_link'],
                'amaLink' => $list['amazon_link'],
            ];
        }
        return $bookListsInfo;
    }
}
?>
