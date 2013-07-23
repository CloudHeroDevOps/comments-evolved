/* 2013 Brandon Holtsclaw */

(function ($) {
  $("#comment-tabs").tabs();
})(jQuery);

/*
jQuery('#comment-tabs').find('a').click(function(e){
    e.preventDefault();
    var el = jQuery(this);
    jQuery('#comment-tabs').find('li').removeClass('active');
    el.parent( 'li' ).addClass( 'active' );

    jQuery('#comment-tabs').find('div').removeClass('active');
    jQuery('#comment-tabs').find(el.attr('href')).addClass('active');
});
*/
