$(document).ready(function () {

// add selectize to select element
	$('.js-selectize').selectize({
	sortField: 'text',
	maxItems: 2
	});

	$(".delete").on("submit", function(){
        return confirm("Apakah anda yakin?");
    });

});

