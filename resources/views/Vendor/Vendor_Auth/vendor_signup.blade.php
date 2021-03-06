<!--header-->
@include('Vendor.Header.header')
<!--/header-->

<body class="bg-dark" id="">

<div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Vendor Registration</div>
      <div class="card-body">
 
    <form action="{{route('vendor-new-signup')}}" method="post">
      @csrf
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputEmail4">Email</label>
              <input type="email" class="form-control" name="email" id="inputEmail4">
               <input type="hidden" class="form-control" value="0" name="active" id="inputEmail4">
            </div>

             <div class="form-group col-md-6">
              <label for="">username</label>
              <input type="text" class="form-control" name="username" id="">
            </div>


            <div class="form-group col-md-6">
              <label for="inputPassword4">Password</label>
              <input type="password" class="form-control" name="password" id="inputPassword4">
            </div>
             <div class="form-group col-md-2">
              <label >phone</label>
              <input type="text" name="phone" class="form-control" >
            </div>
          </div>
          <div class="form-group">
            <label for="inputAddress">Address</label>
            <input type="text" class="form-control" name="location" id="inputAddress" placeholder="1234 Main St">
          </div>
        
          <div class="form-row">
           
             <div class="form-group col-md-2">
              <label for="">Nid</label>
              <input type="number" class="form-control" name="nid" id="">
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Sign up</button>
        </form>
                <div class="text-center">
                  <a class="d-block small mt-3" href="{{route('vendor-login')}}">Login Page</a>
                  <a class="d-block small" href="">Forgot Password?</a>
                </div>
      </div>
    </div>
</div>

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  @include('Vendor.logoutmodal.logoutmodal')
  <!--/ Logout Modal-->

  <!-- Bootstrap core JavaScript-->
  @include('Vendor.Endgame.endgame')

