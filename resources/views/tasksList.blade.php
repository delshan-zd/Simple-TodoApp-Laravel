
<title> TodoApp_CRUD </title>
<!-- Font Awesome -->
<link
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
rel="stylesheet"
/>

<!-- Google Fonts -->
<link
href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
rel="stylesheet"
/>
<!-- MDB -->
<link
href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css"
rel="stylesheet"

/>
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

<script
    type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js"
></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<section class="vh-100">
<div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col">
            <div class="card" id="list1" style="border-radius: .75rem; background-color: #eff1f2;">
                <div class="card-body py-4 px-4 px-md-5">

                    <p class="h1 text-center mt-3 mb-4 pb-3 text-primary">
                        <i class="fas fa-check-square me-1"></i>
                        <u> My Todo-List</u>
                    </p>


                    <form action="/create" method="post">
                        @csrf
                    <div class="pb-2">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-row align-items-center">
                                    <input type="text" class="form-control form-control-lg" id="exampleFormControlInput1"
                                           name="description"
                                           placeholder="Add new...">
{{--                                        <a href="#" data-mdb-toggle="tooltip" title="Set due date"><i--}}
{{--                                                class="fas fa-calendar-alt fa-lg me-3"></i></a>--}}

                                      <div style="margin-left: 4px;margin-bottom: 2px;margin-right: 4px">
                                        <label style="color: midnightblue"> Priority: </label>
                                        <select class="form-control" name="priority" style="background-color: cornflowerblue;">
                                            <option value="high">High </option>
                                            <option value="mid">Mid </option>
                                            <option value="low">Low </option>
                                        </select>
                                        </div>

                                    <div style="margin-left: 4px;margin-bottom: 2px">
                                        <label style="color:midnightblue "> Deadline</label>
                                        <input type="date" name="deadline">
                                    </div>

                                    <div style="margin-left: 4px;margin-bottom: 2px">
                                        <button type="submit" class="btn btn-primary" id="btn">Add</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                    <hr class="my-4">
                     {{--filter and sortBy section--}}

{{--                       display the tasks --}}
             @foreach($tasks as $task)
                    <ul class="list-group list-group-horizontal rounded-0">
                        <li
                            class="list-group-item d-flex align-items-center ps-0 pe-3 py-1 rounded-0 border-0 bg-transparent">
                            <div class="form-check">
                                <input class="form-check-input me-0" type="checkbox" value="{{ $task->id }}" name="isDone" id="isDone"
                                       aria-label="..." />
                            </div>
                        </li>
                        <li
                            class="list-group-item px-3 py-1 d-flex align-items-center flex-grow-1 border-0 bg-transparent">
                            <p class="lead fw-normal mb-0 "


                               id="{{ $task->id }}">{{ $task->description }}</p>
{{--                            <button style="background-color: grey" name="cancel-btn" value="{{ $task->id }}">cancel</button>--}}
                        </li>
                        <li class="list-group-item px-3 py-1 d-flex align-items-center border-0 bg-transparent">
                            <div
                                class="py-2 px-3 me-2 border border-warning rounded-3 d-flex align-items-center bg-light">
                                <p class="small mb-0">
                                    <a href="#!" data-mdb-toggle="tooltip" title="Due on date">
                                        <i class="fas fa-hourglass-half me-2 text-warning"></i>
                                    </a>
                             {{ $task->deadline ?? 'no deadline' }}
                                </p>
                            </div>
                        </li>
                        <li class="list-group-item ps-3 pe-0 py-1 rounded-0 border-0 bg-transparent">
                            <div class="d-flex flex-row justify-content-end mb-1">
                                <a href="/edit/{{$task->id}}" class="text-info" data-mdb-toggle="tooltip" title="Edit todo"><i
                                        class="fas fa-pencil-alt me-3"></i></a>

                                <a href="/delete/{{$task->id}}" class="text-danger" data-mdb-toggle="tooltip" title="Delete todo"><i
                                        class="fas fa-trash-alt"></i></a>
                            </div>
                            <div class="text-end text-muted">
                                <a href="" class="text-muted" data-mdb-toggle="tooltip" title="Created date">
                                    <p class="small mb-0"><i class="fas fa-info-circle me-2"></i>{{ $task->created_at }}</p>
                                </a>
                            </div>
                        </li>

                        <li><input type="hidden" value="{{ $task->status }}"  name="status" class="{{$task->id}}"> </li>
                    </ul>

                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
</section>
<!-- MDB -->
<style>
#list1 .form-control {
    border-color: transparent;
}
#list1 .form-control:focus {
    border-color: transparent;
    box-shadow: none;
}
#list1 .select-input.form-control[readonly]:not([disabled]) {
    background-color: #fbfbfb;
}
.checked{
    /*background: #888;*/
    /*color: #fff;*/
    text-decoration: line-through;
}
.notChecked{
    text-decoration: none;
}


</style>


        <script>
        $(document).ready(function () {

            $('input[name=isDone]').change(function() {
                if ($(this).is(':checked')  ) {
                    updateList(this.value,true)
                }
                else {updateList(this.value,false)}
            });

            //



            function updateList(task_id,isChecked){
                if(isChecked){
                    document.getElementById(task_id).classList.add('checked');
                    document.getElementsByClassName(task_id)[0].value="isDone";
                }
                else {
                    document.getElementById(task_id).classList.remove('checked');
                    document.getElementsByClassName(task_id)[0].value="inProgress";
                }
            }





            });

            //




        </script>
