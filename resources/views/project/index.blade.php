@include('layouts.app')
@section('content')
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">          
              
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Projects</h4>
                     <p style="float: right;"><a href="/projects/create"  class="btn btn-primary" >Create Project</a></p>
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th> User </th>
                          <th> Title </th>
                          <th> Decription </th>
                          <th> Progress </th>                          
                          <th> Deadline </th>
                           <th> Action </th>
                        </tr>
                      </thead>
                      <tbody>
                      	@foreach($projects as $project)
                        <tr>
                          <td class="py-1">
                            <img src="../../../assets/images/faces-clipart/pic-1.png" alt="image" />
                          </td>
                          <td> {{$project->title}} </td>
                           <td>{{$project->description}} </td>
                          <td>
                          	<?php 
                          		if($project->percentage<25) {
                          			$class ='bg-danger';
                          		} else if($project->percentage<50) {
                          			$class ='bg-primary';
                          		} else if($project->percentage<75) {
                          			$class ='bg-warning';
                          		} else if($project->percentage>75) {
                          			$class ='bg-success';
                          		}
                          	?>
                            <div class="progress">
                              <div class="progress-bar {{$class}}" role="progressbar" 
                              style="width:{{$project->percentage}}%" aria-valuenow="{{$project->percentage}}%" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                         
                          <td> {{ date('M d, Y',strtotime($project->deadline)) }}</td>
                          <td>
                            <a href="/projects/editproject/{{$project->id}}"><i class="fa fa-edit"></i>Edit</a>
                             <a href="/projects/delete/{{$project->id}}"><i class="fa fa-trash"></i>Delete</a>
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