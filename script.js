
jQuery(document).ready(function(){
jQuery('#dw__toc>div').hide();
jQuery('#dw__toc>div>ul').hide();
jQuery('#dw__toc').css('display','block');

jQuery(document).on('click', function(e) {
    if (!jQuery(e.target).closest('.menu').length) {
        jQuery('.menu:not(.mobile-menu) .list').hide();
    }

     if (!jQuery(e.target).closest('.dw__toc').length) {
        jQuery('#dw__toc>div').hide();
        jQuery('#dw__toc>div>ul').hide();
        jQuery('#dw__toc').css('display','block');
    }
}); 
jQuery('.menu:not(.mobile-menu)').on('click', function(e) {
    jQuery('.menu:not(.mobile-menu) .list').not(jQuery(this).children('.list')).hide();
    jQuery(this).children('.list').slideToggle('fast');
});


jQuery("#showhidesidemenu").on("click", () => {
    jQuery("body").toggleClass("show-sidebar");
    jQuery("body").removeClass("show-appoptions");
});

jQuery("#showhideappoptions").on("click", () => {
    jQuery("body").toggleClass("show-appoptions");
    jQuery("body").removeClass("show-sidebar");
});


});
