@include('home.head')

@include('home.nav_section')
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th>Doctor</th>
                        <th>Date</th>
                        <th>Message</th>
                        <th>status</th>
                        <th>cancel appointment</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($appoint as $app)
                    <tr>
                        <td>{{ $app->doctor }}</td>
                        <td>{{ $app->date }} </td>
                        <td> {{ $app->message }}</td>
                        <td>{{ $app->status }}</td>
                        <td><a href="{{ url('cancel_appoint',$app->id) }}" onclick=" return confirm('are you sure to delete?')" class="btn btn-warning ">cancel</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@include('home.script')

  

