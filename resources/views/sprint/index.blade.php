@include('layouts.app')
@section('content')
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">          
              
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h3 class="card-title">Sprint</h3>
                    <p style="float: right;"><a href="/sprints/create"  class="btn btn-primary" >Create Sprint</a></p>
                    <table class="table table-striped">
                      <thead>
                        <tr>
                        
                          <th> Name </th>
                          <th> Decription </th>
                          <th> Project </th>                          
                          
                           <th> Action </th>
                        </tr>
                      </thead>
                      <tbody>
                      	@foreach($sprints as $each)
                        <tr>
                          
                          <td> {{$each->name}} </td>
                           <td>{{$each->description}} </td>
                          <td>
                          	
                           project
                          </td>
                         
                          
                          <td>
                            <a href="/sprint/edit/{{$each->id}}"><i class="fa fa-edit"></i>Edit</a>
                             <a href="/sprint/delete/{{$each->id}}"><i class="fa fa-trash"></i>Delete</a>
                          </td>
                        </tr>
                        @endforeach
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              
             
            
            </div>
          </div>


        @include('layouts.footer')