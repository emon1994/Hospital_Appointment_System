<!DOCTYPE html>
<html lang="en">
  @include('admin.head')
  
  @include('admin.first_part')

    @include('admin.sidebar')
    
    @include('admin.navbar')

    <div class="container bg-white" style="margin-top: 100px;">
        <div class="container mt-5" >
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <table class="table table-dark text-white">
                        <thead >
                            <tr >
                                <th class="text-warning">Name</th>
                                <th class="text-white">Phone</th>
                                <th class="text-white">Speciality</th>
                                <th class="text-white">Room</th>
                                <th class="text-white">Image</th>

                                <th class="text-white">Delete</th>
                                <th class="text-white">Update</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $dt)
                            <tr>
                                <td>{{$dt->name}}</td>
                                <td>{{$dt->phone}}</td>
                                <td>{{$dt->speciality}}</td>
                               
                                <td>{{$dt->room}}</td>
                                <td><img src="doctorimage/{{ $dt->image }}"></td>
                                <td><a href="{{ url('delete_doctor', $dt->id) }}" onclick="return confirm('are you sure to delete?')" class="btn btn-danger">Delete</a></td>
                                <td><a href="{{ url('update_doctor', $dt->id) }}" class="btn btn-danger">Update</a></td>
                                
                        
                            </tr>
                                
                            @endforeach
                        
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

     
     
    @include('admin.script')
  </body>
</html>