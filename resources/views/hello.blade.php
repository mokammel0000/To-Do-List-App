<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My To Do List</title>

    <style>
        body {
            font-family: "Open Sans", sans-serif;
            line-height: 1.6;
        }

        .add-todo-input,
        .edit-todo-input {
            outline: none;
        }

        .add-todo-input:focus,
        .edit-todo-input:focus {
            border: none !important;
            box-shadow: none !important;
        }

        .view-opt-label,
        .date-label {
            font-size: 0.8rem;
        }

        .edit-todo-input {
            font-size: 1.7rem !important;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.css')}}">
    {{-- font-awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="container m-5 p-2 rounded mx-auto bg-light shadow">
        <!-- App title section -->
        <a href="localhost:8000">
            <div class="row m-1 p-4">
                <div class="col">
                    <div class="p-1 h1 text-primary text-center mx-auto display-inline-block">
                        <i class="fa fa-check bg-primary text-white rounded p-2"></i>
                        <u>My Todo-s</u>
                    </div>
                </div>
            </div>
        </a>
        
        <!-- Create todo section -->
        <div class="row m-1 p-3">
            <div class="col col-11 mx-auto">

                @if (!$task)
                <form action="{{ url('/save-task') }}" method = "post">
                    @csrf
                    <div class="row bg-white rounded shadow-sm p-2 add-todo-wrapper align-items-center justify-content-center">
                            <div class="col">
                                <input class="form-control form-control-lg border-0 add-todo-input bg-transparent rounded" type="text" placeholder="Add new .." name = "content">
                            </div>
                            <div class="col-auto px-0 mx-0 mr-2">
                                <button type="submit" class="btn btn-primary">Add</button>
                            </div>
                    </div>
                </form>
                @else
                <form action="{{ url('/update-task') }}" method = "post">
                    @csrf
                    <input type="hidden" name="id" value="{{$task->id}}">
                    <div class="row bg-white rounded shadow-sm p-2 add-todo-wrapper align-items-center justify-content-center">
                        <div class="col">
                            <input class="form-control form-control-lg border-0 add-todo-input bg-transparent rounded" type="text" name = "content"  value ="{{$task->content}}">
                        </div>
                        <div class="col-auto px-0 mx-0 mr-2">
                            <button type="submit" class="btn btn-warning">Update</button>
                        </div>
                    </div>
                </form>
                @endif
            </div>
        </div>

        <div class="p-2 mx-4 border-black-25 border-bottom"></div>
        
        <!-- Todo list section -->
        <div class="row mx-1 px-5 pb-3 w-80">
            <div class="col mx-auto">

                @foreach ($tasks as $task)
                <!-- Todo Item 1 -->
                <div class="row px-3 align-items-center todo-item rounded">
                    
                    <div class="col px-1 m-1 d-flex align-items-center">
                        <input type="text" class="form-control form-control-lg border-0 edit-todo-input bg-transparent rounded px-3" 
                            readonly value="{{$task->content}}"/>
                        <span class="col-auto d-flex align-items-center pr-2">
                            <i class="fa fa-info-circle my-2 px-2 text-black-50 btn" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Created date"></i>
                            <label class="date-label my-2 text-black-50">{{$task->created_at}}</label>
                        </span>
                    </div>
                    
                    <div class="col-auto m-1 p-0 px-3 d-none"> </div>

                    <div class="col-auto m-1 p-0 todo-actions  mx-5">
                        <div class="row d-flex align-items-center justify-content-end">
                            <h5 class="m-0 p-0 px-2">
                                {{-- <a href="/delete-task?id = {{$task->id}}" class = "btn btn-danger btn-sm">
                                    <i class="fa fa-trash text-white btn m-0 p-0 t" data-toggle="tooltip" data-placement="bottom" title="Delete todo">
                                    </i>
                                </a> --}}
                                <a href="{{url('/'.$task->id)}}" class = "btn btn-warning btn-sm">
                                    <i class="fa fa-light fa-pen-to-square text-white btn m-0 p-0 t" data-toggle="tooltip" data-placement="bottom" title="Delete todo">
                                    </i>
                                </a>
                                <a href="{{url("/delete-task/{$task->id}")}}" class = "btn btn-danger btn-sm">
                                    <i class="fa fa-trash text-white btn m-0 p-0 t" data-toggle="tooltip" data-placement="bottom" title="Delete todo">
                                    </i>
                                </a>
                            </h5>
                        </div>
                    </div>
                </div>
                @endforeach
                
            </div>
        </div>
    </div>
    <script src="{{asset('assets/js/bootstrap.js')}}"></script>
</body>
</html>