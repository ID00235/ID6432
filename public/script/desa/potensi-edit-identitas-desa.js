$(function(){

	var $validator = $("#form-edit-identitas-desa").validate({
        ignore:[],
        rules: {
            luas_desa: {required:true},
            garis_bujur: {required:true},
            garis_lintang: {required:true},
            tinggi_dpl: {required:true},
        },
        messages: {
        },
         submitHandler: function(form) {
          form.submit();
        }
    });

})