<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hacerca</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    <style>
        .logo-img {
           /* width: 100px; */
           height: 100px;
           object-fit: cover;
        }
        .cover-photo{
            width: 100%;
            object-fit:contain;
        }
        .headings{
            font-family: Poppins, sans-serif;
            font-weight: 700;
            font-style: normal;
        }
        .paragraph{
            font-family: Poppins, sans-serif;
             font-weight: 400;
            font-style: normal;
             margin-right:80px

        }
        .form-div{
            margin-left:80px;
             margin-right:80px;
        }
        @media screen and (max-width: 764px) {
            .form-div{
            margin-left:0px;
             margin-right:0px;
        }
        .paragraph{
             margin-right:0px
          }
        }

    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="logo-img">
            </div>
        </div>
        <div class="row">
           <div class="col-12 width-100">
              <img src="{{ asset('images/cover_photo.PNG') }}" alt="Cover_Photo" class="cover-photo">
            </div>
       </div>
        <div class="form-div row my-4">
            <div class="col-md-8">
                <div class="mb-3">
                    <h2 class="headings">Ice Cream Tasting for Kids and Adults</h2>
                    <p class="paragraph" >Join us for a special event at Sunny Dae’s of Fairfield
                        Ever wanted to taste test ALL the flavors and discover what
                        is truly your favorite? Now you can at this special fun event.
                        Register for the event. Limited to the first 50 registrations</p>
                </div>
                <div>
                    <h2 class="headings">Event Details</h2>
                    <p class="paragraph" >Sunny Dae’s Ice Cream | 2505 Black Rock Tpke, Fairfield, CT 06825 <br/><br/>
                        August 28th, 2024 | 12pm <br/><br/>
                        Registration required
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <h2 class="headings">Register Here</h2>
                @if ($errors->any())
                   <div class="alert alert-danger alert-dismissible fade show" role="alert">
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
                <form action="{{ route('registeruser') }}" method="POST">
                @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label" >Name</label>
                         <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Enter name..." >
                        <label for="email" class="form-label" >Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Enter email..." >
                        <label for="phone" class="form-label" >Phone No</label>
                        <input type="tel" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" placeholder="Enter phone..." >
                        <label for="zip" class="form-label" >Zip Code</label>
                        <input type="number" class="form-control" id="zip" name="zip" value="{{ old('zip') }}" placeholder="Enter zip code" >
                    </div>
                    <button type="submit" class="btn btn-primary">Register</button>
                </form>
            </div>
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
