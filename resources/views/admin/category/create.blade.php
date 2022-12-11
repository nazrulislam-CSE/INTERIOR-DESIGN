@extends('layouts.app2')
@section('content')
<div class="content-wrapper">
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>
                  Add Category
               </h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                  <li class="breadcrumb-item active">
                     Add Category
                  </li>
               </ol>
            </div>
         </div>
      </div>
      <!-- /.container-fluid -->
   </section>
   <!-- Main content -->
   <section class="content">
      <!-- Default box -->
      <div class="card">
         <div class="card-header">
            <div class="row">
               <div class="col-sm-6">
                  <h3 class="card-title">
                     Add New Category
                  </h3>
               </div>
               <div class="col-sm-6 text-right">
                  <a href="#" class="btn btn-danger">
                  <i class="fas fa-long-arrow-alt-left"></i>
                  Back to List
                  </a>
               </div>
            </div>
          </div>

          <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
            @csrf  
            <div class="row m-4">
              <div class="form-group col-md-12">
                <label for="name">Category Name:</label>
                @error('category_name')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
                <input type="text" name="category_name" id="category_name" class="form-control " value="" >
              </div>

            <div class="card-footer m-2">
               <div class="form-group">
                  <button class="mt-1 btn btn-primary">
                  <i class="fas fa-plus-circle"></i>
                  Submit
                  </button>
               </div>
            </div>
         </form>
      </div>
      <!-- /.card -->
   </section>
   <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
   <strong style="color:#03228f;">&copy; <?php echo date('Y'); ?> All Rights Reserved.</strong>
   <div class="float-right d-none d-sm-inline-block">
       <strong style="color:#0e73e4;" id="by">Developed by <a  href="#">Nazrul Islam</a></strong>
   </div>
</footer>
@endsection