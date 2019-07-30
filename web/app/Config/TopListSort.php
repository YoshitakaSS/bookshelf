<?php
namespace App\Config;

class TopListSort
{


    public static function getSortList()
    {
        $sort = [
            '0' => '最新順',
            '1' => 'おすすめ順'
        ];

        return $sort;
    }

    public static function selectedSortInfo()
    {
        $param = $_GET['sort'] ?? '';

        return $param;
    }
}
