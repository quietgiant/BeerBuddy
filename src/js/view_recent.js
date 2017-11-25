$(document).ready(function () {

	getFeed();

	// refresh the feed every 15 seconds	
	setInterval(function () {
		switch (window.location.href.split("/").pop()) {
			case "view_deals.php":
				getFeed();
				break;
		}
	}, 24000);

});

function getFeed() {

	$.ajax({
		url: '/src/controller/get_feed.php',
		type: 'GET',
		dataType: 'json',
		cache: false
	})
		.done(function (data) {
			console.log(data);
			var $feed = $('#recentDealsFeed');
			$feed.empty();
			
			$.each(data, function (idx, val) {

				var html = '\
				<table border="0" style="width: 100%">\
					<tr>\
						<td style="padding-left: 10px">\
							<b>'+val.drink_name+'</b> ('+val.alcohol_type+') -> $'+val.price+' from <b>'+val.address+'</b>\
						</td>\
					</tr>\
					<tr>\
						<td style="padding-left: 10px">\
							post date: '+val.date+'\
						</td>\
					</tr>\
				</table>\
				<hr>';

				$feed.append(html);
			});
		})
		.fail(function (data) {
            alert('error', "Unable to generate feed");
		});
}