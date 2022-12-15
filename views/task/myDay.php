<?php
include_once __DIR__ . "/../dashboard/dashboard.php";
?>

<head>

  <link rel="stylesheet" href="/css/style.css" />

  <!-- <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" />
  <script src="http://code.jquery.com/jquery-1.8.2.js"></script> -->



  <!-- <script src="http://code.jquery.com/ui/1.9.0/jquery-ui.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<!--
<div class="card" id="my-day-title">

  <h5> <i class="fa fa-sun-o"></i> My Day</h5>
  <hr class="task-hr">
  <h5>19 de setembro de 2022</h5>

</div>

<button id="task" class="btn btn-primary float-right rounded-circle" style="margin-bottom: 2rem;">+</button>
<input type="checkbox" onClick="toggle(this)" class="task_index">
<label id="task_label" for="scales">Select all</label>

<div id="new_chq" class="my-day-body task-card" style="display: none;">
  <form action="/save-task" method="get">
    <div class="row">
      <div class="col-sm-12">
        <div class="card card-task">
          <div class="card-body">
            <h5 class="card-title">Task</h5>
            <input type="hidden" name="category_id" value="2">
            <input class="form-control" type="text" name="task_name"></input>
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="card card-task">
          <div class="card-body">
            <h5 class="card-title">Expected day</h5>
            <input type="text" style="width : 80%" name="expected_day" class="calendario"></input>
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="card card-task">
          <div class="card-body">
            <h5 class="card-title">Expected time</h5>
            <input type="text" name="expected_time"></input>
          </div>
        </div>
      </div>
    </div>
    <button type="submit" class="btn btn-primary input-task">Submit</button>
    <a type=button" id="cancel-task" class=" btn input-task cancel-task">Cancel</a>
  </form>
