<style>
    /* Container Styles */
    .container {
        width: 100%;  
        padding: 15px;
        background: rgb(15,17,26);
        min-height: 100vh;
    }

    h2 {
        color: #ffffff;
        font-size: 1.2rem;
        margin-bottom: 15px;
    }

    /* Success Message */
    .success-message {
        color: #28a745;
        font-size: 0.7rem;
        margin-bottom: 15px;
    }

    /* Table Styles */
    .table {
        width: 100%;
        border-collapse: collapse;
        background: rgb(20,24,36);
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    .table th {
        padding: 8px;
        text-align: center;
        font-weight: 600;
        color: rgb(159,166,188);
        border-bottom: 2px solid rgba(255, 255, 255, 0.1);  
        background: rgb(25, 29, 41);
        font-size: 0.5rem;
    }

    .table td {
        padding: 6px 8px;
        vertical-align: middle;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);  
        color: rgb(185, 193, 218);
        font-size: 0.6rem;
        text-align: center;
    }

    .table-striped tbody tr:nth-child(odd) {
        background: rgb(25, 29, 41);
    }

    .table tr:hover {
        background: rgb(30, 34, 46);
    }

    /* Image Styles */
    .table img {
        width: 50px;
        object-fit: cover;
        border-radius: 4px;
    }

    /* Badge Styles */
    .badge {
        padding: 3px 6px;
        border-radius: 10px;
        font-size: 0.65rem;
        color: white;
    }

    .bg-success { 
        background: #28a745; 
    }

    .bg-danger { 
        background: #ff6b6b; 
    }

    /* Button Styles */
    .btn-primary {
        padding: 3px 12px;
        border-radius: 3px;
        background: transparent;
        border: 1px solid #4dabf7;
        color: #4dabf7;
        text-decoration: none;
        font-size: 0.6rem;
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
        padding: 3px 12px;
        border-radius: 3px;
        background: transparent;
        border: 1px solid #ff6b6b;
        color: #ff6b6b;
        text-decoration: none;
        font-size: 0.6rem;
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

    /* Form Styles */
    .table form {
        margin: 0;
        display: inline-block;
    }
</style>

<x-layout>
    <x-nav>
        <div class="container">
            <h2>All Sliders</h2>

            @if(session('success'))
                <p class="success-message">{{ session('success') }}</p>
            @endif
        
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>SLIDER IMAGE</th>
                        <th>SLIDER SMALL IMAGE</th>
                        <th>SLIDER NAME</th>
                        <th>SLIDER BRAND</th>
                        <th>SLIDER DESCRIPTION</th>
                        <th>SLIDER STATUS</th>
                        <th>ACTIONS</th>
                        <th>ACTIONS</th>  
                    </tr>
                </thead>
                <tbody>
                    @foreach($slider as $slider)
                    <tr>
                        <td>
                            @if($slider->slide_image)
                                <img src="{{ asset('storage/' . $slider->slide_image) }}" alt="Slide Image">
                            @endif
                        </td>
                        <td>
                            @if($slider->slide_small_image)
                                <img src="{{ asset('storage/' . $slider->slide_small_image) }}" alt="Small Image">
                            @endif
                        </td>
                        <td>{{ $slider->slide_name }}</td>
                        <td>{{ $slider->slide_brand }}</td>
                        <td>{{ $slider->slide_description }}</td>
                        <td>
                            <span class="badge {{ $slider->slide_is_enable ? 'bg-success' : 'bg-danger' }}">
                                {{ $slider->slide_is_enable ? 'Enabled' : 'Disabled' }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('slider.edit', $slider->id) }}" class="btn-primary">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('slider.destroy', $slider->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </x-nav>
</x-layout>