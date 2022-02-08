@extends('layout')

@section('main-content')
<div>
    <div class="float-start">
         <h4 class="pb-3">My Tasks For Today</h4>
    </div>
    <div class="float-end">
         <a href="{{ route('task.create') }}" class="btn btn-success">
             Create Task
         </a>
    </div>
    <div class="clearfix"></div>
</div>


@foreach ($tasks as $task)
<div class="card">
            <div class="card-header">
                @if($task->status === "Todo")
                {{$task->title}}
                @else
                <del>{{$task->title}}</del>
                @endif

                <span class="badge rounded-pill bg-warning text-dark">
                    {{ $task->created_at->diffForHumans() }}
                </span>
            </div>
            <div class="card-body">
                <div class="card-text">
                <div class="float-start">
                    {{ $task->description }}
                <br>
                @if($task->status === "Todo")
                <span class="badge rounded-pill bg-info">Todo</span>
                @else
                <span class="badge rounded-pill bg-success">Done</span>
                @endif

                <small>Last Updated - {{ $task->updated_at->diffForHumans() }}</small>
            </div>
            <div class="float-end">
                    <a href="{{ route('task.edit', $task->id) }}" class="btn btn-warning">
                        Edit Task
                    </a>
                    <form action="{{ route('task.destroy', $task->id) }}" style="display: inline" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            Delete Task
                        </button>
                    </form>
                    
            </div>
            <div class="clearfix"></div>
                
            </div>
        </div>
</div>
@endforeach

        
@endsection