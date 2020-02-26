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
        @isset($task)
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
        @endisset
       
    </div>
</section>