</div>
<input type="hidden" value="1" id="total_chq">
<?php foreach ($tasks as $index => $task) : ?>
  <div class="card col-md-12 my-day-body" style="margin-bottom: 2rem;">
    <div id="click">
      <div class="task-id-<?= $task['task_id'] ?>">
        <div class="row">
          <div class="col-sm-1">
            <div class="card card-task">
              <div class="card-body">
                <?php if ($task['status'] == 0) : ?>
                  <input type="checkbox" class="task_index" name="scales" id="task_index-<?= $task['task_id'] ?>" onclick="check(1, <?= $task['task_id'] ?> )">
                <?php else : ?>
                  <input type="checkbox" ckass="task_index" name="scales" id="task_index-<?= $task['task_id'] ?>" onclick="check(0, <?= $task['task_id'] ?>)" checked="checked">
                <?php endif ?>
              </div>
            </div>
          </div>

          <div class="col-sm-11">
            <div class="row">
            <div class="col-sm-11">
            <div class="card card-task">
              <div class="card-body">
                <h4><label id="task_label-<?= $task['task_id'] ?>" contenteditable="true" onkeyup="edit_task(<?= $task['task_id'] ?>)"><?= $task['task_name'] ?></label></h4>
                <hr>
              </div>
            </div>
          </div>

          <div class="col-sm-10">
            <div class="card card-task">
              <div class="card-body">
                <form action="/delete-task" method="get">
                  <label id="task_label-<?= $task['task_id'] ?>" contenteditable="true" onkeyup="edit_task(<?= $task['task_id'] ?>)">Lorem Ipsum is simply dummy text of the printing and typesetting industry. </label>
                </form>
              </div>
            </div>
          </div>
        
        <div class="col-sm-3">
            <div class="card card-task">
              <div class="card-body">
                <label id="task_day-<?= $task['task_id'] ?>" class="table-content" contenteditable="true" onkeyup="edit_day(<?= $task['task_id'] ?>)" for="scales"><?= $task['expected_day'] ?></label>
              </div>
            </div>
          </div>
          <div class="col-sm-2">
            <div class="card card-task">
              <div class="card-body">
                <label id="task_time-<?= $task['task_id'] ?>" class="table-content calendario" contenteditable="true" onkeyup="edit_time(<?= $task['task_id'] ?>)" for="scales"><?= $task['expected_time'] ?></label>
              </div>
            </div>
          </div>
          <div class="col-sm-2">
            <div class="card card-task">
              <div class="card-body">
                <form action="/delete-task" method="get">
                  <input type="hidden" id="task_id" name="task_id" value="<?= $task['task_id'] ?>">
                  <button type="submit" style="float: right;" class="delete-task center"><i class="fa fa-trash"></i></button>
                </form>
              </div>
            </div>
          </div>
              
            </div>
          </div>

          <div id="edit-task-<?= $task['task_id'] ?>" style="display: none;">
            <form action="/edit-task" method="get">
              <input type="hidden" id="task_id" name="task_id" value="<?= $task['task_id'] ?>">
              <input type="hidden" id="user_id" name="user_id" value="<?= $task['user_id'] ?>">
              <input class="form-control" id="input_task_edit" type="text" name="task_name"></input>
              <button type="submit" class="btn btn-primary input-task">Save</button>
              <a type=button" id="cancel-edit-<?= $task['task_id'] ?>" onclick="cancel_edit(<?= $task['task_id'] ?>)" class="btn input-task cancel-task">Cancel</a>
            </form>
            </input>

          </div>
        </div>
      </div>

    </div>

  <?php endforeach ?>



  </ul>


  </div>

  <script type="text/javascript">
    $('#task').click(function() {
      $("#new_chq").show();
    });

    function open_edit(idTask) {
      document.querySelectorAll("#task_label-" + idTask).forEach(function(node) {

        $("#task_label-" + idTask).hide();
        $("#edit-task-" + idTask).show();

      });
    }


    function edit_task(idTask) {
      $("#task_label-" + idTask).on('keyup', function(event) {
        if (event.keyCode === 13) {
          var task = document.getElementById("task_label-" + idTask).textContent;
          window.location.href = "/edit-task?task_id=" + idTask + "&task_name=" + task;
        }
      });
    }

    function edit_day(idTask) {
      $("#task_day-" + idTask).on('keyup', function(event) {
        if (event.keyCode === 13) {
          var task = document.getElementById("task_day-" + idTask).textContent;
          window.location.href = "/edit-day?task_id=" + idTask + "&expected_day=" + task;
        }
      });
    }

    function edit_time(idTask) {
      $("#task_time-" + idTask).on('keyup', function(event) {
        if (event.keyCode === 13) {
          var task = document.getElementById("task_time-" + idTask).textContent;
          window.location.href = "/edit-time?task_id=" + idTask + "&expected_time=" + task;
        }
      });
    }



    function cancel_edit(idTask) {
      // location.reload();
      $(".task-id-" + idTask).show();
      $("#edit-task-" + idTask).hide();
    };

    $('#cancel-task').click(function() {
      $("#new_chq").hide();
    });

    jQuery(function($) {
      var $j = jQuery.noConflict();
      $(".calendario").datepicker({
        showOn: "button",
        buttonImage: "/assets/calendar.png",
        buttonImageOnly: true,
        showButtonPanel: true,
        changeMonth: true,
        changeYear: true
      });
    });

    function toggle(source) {
      checkboxes = document.getElementsByName('scales');
      for (var i = 0, n = checkboxes.length; i < n; i++) {
        checkboxes[i].checked = source.checked;
      }

    }

    function check(value, idTask) {
      if (window.confirm("Do you really want to change this task status?") == true) {
        window.location.href = "/update-status?task_id=" + idTask + "&status=" + value;
      } else {
        document.getElementById("task_index-" + idTask).checked = false;
      }
    }
  </script> -->



