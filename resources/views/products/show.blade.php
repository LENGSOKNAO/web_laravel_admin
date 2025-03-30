 
    <h1>{{ $product->name }}</h1>
    
    <p>Brand: {{ $product->brand }}</p>
    <p>Description: {{ $product->description }}</p>
    <p>Regular Price: ${{ $product->regular_price }}</p>
    <p>Sale Price: ${{ $product->sale_price ?? 'N/A' }}</p>
    <p>Categories: {{ implode(', ', $product->category) }}</p>
    <p>Sizes: {{ implode(', ', $product->size ?? []) }}</p>
    <p>Quantity: {{ $product->quantity }}</p>
    <p>Enabled: {{ $product->enable ? 'Yes' : 'No' }}</p>
    <p>Coming Soon: {{ $product->soon ? 'Yes' : 'No' }}</p>
    
    @if($product->image)
        <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" style="max-width: 300px;">
    @endif

    @if($product->list_image)
        @foreach($product->list_image as $image)
            <img src="{{ Storage::url($image) }}" alt="{{ $product->name }}" style="max-width: 200px;">
        @endforeach
    @endif
    
    <a href="{{ route('products.index') }}" class="btn btn-secondary">Back to Products</a>
 <style>
    html {
         
    }
 </style>