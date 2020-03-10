<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todo List</title>
    <base href="{{url('public/')}}" />
    <link rel="stylesheet" href="fontawesome/css/fontawesome.css">
    <link rel="stylesheet" href="fontawesome/css/solid.css">
    <link rel="stylesheet" href="fontawesome/css/brands.css">
    <link rel="stylesheet" href="fontawesome/css/regular.css">
    <link rel="stylesheet" href="css/main.css?t=<?php echo time()*1000 ?>">
    <style>
        /* Scrollbar Styling */
        ::-webkit-scrollbar {
            width: 5px;
        }
        
        ::-webkit-scrollbar-track {
            background-color: #ebebeb;
            -webkit-border-radius: 10px;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb {
            -webkit-border-radius: 10px;
            border-radius: 10px;
            background: #6d6d6d; 
        }
    </style>
    <script src="js/jquery-3.4.1.min.js"></script>         
    <script>
        function validateForm(){
            var x = document.getElementById("namecate").value;
            var err = document.getElementsByClassName('err');
            if(x== ""){
                err[0].innerHTML = "Name is required";
                return false;
            }
        }
    </script>
</head>
<body>
    <div id="wrapper">
        @yield('content')

        <!-- Modal  -->
        <div class="modal">
            <div class="modal__body">
                <div class="modal__body__header">
                    <h5>Add Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal__body__content">
                    <form action="{{route('addCategory')}}" method="post" onsubmit="return validateForm()">
                        @csrf
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" value="" id="namecate">
                            <div class="err">

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Slug</label>
                            <input type="text" name="slug" value="" id="slugcate">
                        </div>
                        <div class="form-group">
                            <button type="submit" >Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Delete -->
        <div class="modal-delete">
            <div class="modal-delete__body">
                <div class="modal-delete__body__header">
                    <h5>Confirm</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-delete__body__content">
                    <h5>Are you sure to want to delete ?</h5>
                    <div class="modal-delete__body__content__btn">
                        
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script>
        function splitStr(arr)
        {
            var str = "";
            for(var i=0;i<arr.length;i++){
                if(i>=3)
                {
                    break;
                }     
                str += arr[i].name +",";
            }
            return str.substring(0, str.length - 1);
        }
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
        function clipAdd(a)
        {
            event.preventDefault();
            var clip = document.getElementById('clipDetail');
 
            var id = a.getAttribute('data-id');
            
            $.ajax({
                type: 'POST',
                url : '/user/tasks/clip',
                data: {
                        "_token": "{{ csrf_token() }}",
                        "key" : id
                    },
                success:function(data){
                    
                    var tgId = 'task-'+id;
                    var tag = document.getElementById(tgId);
                    
                    if(data.clip===1){
                        tag.children[0].classList.add('clip');
                    }
                    else{
                        tag.children[0].classList.remove('clip');
                    }
                }
            });
        }
        function hiddenModal()
        {
            var modal = document.getElementsByClassName('modal-delete');    
            modal[0].classList.remove('ind');


            modal[0].style.opacity = 0;
            
        }
        function cancelBtn()
        {
            hiddenModal(); 
        }
        function modalConfirm(e,url,name,content)
        {
            // handle show div when click
            var modal = document.getElementsByClassName('modal-delete');

            modal[0].children[0].children[1].children[0].innerHTML = content;
            modal[0].style.opacity = 1;
            modal[0].classList.add('ind');
            

            // handle append html tag a
            var id = e.getAttribute('data-id');
            var tag = document.getElementsByClassName('modal-delete__body__content__btn');
            tag[0].innerHTML = '';
            var str = `<a href="user/${url}/${id}">${name}</a>
                        <button onclick="cancelBtn(this)" >Cancel</button>`;
            tag[0].innerHTML = str;
        }
        // handle btn delete
        function deleteBtn(e)
        {
            event.preventDefault();

            modalConfirm(e,'tasks/delete','Delete','Are you sure to want to delete ?');
            
        }
    </script>
    <script>
        var t = document.getElementById('close');
        t.addEventListener('click',function(){
            hiddenModal();    
        })
        function handleDetail()
        {
            $(document).ready(function(){
                var arrElement = document.getElementsByClassName('taskClick');
                
                for (i = 0; i < arrElement.length; i++) {           
                    arrElement[i].addEventListener("click", function() {
                        // console.log(this.parentElement);
                        // this.parentElement.
                        var id = $(this).attr("data-id");
                        $.ajax({
                            type:'GET',
                            url:'user/task/'+id,
                            success:function(data) { 
                            
                                
                                var date =  data.created_at.split(' ');
                                <?php $message = "" ?>
                                var str = `
                                    <div class="detail_todo_option">
                                        <div class="detail_todo_option_left">
                                            <a href="user/tasks/update/${data.id}">
                                                <img src="images/pen-solid.png" alt=""><span class="hidd">Edit</span> 
                                            </a>
                                            <a href="">
                                                <img src="images/save-solid.png" alt=""><span class="hidd">Save</span> 
                                            </a>
                                            <a href="#" id="clipDetail" data-id=${data.id} onclick="clipAdd(this)">
                                                <img src="images/paperclip-solid.png" alt=""><span class="hidd">Clip</span>
                                            </a>
                                        </div>
                                        <div class="detail_todo_option_right">
                                            <a href="user/tasks/delete/${data.id}" onclick="deleteBtn(this)" data-id="${data.id}">
                                                <img src="images/trash-solid.png" alt=""><span class="hidd">Delete</span> 
                                            </a>
                                        </div>
                                    </div>
                                    <div class="detail_todo_content">
                                        <div class="message">
                                            @isset($message)
                                                {{$message}}
                                            @endisset
                                        </div>
                                        <div class="detail_todo_content_title">
                                            <div class="detail_todo_content_title_info">
                                                <p><span id="icon"><i class="far fa-clock"></i></span> ${date[0]}<span id="icon"><i class="fas fa-tag"></i></span>${splitStr(data.category)}</p>
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
            });
        }
       handleDetail();
    </script>
    <script>
        function charConvert(str) {
            str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, "a");
            str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g, "e");
            str = str.replace(/ì|í|ị|ỉ|ĩ/g, "i");
            str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g, "o");
            str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g, "u");
            str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g, "y");
            str = str.replace(/đ/g, "d");
            str = str.replace(/À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ/g, "A");
            str = str.replace(/È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ/g, "E");
            str = str.replace(/Ì|Í|Ị|Ỉ|Ĩ/g, "I");
            str = str.replace(/Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ/g, "O");
            str = str.replace(/Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ/g, "U");
            str = str.replace(/Ỳ|Ý|Ỵ|Ỷ|Ỹ/g, "Y");
            str = str.replace(/Đ/g, "D");
            return str;
        }
        var input = document.getElementById('namecate');
        var slug  = document.getElementById('slugcate');
        input.oninput = function() {
            var text = input.value;
            text = charConvert(text);
            text = text.toLowerCase().replace(/ /g, '-');        
            slug.value = text;
        };
        
        
    var search = document.getElementById('search');
    search.oninput = function(){
        var key = search.value;
        $.ajax({
            type : "POST",
            url : "user/tasks/search",
            data: {
                "_token": "{{ csrf_token() }}",
                "key" : key
            },
            success : function(data){
                var str = "";
                var i=0;
                data.forEach(element => {
                    var date = element.created_at.split(' ');
                    str = str + `
                    <div class="list_todo_boxList_task_item" id="task-${element.id}">
                        <div class="list_todo_boxList_task_item_content ${element.clip === 1 ? "clip" : ""} ">
                            <div class="taskClick" data-id="${element.id}">
                                <h4>${element.title}</h4>
                                <p><span id="icon"><i class="far fa-clock"></i></span>${date[0]} <span id="icon"><i class="fas fa-tag"></i></span>${splitStr(element.category)}</p>
                            </div>
                        </div>
                    </div>
                    `;    
                });

                var box = document.getElementsByClassName('list_todo_boxList_task');
                box[0].innerHTML = str;
                handleDetail();
            }
        });
    }
    <?php 
        echo "var arr  = ".$arrTask.";";
    ?>

    
    function compareStr(a, b) {
        // Use toUpperCase() to ignore character casing
        const bandA = a.title.toUpperCase();
        const bandB = b.title.toUpperCase();

        let comparison = 0;
        if (bandA > bandB) {
            comparison = 1;
        } else if (bandA < bandB) {
            comparison = -1;
        }
        return comparison;
    }
    function sortDateTang()
    {
        const sortedActivities = arr.sort((a, b) => {
            if((new Date(a.created_at)).getTime() - (new Date(b.created_at)).getTime() > 1)
                return -1;
            else
                return 1;
        });
        var str = "";
                var i=0;
                sortedActivities.forEach(element => {
                    var date = element.created_at.split(' ');
                    str = str + `
                    <div class="list_todo_boxList_task_item" id="task-${element.id}">
                        <div class="list_todo_boxList_task_item_content ${element.clip === 1 ? "clip" : ""} ">
                            <div class="taskClick" data-id="${element.id}">
                                <h4>${element.title}</h4>
                                <p><span id="icon"><i class="far fa-clock"></i></span>${date[0]} <span id="icon"><i class="fas fa-tag"></i></span>${splitStr(element.category)}</p>
                            </div>
                        </div>
                    </div>
                    `;    
                });

                var box = document.getElementsByClassName('list_todo_boxList_task');
                box[0].innerHTML = str;
                handleDetail();

        
    }
    function sortDateGiam()
    {
        const sortedActivities = arr.sort((a, b) => {
            if((new Date(a.created_at)).getTime() - (new Date(b.created_at)).getTime() < 1)
                return -1;
            else
                return 1;
        });
        var str = "";
        var i=0;
        sortedActivities.forEach(element => {
            var date = element.created_at.split(' ');
            str = str + `
            <div class="list_todo_boxList_task_item" id="task-${element.id}">
                <div class="list_todo_boxList_task_item_content ${element.clip === 1 ? "clip" : ""} ">
                    <div class="taskClick" data-id="${element.id}">
                        <h4>${element.title}</h4>
                        <p><span id="icon"><i class="far fa-clock"></i></span>${date[0]} <span id="icon"><i class="fas fa-tag"></i></span>${splitStr(element.category)}</p>
                    </div>
                </div>
            </div>
            `;    
        });

        var box = document.getElementsByClassName('list_todo_boxList_task');
        box[0].innerHTML = str;
        handleDetail();
        
    }
    function sortTitle()
    {
        arr.sort(compareStr);
        var str = "";
        var i=0;
        arr.forEach(element => {
            var date = element.created_at.split(' ');
            str = str + `
            <div class="list_todo_boxList_task_item" id="task-${element.id}">
                <div class="list_todo_boxList_task_item_content ${element.clip === 1 ? "clip" : ""} ">
                    <div class="taskClick" data-id="${element.id}">
                        <h4>${element.title}</h4>
                        <p><span id="icon"><i class="far fa-clock"></i></span>${date[0]} <span id="icon"><i class="fas fa-tag"></i></span>${splitStr(element.category)}</p>
                    </div>
                </div>
            </div>
            `;    
        });

        var box = document.getElementsByClassName('list_todo_boxList_task');
        box[0].innerHTML = str;
        handleDetail();
        
    }
    
    $('#sort').on('click',function(){
        if(document.getElementsByClassName('sh').length !== 0)
            this.children[1].classList.remove('sh');
        else    
        this.children[1].classList.add('sh');
    }) 
    </script>

    <script src="js/tag.js"></script>
</body>
</html>