<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="icon" href="/images/favicon.ico" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
            integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />
        
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <title>SiSi</title>
        
    </head>
    <body class="mb-48">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
          <div class="container">
            <a class="navbar-brand" href="#"><i class="fa fa-h-square"></i></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0"></ul>
              <ul class="navbar-nav ml-auto">
                @if(\Illuminate\Support\Facades\Route::is('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="/register">
                            <i class="fa fa-sign-in"></i> Register
                        </a>
                    </li>
                @endif
                @if(\Illuminate\Support\Facades\Route::is('register'))
                    {{-- Show the "Register" link only on the login page --}}
                    <li class="nav-item">
                        <a class="nav-link" href="/login">
                            <i class="fa fa-sign-in"></i> Login
                        </a>
                    </li>
                @endif

              </ul>
            </div>
          </div>
        </nav>
        
        <main>
            <div class="p-4">
                {{$slot}}        
            </div>
		</main>
        
        <x-notification/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
        <script src="{{ asset('js/app.js') }}" defer></script>

        <script>
        $(document).ready(function() {
            // Function to handle file input change event and update image preview
            const defaultFoto = "{{ asset('user-fotos/default-user-foto.png') }}";
            
            // Event listener for file input change event
            $('#user_foto').change(function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        $('#imagePreview').attr('src', e.target.result);
                    };
                    reader.readAsDataURL(file);
                }else{
                    $('#imagePreview').attr('src', defaultFoto);
                }
            });
        });
    </script>
    </body>
</html>
