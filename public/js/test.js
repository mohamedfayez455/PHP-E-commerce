$('.mo li a').click(function () {

    $(this).addClass('active').parent().siblings().find('a').removeClass('active');

});