$('.mainmenu li').click(function (){
    $(this).addClass('active').siblings().removeClass('active');
})
//silings() выбирает смежные элементы после чего removeClass() удаляет класс

$(document).ready(function(){
    // alert(window.location.pathname);  //получить uri
    $(".mainmenu li a").each(function(){   // метод each() - циклический перебор элементов
        if($(this).attr("href") === window.location.pathname)
            $(this).addClass("active");
    })



})

tinymce.init({
    selector: '#editor'
});



// $(document).ready(function() {
let srcImg;
let myLinkModal = $('.myLinkModal');

function openWindow(src) {
    $('#myOverlay').fadeIn(297,	function(){
        $('#myModal img').attr('src', src);
        $('#myModal').css('display', 'block').animate({opacity: 1}, 198);

    });
}

$(document).keydown(function (e){
    if (e.keyCode === 39){
        let src = $('.myLinkModal').next().attr('src');
        console.log(srcImage);
    }
})

myLinkModal.click( function(event){
    event.preventDefault();
    // let imgSrc = $(event.target).attr('src');//event.target равно this
    srcImg = $(this).attr('src');
    console.log(srcImg);
    openWindow(srcImg);
});

$('.next').click(function (){
    console.log($('#myModal img').next().attr('src'));
})




    $('#myModal__close, #myOverlay').click( function(){
        $('#myModal').animate({opacity: 0}, 198, function(){
            $(this).css('display', 'none');
            $('#myOverlay').fadeOut(297);
        });
    });
// });

