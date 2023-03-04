
<title> Edit Task </title>
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


<div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <h3 style="color: cornflowerblue"> Edit a task</h3>
        <form action="/update/{{$task->id}}" enctype="multipart/form-data" method="post">

            @method('PATCH')
            <div class="form-group row">
                @csrf
                <label class="col-form-label text-md-end"> Task description</label>
                <textarea class="form-control"  name="description"> </textarea>
            </div>

            <div class="form-group row" >
            <label style="color: midnightblue" class="col-form-label text-md-end"> Priority: </label>
            <select class="form-control" name="priority" style="background-color: cornflowerblue;">
                <option value="high">High </option>
                <option value="mid">Mid </option>
                <option value="low">Low </option>
            </select>
            </div>

            <div style="margin-bottom: 2px" class="col-form-label text-md-end">
                <label style="color:midnightblue "> Deadline</label>
                <input type="date" name="deadline">
            </div>

            <button type="submit" style="background-color: cornflowerblue;margin: auto" > save Task</button>
        </form>
    </div>
</div>


<style>
    .container{
        max-width: 600px;
        margin: auto;
    }

</style>
