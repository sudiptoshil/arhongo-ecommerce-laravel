@extends('Admin.admin_master');
@section('admin-home')
<!--header-->

<!--/header-->

<body id="page-top">

<!--TopNav-->

<!--TopNav-->  

  {{-- <div id="wrapper"> --}}

    <!-- Sidebar -->
   
    <!--/Sidebar-->

    {{-- {{-- <div id="content-wrapper"> --}}

      <div class="container-fluid"> 


      
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Admin</li>
          <li class="breadcrumb-item active">Sub-categories</li>
        </ol>
        <!-- /Breadcrumbs-->
     
    

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header bg-white">
            <a href="{{route('add-sub-category')}}" 
               class="btn btn-sm btn-outline-success">Add new
            </a>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" style="border-style: dashed" id="dataTable" width="100%" cellspacing="0">
                <thead class="">
                  <tr>
                    <th style="width: 20px;">No.</th>
                    <th style="width: 30px;">Name</th>
                    <th style="width: 30px;">Category name</th>
                    <th style="width: 300px;">Image</th>
                    <th style="width: 20px;">Action</th>
                  </tr>
                </thead>
                <tbody>
               @foreach($subcategory as $v_subcategory)
                  <tr>
                    <td></td>
                  <td>{{$v_subcategory->sub_category_name}}</td>
                  <td>{{$v_subcategory->category->category_name}}</td>

                  <td> <img src ="{{asset($v_subcategory->sub_category_image)}}" width="30%" /></td>
                    <td>
                        <a 
                            href="" 
                            class="btn btn-sm btn-info border-0" style="border-radius: 12px;">
                            Details
                        </a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
          
        </div>



        
      </div>


      {{-- </div> --}}
      <!-- /.container-fluid -->

     


  <!-- Bootstrap core JavaScript-->
 


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
  

  </script>



@endsection