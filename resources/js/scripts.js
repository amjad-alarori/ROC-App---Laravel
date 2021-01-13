$(document).ready(function () {
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

$.fn.modal.Constructor.prototype.enforceFocus = function () {
};

$('.ModalButton').click(function () {
    let url = $(this).data('url');
    $.ajax({
        method: 'GET',
        url: url,
        success: function (response) {
            let modal = $('#formModal')
            modal.find('.modal-body').html(response)
            $.fn.modal.Constructor.prototype.enforceFocus = function () {
            };
            modal.modal('show');
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

    $('input[type=checkbox].hider').click(function () {
        let hiding = $('input[type=checkbox].hider').siblings('.hiding');

        if (this.checked) {
            hiding.removeClass('d-none');
        } else {
            hiding.addClass('d-none');
        }
    })

    let searchUrl = $("#searchUser").data('url');
    if (searchUrl === undefined) {
        searchUrl = $("#searchCompany").data('url');
    }

    $("#searchUser, #searchCompany").select2({
        ajax: {
            url: searchUrl,
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
                return {
                    results: $.map(response, function (item) {
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


    $('#delComp').click(function () {
            $('#searchCompany').empty();
            $('#searchCompany').append("<option value='0'>- Zoek een stage bedrijf -</option>");
            $('#searchCompany').closest("form").submit();
        }
    );
});

$("#searchUser").select2({
    ajax: {
        url: $("#searchUser").data('url'),
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
            return {
                results: $.map(response, function (item) {
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

$('.confirm').click(function () {
    var accpet = confirm('Door je interesse in deze stage kenbaar te maken geef je het bedrijf de mogelijkheid om je studieresultaten te bekijken, wilt u door gaan?');

    if (!accpet) {
        return false;
    }

});

$('.diconfirm').click(function () {
    var accpet = confirm('Weet u zeker dat je niet meer geïnteresseerd bent?');

    if (!accpet) {
        return false;
    }

});
