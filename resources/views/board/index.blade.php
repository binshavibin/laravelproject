@include('layouts.app')

@section('content')
	
@extends('alert')
<meta name="csrf-token" content="{{ csrf_token() }}" />
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">          
              
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Kanban Board</h4>
                    <p><a href="#"  class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Create Task</a></p>
               			
                    
                     <?php
                     $sortable[1] ='';$sortable[2]='';$sortable[3]='';
                     $priorityImg = ['1'=>'high.svg','2'=>'medium.svg','3'=>'low.svg'];
                     $taskTypeImg = ['1'=>'story.svg','2'=>'task.svg','3'=>'issue.svg'];
                      foreach ($taskList as $key => $value) {
                        $priority = '<img src="/assets/svg/'.$priorityImg[$value['priority']].'">';
                        $avtr = '<img src="/assets/svg/'.$taskTypeImg[$value['task_type']].'">';

                        $sortable[$value['status']]  .= ' <li class="default " id="'.$value['id'].'" currentStatus="'.$value['status'].'"><p>'.$value['title'].'</p>'.$priority.'<span class="viewdetails">'.Session::get('project', '').'-'.$value['id'].'</span></li>';
                      }
                      ?>
                      <ul id="sortable-5" class="tasklist connectedSortable" status="todo"><h2 data-tooltip="To Do" original-title="">To Do</h2>
                        <?php if(!empty($sortable[1])) echo $sortable[1];  ?>  
                     </ul>  
                     <ul id="sortable-6" class="tasklist connectedSortable" status="Inprogress"><h2 data-tooltip="To Do" original-title="">In Progress</h2>
                         <?php if(!empty($sortable[2])) echo $sortable[2];  ?>   
                     </ul>  
                     <ul id="sortable-7" class="tasklist connectedSortable" status="Done"><h2 data-tooltip="To Do" original-title="">Done</h2>
                        <?php if(!empty($sortable[3])) echo $sortable[3];  ?>   
                     </ul>

                  </div>
                </div>
              </div>


     
             
       </div>    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create Task</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
           <?php echo Form::open(array('url' => '/task/create', 'method' => 'post')) ?>

          <div class="form-group">
          	<?php echo Form::label('Title', 'Title',array('class' => 'col-form-label')); ?>
            
            <?php
                echo Form::text('title', '',array('class'=>'form-control'));
               ?>
          </div>
          <div class="form-group">
          	<?php echo Form::label('Decription', 'Decription',array('class' => 'col-form-label')); ?>           
           <?php
              echo Form::textarea('description','',array('class'=>'form-control'));
             ?>
          </div>
          <div class="form-group">
            <?php echo Form::label('Tasktype', 'Tasktype',array('class' => 'col-form-label')); ?>           
           
                <?php
                  echo Form::select('task_type', $taskType,'',array('class'=>'form-control form-control-lg'));
                 ?>
          </div>
          <div class="form-group">
            <?php echo Form::label('Status', 'Status',array('class' => 'col-form-label')); ?>           
           <?php
                  echo Form::select('status', $taskStatus,'',array('class'=>'form-control form-control-lg'));
                 ?>
          </div>
          <div class="form-group">
            <?php echo Form::label('AssignTo', 'AssignTo',array('class' => 'col-form-label')); ?>           
           <?php
                  echo Form::select('assign_to', $userlist,'',array('class'=>'form-control form-control-lg'));
                 ?>
          </div>
          <div class="form-group">
            <?php echo Form::label('Priority', 'Priority',array('class' => 'col-form-label')); ?>           
           <?php
                  echo Form::select('priority', $taskpriority,'',array('class'=>'form-control form-control-lg'));
                 ?>
          </div>
       
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" name="submit" class="btn btn-success mr-2" value="Create">
      </div>
       </form>
     </div>
    </div>
  </div>
</div>  
        </div>

          </div>

@include('layouts.footer')

<link href="https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">  
   <script src="https://code.jquery.com/jquery-1.10.2.js"></script>  
   <script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>  
   <style>  
      #sortable-5, #sortable-6,#sortable-7 {   
         list-style-type: none; margin: 10px; padding: 0;  
         width: 30%;float:left }  
      #sortable-5 li, #sortable-6 li,#sortable-7 li {   
         margin: 0 3px 3px 3px; padding: 0.4em;   
      padding-left: 1.5em; font-size: 17px; }  
      .default {  
        
         border: 1px solid #DDDDDD;  
         color: #5e6c84;
      }  
      .default p {
        font-size: 14px;
         color: #212529;

      }
      .default span {
        font-size: 12px;
         color: #5e6c84;
       
      }
      .tasklist{
        border: 1px solid ;
        border-color: #f4f5f7; 
        background: #f4f5f7;  
        height: 500px;
        cursor: pointer;
        border-radius: 0 0 4px 4px;
        padding-right: 5px;
      }
      .tasklist li{
        background: #fff;
      }
     .tasklist h2{
        color: #5e6c84;
    font-size: .85714286em;
    font-weight: 600;
    line-height: 1.33333333;
    margin-top: 10px;
    margin-left: 10px;
    text-transform: uppercase;
    display: inline-block;
    font-weight: 400;
   
    flex: 0 100 auto;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
      }
    .default img {
    height: 16px;
    width: 16px;
    margin-left: 10px;
}
   </style>  
   <script>  
      $(function() {  
         $( "#sortable-5, #sortable-6,#sortable-7" ).sortable({  
            connectWith: "#sortable-5, #sortable-6,#sortable-7"  
         });  
         $('.tasklist').sortable({
           connectWith: ".connectedSortable",
    axis: 'y',
    receive: function (event, ui) { 
      var id = ui.item.attr('id'); 
       var newui = this.id; 
        //var newIndex = $('#'+newui).attr('status');  alert(newIndex);
        var data = [];
        data['id']=id; 
        data['status']= $('#'+newui).attr('status');  console.log(data);
        $.ajax({
            data: data,
            method: 'GET',
            url: '/task/change/'+data['id']+'/'+data['status'],
             dataType: "json",
            headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
        });
    }
});
          $('.viewdetails').on('click',function(){
             alert('fffffffff');
          })
  
      });  
   </script>  