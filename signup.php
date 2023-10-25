

<div id="modal-signup" class="modal fade" role="dialog">
    <div class="modal-dialog">
    
    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <h1>Form đăng ký</h1>
            <div id="div-error" class="alert alert-danger" style="display: none;">
                
            </div>
        </div>
        <div class="modal-body">
    <form id="form-signup" method="post">
        
        Tên:
        <input type="text" name='name'  id="name" >
        <span id="name_error"></span>
        <br>
        Email:
        <input type="text" name="email" id="email">
        <span id="email_error"></span>
        <br>
        Mật khẩu:
        <input type="password" name="password" id="password">
        <span id="password_error"></span>
        <br>
        Sđt:
        <input type="text" name="phone_number" id="phone_number">
        <span id="phone_number_error"></span>
        <br>
        Địa chỉ
        <input type="text" name="address" id="address">
        <span id="address_error"></span>
        <br>
 
        <button class="btn btn-default">Đăng kí</button>
        
        
    </form>
    </div>
    <div class="modal-footer">
          <button id="click" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
    </div>
    </div>
</div>
<script src="demo.js"></script> 
<script>
    $(document).ready(function(){
        $("#form-signup").validate({
		onfocusout: false,
		onkeyup: false,
		onclick: false,
		rules: {
			"name": {
				required: true,
				maxlength: 15
			},
			"password": {
				required: true,
				minlength: 3 
			},
		},
        messages: {
			"name": {
				required: "Bắt buộc nhập username",
				maxlength: "Hãy nhập tối đa 15 ký tự"
			},
			"password": {
				required: "Bắt buộc nhập password",
				minlength: "Hãy nhập ít nhất 8 ký tự"
			},
		},
        submitHandler: function () {
			$.ajax({
                type: "post",
                url: "process_signup.php",
                data: $("#form-signup").serializeArray(),
                dataType: "html",
                success: function (response) {
                    if(response != "1"){
                        $("#div-error").text(response);
                        $("#div-error").show();
                    }
                    else{
                        $("#modal-signup").modal('toggle');
                        // $("#click").click();
                        $(".menu-user").show();
                        $(".menu-guest").hide();
                        $("#span-name").text($("input[name='name']").val());
                    }
                }
            });
		}

	});
     
    })
</script>
