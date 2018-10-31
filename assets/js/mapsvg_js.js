var mapsvg_customizer = jQuery( document ).ready( function ( e ) {
	e("path").on("click", function( i ) {
        var targetTax = i.target.id.toString().toLowerCase().replace(/[^a-z\s]+/g, '').replace(/\s+/g, '-');
        targetTax = targetTax + '-county';
        console.log(targetTax);

        var reqBaseUrl = '/wp-content/plugins/mapsvg-customizer/includes/class-mapsvg-customizer-data.php';
        var reqUrl = reqBaseUrl + '?t=' + targetTax;
        console.log(reqUrl);

        var request = e.ajax({
            url:            reqUrl,
            crossDomain:    false,
            dataType:       JSON,
        }).done(function(){
            alert("Success!");
        });
        console.log(request);
    })
});