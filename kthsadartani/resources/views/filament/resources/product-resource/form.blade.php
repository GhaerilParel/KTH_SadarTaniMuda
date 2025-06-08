<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Form</title>
</head>
<body>
    <form method="POST" action="{{ isset($product) ? route('filament.resources.products.update', $product) : route('filament.resources.products.store') }}">
        @csrf
        @if(isset($product))
            @method('PUT')
        @endif

        <div>
            <label for="name">Product Name</label>
            <input type="text" id="name" name="name" value="{{ old('name', $product->name ?? '') }}" required>
        </div>

        <div>
            <label for="description">Description</label>
            <textarea id="description" name="description" required>{{ old('description', $product->description ?? '') }}</textarea>
        </div>

        <div>
            <label for="price">Price</label>
            <input type="number" id="price" name="price" value="{{ old('price', $product->price ?? '') }}" required>
        </div>

        <div>
            <button type="submit">{{ isset($product) ? 'Update Product' : 'Create Product' }}</button>
        </div>
    </form>
</body>
</html>