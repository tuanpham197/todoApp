@extends('layouts.master')

@section('content')
    @include('layouts.menu')
    <section class="list_todo">
        <div class="list_todo_search">
            <form action="" method="post">
                <input type="text" placeholder="キーワードを入力">
                <input type="submit" value="">
            </form>
        </div>
        <div class="list_todo_boxList">
            <div class="list_todo_boxList_title">
                <h4>Title</h4>
                <span><i class="fas fa-sort-amount-up-alt"></i></span>
            </div>
            <div class="list_todo_boxList_task">
                @foreach ($arrTask as $item)
                    <div class="list_todo_boxList_task_item active">
                        <div class="list_todo_boxList_task_item_content clip ">
                            <div class="taskClick" data-id="{{$item->id}}">
                                <h4>{{$item->title}}</h4>
                                <p><span id="icon"><i class="far fa-clock"></i></span>2020/01/27 <span id="icon"><i class="fas fa-tag"></i></span>{{$item->category[0]->name}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach 
            </div>
        </div>
    </section>
    <section class="detail_todo" id="task-detail">
        <div class="detail_todo_option">
            <div class="detail_todo_option_left">
                <a href="">
                    <img src="images/pen-solid.png" alt="">Edit
                </a>
                <a href="">
                    <img src="images/save-solid.png" alt="">Save
                </a>
                <a href="" id="clipDetail">
                    <img src="images/paperclip-solid.png" alt="">Clip
                </a>
            </div>
            <div class="detail_todo_option_right">
                <a href="">
                    <img src="images/trash-solid.png" alt="">Delete
                </a>
            </div>
        </div>
        <div class="detail_todo_content">
            <div class="detail_todo_content_title">
                <div class="detail_todo_content_title_info">
                    <p><span id="icon"><i class="far fa-clock"></i></span>{{date('Y/m/d', strtotime($task->created_at))}} <span id="icon"><i class="fas fa-tag"></i></span>{{$task->category[0]->name}}</p>
                </div>
                <div class="detail_todo_content_title_text">
                    <h2>{{$task->title}}</h2>
                </div>
                
            </div>
            <div class="detail_todo_content_text">
                <p>
                    {{$task->content}}
                </p>
            </div>
        </div>
    </section>

    <script>
        var acc = document.getElementsByClassName("accordion");
        var i;
        
        for (i = 0; i < acc.length; i++) {           
            acc[0].addEventListener("click", function() {
                this.classList.toggle("active");
                var panel = this.children[1];               
                if (panel.style.maxHeight) {
                    panel.style.maxHeight = null;
                } else {
                    panel.style.maxHeight = panel.scrollHeight + "px";
                } 
          });
        }
    </script>
    <script>
        $(document).ready(function(){
            var arrElement = document.getElementsByClassName('taskClick');
            for (i = 0; i < arrElement.length; i++) {           
                arrElement[i].addEventListener("click", function() {
                    var id = $(this).attr("data-id");
                    $.ajax({
                        type:'GET',
                        url:'user/task/'+id,
                        success:function(data) { 
                            var date =  data.created_at.split(' ');
                            var str = `
                                <div class="detail_todo_option">
                                    <div class="detail_todo_option_left">
                                        <a href="">
                                            <img src="images/pen-solid.png" alt="">Edit
                                        </a>
                                        <a href="">
                                            <img src="images/save-solid.png" alt="">Save
                                        </a>
                                        <a href="" id="clipDetail">
                                            <img src="images/paperclip-solid.png" alt="">Clip
                                        </a>
                                    </div>
                                    <div class="detail_todo_option_right">
                                        <a href="">
                                            <img src="images/trash-solid.png" alt="">Delete
                                        </a>
                                    </div>
                                </div>
                                <div class="detail_todo_content">
                                    <div class="detail_todo_content_title">
                                        <div class="detail_todo_content_title_info">
                                            <p><span id="icon"><i class="far fa-clock"></i></span> ${date[0]}<span id="icon"><i class="fas fa-tag"></i></span>${data.category[0].name}</p>
                                        </div>
                                        <div class="detail_todo_content_title_text">
                                            <h2>${data.title}</h2>
                                        </div>
                                        
                                    </div>
                                    <div class="detail_todo_content_text">
                                        <p>
                                            ${data.content}
                                        </p>
                                    </div>
                                </div>
                            `;
                            $('#task-detail').html(str);
                        }
                    });
                });
            }
            
        })
    </script>
@endsection