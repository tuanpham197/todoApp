<section class="menu_left">
    <div class="menu_left_create">
        <a href="">
            <span><i class="fas fa-plus"></i></span>Create New
        </a>
    </div>
    <div class="menu_left_all">
        <ul class="menu_left_all_list">
            <li >
                <a href="user/task">
                    <span><i class="fas fa-sticky-note"></i></span>All Notes <span class="qty">10</span>
                </a>
            </li>
            <li class="accordion">
                <p>
                    <span><i class="fas fa-tags"></i></span>Category 
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
                <a href="">
                    <span><i class="fas fa-paperclip"></i></span>Clip <span class="qty">10</span>
                </a>
            </li>
            <li>
                <button id="modal">
                    <span><i class="fas fa-plus"></i></span>
                    Add Category
                </button>
            </li>
        </ul>
    </div>
    <div class="menu_left_bottom">
        <a href="">
            <img src="images/trash-solid.png" alt=""> Delete
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