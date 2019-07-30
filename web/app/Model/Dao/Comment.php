<?php

namespace App\Model\Dao;

use Illuminate\Database\Eloquent\Model;
use PHPUnit\Framework\Constraint\Exception;

class Comment extends Model
{
    public function registComment($param, $bookId)
    {
        // 先ほど登録した本の情報を取得する
        $book = new Book();
        $item = $book->where('book_id', $bookId)->get();

        try {
            $this->book_id = $item[0]['book_id'] ?? '';
            $this->user_name = $param['userName'];
            $this->comment_title = $param['reviewTitle'];
            $this->comment_detail = $param['reviewtext'];
            $this->star = $param['star'];
            $this->save();
            return;
        } catch (Exception $e) {
            throw $e . 'コメント登録処理でエラーが発生しました！';
        }
    }

    public function getCommentList($id)
    {
        // book_idに基づいた情報を取得する
        $commentList = $this
                        ->where('book_id', $id)
                        ->orderBy('created_at', 'desc')
                        ->get();
        return $commentList;
    }

    public function getCommentListByMaxCommentSort()
    {
        $commentList = $this
                ->orderBy('book_id', 'asc')
                ->get();
        return $commentList;
    }

    /**
     * 詳細画面：コメントを追加する
     */
    public function addComment($param, $bookId)
    {
        try {
            $this->book_id = $bookId;
            $this->user_name = $param['userName'];
            $this->comment_title = $param['reviewTitle'];
            $this->comment_detail = $param['reviewtext'];
            $this->star = $param['star'];
            $this->save();
            return;
        } catch (Exception $e) {
            throw $e . 'コメント登録処理でエラーが発生しました！';
        }
    }
}
