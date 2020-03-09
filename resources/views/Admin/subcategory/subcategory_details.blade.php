@extends('Admin.admin_master')
@section('admin-home')
<body id="page-top">
    <div id="content-wrapper">

      <div class="container-fluid">
        <div class="pl-5 pr-5 pt-3">

            <h2 class="text-center"><span class="badge badge-pill badge-info"></span></h2>
            
            <div class="text-center">
                <a href="{{route('edit-sub-category',['id' => $subcategory->id])}}" class="btn btn-sm btn-outline-warning" style="border-radius: 18px;"><i class="fas fa-edit">{{$subcategory->subcategory_name}}</i></a>
            </div>
               
            <hr>
            <br>
             <img class=" mx-auto d-block" width="40%" src="{{asset($subcategory->sub_cat_image)}}" alt="">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <!-- List of Categories -->

                <h5 class="text-center">
                  This category belongs to <strong>  </strong> type
                </h5>  

                </div>


            </div>


        </div>
      </div>
  

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>



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

    

  </script>



@endsection