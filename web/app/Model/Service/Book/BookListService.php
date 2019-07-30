<?php

namespace App\Model\Service\Book;
use App\Model\Dao\Book;

class BookListService {
    public function getBookListsForList()
    {
        $dao = new Book();
        $lists = $dao->getBookListInfoForList();
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
