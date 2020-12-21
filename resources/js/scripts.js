$('#openNavButton').on('click', function () {
    document.getElementById("mainSidenav").style.width = "250px";
    document.getElementById("main").style.paddingLeft = "266px";
    document.getElementById('darkMain').style.display = 'block';
})

$('#closeNavButton').on('click',function (){
    document.getElementById("mainSidenav").style.width = "0";
    document.getElementById("main").style.paddingLeft = "150px";
    document.getElementById('darkMain').style.display = 'none';
})


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
            modal.find('input[type="text"]').first().focus()
        }
    })
})

$(document).on('submit', '.AjaxForm', function (e) {
    e.preventDefault()
    e.stopPropagation()

    let _this = $(this) //de form

    $.ajax({
        method: _this.attr('method'),
        url: _this.attr('action'),
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: _this.serialize(),
        success: function (response) {
            if(response.url) {
                window.location.href = response.url;
            }
        },
        error: function (response, textStatus, errorThrown) {
            let errors = response.responseJSON.errors
            for(var key in errors) {
                $('[name=' + key + ']')
                    .addClass('is-invalid')
                    .after('<div class="alert alert-danger w-100 mt-3">' + errors[key][0] + '</div>')
            }
        }
    })

})

$('.modal').on('hidden.bs.modal', function (e) {
    $(this).find('.modal-body').html('')
});
