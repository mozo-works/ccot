---
---
{% assign slides = site.data.front.slides %}

$(function(){
    if($('#front-banner').length > 0) {
        var slides = {{ slides | jsonify }};
        var items = $('.item', '#front-banner');
        items.on('click', function(e) {
            e.preventDefaults; e.stopPropagation;
            if(!$(e.target).hasClass('btn')) {
                var seq = '';
                if($(e.target).hasClass('active')) {
                    seq = $(e.target).data('seq');
                } else {
                    seq = $(e.target).closest('.active').first().data('seq');
                }
                var link = slides[seq]['link'];
                if(link) {
                    window.location.href = link;
                }
            }
        })
    }
});
