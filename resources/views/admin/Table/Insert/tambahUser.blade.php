@extends('admin.Table.pelamar')

@section('table')

<div class="flex flex-col items-center justify-center">
    <h1 class="text-2xl font-semibold mb-4">Tambah Data User</h1>
    <div class="w-full max-w-md p-6 bg-white rounded-lg shadow-xl">
     
        <form action="{{ route('tambahUser') }}" method="post" id="tambahUser">
            @csrf

            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
                <input type="text" name="name" class="w-full px-3 py-2 border rounded-md" required>
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
                <input type="email" name="email" class="w-full px-3 py-2 border rounded-md" required>
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password:</label>
                <input type="password" name="password" class="w-full px-3 py-2 border rounded-md" required>
            </div>


            <button type="submit" style="background-color:#ff0080; border-radius: 10px " class="bg-pink-600 text-white px-4 py-2 rounded-md hover:bg-pink-700 focus:outline-none focus:shadow-outline-pink active:bg-pink-800">
                Add User
            </button>
            
        </form>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script>
       
            @if(Session::has('error'))
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: '{{ Session::get('error') }}',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '{{ route('admin.users') }}';
                    }
                });;
            @endif
        
            @if(Session::has('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: '{{ Session::get('success') }}',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '{{ route('admin.users') }}';
                    }
                });
            @endif

        </script>
    </div>
</div>

@endsection
