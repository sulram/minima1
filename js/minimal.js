
$(document).ready(function() {

    // highlight categories redirection pages

    var redir = $('a[rel="redirect_page"]')
    if(redir){
    	var url = redir.attr('href')
    	$('.site-menu a[href="'+url+'"]').parent('li').addClass('current-menu-item')
    }

})