<section class="list_todo">
    <div class="list_todo_search">
        <form action="" method="post">
            <input type="text" placeholder="キーワードを入力"  id="search">
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
        <div class="list_todo_boxList_task">
            @foreach ($arrTask as $item)
            <div class="list_todo_boxList_task_item" id="task-{{$item->id}}">
                    <div class="list_todo_boxList_task_item_content {{$item->clip ==1 ? "clip" : ""}} ">
                        <div class="taskClick" data-id="{{$item->id}}">
                            <h4>{{$item->title}}</h4>
                            <p><span id="icon"><i class="far fa-clock"></i></span>2020/01/27 <span id="icon"><i class="fas fa-tag"></i>  {{$item->category[0]->name}}</span></p>
                        </div>
                    </div>
                </div>
            @endforeach 
        </div>
    </div>
</section>
