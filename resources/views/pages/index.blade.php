@extends('layouts.master')

@section('content')
    <section class="menu_left">
        <div class="menu_left_create">
            <a href="">
                <span><i class="fas fa-plus"></i></span>Create New
            </a>
        </div>
        <div class="menu_left_all">
            <ul class="menu_left_all_list">
                <li>
                    <a href="">
                        <span><i class="fas fa-sticky-note"></i></span>All Notes <span id="qty">10</span>
                    </a>
                </li>
                <li>
                    <p>
                        <span><i class="fas fa-tags"></i></span>Category 
                    </p>
                    <ul class="menu_left_all_list_sub">
                        <li tabindex="1">
                            <a href="">
                                <span><i class="fas fa-tag"></i></span>
                                Category 1
                                <span id="qty">10</span>
                            </a>
                        </li>
                        <li tabindex="2">
                            <a href="">
                                <span><i class="fas fa-tag"></i></span>
                                Category 2
                                <span id="qty">10</span>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <span><i class="fas fa-tag"></i></span>
                                Category 3
                                <span id="qty">10</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="">
                        <span><i class="fas fa-paperclip"></i></span>Clip <span id="qty">10</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="menu_left_bottom">
            <a href="">
                <img src="images/trash-solid.png" alt=""> Delete
            </a>
        </div>
    </section>
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
                <div class="list_todo_boxList_task_item active">
                    <div class="list_todo_boxList_task_item_content clip ">
                        <a href="">
                            <h4>Memo Title</h4>
                            <p><span id="icon"><i class="far fa-clock"></i></span>2020/01/27 <span id="icon"><i class="fas fa-tag"></i></span>Category 01</p>
                        </a>
                    </div>
                </div>
                <div class="list_todo_boxList_task_item">
                    <div class="list_todo_boxList_task_item_content">
                        <a href="">
                            <h4>Memo Title</h4>
                            <p><span id="icon"><i class="far fa-clock"></i></span>2020/01/27 <span id="icon"><i class="fas fa-tag"></i></span>Category 01</p>
                        </a>
                    </div>
                </div>
                <div class="list_todo_boxList_task_item">
                    <div class="list_todo_boxList_task_item_content ">
                        <a href="">
                            <h4>Memo Title</h4>
                            <p><span id="icon"><i class="far fa-clock"></i></span>2020/01/27 <span id="icon"><i class="fas fa-tag"></i></span>Category 01</p>
                        </a>
                    </div>
                </div>
                <div class="list_todo_boxList_task_item">
                    <div class="list_todo_boxList_task_item_content ">
                        <a href="">
                            <h4>Memo Title</h4>
                            <p><span id="icon"><i class="far fa-clock"></i></span>2020/01/27 <span id="icon"><i class="fas fa-tag"></i></span>Category 01</p>
                        </a>
                    </div>
                </div>
                <div class="list_todo_boxList_task_item">
                    <div class="list_todo_boxList_task_item_content ">
                        <a href="">
                            <h4>Memo Title</h4>
                            <p><span id="icon"><i class="far fa-clock"></i></span>2020/01/27 <span id="icon"><i class="fas fa-tag"></i></span>Category 01</p>
                        </a>
                    </div>
                </div>
                <div class="list_todo_boxList_task_item">
                    <div class="list_todo_boxList_task_item_content ">
                        <a href="">
                            <h4>Memo Title</h4>
                            <p><span id="icon"><i class="far fa-clock"></i></span>2020/01/27 <span id="icon"><i class="fas fa-tag"></i></span>Category 01</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="detail_todo">
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
                    <p><span id="icon"><i class="far fa-clock"></i></span>2020/01/27 <span id="icon"><i class="fas fa-tag"></i></span>Category 01</p>
                </div>
                <div class="detail_todo_content_title_text">
                    <h2>Hello Wolrd !</h2>
                </div>
                
            </div>
            <div class="detail_todo_content_text">
                <p>
                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,
                </p>
            </div>
        </div>
    </section>
@endsection