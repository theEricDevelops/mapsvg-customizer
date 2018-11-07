var mapsvgc_json = jQuery( document ).ready( function ( e ) {
    var articles = Array();
    var jsonFile = new XMLHttpRequest();
    jsonFile.open('GET', '/wp-content/plugins/mapsvg-customizer/articles.json', true);
    jsonFile.onreadystatechange = function() {
        if ( jsonFile.readyState === 4 && jsonFile.status === 200 )  {
            var articleJSON = jsonFile.responseText;
            articles = JSON.parse(articleJSON);
        }
    }
    jsonFile.send(null);

	e("path").on("click touchstart", function( i ) {
        function updateText () { var output = "";

        var targetTax = i.target.id.toString().toLowerCase().replace(/[^a-z\s]+/g, '').replace(/\s+/g, '-');
        targetTax = targetTax + '-county';

        function getArticleLinks() {
            var links = Array();
            articles.forEach(function(val) {
                if(val.county == targetTax) {
                    var href = '<a href="' + val.link + '" title="' + val.title + '">' + val.title + '</a>';
                    links.push(href);
                }
            });
            return links;
        }

        var articleLinks = getArticleLinks();
        if( articleLinks.length == 0 ) { 
            output = "There are no articles for this region.";
            e("div.mapsvg-controller-view-content").html(output);
        } else {
            output = '<ul class="county-article-list">';
            articleLinks.forEach(function(val){
                output += '<li class="county-article-link">' + val + '</li>';
            });
            output += '</ul>';
            e("div.mapsvg-controller-view-content").html(output);
        } }
        setTimeout( updateText, 300 );
    })
});
