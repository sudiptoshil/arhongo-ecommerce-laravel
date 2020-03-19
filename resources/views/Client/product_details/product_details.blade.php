@extends('Client.client_master')
@section('client-home')
  <!-- Page Content -->
  <div class="container">

    <div class="row ml-auto">

      {{-- <div class="col-lg-3">
        <h1 class="my-4">Shop Name</h1>
        <div class="list-group">
          <a href="#" class="list-group-item active">Category 1</a>
          <a href="#" class="list-group-item">Category 2</a>
          <a href="#" class="list-group-item">Category 3</a>
        </div>
      </div>
      <!-- /.col-lg-3 --> --}}

      <div class="col-lg-12">

        <div class="card mt-4">
        <img class="card-img-top img-fluid" src="{{asset($product->img)}}" alt="" width="10%">
          <div class="card-body">
          <h3 class="card-title">{{$product->product_name}}</h3>
          <h4><u style="color:red">{{$product->currency }} {{$product->display_price}}</u></h4>
          <p class="card-text">{{$product->product_description}}!</p>
            <span class="text-warning"></span>
          </div>
        </div>
        <!-- /.card -->

        <div class="card card-outline-secondary my-4">
          {{-- <div class="card-header">
            Product Reviews
          </div>
          <div class="card-body">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
            <small class="text-muted">Posted by Anonymous on 3/1/17</small>
            <hr>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
            <small class="text-muted">Posted by Anonymous on 3/1/17</small>
            <hr>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
            <small class="text-muted">Posted by Anonymous on 3/1/17</small>
            <hr>
            <a href="#" class="btn btn-success">Leave a Review</a>
          </div> --}}
        </div>
        <!-- /.card -->
     <h2 align="center" style="color:red"><u> Related Item</u></h2>
       {{--  --}}
       <div class="row">
         <div class="col-md-4">
          @foreach($relateditem as $v_item)
         <h1>{{$v_item->product_name}}</h1>
         <img src="{{asset($v_item->img)}}"> 
         @endforeach
         </div>
       </div>
       {{--  --}}
     
      <!-- /.col-lg-9 -->

    </div>

  </div>
  <!-- /.container -->
  {{-- <script>
    $('.owl-carousel').owlCarousel({
      loop:true,
      margin:10,
      nav:true,
      responsive:{
          0:{
              items:1
          },
          600:{
              items:3
          },
          1000:{
              items:5
          }
      }
  })
  </script> --}}
@endsection