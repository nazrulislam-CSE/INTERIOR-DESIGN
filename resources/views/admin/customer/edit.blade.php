@extends('layouts.app2')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<div class="content-wrapper">
<section class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1>
               Edit Customer
            </h1>
         </div>
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
               <li class="breadcrumb-item active">
                  Edit Customer
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
                  Edit Customer
               </h3>
            </div>
            <div class="col-sm-6 text-right">
               <a href="{{ route('customer.index') }}" class="btn btn-danger">
               <i class="fas fa-long-arrow-alt-left"></i>
               Back to List
               </a>
            </div>
         </div>
      </div>
      <form action="{{ route('customer.update',$customers->id) }}" method="post" enctype="multipart/form-data">
         @csrf 

         @method('PUT') 
         <div class="row m-4">

            <div class="form-group col-md-6">
               <label for="name">Name:</label>
               @error('name')
               <span class="text-danger">{{ $message }}</span>
               @enderror
               <input type="text" name="name" id="name" class="form-control " value="{{ $customers->name }}" >
            </div>
            <div class="form-group col-md-6">
               <label for="company_name">Company Name:</label>
               @error('company_name')
               <span class="text-danger">{{ $message }}</span>
               @enderror
               <input type="text" name="company_name" id="company_name"  class="form-control " value="{{ $customers->company_name }}" >
            </div>
            <div class="form-group col-md-6">
               <label for="post">Post/Designation:</label>
               @error('post')
               <span class="text-danger">{{ $message }}</span>
               @enderror
               <input type="text" name="post" id="post"  class="form-control " value="{{ $customers->post }}" >
            </div>
            <div class="form-group col-md-6">
               <label for="phone_no">Phone No:</label>
               @error('phone_no')
               <span class="text-danger">{{ $message }}</span>
               @enderror
               <input type="number" name="phone_no" id="phone_no"  class="form-control " value="{{ $customers->phone_no }}" >
            </div>
            <div class="form-group col-md-6">
               <label for="email">Email:</label>
               @error('email')
               <span class="text-danger">{{ $message }}</span>
               @enderror
               <input type="email" name="email" class="form-control" autocomplete="off" value="{{ $customers->email }}">
            </div>
            <div class="form-group col-md-6">
               <label for="age">Age:</label>
               @error('age')
               <span class="text-danger">{{ $message }}</span>
               @enderror
               <input type="number" name="age" class="form-control" autocomplete="off" value="{{ $customers->age }}">
            </div>
            <div class="form-group col-md-12">
               <h3 style="font-size: 25px; color: #eb1a1a; text-decoration: underline; margin: 0;" class="">Education :</h3>
            </div>
            <div class="form-group col-md-6">
               <label for="university">University:</label>
               @error('university')
               <span class="text-danger">{{ $message }}</span>
               @enderror
               <input type="text" name="university" id="university"  class="form-control " value="{{ $customers->university }}" >
            </div>
            <div class="form-group col-md-6">
               <label for="collage">Collage:</label>
               @error('collage')
               <span class="text-danger">{{ $message }}</span>
               @enderror
               <input type="text" name="collage" id="collage"  class="form-control" value="{{ $customers->collage }}" >
            </div>
            <div class="form-group col-md-6">
               <label for="school">School:</label>
               @error('school')
               <span class="text-danger">{{ $message }}</span>
               @enderror
               <input type="text" name="school" id="school"  class="form-control " value="{{ $customers->school }}" >
            </div>
            <div class="form-group col-md-12">
               <h3 style="font-size: 25px; color: #eb1a1a; text-decoration: underline; margin: 0;" class="">Address :</h3>
            </div>
            <div class="form-group col-md-6">
               <label for="state_id">Division:</label>
               @error('state_id')
               <span class="text-danger">{{ $message }}</span>
               @enderror
               <select name="state_id" class="form-control"  >
                  <option value="" selected="" disabled="">Select Division</option>
                  @foreach($states as $state)
                  <option value="{{ $state->id }}" 
                     @if($customers->state_id == $state->id) selected 
                     @endif
                     >{{ $state->state_name }}</option>
                  @endforeach
                </select>
            </div>

            <div class="form-group col-md-6">
               <label for="city_id">District:</label>
               @error('city_id')
               <span class="text-danger">{{ $message }}</span>
               @enderror
               <select name="city_id" class="form-control"  >
                  <option value="" selected="" disabled="">Select District</option>
                  @foreach($cities as $city)
                  <option value="{{ $city->id }}" 
                     @if($customers->city_id == $city->id) selected 
                     @endif
                     >{{ $city->city_name }}</option>
                  @endforeach
                </select>
            </div>
            <div class="form-group col-md-6">
               <label for="district_id">Thana:</label>
               @error('district_id')
               <span class="text-danger">{{ $message }}</span>
               @enderror
              <!--  <input type="text" name="thana_id" class="form-control" value=""> -->
               <select name="district_id" id="district_id" class="form-control"  >
                  <option value="" selected="" disabled="">Select Thana</option>
                  @foreach($upazilas as $upazila)
                  <option value="{{ $upazila->id }}" 
                     @if($customers->district_id == $upazila->id) selected 
                     @endif
                     >{{ $upazila->bn_name }}</option>
                  @endforeach
                </select>
            </div>

            <div class="form-group col-md-6">
               <label for="address">Address:</label>
               @error('address')
               <span class="text-danger">{{ $message }}</span>
               @enderror
               <input type="text" name="address" id="address" class="form-control" value="{{ $customers->address }}">
            </div>

            <div class="form-group col-md-12">
               <label for="category_id">Category:</label>
               @error('category_id')
               <span class="text-danger">{{ $message }}</span>
               @enderror
              <!--  <input type="text" name="thana_id" class="form-control" value=""> -->
               <select name="category_id" id="category_id" class="form-control"  >
                  <option value="" selected="" disabled="">Select Category</option>
                  @foreach($categories as $category)
                  <option value="{{ $category->id }}"
                      @if($customers->category_id == $category->id) selected 
                     @endif
                     >{{ $category->category_name }}</option>
                  @endforeach
                </select>
            </div>

            <div class="form-group col-md-12">
               <label for="image">Image:</label>
               @error('image')
               <span class="text-danger">{{ $message }}</span>
               @enderror
               <img id="showImage" src="{{ asset($customers->image)}}" class="user_img" alt="" style="width: 70px; height: 60px;">
               <div class="custom-file">
                  <input type="file" name="image" class="form-control-file border mt-3 mb-3" id="image">
               </div>
            </div>

            <div class="form-group col-md-12">
               <label for="services">Services:</label>
               @error('services')
               <span class="text-danger">{{ $message }}</span>
               @enderror
               <textarea rows="5"  name="services" class="form-control ">{{ $customers->services }}</textarea>
            </div>

           <!--  <div class="col-md-12">
               <div class="form-group add_item" style="margin-top:32px;">
                  <label for="services"></label>
                  <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i></span>
               </div>
            </div>    -->  

         </div>
         <div class="card-footer m-2 ">
            <div class="form-group">
               <button type="submit" class="mt-1 btn btn-primary">
               <i class="fas fa-plus-circle"></i>
               Update
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

