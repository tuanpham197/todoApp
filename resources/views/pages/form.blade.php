<section class="add__task">
    <div class="add__task__header">
        <h2>Add Task</h2>
    </div>
    <div class="add__task__content">
        <form action="" method="post" >
            @csrf
            <div class="form-group">
                <label for="">Title</label>
                <input type="text" name="title">
            </div>
            <div class="form-group">
                <label for="">Content</label>
                <textarea name="content" id="" cols="30" rows="10"></textarea>
            </div>
            <div class="form-group">
                <label for="">Category</label>
                <input type="text" id="exist-values" class="tagged form-control" data-removeBtn="true" name="tag-2" value="PC,Play Station 4,X-BOX One" placeholder="Add Platform">
                <div id="recommend-tag">
                    <ul>
                        
                    </ul>
                </div>
                <button id="destroy">destroy</button>
                <button id="add">add tags</button>
                <button id="addArr">add tags array</button>
                <button id="clear">clear tags</button>
                <button id="get">get taggs</button>
            </div>
            <div class="form-group">
                <input type="submit" value="Add" >
            </div>
        </form>
    </div>
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
    $("form").submit(function(e){
        e.preventDefault();
        
        
    });
</script>