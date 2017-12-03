$(document).ready(function () {

	if (document.title == 'BeerBuddy') {
		getIndexDealsFeed();
	} else {
		getRecentDealsFeed();	
	}

	// refresh the feed every 7.5 seconds	
	/*setInterval(function () {
		switch (window.location.href.split("/").pop()) {
			case "view_recent.php":
				getRecentDealsFeed();
				break;
		}
	}, 12000);*/

});

function getRecentDealsFeed() {
	$.ajax({
		url: '/src/controller/get_recent_deals_feed.php',
		type: 'GET',
		dataType: 'json',
		cache: false
	})
		.done(function (data) {
			var $feed = $('#recentDealsFeed');
			$feed.empty();
			
			$.each(data, function (idx, val) {
				var link = "/src/view_store_deals.php?store=" + encodeURIComponent(val.store_name) + "&address=" + encodeURIComponent(val.address+", " + val.city);
				var html = '\
				<div class="">\
					<table class="table-hover">\
						<tr class="animated fadeInLeft">\
							<td>\
								<h2 id="drink-name">' + val.drink_name + '</h2> <h4>(' + val.alcohol_type + ' - ' + val.size  + ')</h4>\
							</td>\
							<td class="price">\
								<h3>$' + val.price + '</h3>\
							</td>\
						</tr>\
						<tr class="animated fadeInRight">\
							<td>\
								<h5>from&nbsp;&nbsp;</h5><h4><a href="https://www.google.com/maps/place/'+ val.store_name + '%20' + val.address + ',%20' + val.city + '" target="_blank">' + val.store_name + '</h4></a>\
								<h4> (<a href="' + link + '">view more deals here</a>)</h4>\
							</td>\
							<td class="post-tag">\
								<h6><i>posted by: ' + val.username + '</i></h6>\
								<h6><i>post date: ' + parse_date(val.date) + '</i></h6>\
							</td>\
						</tr>\
					</table>\
				</div>\
				<hr class="feedDivider">';
				
				$feed.append(html);
			});
		})
		.fail(function (data) {
            alert("Error retrieving recent deals feed.");
		});
}

function getIndexDealsFeed() {
	$.ajax({
		url: '/src/controller/get_index_deals_feed.php',
		type: 'GET',
		dataType: 'json',
		cache: false
	})
		.done(function (data) {
			var $feed = $('#recentDealsFeed');
			$feed.empty();
			
			$.each(data, function (idx, val) {
				var link = "/src/view_store_deals.php?store=" + encodeURIComponent(val.store_name) + "&address=" + encodeURIComponent(val.address+", " + val.city);
				var html = '\
				<div class="">\
					<table class="table-hover">\
						<tr class="animated fadeInLeft">\
							<td>\
								<h2 id="drink-name">' + val.drink_name + '</h2> <h4>(' + val.alcohol_type + ' - ' + val.size  + ')</h4>\
							</td>\
							<td class="price">\
								<h3>$' + val.price + '</h3>\
							</td>\
						</tr>\
						<tr class="animated fadeInRight">\
							<td>\
								<h5>from&nbsp;&nbsp;</h5><h4><a href="https://www.google.com/maps/place/'+ val.store_name + '%20' + val.address + ',%20' + val.city + '" target="_blank">' + val.store_name + '</h4></a>\
								<h4> (<a href="' + link + '">view more deals here</a>)</h4>\
							</td>\
							<td class="post-tag">\
								<h6><i>posted by: ' + val.username + '</i></h6>\
								<h6><i>post date: ' + parse_date(val.date) + '</i></h6>\
							</td>\
						</tr>\
					</table>\
				</div>\
				<hr class="feedDivider">';
				
				$feed.append(html);
			});
		})
		.fail(function (data) {
            alert("Error retrieving recent deals feed.");
		});
}

function parse_date(datetime) {
	var split = datetime.split(" ");
	var res = split[0].split("-");
	var string = res[1] + "-" + res[2] + "-" + res[0];
	return string;
}