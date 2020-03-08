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
        <form action="" method="post">
            <div class="detail_todo_content_title">
                <div class="detail_todo_content_title_info">
                    <p><span id="icon"><i class="far fa-clock"></i></span>{{date('Y/m/d', strtotime($task->created_at))}} <span id="icon"><i class="fas fa-tag"></i></span>{{isset($task->category[0]->name) ? $task->category[0]->name : "" }}</p>
                </div>
                <div class="detail_todo_content_title_text">
                    <input style="border:none;" type="tel" name="title" id="title" value="{{$task->title}}">
                </div>
                
            </div>
            <div class="detail_todo_content_text">
                <textarea style="width: 100%" name="content" id="content" cols="" rows="10">{{trim($task->content)}}</textarea>
                <div class="form-group">
                    <label for="">Category</label>
                    <input type="text" id="exist-values" class="tagged form-control" data-removeBtn="true" name="tag-2" value="{{$str}}" placeholder="Add Platform">
                    <div id="recommend-tag">
                        <ul>
                            
                        </ul>
                    </div>
                    <button id="destroy" style="display:none">destroy</button>
                </div>
            </div>
        </form>
    </div>
    @endisset
</section>
<script>
    $(document).ready(function(){
        var input = document.getElementById('key');
        var result = document.getElementById('recommend-tag');
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        input.oninput = function() {
            var keyword = input.value;
            
            $.ajax({
                type:'POST',
                url:'/user/category',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "key" : keyword
                },
                success:function(data) { 
                    result.style.display = "block";
                    var str = "";
                    for(var i=0;i<[...data].length;i++){
                        str += `<li class="tagg">${data[i].name}</li>`;
                    }
                    result.children[0].innerHTML = str;
                    var arrTag = [...document.getElementsByClassName('tagg')];
                    for(var j=0;j<arrTag.length;j++){
                        arrTag[j].addEventListener('click',function(){                           
                            tags.addTags(this.innerText);
                            result.style.display = "none";
                        })
                    }
                }
            });
            
        };

    })
</script>
<script>
    var save = document.getElementById('saveBtn');
   
    console.log(save);
    
    save.addEventListener('click',function(e){
        
        e.preventDefault();
        var data = $('form').serializeArray();
        var id = $(this).attr('data-id');

        var x = document.getElementById("exist-values").value;
        
        $.ajax({
            type: 'PUT',
            url : 'user/task/'+id,
            data : data,
            success:function(data){
                console.log(data); 
            }
        })
    });
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    
    
</script>