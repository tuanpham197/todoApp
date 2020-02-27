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
    <link rel="stylesheet" href="css/main.css">
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
    
    </div>
    <script>
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
    </script>
    <script>
        $(document).ready(function(){
            var arrElement = document.getElementsByClassName('taskClick');
            for (i = 0; i < arrElement.length; i++) {           
                arrElement[i].addEventListener("click", function() {
                    var id = $(this).attr("data-id");
                    $.ajax({
                        type:'GET',
                        url:'user/task/'+id,
                        success:function(data) { 
                            var date =  data.created_at.split(' ');
                            var str = `
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
                                            <p><span id="icon"><i class="far fa-clock"></i></span> ${date[0]}<span id="icon"><i class="fas fa-tag"></i></span>${data.category[0].name}</p>
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
            
        })
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
        
    </script>

    <script src="js/tag.js"></script>
</body>
</html>