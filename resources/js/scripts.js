$(document).ready(function() {
    $('#formModal .select2').select2({
        dropdownParent: $('#formModal')
    });
});

$('#openNavButton').on('click', function () {
    document.getElementById("mainSidenav").style.width = "250px";
    document.getElementById("main").style.paddingLeft = "266px";
    document.getElementById('darkMain').style.display = 'block';
})

$('#closeNavButton').on('click', function () {
    document.getElementById("mainSidenav").style.width = "0";
    document.getElementById("main").style.paddingLeft = "150px";
    document.getElementById('darkMain').style.display = 'none';
})

$('.ModalButton').click(function () {
    let url = $(this).data('url');
    $.ajax({
        method: 'GET',
        url: url,
        success: function (response) {
            let modal = $('#formModal')
            modal.find('.modal-body').html(response)
            modal.modal('show');
            // modal.find('input[type != "hidden"]').first().focus()
        }
    })
})

$(document).on('submit', '.AjaxForm', function (e) {
    e.preventDefault()
    e.stopPropagation()

    let _this = $(this) //de form
    $('.invaliderror').remove();
    $('.is-invalid').removeClass('is-invalid')

    $.ajax({
        method: _this.attr('method'),
        url: _this.attr('action'),
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: _this.serialize(),
        success: function (response) {
            if (response.url) {
                window.location.href = response.url;
            }
        },
        error: function (response, textStatus, errorThrown) {
            let errors = response.responseJSON.errors
            for (var key in errors) {
                // if (key.search(/[.]\d/g)>-1){
                if (key.search(".0") > -1) {
                    key = key.substr(0, key.search(/[.]\d/g));
                    let errorTxt = 'er is iets misgegaan, venieuw de pagina en probeer het opnieuw.';

                    $('#' + key).select2({
                        'containerCssClass': 'is-invalid',
                    })
                        .parent().append('<p class ="invaliderror text-sm text-red-600 mt-2">' + errorTxt + '</p>')
                } else {
                    if ($('[name=' + key + ']').length && $('[name=' + key + ']').hasClass('select2') == false) {
                        $('[name=' + key + ']')
                            .addClass('is-invalid')
                            .after('<p class ="invaliderror text-sm text-red-600 mt-2">' + errors[key][0] + '</p>')
                    } else {
                        $('#' + key).select2({
                            'containerCssClass': 'is-invalid',
                        })
                            .parent().append('<p class ="invaliderror text-sm text-red-600 mt-2">' + errors[key][0] + '</p>')
                    }
                }
            }
        }
    })

})

$('.modal').on('hidden.bs.modal', function (e) {
    $(this).find('.modal-body').html('')
});

$('.modal').on('shown.bs.modal', function (e) {
    let st = $(this).find('.select2.multiselect');
    st.select2({
        tags: true,
        createTag: function (params) {
            var term = $.trim(params.term);

            if (term === '') {
                return null;
            }

            return {
                id: 'new,' + term,
                text: 'nieuw: ' + term,
                newTag: true // add additional parameters
            }
        }
    });

    st = $(this).find('.select2.single2');
    st.select2({
        tags: false,
    });

    $('#formModal').find('input[type != "hidden"]').first().focus()

    $('input[type=checkbox].hider').click(function (){
        let hiding = $('input[type=checkbox].hider').siblings('.hiding');

        if (this.checked) {
            hiding.removeClass('d-none');
        } else {
            hiding.addClass('d-none');
        }
    })


});

$("#searchUser").select2({
    ajax: {
        url: "docent/search",
        type: "post",
        dataType: 'json',
        delay: 250,
        data: function (params) {
            return {
                _token: $('input[name=_token]').val(),
                searchTerm: params.term // search term
            };
        },
        processResults: function (response) {
            // console.log(response);
            return {
                results: $.map(response, function (item){
                    return {
                        text: item.name,
                        id: item.id
                    }
                })
            };
        },
        cache: true
    }
});


