jQuery(document).ready(function() {
            /* Act on the event */

    paypal.Button.render({

        env: 'sandbox', // Specify 'sandbox' for the test environment

        client: {
            sandbox:    'AVE8tnLxZdPhUhQ9ax-EdWH2jYP_0Gp25pAPGAxJsfji_pFxx6R2qsUeB_N0LDQrm5fo7Ujwl3gKiSnQ',
            production: 'ED5PL1DnRbtKBg-5hSlRTMhC-oU9BBw-yZE_GLBXKaHM5DOCImHQ0mUvFdHQFsHRDuj1hUVOauKD7aTv'
        },

        payment: function() {
            var total = $('#price').attr('value');
            var env    = this.props.env;
            var client = this.props.client;

            return paypal.rest.payment.create(env, client, {
                transactions: [
                    {
                        amount: { total: total, currency: 'USD' }
                    }
                ]
            });
        },

        commit: true, // Optional: show a 'Pay Now' button in the checkout flow

        onAuthorize: function(data, actions) {
            var addon_id = $('#price').attr('data-id');
            var  order_id;
            // Optional: display a confirmation page here
//                    confirm("Are you sure ? to pay ");


            $.ajax({
                url: '/add-order/'+addon_id,
                type: 'GET',
                data: {type: 'add'},
            })
            .done(function(data) {
                order_id = data;
                    console.log(data);
            })
            .fail(function() {
                console.log("error");
            })
            .always(function() {
                console.log("complete");
            });

            if(!confirm("Are you sure ? to pay ")){
                return false;
            }

            return actions.payment.execute().then(function() {
                //success
                alert("pay success");
                $.ajax({
                    url: '/add-order/'+addon_id,
                    type: 'GET',
                    data: {type: 'update', order:order_id},
                })
                .done(function(data) {
                            console.log(data);
                })
                .fail(function() {
                    console.log("error");
                })
                .always(function() {
                    console.log("complete");
                });
            });
        }

    }, '#paypal-button');
});