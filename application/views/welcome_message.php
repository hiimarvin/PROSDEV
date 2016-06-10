<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
    
    <?php $this->load->view('dependencies'); ?>

	<script type="text/javascript">
        $(document).ready(function(){
            $.material.init();
            
            var controller = 'Todolist';
            var baseUrl = '<?php echo base_url();?>';
            var todoController = 'TodoController';
            
            var todoClone = $(".todoRow").clone();
            $(".todoRow").remove();
            
            refreshTodos();
        
            function refreshTodos(){
                $("#todoList").empty();
                $.ajax({
                    type: 'post',
                    url: baseUrl + todoController + '/getTodos',
                    dataType: "json",
                    success: function (todos) {
                        $.each(todos, function(index,todo){
                            var toCopy = todoClone.clone();
                            toCopy.find(".todoTitle").text(todo.title);
                            toCopy.find(".todoDesc").text(todo.description);
                            toCopy.find(".todoStart").text(todo.start);
                            toCopy.find(".todoEnd").text(todo.end);
//                            toCopy.find("*:not(.content-panel):not(.companyInfoWrapper):not(button)").click(function(event){
//                                var target = $(event.target);
//                                if(target.hasClass("companyImage")){
//                                    companyClick(target.siblings(".companyInfoWrapper").children("button").val());
//                                }else if(target.hasClass("companyName")){
//                                    companyClick(target.siblings("button").val());
//                                }else{
//                                    companyClick(target.parent().siblings("button").val());
//                                }
//                            });
//                            toCopy.find(".companyInfoWrapper button").click(function(){
//                                $("#editCompanyModal").modal("show");
//                            });
                            toCopy.appendTo("#todoList").show();
                        });
                    }
                });
            }
            
            $(".btn").click(function(){
                $(".modal").modal("toggle");
            });
        }); 
    </script>
</head>
<body>

<div id="container" style="margin:50px;">
	<table class="table table-striped table-hover" >
      <thead>
      <tr>
        <th></th>
        <th>Title</th>
        <th>Description</th>
        <th>Start</th>
        <th>End</th>
        <th>Category</th>
        <th></th>
      </tr>
      </thead>
      <tbody id="todoList">
      <tr class="todoRow">
        <td>
            <div class="checkbox checkbox-material">
                <label>
                  <input type="checkbox">
                </label>
            </div>
        </td>
        <td class="text todoTitle">1</td>
        <td class="text todoDesc">Column content</td>
        <td class="text todoStart">Column content</td>
        <td class="text todoEnd">Column content</td>
        <td class="text todoCategory">Column content</td>
        <td>
            <a href="javascript:void(0)" class="btn">Edit</a>
        </td>
      </tr>
      </tbody>
    </table>
</div>
    
    <div class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title">Modal title</h4>
          </div>
          <div class="modal-body">
            <p>One fine body…</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>

</body>
</html>