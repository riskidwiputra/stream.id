$('.berita').on('click', function (e) {
	e.preventDefault();
		const view = $(this).data('id');
		const href = $(this).attr('href');
		 url = 'http://localhost/Git/stream.id/getnews/' + view;
	
    $.ajax({
    	url: url,
    	type: 'GET',
        dataType: 'json',
        success: function (result) {
			document.location.href = href;
		
        }
    });

	});
