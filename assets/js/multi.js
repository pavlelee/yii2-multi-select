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
 *
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