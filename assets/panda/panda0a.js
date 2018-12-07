function hitokoto(item){
    $(item).addClass("fa-spin");
    $("#hitokoto>div").html(`<div class="idot"></div><div class="idot"></div><div class="idot"></div>`);
    $.ajax({
        url: " https://v1.hitokoto.cn/?c=a&encode=text",
        async:true,
        success:function(data){
            $(item).removeClass("fa-spin");
            $("#hitokoto>div").html(data);
        }
    });
}
hitokoto();

function checkWaifu(){
    if($(document).scrollTop()+window.innerHeight-($("#links").offset().top+$("#links").height()) > 400){
        $(".waifu").show();
    }else{
        $(".waifu").hide();
    }
}
$(document).on('pjax:complete',function(){
    hitokoto();
    checkWaifu();
})

$(document).scroll(function(){
    checkWaifu();
})

setInterval(function(){
	var start_timestamp = 1498733340000;
	var times = new Date().getTime() - new Date(start_timestamp).getTime();
    times = Math.floor(times/1000); // convert total milliseconds into total seconds
    var days = Math.floor( times/(60*60*24) ); //separate days
    times %= 60*60*24; //subtract entire days
    var hours = Math.floor( times/(60*60) ); //separate hours
    times %= 60*60; //subtract entire hours
    var minutes = Math.floor( times/60 ); //separate minutes
    times %= 60; //subtract entire minutes
    var seconds = Math.floor( times/1 ); // remainder is seconds
    $("#uptime>div").html(days + " 天 " + hours + " 小时 " + minutes + " 分 " + seconds + " 秒 ");
}, 1000);