$(document).ready(function () {

    $('.sidebar ul li a').each(function () {
        let href = $(this).attr('href').split('/')[3]
        let url = window.location.pathname.split('/')[1]
        if (href == url) {
            $(this).addClass('active')
        } else {
            $(this).removeClass('active')
        }
    })

    let delete_item

    $('a[href="#delete"]').click(function () {
        delete_item = $(this).next()
    })

    $('#confirm-delete').click(function () {
        delete_item.submit()
    })

    $('.panel .panel-head i').click(function () {
        $(this).toggleClass('fa-minus fa-plus').parent().next().slideToggle(300)
    })

    $('#input-image-upload').change(function () {
        let file = $(this).val().split('\\')[2]
        $(this).next().text(file)
    })

})