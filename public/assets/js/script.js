$('.berita').on('click', function (e) {
	e.preventDefault();
		const view = $(this).data('id');
		const href = $(this).attr('href');
		 url = 'http://localhost/stream.id/getnews/' + view;
	
    $.ajax({
    	url: url,
    	type: 'GET',
        dataType: 'json',
        success: function (result) {
			document.location.href = href;
		
        }
    });
    console.log(url);
       console.log(href);
       console.log(view);

	});
