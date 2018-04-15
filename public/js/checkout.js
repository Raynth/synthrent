var stripe = Stripe('pk_test_ucZ1GxzlSijZBsoI9d2J4wqA');

stripe.createToken('bank_account', {
    country: 'US',
    currency: 'usd',
    routing_number: '110000000',
    account_number: '000123456789',
    account_holder_name: 'Jenny Rosen',
    account_holder_type: 'individual',
}).then(function (result) {
    // Handle result.error or result.token
});