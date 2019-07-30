<?php

namespace App\Model\Service\Book;
use App\Model\Dao\Book;

class BookRegistrationService {

    /**
     * 実際にDB登録を行う記述（別途記載）
     */
    public function registbookInfo($param)
    {
        $dao = new Book();
        return $dao->registBook($param);
    }

    /**
     * 検索文字を元にJSONを取得し、情報を加工（登録用）
     * @param string $query 検索文字
     */
    public function getBookInfoList($query)
    {
        // 本の情報を格納する配列
        $bookList = [];

        $dao = new Book();

        // APIのレスポンス
        $response = $dao->getApiJson($query);

        // APIからの返却がない場合何もしない
        if (empty($response['items'])) {
            return $bookList;
        }

        foreach($response['items'] as $res) {
            $bookList[] = [
                'title' => $res['volumeInfo']['title'] ?? 'タイトル不明',
                'description' => $res['volumeInfo']['description'] ?? '',
                'publisher' => $res['volumeInfo']['publisher'] ?? '',
                'authors' => $res['volumeInfo']['authors'][0] ?? '',
                'thumbnail' => $res['volumeInfo']['imageLinks']['thumbnail'] ?? '/img/no_image.png',
                'publishedDate' => $res['volumeInfo']['publishedDate'] ?? '',
                'price' => $res['saleInfo']['listPrice']['amount'] ?? '価格不明',
                'gooLink' => $res['saleInfo']['buyLink'] ?? '',
                'amaLink' => $this->getAmazonUrlInfo($res['volumeInfo']['title'] ?? ''),
            ];
        }

        return $bookList;

    }


    /**
     * AmazonのURL検索URLを取得する
     * @param string $bookTitle 本のタイトル
     */
    public function getAmazonUrlInfo($bookTitle)
    {
        if (empty($bookTitle)) {
            return '';
        }

        $k = urlencode($bookTitle);

        return 'https://www.amazon.co.jp/s?k='
                . $k
                . '&__mk_ja_JP=%E3%82%AB%E3%82%BF%E3%82%AB%E3%83%8A&ref=nb_sb_noss';
    }
}
?>
