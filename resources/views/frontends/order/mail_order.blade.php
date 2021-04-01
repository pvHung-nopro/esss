<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
.title__{
    color: red;
    font-size: 18px;
    font-family: fangsong;
}
.product_name__{
    color: black;
    font-size: 16px;
    font-family: fangsong;
}
.qty__{
    color: black;
    font-size: 14px;
    font-family: fangsong;
}

</style>
<body>
   <p class="title__">Thank you for your order</p>
    @foreach($product_name as $item)
   <p class="product_name__">product name: {{$item->name}} </p>
   <span class="qty__">amount      : {{$item->qty}} </span>
   </br>

   @endforeach
   <p>total money: ${{floatval($total['total_cart'])}} </p>
</body>
</html>
