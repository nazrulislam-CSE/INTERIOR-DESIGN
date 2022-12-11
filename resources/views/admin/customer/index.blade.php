@extends('layouts.app2')
@section('content')
<div class="content-wrapper">
    <!-- Main content -->
  <div class="content">
    <div class="container-fluied">
      <div class="row mt-3">
       <div class="col-12">
           <div class="card py-3">
             <div class="d-flex justify-content-between align-items-center" style="padding:15px">
                <h3 class="card-title pl-3">Manage Customer</h3>
                <a href="{{ route('customer.create') }}" class="btn btn-primary btn-sm">Add Customer</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped table-responsive">
                  <thead>
                  <tr>
                    <th>Sl</th>
                    <th>Action</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Services</th>
                    <th>Phone No</th>
                    <th>Category</th>
                    <th>Division</th>
                    <th>District</th>
                    <th>Thana</th>
                    <th>Address</th>
                  </tr>
                  </thead>
                  @php
                $i = 1;
              @endphp
              <tbody>
                @foreach($customers as $customer)
                  <tr>
                    <td>{{ $i++ }}</td>
                    <td class="d-flex">
                      <a href="{{ route('customer.edit',$customer->id) }}" class="btn mr-1 btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                      
                        
                      <a href="{{ route('customer.destroy',$customer->id) }}" id="delete"  class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleted-modal{{ $customer->id }}"><i class="fa fa-trash"></i></a>

                      <!-- start Delete modal -->
                      <div class="modal fade" id="deleted-modal{{ $customer->id }}">
                        <div class="modal-dialog">
                          <div class="modal-content bg-primary">
                            <div class="modal-header">
                              <h4 class="modal-title">Delete Customer</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body bg-light">
                              <p>Are you sure Customer Permanently Deleted?</p>
                            </div>
                            <div class="modal-footer justify-content-between bg-light">
                              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                              <a type="button" href="{{ route('customer.destroy',$customer->id) }}" class="btn btn-primary"><i style="margin-right: 5px; color: white;" class="fas  fa-trash"></i><span class="text-light">OK</span></a>
                            </div>
                          </div>
                          <!-- /.modal-content -->
                        </div>
                      </div>
                    
                    
                    </td>
                    <td><img src="{{ asset($customer->image) }}" style="border-radius: 50%;" width="70px;" height="70px;"></td>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->services }}</td>
                    <td>{{ $customer->phone_no }}</td>
                    <td>{{ $customer->category->category_name ?? 'Null' }}</td>
                    <td>{{ $customer->state->state_name ?? 'Null' }}</td>
                    <td>{{ $customer->city->city_name ?? 'Null' }}</td>
                    <td>{{ $customer->upazila->bn_name ?? 'Null' }}</td>
                    <td>{{ $customer->address }}</td>
                    
                  </tr>
                @endforeach
              </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
        </div>
      </div>
    </div>
  </div>
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