$(document).ready(function () {

    $("<div class='dropdown-nav-wrapper'><select class='dropdown-nav'></select></div>").appendTo(".acc_nav_container");

    // Populate dropdown with menu items
    $(".acc_nav_container li").each(function () {
        var el = $(this).children();
        
        // if((el).hasClass('active')){
        //     $("<option selected/>", {
        //         "value": el.attr("href"),
        //         "text": el.text()
        //     }).appendTo(".acc_nav_container select");
        // }
        // else{
        //     $("<option/>", {
        //         "value": el.attr("href"),
        //         "text": el.text()
        //     }).appendTo(".acc_nav_container select");
        // }

            $("<option/>", {
                "value": el.attr("href"),
                "text": el.text()
            }).appendTo(".acc_nav_container select");
        
    });

    $('.newAddrForm').hide();
    $('#addressSelect').click(function(){

        selectVal = $(this).val();
        console.log(selectVal);
        if(selectVal == 'new'){
            $('.newAddrForm').show();
        }
        else{
            $('.newAddrForm').hide();
        }
    });
});