var mapsvg_customizer = jQuery( document ).ready( function ( e ) {
	e("path").on("click touchstart", function( i ) {
        var output = "";

        var targetTax = i.target.id.toString().toLowerCase().replace(/[^a-z\s]+/g, '').replace(/\s+/g, '-');
        targetTax = targetTax + '-county';

        var reqBaseUrl = '/wp-content/plugins/mapsvg-customizer/includes/class-mapsvg-customizer-api.php';
        var reqUrl = reqBaseUrl + '?t=' + targetTax;

        var request = e.ajax({
            type: 'GET',
            dataType: 'json',
            url: reqUrl,
            timeout: 5000,
            success: function(data, textStatus){
                if(data === undefined || data.length == 0){
                    output = "There are no articles for this region.";
                    e("div.mapsvg-controller-view-content").html(output);
                } else {
                    output = '<ul class="county-article-list">';
                    data.forEach(function(val){
                        output += '<li class="county-article-link">';
                        output += '<a href="' + val.link + '" title="' + val.title + '">' + val.title + '</a>';
                        output += '</li>';
                    });
                    output += '</ul>';
                    e("div.mapsvg-controller-view-content").html(output);
                }
            },
            fail: function(xhr, textStatus, errorThrown){
                console.log(errorThrown);
            }
        });
    })
});