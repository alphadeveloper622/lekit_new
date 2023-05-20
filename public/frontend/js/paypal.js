
window.paypal_sdk.Buttons({
    onApprove: async (data, actions) => {
        const order = await actions.order.capture();

        let method = 'POST';
        alert(window.package_id);
        if (window.package_id)
        {
            // method = 'GET';
            window.url = $('.payment_success_url').val();
        }
        else if (window.user && !window.package_id)
        {
            window.url = window.base_url + '/api/complete-order?code=' + window.code + '&trx_id=' + window.trx_id;
        }
        else
        {
            window.url = window.base_url + '/api/complete-order?code=' + window.code + '&guest=1' + '&trx_id=' + window.trx_id;
        }

        data.amount         = amount;
        data.payment_type   = 'paypal';
        data.order          = order;
        data.token          = window.token;

        $.ajax({
            method  : method,
            url     : window.url,
            data    : data,
            success : function (response){
                if (response.error)
                {
                    toastr.error(response.error);
                }
                else if(response.package_id)
                {
                    window.location.href = response.url;
                }
                else{
                    toastr.success(response.success);
                    window.location.href = $('.payment_success_url').val();

                }
            }
        });
    },

    createOrder: (data, actions) => {
        return actions.order.create({
            purchase_units: [
                {
                    amount: {
                        value: parseFloat(window.amount).toFixed(2),
                        currency_code: "USD",
                    }
                }
            ]
        });
    },
    onError: err => {
        alert('Error');
    }
}).render('#paypal-button-container');
