<style>
    /* Container Styles */
    .container {
        width: 100%;  
        padding: 15px; /* Reduced from 20px */
        background: rgb(15,17,26);
        min-height: 100vh;
    }

    /* Table Styles */
    .table {
        width: 100%;
        border-collapse: collapse;
        background: rgb(20,24,36);
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    .table th {
        padding: 8px; /* Reduced from 12px */
        text-align: center;
        font-weight: 600;
        color: rgb(159,166,188);
        border-bottom: 2px solid rgba(255, 255, 255, 0.1);  
        background: rgb(25, 29, 41);
        font-size: 0.5rem; /* Reduced from 0.55rem */
    }

    .table td {
        padding: 6px 8px; /* Reduced from 10px 12px */
        vertical-align: middle;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);  
        color: rgb(185, 193, 218);
        font-size: 0.6rem; /* Reduced from 0.7rem */
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
        width: 50px; /* Reduced from 80px */
        height: 50px; /* Reduced from 80px */
        object-fit: cover;
        border-radius: 4px;
    }

    /* Badge Styles */
    .badge {
        padding: 3px 6px; /* Reduced from 4px 8px */
        border-radius: 10px; /* Slightly reduced from 12px */
        font-size: 0.65rem; /* Reduced from 0.8rem */
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
        padding: 3px 12px; /* Reduced from 5px 20px */
        border-radius: 3px; /* Reduced from 4px */
        background: transparent;
        border: 1px solid #4dabf7;
        color: #4dabf7;
        text-decoration: none;
        font-size: 0.6rem; /* Reduced from 0.7rem */
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
        padding: 3px 12px; /* Reduced from 5px 20px */
        border-radius: 3px; /* Reduced from 4px */
        background: transparent;
        border: 1px solid #ff6b6b;
        color: #ff6b6b;
        text-decoration: none;
        font-size: 0.6rem; /* Reduced from 0.7rem */
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
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Enable</th>
                        <th>Action</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($logos as $logo)
                        <tr>
                            <td>
                                <img src="{{ asset('storage/' . $logo->logo_image) }}" alt="Logo">
                            </td>
                            <td>
                                <span class="badge {{ $logo->logo_is_enable ? 'bg-success' : 'bg-danger' }}">
                                    {{ $logo->logo_is_enable ? 'Enabled' : 'Disabled' }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('logo.edit', $logo->id) }}" class="btn-primary">Edit</a>
                            </td>
                            <td>
                                <form action="{{ route('logo.destroy', $logo->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </x-nav>
</x-layout>