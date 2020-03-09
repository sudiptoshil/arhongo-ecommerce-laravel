@extends('Admin.admin_master')
@section('admin-home')
<body id="page-top">
  
    <div id="content-wrapper">

      <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Subcategories</li>
          <li class="breadcrumb-item active">Edit</li>
        </ol>
        <!-- /Breadcrumbs-->
        <!-- Add Form -->

        <div class="col-md-6 offset-md-3">

          <form action="{{route('update-subcategory')}}" method="Post" enctype="multipart/form-data">
          	@csrf

            <div class="">               
              <select required class="form-control form-control-lg" id="pt" name="category_id"
              style="border-radius: 20px;" >
                     @foreach($category as $v_category)
                      <option  value="{{$v_category->id}}">{{$v_category->category_name}}</option>
                  	 @endforeach
              </select>
            </div>

            <br>

            <div class="form-group">
              <!-- <label for="type_name">Type Name</label> -->
              <input id="type_name" name="subcategory_name" class="form-control form-control-lg" type="text" placeholder="" value="{{$subcategory->subcategory_name}}" required
              style="border-radius: 20px;">
              <input type="hidden" name="id" value="{{$subcategory->id}}">
            </div>
            
            <img class="rounded-circle mx-auto d-block" width="50%" id="blah" src="" alt="">
            
            
            <div class="col-md-6">
                        
                <label for="file-upload" class="btn btn-primary btn-lg btn-icon-split" style="cursor: pointer">
                <span class="icon text-white-50">
                        <i class="fas fa-file-upload"></i>
                    </span>
                    <span class="text text-white-50">Upload Image</span>
                </label>
                <input id="file-upload" style="display: none" type="file" name="sub_cat_image"/>
                <img src="{{asset($subcategory->sub_cat_image)}}" width="30%">
                
            </div> 

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

    

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <script>

   function showProductDetail(product){

    // $('#myModal').on('shown.bs.modal', function () {
    // $('#myInput').trigger('focus')
    // })
    // Clearing Previous Data
    //$('#product-detail').html('');
    //console.log(product);
    //$('#productDetailModal').modal('show');

   }   
   
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
  
  

  </script>




@endsection