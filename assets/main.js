---
---
{% assign slides = site.data.front.slides %}

$(function(){
    if($('#front-banner').length > 0) {
        var slides = {{ slides | jsonify }};
        var slides_en = {{ site.data.front.en.slides | jsonify }};
        var items = $('.item', '#front-banner');
        var uri = new URL(window.location.href);
        items.on('click', function(e) {
            e.preventDefaults; e.stopPropagation;
            if(!$(e.target).hasClass('btn')) {
                var seq = '';
                if($(e.target).hasClass('active')) {
                    seq = $(e.target).data('seq');
                } else {
                    seq = $(e.target).closest('.active').first().data('seq');
                }
                var link = (uri.pathname.includes('/en')) ? slides_en[seq]['link'] : slides[seq]['link'];
                if (link) {
                    window.location.href = link;
                }
            }
        })
    }
});
