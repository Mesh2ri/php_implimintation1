var delete_by_id;

function DeleteCat(id) {
    delete_by_id = id;
    const modal = new bootstrap.Modal(document.getElementById("deleteModal"));
    modal.show();
}


function confirmDelete() {
    $.ajax({

        url: 'url from the route file (Ex. /deletecategory/id)' + delete_by_id,
        type: 'route type (GET/POST)',
        success:function(){
            alert('تم الحذف بنجاح');
            location.reload();
        },

        error:function(){
            alert('فشل الحذف');
        }


    })
}