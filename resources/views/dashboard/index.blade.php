<x-authenticated-layout>

    @php
        $user = auth()->user();
    @endphp

    <div class="card" style="width: 18rem;">
        <img src="{{ $user->latestFoto ? asset('storage/'.$user->latestFoto->foto) : asset('user-fotos/default-user-foto.png')}}" class="img-thumbnail mt-2 ms-2 rounded-circle card-image-top s-image-preview" id="imagePreview">
        <div class="card-body">
            <h5 class="card-title">{{$user->nama_user}}</h5>
            <p class="card-text"><i class="fa fa-envelope"></i> {{$user->email}}</p>
            <p class="card-text"><i class="fa fa-phone"></i> {{$user->no_hp}}</p>
            <p class="card-text"><i class="fa fa-whatsapp"></i> {{$user->wa}}</p>
            <p class="card-text"><i class="fa fa-id-card"></i> {{$user->id_jenis_user}}</p>
        </div>
    </div>
</x-authenticated-layout>
