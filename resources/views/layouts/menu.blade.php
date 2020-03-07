<section class="menu_left">
    <div class="menu_left_create">
        <a href="{{route('add.task')}}">
            <span><i class="fas fa-plus"></i></span><span class="tag-mobie">Create New</span>
        </a>
    </div>
    <div class="menu_left_all">
        <ul class="menu_left_all_list">
            <li >
                <a href="user/task">
                    <span><i class="fas fa-sticky-note"></i></span><span class="tag-mobie">All Notes</span> <span class="qty">{{$total}}</span>
                </a>
            </li>
            <li class="accordion">
                <p>
                    <span><i class="fas fa-tags"></i></span><span class="tag-mobie">Category</span>
                </p>
                <ul class="menu_left_all_list_sub">
                    @foreach ($arrCategory as $item)
                        <li>
                            <a href="user/category/{{$item->id}}">
                                <span><i class="fas fa-tag"></i></span>
                                {{$item->name}}
                                <span class="qty">{{$item->task_count}}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </li>
            <li>
                <a href="{{route('get.clip')}}">
                    <span><i class="fas fa-paperclip"></i></span><span class="tag-mobie">Clip</span> <span class="qty">{{$count}}</span>
                </a>
            </li>
            <li>
                <button id="modal">
                    <span><i class="fas fa-plus"></i></span>
                    <span class="tag-mobie">Add Category</span>
                </button>
            </li>
        </ul>
    </div>
    <div class="menu_left_bottom">
        <a href="user/tasks/get-task-is-delete">
            <img src="images/trash-solid.png" alt=""> <span class="tag-mobie">Delete</span>
        </a>
    </div>
</section>
<script>
    function getEle(s){
        return document.getElementsByClassName(s);
    }
    var btn = document.getElementById('modal');

    btn.addEventListener('click',function(){
        var modal = getEle('modal');
        modal[0].style.display = "block"; 
        modal[0].classList.add('show');
        var btnClose = document.getElementsByClassName('close');
        var t = [...btnClose];
        t[0].addEventListener('click',function(){
            var modal = getEle('modal');
            modal[0].style.display = "none";
            modal[0].classList.remove('show');
        })
    })
</script>