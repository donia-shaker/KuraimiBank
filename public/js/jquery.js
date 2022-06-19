$(document).ready(function () {
    fetchData();
    function fetchData(){
        $.ajax({
            type: "GET",
            url: "/fetchCategory",
            dataType: "json",
            success: function(response){
                $('tbody').html("");
                var i = 0;
                $.each(response.categories, function(key,item){
                    // console.log(item.id);
                    i++;
                    $('tbody').append('<tr>\
                    <td>'+ i +'</td>\
                    <td> <i></i> '+ item.name.ar +'</td>\
                    <td> <i></i> '+ item.name.en +'</td>\
                    <td> <a href="subCategory/'+ item.id+'" style="color:#03c3ec99">  انقر لعرض الخدمات الفرعيه</a></td>\
                    <td><span class="badge bg-label-success me-1">'+item.is_active  +'</span></td>\
                    <td>\
                          <a class="btn btn-icon btn-outline-success  editCategory" value= "'+ item.id +'" href="javascript:void(0);"><i class=" bx bx-edit-alt me-2"></i> </a>\
                          <a class="btn btn-icon btn-outline-dribbble mx-2 activeCategoryLink" value= "'+ item.id +'"  href="javascript:void(0);"><i class=" bx bx-trash me-2"></i></a>\
                    </td>\
                  </tr>')

                })
            }
        })
    }

    $(document).on('click','.activeCategoryLink',function (e) {
        e.preventDefault();
        var categoryId = $(this).attr("value");
        console.log(categoryId);

        $('#deletcategoryId').val(categoryId);
        $('#activeCategoryModal').modal('show');
    });

        $(document).on('click','.activeCategory',function (e) {
            e.preventDefault();
             var categoryId = $('#deletcategoryId').val();


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var categoryId = $('#deletcategoryId').val();

            $.ajax({
                method: 'POST',
                url:'deletCategory/'+ categoryId,
                success: function(response){
                    console.log(response);
                    $('#message').html("");
                    $('#message').addClass('alert alert-success');
                    $('#message').text(response.message);
                    $('#activeCategoryModal').modal('hide');
                    fetchData();
                }
            });
        })

    $(document).on('click','.editCategory',function (e) {
        e.preventDefault();
        var categoryId = $(this).attr("value");
        // console.log(categoryId);

        $('#editCategoryModal').modal('show');

        $.ajax({
            method: 'GET',
            url:'editCategory/'+categoryId,
            success: function(response){
                // console.log(response.category.name.en);
                if(response.status == 400){
                    $('#message').html("");
                    $('#message').addClass('alert alert-danger');
                    $('#message').text(response.message);
                    // })
                } else{
                    $('#editCategoryId').val(categoryId);
                    $('#editNameEn').val(response.category.name.en);
                    $('#editNameAr').val(response.category.name.ar);
                    $('#editActive').val(response.category.active);
                }
    
            }
    
        });
    })

    $(document).on('click','.updateCategory',function (e) {
        e.preventDefault();
        var categoryId = $('#editCategoryId').val();
        var data ={
            'nameEn' : $('#editNameEn').val(),
            'nameAr' : $('#editNameAr').val(),
            'active' : $('#editActive').val(),
        }
        // console.log( $(this).serialize());
        // console.log( data);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method: 'PUT',
            url: 'updateCategory/'+categoryId,
            data: data,
            dataType: "json",
            success: function(response){
                // console.log(response);
                if(response.status == 400){
                    // $('#updateCategory').html("");
                    // $('#updateCategory').addClass("alert alert-danger");
                    $.each(response.errors, function(key,errorValue){
                        var input = '#updateCategory input[name=' + key + ']';
                        $(input + '+span').text(errorValue);
                        })
                    // console.log('hello');
                    }else if(response.status == 404){
                    $('#updateCategory').html("");
                    $('#message').html("");
                    $('#message').addClass('alert alert-danger');
                    $('#message').text(response.message);

                    }else{
                    $('#message').html("");
                    $('#message').addClass('alert alert-success');
                    $('#message').text(response.message);
                    $('#editCategoryModal').modal('hide');
                    fetchData();
                }
    
            }
    
        });

    })


    $('#addCategoryForm').on('submit',function (e) {
        e.preventDefault();
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // var data = new FormData(this);
        // console.log(data);
        $.ajax({
            method: $(this).attr('method'),
            url: $(this).attr('action'),
            data: $(this).serialize(),
            dataType: "json",
            success: function(response){
                // console.log(response);
                if(response.status == 400){
                    $.each(response.errors, function(key,errorValue){
                        var input = '#addCategoryForm input.'+ key +'';
                        $(input + '+span').text(errorValue);
                    })
                }else{
                    $('#message').html("");
                    $('#message').addClass('alert alert-success');
                    $('#message').text(response.message);
                    $('#categoryModal').modal('hide');
                    $('#categoryModal').find('input').val("");
                    fetchData();
                }
    
            }
    
        });

    });

    
});