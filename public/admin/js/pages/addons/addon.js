$(document).ready(function() {
    // change Status Addon
	$('.edit-status').on('change', function(event) {
		event.preventDefault();
		/* Act on the event */
        var url = $('option:selected', this).attr('href');
        var status = $('option:selected', this).attr('value');
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'json',
            data: {'status': status},
            success: function (data)
				{
					console.log('ok');
				}
        });
	});
	
});