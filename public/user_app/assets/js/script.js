// var loader = document.getElementById('preloader');
// var navbar = document.getElementById('navbar');
// var footer = document.getElementById('footer');
// window.addEventListener("load", function(){
//     loader.style.display = "none";
//     navbar.classList.add("fixed-top");
//     footer.classList.add("fixed-bottom");
// })


$(document).ready(function(){
    $(".sidebarToggle").click(function(e){
        e.preventDefault();
        $("#sidebar").toggleClass('sidebar');
        $("#sidebar").toggleClass('ease-left-in');
    })
})



$(document).ready(function(){
    $('#oneT').click(function(){
        $('#amount').val('1000');
    })
    $('#fiveT').click(function(){
        $('#amount').val('5000');
    })
    $('#tenT').click(function(){
        $('#amount').val('10000');
    })
    $('#oneL').click(function(){
        $('#amount').val('100000');
    })
    $('#twoL').click(function(){
        $('#amount').val('200000');
    })
    $('#fiveL').click(function(){
        $('#amount').val('500000');
    })

    $("#kpay").click(function(){
        $("#kpay").addClass('bankCheck')
        $("#wpay").removeClass('bankCheck')
        $("#cbpay").removeClass('bankCheck')
        $("#ayapay").removeClass('bankCheck')
        $("#bankName").text('(KBZ Pay)')
    })
    $("#wpay").click(function(){
        $("#kpay").removeClass('bankCheck')
        $("#wpay").addClass('bankCheck')
        $("#cbpay").removeClass('bankCheck')
        $("#ayapay").removeClass('bankCheck')
        $("#bankName").text('(Wave Pay)')
    })
    $("#cbpay").click(function(){
        $("#kpay").removeClass('bankCheck')
        $("#wpay").removeClass('bankCheck')
        $("#cbpay").addClass('bankCheck')
        $("#ayapay").removeClass('bankCheck')
        $("#bankName").text('(CB Pay)')
    })
    $("#ayapay").click(function(){
        $("#kpay").removeClass('bankCheck')
        $("#wpay").removeClass('bankCheck')
        $("#cbpay").removeClass('bankCheck')
        $("#ayapay").addClass('bankCheck')
        $("#bankName").text('(AYA Pay)')
    })

})
