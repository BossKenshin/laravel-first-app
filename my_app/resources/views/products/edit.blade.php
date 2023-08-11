<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Edit Product</h1> <button><a href="{{route('product.index')}}">Go Back</a></button>
        <div>
            @if($errors->any())

            <ul>
                @foreach($errors->all() as $error)
                <li>
                    {{$error}}
                </li>
                @endforeach
            </ul>@endif
        </div>
    <form action="{{route('product.update', ['product' => $product])}}" method="post">
        @csrf
        @method('put')
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" placeholder="Name" value="{{$product->name}}">
        </div>
        <div>
            <label for="qty">Qty</label>
            <input type="text" name="qty" placeholder="Qty" value="{{$product->qty}}">
        </div>
        <div>
            <label for="price">Price</label>
            <input type="text" name="price" placeholder="Price" value="{{$product->price}}">
        </div>
        <div>
            <label for="description">Description</label>
            <input type="text" name="description" placeholder="Description" value="{{$product->description}}">
        </div>
        <div>
            <input type="submit" value="Save New Product">
        </div>
    </form>
</body>
</html>