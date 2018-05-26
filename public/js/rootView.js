$(function () {
    $(document).on('click', '.btn-primary', function () {
        $.ajax({
            url: $(this).attr('data-url'),
            type:'GET',
            beforeSend: function(){
                modalLoading(1)
            },
            success: function(response){
                console.log(response)
                fillDetails(response)
                modalLoading(0)
            },
            error:function(response){
                modalLoading(0)
                $('.modal').modal('toggle')
                toastr.error('The server cannot recover the details')
            }
        });
    })
})

function modalLoading (isLoading) {
    if (isLoading) {
        $('.modal .modal-body-content').hide()
        $('.modal .img-loading').show()
    } else {
        $('.modal .modal-body-content').show()
        $('.modal .img-loading').hide()
    }
}

function fillDetails(char){
    $('.td-modal-name').html(char.name)
    $('.td-modal-hair-color').html(char.hair_color)
    $('.td-modal-skin-color').html(char.skin_color)
    $('.td-modal-eye-color').html(char.eye_color)
    $('.td-modal-gender').html(char.gender)
}