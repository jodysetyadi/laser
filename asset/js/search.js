$(document).ready(function() {
	
	$("#btn-search").click(function(event) {

		/* Act on the event */
		event.preventDefault();

		$("#searchModal").modal('show');
		$("#keyword").focus();
	});

	$("#btn-submitSearch").click(function(event) {
		/* Act on the event */
		event.preventDefault();

		var keyword = $("#keyword").val();
		const Url = "http://localhost/franzshop/Search"

		$.ajax({
				url: Url,
				type: 'post',
				data: {
					keyword : keyword
				},
				success: function (data) {
					$("#searchResult").modal("show");
					$("#search-result").html(data);
				}
			});
	});



});