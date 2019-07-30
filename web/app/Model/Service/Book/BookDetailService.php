<?php

namespace App\Model\Service\Book;
use App\Model\Dao\Book;
use PHPUnit\Framework\Constraint\Exception;

class BookDetailService {

    /**
     * 詳細画面：本の情報を取得する
     * @param int $bookId 本のID
     */
    public function getBookListForDetail($bookId)
    {
        try {
            $dao = new Book();
            $itemInfo = $dao->getBookListInfoForDetail($bookId);

            if ($itemInfo->isNotEmpty()) {
                return $this->processInfoForDetail($itemInfo[0]);
            }
            return [];
        } catch (Exception $e) {
            echo $e . '本が見つかりませんでした';
        }

    }

    public function processInfoForDetail($itemInfo)
    {
        // 必要な情報のみ抜き出す
        return [
            'bookId' => $itemInfo['book_id'],
            'title' => $itemInfo['title'],
            'description' => $itemInfo['description'],
            'publisher' => $itemInfo['publisher'],
            'author' => $itemInfo['author'],
            'thumbnail' => $itemInfo['image_link'],
            'price' => $itemInfo['price'],
            'gooLink' => $itemInfo['google_store_link'],
            'amaLink' => $itemInfo['amazon_link'],
        ];
    }
}
?>
