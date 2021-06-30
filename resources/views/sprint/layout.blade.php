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
                    <h4 class="card-title">Create sprint</h4>
                    
                      <?php echo Form::open(array('url' => '/sprints/create', 'method' => 'post')) ?>
                    	@csrf
                      <p class="card-description"></p>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                             <?php echo Form::label('Name', 'Name',array('class' => 'col-sm-3 col-form-label')); ?>
                            <div class="col-sm-9">
                              <?php
                                echo Form::text('name', '',array('class'=>'form-control'));
                               ?>
                             
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                           <?php echo Form::label('Description', 'Description',array('class' => 'col-sm-3 col-form-label')); ?>
                            <div class="col-sm-9">
                             <?php
                                echo Form::text('description','',array('class'=>'form-control'));
                               ?>
                            </div>
                          </div>
                        </div>
                      </div>
                      
                    
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <input type="submit" name="submit" class="btn btn-success mr-2" value="Create">
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
