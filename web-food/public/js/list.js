$(document).ready(function () {
    $('.delete').click(function () {
        if (confirm('Are you sure you want to delete ???')) {
            let id = $(this).attr('data-id');
            let origin = location.origin
            $.ajax({
                url: origin + "/admin/food/delete/" + id,
                method: 'GET',
                type: 'json',
                success: function (res) {
                    //console.log(res)
                    $('#food-' + id).remove();
                },
                error: function (error) {
                    alert('error');
                }
            })
        }
    })

    $('.quantity').on('input',function () {
        let val= $(this).val('.quantity');

    })
})
