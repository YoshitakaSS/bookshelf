'use strict';

{
    var bookinfo = document.getElementById('js-book-info');
    var dataBookInfo = bookinfo.getAttribute('data-book-info');
    var addCommentBtn = document.getElementById('js-add-comment');

    var overlay = $('#js-overlay');
    var reviewModal = $('#js-modal-review');

    // コメント追加ボタンをタップする
    addCommentBtn.addEventListener('click', () => {
        reviewModal.fadeIn();
        overlay.fadeIn();
    });

    overlay.on('click', () => {
        reviewModal.fadeOut();
        overlay.fadeOut();
    });
}


