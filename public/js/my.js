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



// ---- gallery ------ //
let srcImg;
let nextImg;
let prevImg;
let myLinkModal = $('.myLinkModal');
let myModalImg = $('#myModal img');
let galleryImg = $('.gallery img');
let firstImg = galleryImg.attr('src');
let lastImg = galleryImg.last().attr('src');


myLinkModal.click( function(event){
    event.preventDefault();
    // let imgSrc = $(event.target).attr('src');//event.target равно this
    srcImg = $(this).attr('src');
    $('#myOverlay').fadeIn(297,	function(){
        myModalImg.attr('src', srcImg);
        $('#myModal').css('display', 'block').animate({opacity: 1}, 198);
    });
});

function next() {
    myLinkModal.each(function() {
        let iter = $(this).attr('src');
        if(srcImg === iter){
            srcImg = $(this).next().attr('src');
            myModalImg.attr('src', srcImg);
            if (srcImg === undefined){
                srcImg = firstImg;
                myModalImg.attr('src', srcImg);
                return false;
            }
            return false;
        }
    })
}

function prev() {
    myLinkModal.each(function() {
        let iter = $(this).attr('src');
        if(srcImg === iter){
            srcImg = $(this).prev().attr('src');
            myModalImg.attr('src', srcImg);
            if (srcImg === undefined){
                srcImg = lastImg;
                myModalImg.attr('src', srcImg);
                return false;
            }
            return false;
        }
    })
}

$('#myModal__close, #myOverlay').click(escape);

function escape(){
    $('#myModal').animate({opacity: 0}, 198, function(){
        $(this).css('display', 'none');
        $('#myOverlay').fadeOut(297);
        nextImg = undefined;
        prevImg = undefined;
    });
}

 $('.next').click(next);
 $('.prev').click(prev);

$(document).keydown(function (e){
    if (e.keyCode === 39){
        next();
    }
    if (e.keyCode === 37) {
        prev();
    }
    if (e.keyCode === 27) {
        escape();
    }
})
// ---- end gallery ------ //

