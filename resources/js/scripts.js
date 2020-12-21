$('.ModalButton').click(function () {
    console.log('open')
    let url = $(this).data('url');
    $.ajax({
        method: 'GET',
        url: url,
        success: function (response) {
            let modal = $('#formModal')
            modal.find('.modal-body').html(response)
            modal.modal('show');
        }
    })
})

$('#formModal').on('shown.bs.modal', function () {
    $('.modal-footer>#save').click(function () {
        let form = $('#modalForm');
        let url = form.data('action');
        $.ajax({
            method: form.data('method'),
            // contentType: "application/json; charset=utf-8",
            url:url,
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: form.serialize(),
            success: function (response){
                console.log(response);
            },
            error : function(response, textStatus, errorThrown){
                console.log(response.responseJSON.errors);
            }
        })
    })
});
