<!DOCTYPE html>
<html lang="en">
  @include('admin.head')
  
  @include('admin.first_part')
     
      @include('admin.sidebar')
     
      @include('admin.navbar')

      <div class="container-fluid" style="margin-top: 90px;">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <form action="{{ url('upload_doctor') }}" method="POST" enctype="multipart/form-data" >
                        @csrf
                        @if(session()->has('message'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Doctor added successfuly!</strong> You should check .
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">X</button>
                        </div>
                        @endif
                        <div class="mb-3">
                            <label  class="form-label">Name</label>
                            <input type="text" class="form-control bg-black text-white" name="name">
                        </div>
                        

                        <div class="mb-3">
                            <label  class="form-label">Phone</label>
                            <input type="number" class="form-control bg-black  text-white" name="number">
                        </div>

                        <div class="mb-3">
                            <label  class="form-label">Speciality</label>
                            <select name="speciality" class="form-control bg-black text-white">
                                <option value="medicine">medicine</option>
                                <option value="skin">skin</option>
                                <option value="ortho">ortho</option>
                                <option value="cardiac">cardiac</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label  class="form-label">Room number</label>
                            <input type="text" class="form-control bg-black text-white" name="room">
                        </div>

                        <div class="mb-3">
                            <label  class="form-label">Dr image</label>
                            <input type="file" class="form-control" name="image">
                        </div>
            
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
      </div>
       
    @include('admin.script')
    
  </body>
</html>