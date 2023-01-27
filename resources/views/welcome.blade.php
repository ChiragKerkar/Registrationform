<style>
    /* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
 /* width: 50%;  Full width */
  /*height: 50%;  Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 15% auto; /* 15% from the top and centered */
  padding: 20px;
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button */
.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}

.footer-copyright {
  background: rgb(65, 119, 244);
}
    </style>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Registration Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">

    <style type="text/css">
        /* Custom page CSS
        -------------------------------------------------- */
        /* Not required for template or sticky footer method. */

        main > .container {
          padding: 60px 15px 0;
        }
    </style>
</head>

<body class="d-flex flex-column h-100">
<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>

    <div class="container">
        <h2>Registration Details</h2>
        <div class="card w-50" style="width:100px">
          <img class="card-img-top" src="{{url('/images/no-image-icon.png')}}" alt="Card image" style="width:100%" id="my_image">
          <div class="card-body">
            <h4 class="card-title regid"></h4>
            <h4 class="card-text usename"></h4>
            <h4 class="card-text useemail"></h4>
            {{-- <a href="#" class="btn btn-primary">See Profile</a> --}}
          </div>
        </div>
    </div>
  </div>

</div>

    <!-- Begin page content -->
<main class="flex-shrink-0">
    <div class="container">
        <h1 class="mt-5">Laravel Project to save form</h1>
        <div class="alert alert-danger" id="nmessage" role="alert"></div>
        <div class="alert alert-success" id="successmessage" role="alert"></div>
        <form data-action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data" id="add-user-form">

            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Registration ID <span class="required" style="color:red;">*</span></label>
                <input type="text" class="form-control" id="registrationid" placeholder="Registration ID" name="registrationid">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Username <span class="required" style="color:red;">*</label>
                <input type="email" class="form-control" id="email" placeholder="Email" name="email">
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">First Name <span class="required" style="color:red;">*</label>
                <input type="text" class="form-control" id="firstname" placeholder="First Name" name="firstname">
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Last Name <span class="required" style="color:red;">*</label>
                <input type="text" class="form-control" id="lastname" placeholder="Last Name" name="lastname">
            </div>

            <div class="mb-3">
                <label class="form-label" for="customFile">Upload Photo <span class="required" style="color:red;">*</label>
                <input type="file" class="form-control" id="imgform" name="image"/>
            </div>

            <button type="submit" id="myBtn" class="btn btn-primary">Save</button>

        </form>

    </div>
</main>


<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
<script src="{{ asset('js/ajax-post.js') }}" defer></script>

</body>

<!-- Footer -->
<footer class="page-footer font-small blue">

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2022 Copyright:Developed By Chirag Kerkar
    </div>
    <!-- Copyright -->

</footer>
  <!-- Footer -->
</html>