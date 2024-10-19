jQuery(document).on('click', function(e) {
    if (!jQuery(e.target).closest('.menu').length) {
        jQuery('.menu:not(.mobile-menu) .list').hide();
    }
}); 
jQuery('.menu:not(.mobile-menu)').on('click', function(e) {
    jQuery('.menu:not(.mobile-menu) .list').not(jQuery(this).children('.list')).hide();
    jQuery(this).children('.list').slideToggle('fast');
});

jQuery(document).ready(function(){
jQuery('#dw__toc>div').hide();
jQuery('#dw__toc>div>ul').hide();
jQuery('#dw__toc').css('display','block');
});


jQuery("#showhidesidemenu").on("click", () => {

    if(jQuery("#sidebar").css("display") == "none")
    {
        jQuery("#navbar .right-column").css("display","none");
        jQuery("#sidebar").css("display","flex");
        jQuery("#view, .site-header, #footer").css("display","none");
    }
    else
    {
        jQuery("#navbar .right-column").css("display","none");
        jQuery("#sidebar").css("display","none");
        jQuery("#view, .site-header, #footer").css("display","flex");
    }


    
});

jQuery("#showhideappoptions").on("click", () => {
    

    if(jQuery("#navbar .right-column").css("display") == "none")
    {
        jQuery("#navbar .right-column").css("display","flex");
        jQuery("#sidebar").css("display","none");
        jQuery("#view, .site-header, #footer").css("display","none");
    }
    else
    {
        jQuery("#navbar .right-column").css("display","none");
        jQuery("#sidebar").css("display","none");
        jQuery("#view, .site-header, #footer").css("display","flex");
    }
    
});