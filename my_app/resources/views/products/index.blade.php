<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
  

    
</head>
<body>
    <h1>Product</h1> <button class="btn btn-success" ><a href="{{route('product.create')}}">Create New Product</a></button>
    
    <div id="container-fluid">
        <table class="table">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Qty</th>
                <th>Price</th>
                <th>Description</th>

            </tr>
            @foreach($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->qty}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->description}}</td>
                    <td>
                        <button>
                        <a href="{{route('product.edit', ['product' => $product])}}">Edit</a>
                        </button>
                    </td>
                    <td>
                    <form action="{{route('product.destroy', ['product' => $product])}}" method="post">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Delete">
                    </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</body>
</html>