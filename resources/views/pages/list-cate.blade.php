<section class="list_todo">
    <div class="list_todo_search">
        <form action="" method="post">
            <input type="text" placeholder="キーワードを入力"  id="search">
            <input type="submit" value="">
        </form>
    </div>
    <div class="list_todo_boxList">
        <div class="list_todo_boxList_title">
            <h4>List Category</h4>
        </div>
        <div class="list_todo_boxList_task">
            @foreach ($arrListCategory as $item)
            <div class="list_todo_boxList_task_item" id="task-{{$item->id}}">
                    <div class="list_todo_boxList_task_item_content">
                        <div class="cateClick" data-id="{{$item->id}}">
                            <h4>{{$item->name}}</h4>
                            <p><span id="icon"><i class="far fa-clock"></i></span><?php $date = explode(" ",$item->created_at); echo $date[0]; ?></p>
                        </div>
                        <div class="options">
                            <button id="update-category" data-id="{{$item->id}}" onclick="updateCate({{$item->id}})"><i class="fas fa-pen"></i></button>
                            <button id="delete-category" data-id="{{$item->id}}" onclick="deleteCate(this)"><i class="fas fa-trash"></i></button>
                        </div>
                    </div>
                </div>
            @endforeach 
        </div>
    </div>
</section>
<!-- Modal update category -->
<div class="modal-update">
    <div class="modal-update__wrapper">
        <div class="modal-update__wrapper__header">
            <h3>Update Category</h3>
        </div>
        <div class="modal-update__wrapper__body">
            <div class="modal-update__wrapper__body__text">
                Infomation category
            </div>
            <div class="modal-update__wrapper__body__content">
                <div id="modal__Error" class="alert">

                </div>
                <form action="" method="post" id="form-update">
                    <input type="hidden" name="idCate" id="idCate">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="tel" name="name" id="nameCate">
                    </div>
                    <div class="form-group">
                        <label for="">Slug</label>
                        <input type="text" name="slug" id="slugCate">
                    </div>
                    <div class="form-group">
                        <button id="ajax-update">Update</button>
                        <button id="close-update">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    <?php echo "var arrCate = ".$arrCategory.";" ?>
    function updateCate(id)
    {
        let ele = document.getElementsByClassName('modal-update');
        ele[0].style.opacity = 1;
        ele[0].classList.add('ind');
        let item = arrCate.find(element => element.id == id);
        document.getElementById("nameCate").value = item.name;
        document.getElementById("slugCate").value = item.slug;
        document.getElementById("idCate").value = id;
    }
    function deleteCate(e)
    {   
        var id = e.getAttribute('data-id');       
        let item = arrCate.find(element => element.id == id);       
        if(item.task_count > 0){
            modalConfirm(e,'category/restore-task','Delete','Carefully !! Are you sure to want to delete category ?');
        }
        else{
            modalConfirm(e,'category/delete','Delete','Are you sure to want to delete category ?');
        }
    }
    /**
    * hanle data update
    * call ajax to controller
    */
    var btnUpdate = document.getElementById('ajax-update');
    btnUpdate.addEventListener('click',function(){
        event.preventDefault();
        let item = $('#form-update').serializeArray();
        
        $.ajax({
            type : "POST",
            url : 'user/category/update/'+item[0].value,
            data : {
                "_token": "{{ csrf_token() }}",
                "key" : item
            },
            success: function(data){
                if(data === "fail"){
                    let ele = document.getElementById('modal__Error');
                    ele.innerHTML = "Update fails, Please check category name";
                }
                else{
                    location.reload();
                }
            }
        })
        
    })


    /*
    * hanlde show form update
    */
    var nameCate = document.getElementById('nameCate');
    var slug2  = document.getElementById('slugCate');
    nameCate.oninput = function() {
        var text = nameCate.value;
        text = charConvert(text);
        text = text.toLowerCase().replace(/ /g, '-');        
        slug2.value = text;      
    };


    /*
    * hanlde button cancle in form
    */
    var btnClose = document.getElementById('close-update');
    btnClose.addEventListener('click',function(){
        event.preventDefault();
        let ele = document.getElementsByClassName('modal-update');
        ele[0].style.opacity = 0;
        ele[0].classList.remove('ind');
        
    })
    // $('#update-category').click(function(){
    //     console.log("day la update");

    //     let id = $(this).attr('data-id');
    //     console.log(id);
        
    // })
    // $('#delete-category').click(function(){
    //     console.log("day la delete");
        
    // })
</script>
