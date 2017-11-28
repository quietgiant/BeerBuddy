$(document).ready(function () {

	getRecentDealsFeed();

	// refresh the feed every 7.5 seconds	
	setInterval(function () {
		switch (window.location.href.split("/").pop()) {
			case "view_deals.php":
				getRecentDealsFeed();
				break;
		}
	}, 12000);

});

function getRecentDealsFeed() {

	$.ajax({
		url: '/src/controller/get_Deals.php',
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
				<table border="0">\
					<tr>\
						<td>\
							<h4>' + val.drink_name + ' (' + val.alcohol_type + '): $' + val.price + ' </h4>\
						</td>\
						<td></td>\
					</tr>\
					<tr>\
						<td>\
							<h6>from</h6> <a href="#"><h4>' + val.store_name + '</h4></a>\
							<a href="https://www.google.com/maps/place/'+ val.address + '" target="_blank">&nbsp;(view directions)</a>\
						</td>\
						<td align="right">\
							<h6><i>Posted by: ' + val.username + '</i></h6>\
							<h6><i>post date: ' + val.date + '</i></h6>\
						</td>\
					</tr>\
				</table>\
				<hr>';

				$feed.append(html);
			});
		})
		.fail(function (data) {
            alert("Error retrieving recent deals feed.");
		});
}