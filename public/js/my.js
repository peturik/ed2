$('.mainmenu li').click(function (){
    $(this).addClass('active').siblings().removeClass('active');
})
//silings() выбирает смежные элементы после чего removeClass() удаляет класс

$(document).ready(function(){
    // alert(window.location.pathname);  //получить uri
    $(".mainmenu li a").each(function(){   // метод each() - циклический перебор элементов
        if($(this).attr("href") == window.location.pathname)
            $(this).addClass("active");
    })

    // $('#editor').summernote({
    //     height: 300,
    // });
})
tinymce.init({
    selector: '#editor'
});
