const BASEURL = $('#base').data('id');
$('.berita').on('click', function (e) {

	e.preventDefault();
	const view = $(this).data('id');
	const href = $(this).attr('href');
	url = BASEURL + '/getnews/' + view;

	$.ajax({
		url: url,
		type: 'GET',
		dataType: 'json',
		success: function (result) {
			document.location.href = href;
		}
	});

});

$(document).ready(function () {
	const BASEURL = $('#comment').data('id');
	const id = $('#display_comment').data('id');

	$("#komentar").click(function () // event ketika <div id="lihat"> di klik
		{
			url = BASEURL + '/komen/' + id;
			$.ajax({
				type: "post",
				url: url,
				data: "urut=" + $(".baris:last").attr('id'),
				success: function (html) {
					if (html) {
						$("#display_comment").append(html); // menambahkan komentar yang di request dari load_komentar.php ke <div id="content">
						//     $("#lihat").html('<a href="#">Tampilkan Komentar</a>');	
					}
					// else 
					// {
					//     $("#lihat").replaceWith('<div id="lihat">Tidak ada komentar lagi</div>');



				}

			});
		});
});