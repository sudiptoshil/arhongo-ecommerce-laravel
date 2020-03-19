@extends('Vendor.vendor_master')
@section('vendor-home')
    <div id="content-wrapper">
      <div class="container-fluid">
        <!-- Icon Cards-->
        <div class="row">
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-comments"></i>
                </div>
                <div class="mr-5">26 New Messages!</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-list"></i>
                </div>
                <div class="mr-5">11 New Tasks!</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-shopping-cart"></i>
                </div>
                <div class="mr-5">123 New Orders!</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-danger o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-life-ring"></i>
                </div>
                <div class="mr-5">13 New Tickets!</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
        </div>
        <!-- /Icon Cards-->
        <!-- DataTables Example -->
        <div class="card mb-12">
          <div class="card-header bg-white">
            <i class="fas fa-table"></i>
            All Orders</div>
            <h2 style="color: red" align="center"></h2>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" style="border-style: dashed" id="dataTable" width="100%" cellspacing="0">
                <thead class="">
                  <tr>
                    <th style="width: 20px;">No.</th>
                    <th style="width: 300px;">Name</th>
                    <th style="width: 25px;">product name</th>
                    <th style="width: 20px;">Quantity</th>
                    <th style="width: 20px;">Price</th>
                    <th style="width: 20px;">payment method</th>
                    <th style="width: 20px;">date</th>
                    <th style="width: 20px;">delivery location</th>
                    <th style="width: 20px;">status</th>
                    <th style="width: 20px;">Action</th>
                  </tr>
                </thead>
                @php($i = 1)
                @foreach ($orders as $v_order)
                <tbody>
                  <tr>
                  <td>{{$i++}}</td>
                  <td>{{$v_order->full_name}}</td>
                    <td>{{$v_order->product_name}}</td>
                    <td>{{$v_order->product_quantity}}</td>
                    <td>{{$v_order->product_unite_price}}</td>
                    @if($v_order->payment_method == 1)
                    <td>cash on delivery</td>
                    @else
                    <td>bkash</td>
                    @endif
                    <td>{{$v_order->created_at}}</td>
                    <td>{{$v_order->delivery_location}}</td>
                    @if($v_order->status == 2)
                    <td>accepted</td>
                    @else
                    <td>pending</td>
                    @endif
                    <td>
                        <a 
                            href="" 
                            class="btn btn-sm btn-info border-0" style="border-radius: 12px; margin-bottom:10px;  ">
                            Details
                        </a>
                        <a 
                            href="" 
                            class="btn btn-sm btn-info border-0" style="border-radius: 12px; margin-bottom:10px; ">
                            accept
                        </a>
                        <a 
                            href="" 
                            class="btn btn-sm btn-info border-0" style="border-radius: 12px;">
                            cancel
                        </a>
                    </td>
                  </tr>
                 
                </tbody>
                @endforeach
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted"></div>
        </div>



        



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


  <!-- Product Detail Modal -->
  <!-- Modal -->
        <div class="modal fade" id="productDetailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Product Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="product-detail">

            <h2 id="product-name"></h2>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
        </div>
  <!-- / Product Detail Modal -->


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