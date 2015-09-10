/**
 * Created by Liv on 15/9/10.
 */
jQuery(function ($) {
    $(document).on('click', '.multi-select-remove', function(e){
        var $item = $(this).parent();
        $item.remove();
    });
});

/**
 * callback
 * @param e
 */
function multiSelectBack(e) {
    var data = e.params.data;

    var $container = $('#container-multi-select');
    if($('[data-id="'+ data.id +'"]', $container).length < 1){
        var template = $('#template-multi-select').html();
        template = template.replace(/\{\{id}}/g, data.id);
        template = template.replace(/\{\{text}}/g, data.text);

        $('#container-multi-select').append(template);
    }
}

/**
 *
 * @param list
 */
function initMultiSelectHandle(list){
    var e = {params: {}};

    $.each(list, function(key, value){
        e.params.data = {
            id: key,
            text: value
        };
        multiSelectBack(e);
    });
}