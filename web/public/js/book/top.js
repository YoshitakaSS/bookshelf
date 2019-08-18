
'use strict';

{
    var textField = document.querySelector('input[name="s"]');
    var selectBox = document.getElementById('js-sort-select');

    textField.addEventListener('keyup', () => {
        getSuggestKeywordInfo(textField.value);
    });

    selectBox.addEventListener('change', () => {
        document.sortlist.submit();
    });

    /**
     * サジェスト一覧を取得する
     * @param string keyword 検索文字
     */
    function getSuggestKeywordInfo(keyword)
    {
        $.ajax({
            url: `/book/suggest?k=${keyword}`,
            type: 'get',
            dataType: 'json',
            timeout: 5000,
        })
        .done( (data) => {
            // 何も取得できない場合は何もしない
            if (!data || data.length === 0) {
                return;
            }
            // 本のタイトルを出現させる
            addSuggestList(data);
        });
    }

    /**
     * 文字を入力したら、推奨検索ワードを入力
     * @param array data
     */
    function addSuggestList(data)
    {
        let searchForm = document.getElementById('js-top-search');
        let url = '/detail/book/';
        let ul = document.createElement('ul');
        var list = document.querySelector('.suggest-list');

        // 既に生成されているのであれば削除
        if (!!list || textField.value == '') {
            list.parentNode.removeChild(list);
        }

        ul.classList.add('suggest-list');

        searchForm.appendChild(ul);

        for(var i = 0; i < data.length; i ++) {
            let li = document.createElement('li');
            let a = document.createElement('a');
                a.innerText =  data[i].title;
                a.setAttribute('href', url + data[i].bookId);

            ul.appendChild(li).appendChild(a);
        }
    }
}
