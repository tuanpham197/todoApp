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

            </div>
        </div>
    </section>
    <section class="detail_todo">

    </section>
@endsection