<!-- Dashboard (Parent Block)-->
<div class="dashboard">

  <!-- Dashboard Content (Block)-->
  <div class="dashboard-content">
    <!-- Dashboard Header (Block)-->
    <div class="dashboard-header">
      <!-- Search (Element)-->
      <div class="dashboard-header__search">

        <button type="button" class="btn btn-primary" id="#exampleModalCenter" onclick="process();">
          Process
        </button>
      </div>
      <!-- New (Element)-->
      <div class="dashboard-header__new"><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/169963/planner_dashboard_new_plan.svg" /></div>
    </div>
    <!-- Dashboard Content Panel (Element)-->
    <div class="dashboard-content__panel" data-panel-id="home">
      <p>Home</p>
    </div>
    <!-- Dashboard Content Panel (Element)-->
    <div class="dashboard-content__panel dashboard-content__panel--active" data-panel-id="my_trip">
      <!-- Dashboard List (Block) -->
      <div class="dashboard-list">
        <!-- Dasboard List Item (Element)-->

        <?php foreach ($tasks as $index => $task) : ?>
          <div class="dashboard-list__item" data-item-id="subtasks-<?= $task['task_main_id'] ?>">
            <!-- Title (Element)-->
            <h2><?= $task['task_title'] ?></h2>
            <!-- Date (Element)--><span>15 May - 23 May 2016</span>
          </div>
          <!-- Dasboard List Item (Element)-->
        <?php endforeach ?>
      </div>
    </div>
    <!-- Dashboard Content Panel (Element)-->

  </div>
  <!-- Dashboard Preview (Block)  -->
  <div class="dashboard-preview">
    <!-- Panel (Element)-->
    <?php foreach ($tasks as $index => $task) : ?>
      <div class="dashboard-preview__panel" data-panel-id="subtasks-<?= $task['task_main_id'] ?>">
        <!-- Header (Element)-->
        <div class="dashboard-preview__header">
          <h4><?= $task['task_title'] ?></h4>
          <h2>In progress</h2>

          </h3>
        </div>
        <!-- Content (Element)-->
        <div class="dashboard-preview__content">
          <section>
            <button id="task" class="btn float-right rounded-circle btn-add-task" style="margin-bottom: 2rem;" id="task" onclick="add_task(<?= $task['task_main_id'] ?>)">+ </button>

            <h2>My Tasks</h2>
            <div id="append_subtask" style="display:none;margin-top:2.5rem;" class="col-md-12">
              <row>

                <form class="form-subtask" action="/save-subtask" action="get">
                  <div class="header-subtask" style="margin-bottom: 1rem; color: #5F6876;">
                    <i class="fa fa-task"></i> <span>Create new task</span>
                  </div>
                  <input type="hidden" name="task_main_id" value="<?= $task['task_main_id'] ?>"></input>
                  <input type="hidden" name="category_id" value="2">
                  <input placeholder="New Task" class="input-subtask" type="text"><span class="highlight"></span><span class="bar"></span>
                  <div style="margin-top: 2rem;">
                    <button class="col-md-3 save-subtask" style="margin-right: 1rem;" type="submit">Save</button>
                    <button class="col-md-4" type="button" id="cancel-task">Cancel</button>
                  </div>
                </form>
              </row>

            </div>

            <?php foreach ($subTasks as $index => $subtask) : ?>
              <?php if ($subtask['task_main_id'] == $task['task_main_id']) : ?>
                <!-- <ul id="incomplete-tasks">
                  <h4><label id="task_label-<?= $subtask['task_id'] ?>" contenteditable="true" onkeyup="edit_task(<?= $subTask['task_id'] ?>)"><?= $subTask['task_name'] ?></label></h4><i class="fa fa-trash"></i></i>
                  <div class="col-sm-2">
                    <div class="card card-task">
                      <div class="card-body">
                        <form action="/delete-task" method="get">
                          <input type="hidden" id="task_id" name="task_id" value="<?= $task['task_id'] ?>">
                          <button type="submit" style="float: right;" class="delete-task center"><i class="fa fa-trash"></i></button>
                        </form>
                      </div>
                    </div>
                  </div>
                </ul> -->

  <div class="card col-md-12 my-day-body" style="margin-bottom: 2rem;">
    <div id="click">
      <div class="task-id-<?= $subtask['task_id'] ?>">
        <div class="row">
          <!-- <div class="col-sm-1">
            <div class="card card-task">
              <div class="card-body">
               
              </div>
            </div>
          </div> -->

          <div class="col-sm-10">
            <div class="row">
            <div class="col-sm-10">
            <div class="card card-task">
              <div class="card-body">
              <?php if ($subtask['status'] == 0) : ?>
                <ul>
                  <input type="checkbox" style="    display: flex;
    float: left;"class="task_index" name="scales" id="task_index-<?= $subtask['task_id'] ?>" onclick="check(1, <?= $subtask['task_id'] ?> )">
                  <label for="scales" style="margin-left: 3rem;" id="task_label-<?= $subtask['task_id'] ?>" contenteditable="true" onkeyup="edit_task(<?= $subtask['task_id'] ?>)"><?= $subtask['task_name'] ?></label>
                  <?php else : ?>
                  <input type="checkbox" class="task_index" name="scales" id="task_index-<?= $subtask['task_id'] ?>" onclick="check(0, <?= $subtask['task_id'] ?>)" checked="checked">
                  <label for="scales" style="margin-left: 3rem;" id="task_label-<?= $subtask['task_id'] ?>" contenteditable="true" onkeyup="edit_task(<?= $subtask['task_id'] ?>)"><?= $subtask['task_name'] ?></label>
                  <?php endif ?>
                </ul>
                <hr>
               
              </div>
            </div>
          </div>
          <div class="col-sm-2">
            <div class="card card-task">
              <div class="card-body">
                <form action="/delete-task" method="get">
                  <input type="hidden" id="task_id" name="task_id" value="<?= $subtask['task_id'] ?>">
                  <button type="submit" style="float: right;" class="delete-task center"><i class="fa fa-trash"></i></button>
                </form>
              </div>
            </div>
          </div>
              
            </div>
          </div>

          <div id="edit-task-<?= $subask['task_id'] ?>" style="display: none;">
            <form action="/edit-task" method="get">
              <input type="hidden" id="task_id" name="task_id" value="<?= $subtask['task_id'] ?>">
              <input type="hidden" id="user_id" name="user_id" value="<?= $subtask['user_id'] ?>">
              <input class="form-control" id="input_task_edit" type="text" name="task_name"></input>
              <button type="submit" class="btn btn-primary input-task">Save</button>
              <a type=button" id="cancel-edit-<?= $subtask['task_id'] ?>" onclick="cancel_edit(<?= $subtask['task_id'] ?>)" class="btn input-task cancel-task">Cancel</a>
            </form>
            </input>

          </div>
        </div>
      </div>

    </div>

              <?php endif ?>
            <?php endforeach ?>

          </section>
          <h2>Progress<span>(Day 4 of 10)</span></h2>
          <div class="progress-bar">
            <div class="progress-bar__bar" style="width: #{percetange}%"></div>
            <div class="progress-bar__badge" style="left: #{percetange}%">73%</div>
          </div>
          </section>
        </div>
      </div>
    <?php endforeach ?>
  </div>

