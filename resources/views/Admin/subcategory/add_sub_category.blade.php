@extends('Admin.admin_master')
@section('admin-home')
<!--header-->

<!--/header-->

<body id="page-top">
  <div id="wrapper">

    <!-- Sidebar -->
   
    <!--/Sidebar-->

    <div id="content-wrapper">
        
      <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Subcategories</li>
          <li class="breadcrumb-item active">Add New</li>
        </ol>
        <!-- /Breadcrumbs-->
        <h3 style="color:red" align='center'>{{Session::get('message')}}</h3>
        <!-- Add Form -->

        <div class="col-md-6 offset-md-3">

        <form action="{{route('save-subcategory')}}" method="Post" enctype="multipart/form-data">
            @csrf
            <div class="">               
              <select required class="form-control form-control-lg" id="pt" name="category_id"
              style="border-radius: 20px;" >
                 
                  <option value="">Select Category</option>
                  @foreach($category as $v_category)
            <option value="{{$v_category->id}}">{{$v_category->category_name}}</option>
                  @endforeach
              </select>
            </div>

            <br>

            <div class="form-group">
              <!-- <label for="type_name">Type Name</label> -->
              <input id="type_name" name="sub_category_name" class="form-control form-control-lg" type="text" placeholder="Enter Subcategory Name" required
              style="border-radius: 20px;">
            </div>
            
            <small class="text-info">**Please set a proper suitable name for the image file before uploading.</small>
                <div class="form-row">
                    
                    <div class="col-md-6">
                        
                        <label for="file-upload" class="btn btn-primary btn-lg btn-icon-split" style="cursor: pointer">
                        <span class="icon text-white-50">
                                <i class="fas fa-file-upload"></i>
                            </span>
                            <span class="text text-white-50">Upload Image</span>
                        </label>
                        <input required id="file-upload" style="display: none" type="file" name="sub_category_image"/>
                        
                    </div> 


                    <div class="col-md-9">
                        <div class="">
                            <div class="">
                                <img id="blah" src="#" alt="" style="height:300px; border: 2px solid grey" />
                            </div>
                        </div>
                    </div>

                    <div class="form-check">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" value='1' name="publication_status">published
                        </label>
                      </div>
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" value='0' name="publication_status">unpublished
                        </label>
                      </div>
                </div>
            </small>

            <div class="text-center">
              <button type="submit" class="btn btn-primary" style="border-radius: 20px;">
                Submit
              </button>
            </div>
          </form>
        </div>  


        <!-- /Add Form -->


        



      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <!-- Sticky Footer -->

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  
  <!--/ Logout Modal-->


  <!-- Bootstrap core JavaScript-->



  <script>
  $('#blah').hide();


function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        
        reader.onload = function(e) {
        $('#blah').attr('src', e.target.result);
        }
        
        reader.readAsDataURL(input.files[0]);
        }

        $('#blah').show();
    }

    $("#file-upload").change(function() {
    readURL(this);
});        


   function showProductDetail(product){

    // $('#myModal').on('shown.bs.modal', function () {
    // $('#myInput').trigger('focus')
    // })
    // Clearing Previous Data
    //$('#product-detail').html('');
    //console.log(product);
    //$('#productDetailModal').modal('show');

   }   
  

  </script>



@endsection