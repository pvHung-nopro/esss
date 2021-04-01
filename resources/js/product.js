$('#checkout').click(function(){
    let name = $('#name').val();
    let email = $('#email').val();
    let phone = $('#phone').val();
    let address = $('#address').val();
    let content = $('#content').val();

    axios({
        method: 'post',
        url: '/order/cart/checkout',
        // headers: {
        //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //   },
        data:

        {

            name: name,
            email: email,
            phone: phone,
            address: address,
            content: content,
        },
        dataType: 'json'
    })
    .then(function (response) {
        if(response.data.status == true)
        {
            alert('order successfully submitted') ;
            window.location.reload();
        }
        if(response.data.status == false ){
            alert('You have not bought any products') ;
        }
        console.log(response);
      })
    .catch(function (error) {
        console.log(error);
    });

})