</div>
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h6>First declare the task name and whould you planed finished</h6>
        <hr>
        <form action="/save-task" method="get">
          <input type="hidden" name="category" value="2">
          <label>Name</label>
          <input class="form-control" id="mySelectedValue" name="task_title" style="margin-top: 10px;"></input><br>
          <label>Expected Day for conclusion:</label>
          <input class="form-control" id="mySelectedValue" name="estimate_conclusion_day" estyle="margin-top: 10px;"></input><br>
          <button type="submit" class="btn btn-primary input-task">Submit</button>
        </form>

        <button class="btn btn-primary send" style='font-family: "Lucida Grande", "Lucida Sans Unicode", Arial, Helvetica, Verdana, sans-serif; font-size: 14px;"'>
          Create
        </button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  (function() {
    $('.dashboard-nav__item').on('click', function(e) {
      var itemId;
      e.preventDefault();
      $('.dashboard-nav__item').removeClass('dashboard-nav__item--selected');
      $(this).addClass('dashboard-nav__item--selected');
      itemId = $(this).children().attr('href');
      $('.dashboard-content__panel').hide();
      $('.dashboard-content__panel[data-panel-id=' + itemId + ']').show();
      if (itemId === 'my_trip') {
        $('.dashboard-preview').show();
      } else {
        $('.dashboard-preview').hide();
      }
      return console.log(itemId);
    });

    $('.dashboard-list__item').on('click', function(e) {
      var itemId;
      e.preventDefault();
      $('.dashboard-list__item').removeClass('dashboard-list__item--active');
      $(this).addClass('dashboard-list__item--active');
      itemId = $(this).attr('data-item-id');
      $('.dashboard-preview__panel').hide();
      $('.dashboard-preview__panel[data-panel-id=' + itemId + ']').show();
      return console.log(itemId);
    });

  }).call(this);

  function printValue(selectedItem) {
    $('#mySelectedValue').html(selectedItem.value);
    console.log(selectedItem.value);
  }

  function process(selectedItem) {
    $('#exampleModalCenter').modal('show')
    document.getElementById('#exampleModalCenter')

  }

  function optionClick(selectedItem) {
    printValue(selectedItem);
  }

  function edit_day(idTask) {
    $("#task_day-" + idTask).on('keyup', function(event) {
      if (event.keyCode === 13) {
        var task = document.getElementById("task_day-" + idTask).textContent;
        window.location.href = "/edit-day?task_id=" + idTask + "&expected_day=" + task;
      }
    });
  }
  $('#task').click(function() {
    $("#append_subtask").show();
    $("#list-subtask").hide();
  });

  $('#cancel-task').click(function() {
    $("#append_subtask").hide();
    $("#list-subtask").show();
  });


  $(window, document, undefined).ready(function() {

    $('.input-subtask').blur(function() {
      var $this = $(this);
      if ($this.val())
        $this.addClass('used');
      else
        $this.removeClass('used');
    });

    var $ripples = $('.ripples');

    $ripples.on('click.Ripples', function(e) {

      var $this = $(this);
      var $offset = $this.parent().offset();
      var $circle = $this.find('.ripplesCircle');

      var x = e.pageX - $offset.left;
      var y = e.pageY - $offset.top;

      $circle.css({
        top: y + 'px',
        left: x + 'px'
      });

      $this.addClass('is-active');

    });

    $ripples.on('animationend webkitAnimationEnd mozAnimationEnd oanimationend MSAnimationEnd', function(e) {
      $(this).removeClass('is-active');
    });

  });

  function edit_task(idTask) {
    $("#task_label-" + idTask).on('keyup', function(event) {
      if (event.keyCode === 13) {
        var task = document.getElementById("task_label-" + idTask).textContent;
        window.location.href = "/edit-task?task_id=" + idTask + "&task_name=" + task;
      }
    });
  }

  completedTasksHolder = document.getElementById("completed-tasks"); //completed-tasks
  //input (checkbox)
  var checkBox = document.createElement("input"); //checkbx
  //label
  var label = document.createElement("label"); //label
  //input (text)
  var editInput = document.createElement("input"); //text
  //button.edit
  var editButton = document.createElement("button"); //edit button

  //Mark task completed
  var taskCompleted = function() {
    console.log("Complete Task...");

    //Append the task list item to the #completed-tasks
    var listItem = this.parentNode;
    completedTasksHolder.appendChild(listItem);
    bindTaskEvents(listItem, taskIncomplete);

  }


  var taskIncomplete = function() {
    console.log("Incomplete Task...");
    //Mark task as incomplete.
    //When the checkbox is unchecked
    //Append the task list item to the #incomplete-tasks.
    var listItem = this.parentNode;
    incompleteTaskHolder.appendChild(listItem);
    bindTaskEvents(listItem, taskCompleted);
  }

  var ajaxRequest = function() {
    console.log("AJAX Request");
  }

  function check(value, idTask) {
      if (window.confirm("Do you really want to change this task status?") == true) {
        window.location.href = "/update-status?task_id=" + idTask + "&status=" + value;
      } else {
        document.getElementById("task_index-" + idTask).checked = false;
      }
    }
</script>