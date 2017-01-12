jQuery(document).ready(function($) {
    // show info Addon

    $('.show-modal-addon').click(function(event) {
        /* Act on the event */
        var data = JSON.parse(atob($(this).parents('.data-id').attr('data-addon')));
        var data_media = JSON.parse(atob($(this).parents('.data-id').attr('data-media')));
        console.log('addon');
        console.log(data);
        console.log('addon_medai');
        console.log(data_media);
        $('#myModalLabel').text(data.name);
        $('#feature').text(data.feature);
        $('#price').text(data.price+'$');
        $('#price').attr('data-id', data.id);
        $('#price').attr('value', data.price);
        $('#image').attr('src', '/'+data_media[0].disk+'/'+data_media[0].id+'/'+data_media[0].file_name);
        $('.modal-footer').attr('data-id', data.id);

        //check Order
        $.ajax({
            url: '/check-order',
            type: 'GET',
            data:{addon:data.id}
        })
        .done(function(data) {
             console.log(data);
            if (data == 1) {
                $('#buy-now').remove();
                $('.modal-footer').html('<div id="download">Download</div>');
                $('#paypal-button').hide();
            }else if(data==0){
                $('#buy-now').remove();
                $('#download').remove();
                $('#paypal-button').show();
            }
        })
        .fail(function() {
                $('#paypal-button').hide();
                $('#download').remove();
                console.log("error");
        })
        .always(function() {
            console.log("complete");
        });
    });

    //check login
    $('#buy-now').click(function(event) {
        var  addon_id = $(this).parents('.modal-footer').attr('data-id');
        console.log('id-addon'+addon_id);
        $.ajax({
            url: '/buy-now',
            type: 'GET',
            data:{addon:addon_id}
        })
        .done(function(data) {
            // console.log(data);
            if (data == 0) {
                window.location = "/login";
            }else{
                $('#buy-now').remove();
                $('#paypal-button').show();
            }
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
            console.log("complete");
        });
    });


    //// check login show buttpn Paypal
    //$('.show-modal-addon').click(function(event) {
    //    $.ajax({
    //        url: '/buy-now',
    //        type: 'GET',
    //    })
    //    .done(function(data) {
    //        // console.log(data);
    //        if (data == 1) {
    //            $('#buy-now').hide();
    //            $('#download').hide();
    //            $('#paypal-button').show();
    //        }
    //    })
    //    .fail(function() {
    //        console.log("error");
    //    })
    //    .always(function() {
    //        console.log("complete");
    //    });
    //});

    //$('.show-modal-addon').click(function(event) {
    //    var addon_id = $(this).parents('.data-id').attr('data-id');
    //    $.ajax({
    //        url: '/check-order/'+addon_id,
    //        type: 'GET',
    //    })
    //        .done(function(data) {
    //            // console.log(data);
    //            if (data == 1) {
    //                $('#buy-now').hide();
    //                $('#paypal-button').hide();
    //                $('#download').show();
    //            }
    //        })
    //        .fail(function() {
    //            console.log("error");
    //        })
    //        .always(function() {
    //            console.log("complete");
    //        });
    //});







    
});