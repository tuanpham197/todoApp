<section class="detail_todo" id="task-detail">
    @isset($task)
    <div class="detail_todo_option">
        <div class="detail_todo_option_left">
            <a href="{{route('get.update',$task->id)}}">
                <img src="images/pen-solid.png" alt=""><span class="hidd">Edit</span> 
            </a>
            <a href="#" id="saveBtn" data-id="{{$task->id}}">
                <img src="images/save-solid.png" alt=""><span class="hidd">Save</span> 
            </a>
            <a href="#" id="clipDetail" data-id="{{$task->id}}" onclick="clipAdd(this)">
                <img src="images/paperclip-solid.png" alt=""><span class="hidd">Clip</span>
            </a>
        </div>
        <div class="detail_todo_option_right">
            <a href="user/tasks/delete/{{$task->id}}" onclick="deleteBtn(this)" data-id="{{$task->id}}">
                <img src="images/trash-solid.png" alt=""><span class="hidd">Delete</span> 
            </a>
        </div>
    </div>
    <div class="detail_todo_content">
            <div class="message">
                @isset($message)
                    <div class="alert">
                        {{$message}}
                    </div>
                @endisset
            </div>
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
    @endisset

    <script>
        var save = document.getElementById('saveBtn');
        save.addEventListener('click',function(){
            event.preventDefault();
            console.log("asd");
            
        })
    </script>
</section>