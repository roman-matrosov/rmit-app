$(function() {
    var xhr = null;
    $('#search-field').bind('keyup', function() {
        if(xhr !== null) xhr.abort();
        xhr = $.ajax({
            'url' : '/elastic/search',
            'method' : 'GET',
            'data' : {
                'q' : $(this).val()
            }
        }).done(function(res) {
            var searchBlock = $('#search-block');
            searchBlock.html(res);
            searchBlock.show();
        });
    });
    $(':not(a)').click(function() {
        $('#search-block').hide();
    })
});