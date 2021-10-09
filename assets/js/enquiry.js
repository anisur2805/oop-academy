(function ($) {
	$("#oop-academy-wrapper form").on("submit", function (e) {
		e.preventDefault();

		var data = $(this).serialize();
		$.post(oopAcademy.ajaxUrl, data, function (response) {
            if ( response.success ) {
                console.log( response.success )
            } else {
                alert( response.data.message )
            }
        }).fail(function ( error ) {
			alert(oopAcademy.error);
		});
        
	});
    
})(jQuery);
