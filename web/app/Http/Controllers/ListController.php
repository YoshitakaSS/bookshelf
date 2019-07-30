<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Service\Book\BookListService;

class ListController extends Controller
{
    // 本の一覧アクション
    public function indexAction()
    {
        $service = new BookListService();
        $bookLists = $service->getBookListsForList();
        return view('book.list.index')->with('items', $bookLists);
    }
}
