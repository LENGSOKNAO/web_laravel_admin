<style>
    /* Container Styles */
    .container {
        width: 100%;  
        padding: 20px;
        background: rgb(15,17,26);
        min-height: 100vh;
    }

    h1 {
        color: #ffffff; /* Changed for dark theme visibility */
        margin-bottom: 20px;
        font-size: 1.8rem;
    }

    /* Table Styles */
    .table {
        width: 100%;
        border-collapse: collapse;
        background: rgb(20,24,36);
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
      
    }

    .table th {
        padding: 12px;
        text-align: center;
        font-weight: 600;
        color:  rgb(159,166,188);
        border-bottom: 2px solid rgba(255, 255, 255, 0.1);  
        background: rgb(25, 29, 41);
        font-size:  .55rem
    }

    .table td {
        padding: 10px 12px;
        vertical-align: middle;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);  
        color:  rgb(185, 193, 218);
        font-size: 0.7rem;
        text-align: center
    }

    .table-striped tbody tr:nth-child(odd) {
        background: rgb(25, 29, 41); /* Added striping effect */
    }

    .table tr:hover {
        background: rgb(30, 34, 46); /* Hover effect for dark theme */
    }

    /* Badge Styles */
    .badge {
        padding: 4px 8px;
        border-radius: 12px;
        font-size: 0.8rem;
        color: white;
    }

    .bg-success { background: #28a745; }
    .bg-warning { background: #ffc107; }
    .bg-secondary { background: #6c757d; }

    /* Image Styles */
    .table img {
        object-fit: cover;
        border-radius: 4px;
    }

    /* Link Styles */
    .table a {
        color: #4dabf7;
        text-decoration: none;
    }

    .table a:hover {
        text-decoration: underline;
    }
    .actions-cell {
        display: flex;
        gap: 8px;
        align-items: center;
    }

    .btn-primary {
    padding: 5px 20px;  
    border-radius: 4px;
    background: transparent;
    border: 1px solid #4dabf7;
    color: #4dabf7;
    text-decoration: none;
    font-size: 0.7rem;
    font-weight: 500;
    display: inline-block;
    transition: all 0.2s ease;
    }

    .btn-primary:hover {
        background: rgba(77, 171, 247, 0.1);
        color: #ffffff;
        border-color: #ffffff;
        transform: translateY(-1px);
    }

    .btn-primary:active {
        transform: translateY(0);
        background: rgba(77, 171, 247, 0.2);
    }

    .btn-danger {
    padding: 8px 20px;
    border-radius: 4px;
    background: transparent;
    border: 1px solid #ff6b6b;
    color: #ff6b6b;
    text-decoration: none;
    font-size: 0.7rem;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.2s ease;
    }

    .btn-danger:hover {
        background: rgba(255, 107, 107, 0.1);
        color: #ffffff;
        border-color: #ffffff;
        transform: translateY(-1px);
    }

    .btn-danger:active {
        transform: translateY(0);
        background: rgba(255, 107, 107, 0.2);
    }
</style>

<x-layout>
    <x-nav>

        <div class="container">
            <h1>Products List</h1>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>PRODUCT IMAGE</th>
                        <th>PRODUCT SIZE IMAGE</th>
                        <th>PRODUCT NAME</th>
                        <th>PRODUCT CATEGORIES</th>
                        <th>PRODUCT BRAND</th>
                        <th>PRODUCT SIZES</th>    
                        <th>PRODUCT PRICE</th>
                        <th>PRODUCT QUANTITY</th>
                        <th>PRODUCT COLOR</th>
                        <th>PRODUCT LINK</th>
                        <th>PRODUCT STATUS</th>
                        <th>PRODUCT COMING SOON</th>
                        <th>ACTIONS</th>
                        <th>ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>
                                <img src="{{ Storage::url($product->product_image) }}" 
                                     alt="{{ $product->product_name }}" 
                                     style="max-width: 50px; max-height: 50px;">
                            </td>
                            <td>
                                @if (is_array($product->product_list_image) && !empty($product->product_list_image))
                                    <img src="{{ Storage::url($product->product_list_image[0]) }}" 
                                         alt="{{ $product->product_name }} list image" 
                                         style="max-width: 50px; max-height: 50px;">
                                    @php
                                        $remainingImages = count($product->product_list_image) - 1;
                                    @endphp
                                    @if ($remainingImages > 0)
                                        +{{ $remainingImages }}  
                                    @endif
                                @elseif (is_string($product->product_list_image) && !empty($product->product_list_image))
                                    <img src="{{ Storage::url($product->product_list_image) }}" 
                                         alt="{{ $product->product_name }} list image" 
                                         style="max-width: 50px; max-height: 50px;">
                                @else
                                    N/A
                                @endif
                            </td>
                            <td>{{ $product->product_name }}</td>
                            <td>
                                @if (is_array($product->product_category))
                                    {{ implode(', ', $product->product_category) }}
                                @elseif (is_string($product->product_category))
                                    {{ $product->product_category }}
                                @else
                                    N/A
                                @endif
                            </td>
                            <td>{{ $product->product_brand }}</td>
                            <td>
                                @if (is_array($product->product_sizes))
                                    {{ implode(', ', $product->product_sizes) }}
                                @elseif (is_string($product->product_sizes))
                                    {{ $product->product_sizes }}
                                @else
                                    N/A
                                @endif
                            </td> 
                            <td>${{ number_format($product->product_price, 2) }}</td>
                            <td>{{ $product->product_qty }}</td>
                            <td>{{ $product->product_color ?? 'N/A' }}</td>
                            <td>
                                @if ($product->product_link)
                                    <a href="{{ $product->product_link }}" target="_blank">Link</a>
                                @else
                                    N/A
                                @endif
                            </td>
                            <td>
                                <span class="badge {{ $product->product_is_enable ? 'bg-success' : 'bg-secondary' }}">
                                    {{ $product->product_is_enable ? 'Enabled' : 'Disabled' }}
                                </span>
                            </td>
                            <td>
                                <span class="badge {{ $product->product_comming_soon ? 'bg-warning' : 'bg-secondary' }}">
                                    {{ $product->product_comming_soon ? 'Enabled' : 'Disabled' }}
                                </span>
                            </td>        
                            <td>
                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">Edit</a>
                            </td>
                            <td>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline;" 
                                    onsubmit="return confirm('Are you sure you want to delete this product?');">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-danger">Delete</button>
                              </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </x-nav>
</x-layout>

 