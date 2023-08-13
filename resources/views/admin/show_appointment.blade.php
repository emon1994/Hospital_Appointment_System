<!DOCTYPE html>
<html lang="en">
 

  @include('admin.head')
  
  
  @include('admin.first_part')
     
    @include('admin.sidebar')

    @include('admin.navbar')

    <div class="container bg-white" style="margin-top: 100px;">
        <div class="container mt-5" >
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive" style="height:calc(100vh - 200px)">
                        <table class="table table-dark text-white">
                            <thead class="table-danger">
                                <tr >
                                    <th class="text-black">Customer Name</th>
                                    <th class="text-black">Email</th>
                                    <th class="text-black">Phone</th>
                                    <th style="width: 100px;" class="text-black">Doctor Name</th>
                                    <th class="text-black">Date</th>
                                    <!-- <th class="text-black">Message</th> -->
                                    <th class="text-black">Status</th>
                                    <th class="text-black">Cancel</th>
                                    <th class="text-black">Approved</th>
                                    <th class="text-black">send mail</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($appointment as $app)
                                <tr>
                                    <td>{{ $app->name}}</td>
                                    <td>{{ $app->email}}</td>
                                    <td>{{ $app->date}}</td>
                                    <td>{{ $app->doctor}}</td>
                                    <td>{{ $app->phone}}</td>
                                    <!-- <td>{{ $app->message}}</td> -->
                                    <td>{{ $app->status}}</td>
                                    <td><a href="{{ url('app_cancel', $app->id) }}" class="btn btn-danger">Cancel</a></td>
                                    
                                    <td><a href="{{ url('app_aproved',  $app->id) }}" class="btn btn-danger">Approve</a></td>

                                    <td><a href="{{ url('email_view',  $app->id) }}" class="btn btn-primary">send mail</a></td>

                                </tr>
                                    
                                @endforeach
                            
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.script')
    
  </body>
</html>