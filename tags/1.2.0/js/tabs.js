/* 2013 Brandon Holtsclaw */

//gplus comments
window.___gcfg = {lang: 'en'};
(function(d) {
  var po = d.createElement('script');
  po.type = 'text/javascript';
  po.async = true;
  po.src = '//apis.google.com/js/plusone.js';
  var s = d.getElementsByTagName('script')[0];
  s.parentNode.insertBefore(po, s);
})(document);

//tab switch
jQuery('#comment-tabs').find('a').click(function(e){
    e.preventDefault();
    var el = jQuery(this);
    jQuery('#comment-tabs').find('li').removeClass('active');
    el.parent( 'li' ).addClass( 'active' );

    jQuery('#comment-tabs').find('div').removeClass('active');
    jQuery('#comment-tabs').find(el.attr('href')).addClass('active');
});
