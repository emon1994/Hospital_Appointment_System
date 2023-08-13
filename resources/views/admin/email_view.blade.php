<!DOCTYPE html>
<html lang="en">
    <base href="/public">
  @include('admin.head')
  
  @include('admin.first_part')
     
      @include('admin.sidebar')
     
      @include('admin.navbar')

      <div class="container-fluid" style="margin-top: 90px;">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <form action="{{ url('send_email', $data->id) }}" method="POST">
                        @csrf
                        @if(session()->has('message'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Email sent successfuly!</strong> You should check .
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">X</button>
                        </div>
                        @endif
                        <div class="mb-3">
                            <label  class="form-label">Gretting</label>
                            <input type="text" class="form-control bg-black text-white" name="greeting">
                        </div>
                        

                        <div class="mb-3">
                            <label  class="form-label">Body</label>
                            <input type="text" class="form-control bg-black  text-white" name="body">
                        </div>

                       

                        <div class="mb-3">
                            <label  class="form-label">Action text</label>
                            <input type="text" class="form-control bg-black text-white" name="actiontext">
                        </div>

                        <div class="mb-3">
                            <label  class="form-label">Action url</label>
                            <input type="text" class="form-control bg-black text-white" name="actionurl">
                        </div>

                        <div class="mb-3">
                            <label  class="form-label">End part</label>
                            <input type="text" class="form-control bg-black text-white" name="endpart">
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