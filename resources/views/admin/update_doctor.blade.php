<!DOCTYPE html>
<html lang="en">
    <base href="/public">
  @include('admin.head')
  
  @include('admin.first_part')
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.navbar')
    <div class="container-fluid" style="margin-top: 90px;">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <form action="{{ url('edit_doctor', $data->id) }}" method="POST" enctype="multipart/form-data" >
                        @csrf
                        @if(session()->has('message'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>{{ session()->get('message') }}</strong> You should check in .
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">X</button>
                        </div>
                        @endif
                        <div class="mb-3">
                            <label  class="form-label">Name</label>
                            <input type="text" value="{{ $data->name}}" class="form-control bg-black text-white" name="name">
                        </div>
                        

                        <div class="mb-3">
                            <label  class="form-label">Phone</label>
                            <input type="number" value="{{ $data->phone}}" class="form-control bg-black  text-white" name="number">
                        </div>

                        <div class="mb-3">
                            <label  class="form-label">Speciality</label>
                            <select name="speciality" value="{{ $data->speciality }}" class="form-control bg-black text-white">
                                <option value="medicine">medicine</option>
                                <option value="skin">skin</option>
                                <option value="ortho">ortho</option>
                                <option value="cardiac">cardiac</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label  class="form-label">Room number</label>
                            <input type="text" value="{{ $data->room }}" class="form-control bg-black text-white" name="room">
                        </div>

                        <div class="mb-3">
                            <label  class="form-label">Old image</label>
                            <img src="doctorimage/{{ $data->image }}" height="200" width="200" alt="">
                        </div>

                        <div>
                            <label for="">Update Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>
            
                        <button type="submit" class="btn btn-primary mb-5">Submit</button>
                    </form>
                </div>
            </div>
        </div>
      </div>
      
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>