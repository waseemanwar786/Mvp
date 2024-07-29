<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MVP Project</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    <style>
        .logo{
            width: 100px; 
            height:100px; 
            object-fit:cover;
        }
        .heading{
            font-family: Poppins, sans-serif; 
            font-weight: 700; 
            font-style: normal;
        }
        .paragrah{
            width: 380px; 
            font-family: Poppins, sans-serif; 
            font-weight: 400; 
            font-style: normal;
        }
    </style>
</head>
<body>
    <div class="container-fluid d-flex flex-column align-items-center">
        <div class="row">
            <div class="col-12">
                <img src="{{ asset('images/logo.png') }}" alt="Logo"  class="logo">
            </div>
        </div>
        <div class="row ">
           <div class="col-12 width-100 text-center">
           <h1 class="heading" >
                     Hi, We’re creating a new <br/>
                     platform that brings you local <br/>
                     events, deals, and info

           </h1>
            </div>
       </div>
       <div class="row">
           <div class="col-12 width-100 text-center mt-4">
           <p class="paragrah" >
                   Enter your zip code or city below and email address
                   to check out what is happening in your area
           </p>
            </div>
       </div>
        <div class="row">
                @if ($errors->any())
                   <div  class="alert alert-danger alert-dismissible fade show" role="alert">
                       <ul>
                            @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                            @endforeach
                       </ul>
                       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                 </div>
               @endif
              @if (session('success'))
	            <div class="alert alert-success alert-dismissible fade show" role="alert">
		          {{ session('success') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	           </div>
              @endif
                <form action="{{ route('userdetails') }}" method="POST">
                @csrf
                     <div class="my-3 d-flex flex-column align-items-center" style="width: 100%;">
                     <div class="row w-100 d-flex ">
                       <div class="col-md-6 d-flex align-items-center">
                           <label for="zip" class="form-label col-md-3">Zip Code </label>
                           <input type="number" class="form-control" id="zip" name="zip" value="{{ old('zip') }}" placeholder="Enter zip code">
                       </div>
                       <div class="col-md-1">
                           <span>or</span>
                       </div>
                       <div class="col-md-5 d-flex align-items-center">
                           <label for="city" class="form-label col-md-2">City </label>
                           <input type="text" class="form-control" id="city" name="city" value="{{ old('city') }}" placeholder="Enter City...">
                       </div>
                     </div>
                     <div class="d-flex w-100 align-items-center mt-3 px-2">
                             <label for="email" class="form-label col-md-1" >Email </label>
                             <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Enter Email..." >
                     </div>
                     <button type="submit" class="btn btn-primary mt-4">Submit</button>
                      </div>
                </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        @if ($errors->any() || session('success'))
            document.getElementById("name").focus();
        @endif
    </script>
</body>
</html>
