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
    var id = e.target.id;

    var $container = $('#container-multi-select-'+ id);
    if($('[data-id="'+ data.id +'"]', $container).length < 1){
        var template = $('#template-multi-select-' + id).html();
        template = template.replace(/\{\{id}}/g, data.id);
        template = template.replace(/\{\{text}}/g, data.text);

        $container.append(template);
    }
}

/**
 *
 * @param list
 * @param id
 */
function initMultiSelectHandle(list, id){
    var e = {params: {}, target:{id: id}};

    $.each(list, function(key, value){
        e.params.data = {
            id: key,
            text: value
        };
        multiSelectBack(e);
    });
}