@push('footer-script')
<!-- discount -->
<script>
   /* ================= Add Row =============== */
    $(document).ready(function(){
       var counter = 0;
       $(document).on("click",".addeventmore",function(){
          var whole_extra_item_add = $('#whole_extra_item_add').html();
          $(this).closest(".add_item").append(whole_extra_item_add);
          counter++;
       });
       $(document).on("click",'.removeeventmore',function(event){
          $(this).closest(".delete_whole_extra_item_add").remove();
          counter -= 1
       });
   
    });
    /* ================= Add Row =============== */
   
   
</script>

<!-- sub category -->
<script type="text/javascript">
      $(document).ready(function() {
        $('select[name="state_id"]').on('change', function(){
            var state_id = $(this).val();
            if(state_id) {
                $.ajax({
                    url: "{{  url('/division-city/ajax') }}/"+state_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                       var d =$('select[name="city_id"]').empty();
                          $.each(data, function(key, value){
                              $('select[name="city_id"]').append('<option value="'+ value.id +'">' + value.city_name + '</option>');
                          });
                    },
                });
            } else {
                alert('danger');
            }
        });
    });
  </script>

  <!-- sub category -->
<script type="text/javascript">
      $(document).ready(function() {
        $('select[name="city_id"]').on('change', function(){
            var city_id = $(this).val();
            if(city_id) {
                $.ajax({
                    url: "{{  url('/city-upazila/ajax') }}/"+city_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                       var d =$('select[name="district_id"]').empty();
                          $.each(data, function(key, value){
                              $('select[name="district_id"]').append('<option value="'+ value.id +'">' + value.bn_name + '</option>');
                          });
                    },
                });
            } else {
                alert('danger');
            }
        });
    });
  </script>



@endpush