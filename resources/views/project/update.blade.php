@include('layouts.app')

@section('content')
	
	@extends('alert')
	        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              <div class="col-md-12 d-flex align-items-stretch grid-margin">
                <div class="row flex-grow">
                  <div class="col-12">
	 <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Update Project {{$project->title}}</h4>

		<?php echo Form::open(array('url' => route('projects.update',['project'=>$project->id]), 'method' => 'post')) ?>
		@csrf
		@method('patch')
		      <p class="card-description"></p>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">                         
                            <?php echo Form::label('Title', 'Title',array('class' => 'col-sm-3 col-form-label')); ?>
                            <div class="col-sm-9">
                            	<?php
                            		echo Form::text('title', $project->title,array('class'=>'form-control'));
                            	 ?>
                             
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                           
                            <?php echo Form::label('Description', 'Description',array('class' => 'col-sm-3 col-form-label')); ?>
                            <div class="col-sm-9">
                             <?php
                            		echo Form::text('description', $project->description,array('class'=>'form-control'));
                            	 ?>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                          <?php echo Form::label('Deadline', 'Deadline',array('class' => 'col-sm-3 col-form-label')); ?>
                            <div class="col-sm-9">
                            	 <?php
                            		echo Form::text('deadline', $project->deadline,array('class'=>'form-control'));
                            	 ?>
                            
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                           <?php echo Form::label('Percentage', 'Percentage',array('class' => 'col-sm-3 col-form-label')); ?>
                            <div class="col-sm-9">
                              <?php
                            		echo Form::text('percentage', $project->percentage,array('class'=>'form-control'));
                            	 ?>
                            
                            </div>
                          </div>
                        </div>
                      </div>
                       <div class="row">
                         <div class="col-md-6">
                          <div class="form-group row">
                            <?php echo Form::label('Owner', 'Owner',array('class' => 'col-sm-3 col-form-label')); ?>
                            <div class="col-sm-9">
                             
                              	@php ($selected = '')
                              @foreach($ownerlist as $user)
                                @if ($project->project_owner == $user->id)
                                @php ($selected = $user->id)
                               
                                @endif
                                @php ($ownseArr[$user->id] = $user->name)
                               
                              @endforeach
                              <?php
                              	echo Form::select('project_owner', $ownseArr,$selected,array('class'=>'form-control form-control-lg'));
                               ?>
                            <!-- </select> -->
                            </div>
                          </div>
                        </div>
                         <div class="col-md-6">
                          <div class="form-group row">
                           <?php echo Form::label('Shortcode', 'Shortcode',array('class' => 'col-sm-3 col-form-label')); ?>
                            <div class="col-sm-9">
                              <?php
                                echo Form::text('shortcode', $project->shortcode,array('class'=>'form-control'));
                               ?>
                            
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                          	<?php
                          		echo Form::submit('Update',array('class'=>'btn btn-success mr-2'));
                          	 ?>
                         
                          </div>
                        </div>
                      </div>
	</form>
	 </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

