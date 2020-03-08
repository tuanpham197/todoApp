@extends('layouts.master')

@section('content')
    
    @include('layouts.menu')
    <div class="main">
        <section class="list_todo">
            <div class="list_todo_search">
                <form action="" method="post">
                    <input type="text" placeholder="キーワードを入力" id="search"> 
                    <input type="submit" value="">
                </form>
            </div>
            <div class="list_todo_boxList">
                <div class="list_todo_boxList_title">
                    <h4>Title</h4>
                    <span id="sort">
                        <i class="fas fa-sort-amount-up-alt"></i>
                        <div id="tooltip-sort">
                            <ul>
                                <li onclick="sortDateTang()">Sort by date <i class="fas fa-arrow-up"></i></li>
                                <li onclick="sortTitle()">Sort by title</li>
                                <li onclick="sortDateGiam()">Sort by date <i class="fas fa-arrow-down"></i></li>
                            </ul>
                        </div>
                    </span>
                </div>
                @isset($mess)
                    {{$mess}}
                @endisset
                <div class="list_todo_boxList_task">
                    @foreach ($arrTask as $item)
                    <div class="list_todo_boxList_task_item" id="task-{{$item->id}}">
                            <div class="list_todo_boxList_task_item_content">
                                <div class="taskClick action" data-id="{{$item->id}}">
                                    <div class="content">
                                        <h4>{{$item->title}}</h4>
                                        <p><span id="icon"><i class="far fa-clock"></i></span>2020/01/27 <span id="icon"><i class="fas fa-tag"></i></span>{{$item->category[0]->name}}</p>
                                    </div>
                                </div>
                                <div class="btnAction">
                                    <button href="{{route('restore.task',$item->id)}}" id="recy-restore" onclick="restore(this)" data-id="{{$item->id}}">Restore</button>
                                    <button href="{{route('delete.task',$item->id)}}" id="recy-delete" onclick="confirm(this)" data-id="{{$item->id}}">Delete</button>
                                </div>
                            </div>
                        </div>
                    @endforeach 
                </div>
            </div>
        </section>

        @include('pages.detail')
    </div>
   <script>
        function restore(e)
        {
            modalConfirm(e,'restore-task','Restore');
        }   
        function confirm(e)
        {
            console.log(e);
            modalConfirm(e,'delete-task','Delete');
        }
   </script>
@endsection