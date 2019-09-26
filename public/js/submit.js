$(function(){
    $('#js-post-form').on('submit', function (event) {

        let postTable = $('#js-post-table');
        let postForm = $('#js-post-form');

        event.preventDefault();

        $.ajax({
            type: postForm.attr('method'),
            url: postForm.attr('action'),
            data: postForm.serialize(),
        }).done(function(data) {
            postTable.html(data);
            postForm[0].reset();
            postForm.find('.invalid-feedback').remove();
        })

    });
});