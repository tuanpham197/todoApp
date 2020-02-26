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