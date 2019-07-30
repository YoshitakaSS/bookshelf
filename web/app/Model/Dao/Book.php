<?php

namespace App\Model\Dao;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;
use PHPUnit\Framework\Constraint\Exception;

class Book extends Model
{
    /**
     * プライマリーキーのカラム名
     * @param string
     */
    protected $praimaryKey = 'book_id';

    /**
     * プライマリーキーの型
     * @param string
     */
    protected $keyType = 'string';

    /**
     * @param int 取得する件数
     */
    private $limit = 30;

    /**
     * プライマリーキー自動連番解除
     * @param bool
     */
    public $incrementing = false;


    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        // newした時に自動的にuuidを設定する
        $this->attributes[$this->praimaryKey] = Uuid::uuid4()->toString();
    }

    /**
     * TOP画面
     * 本の情報一覧を取得する
     */
    public function getBookListInfoForTop()
    {
        $itemLists = $this
                        ->orderBy('created_at', 'desc')
                        ->limit($this->limit)
                        ->get();
        return $itemLists;
    }

    /**
     * TOP画面
     * 検索文字を元に本の情報一覧を取得する
     * @param string $param 検索文字
     */
    public function getBookListInfoForTopBySearch($keyword)
    {
        $itemLists = $this
                        ->where('title', 'like', '%' . $keyword . '%')
                        ->OrWhere('author', 'like', '%' . $keyword . '%')
                        ->limit($this->limit)
                        ->get();
        return $itemLists;
    }

    /**
     * TOP画面
     * ランダムに一覧を取得する
     */
    public function getBookListInfoForTopByRandomSort()
    {
        $itemLists = $this
                        ->inRandomOrder()
                        ->limit($this->limit)
                        ->get();
        return $itemLists;
    }

    /**
     * TOP画面
     * レビュー数が多い順に一覧を取得する
     */
    public function getBookListInfoForTopByMaxReviewSort()
    {
        $itemLists = $this
                        ->where()
                        ->limit($this->limit)
                        ->get();
        return $itemLists;
    }

    /**
     * 一覧画面
     * 上限なく一覧を取得する
     */
    public function getBookListInfoForList()
    {
        $itemLists = $this
                        ->orderBy('created_at', 'desc')
                        ->get();
        return $itemLists;
    }

    /**
     * 詳細画面：本の情報を取得する
     * @param string $id bookid
     */
    public function getBookListInfoForDetail($id)
    {
        $item = $this->where('book_id', $id)->get();
        return $item;
    }

    /**
     * books_tableに情報を登録する
     * @param array $param
     */
    public function registBook($param)
    {
        // 既に登録されている本なのかを判定
        $item = $this->where('title', $param['bookTitle'])
                    ->where('author', $param['bookAuthor'])
                    ->get();

        // 既に登録されている本であれば、登録をスルー
        if (!$item->isEmpty()) {
            return $item[0]['book_id'];
        }

        $this->title = $param['bookTitle'];
        $this->description = $param['bookDescription'];
        $this->price = $param['bookPrice'];
        $this->author = $param['bookAuthor'];
        $this->publisher = $param['bookPublisher'];
        $this->image_link = $param['bookimg'];
        $this->google_store_link = $param['bookGoogleLink'];
        $this->amazon_link = $param['bookAmazonLink'];

        $this->save();
        return $this->book_id;
    }

    /**
     * APIをコールし、JSONを取得する（後々DaoとApi専用ディレクトリにぶち込む）
     * @param string $query 検索文字
     */
    public function getApiJson($query)
    {
        $url = 'https://www.googleapis.com/books/v1/volumes?q=' . $query;

        // cURLのセッションを初期化
        $ch = curl_init();

        // オプションを指定
        curl_setopt($ch, CURLOPT_URL, $url);                // 取得する文字列を指定
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);     // 実行結果を文字列で返却
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);    // サーバー証明書検証を行わない

        // ステータスコード
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        // URLの情報を取得
        $res = curl_exec($ch);

        $result = json_decode($res, true);

        // セッションを終了
        curl_close($ch);

        return $result;
    }

}
