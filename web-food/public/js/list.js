$(document).ready(function () {
    $('.delete').click(function () {
        if (confirm("Areyou sure ???")) {
            let id = $(this).attr('data-id');
            let origin = location.origin
            $.ajax({
                url: origin + '/admin/food/delete/' + id,
                method: 'GET',
                type: 'json',
                success: function (res) {
                    $('#food-' + id).remove();
                },
                error: function (error) {
                    alert('error');
                }
            })
        }
    })
})
