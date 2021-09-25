$( document ).ready(function() {
    // $(".buton-login>a").click(()=>{
    //     localStorage.removeItem('user')
    // });
    var heightWed= document.querySelector('main').scrollHeight;
    $(".menu").click(()=>{
        $("nav").toggle(()=>{
            $("nav").css({
                height:heightWed,
                transition: 'ease-in .2s',
                transform: 'translateX(0)',
            })
           
            
        });
        
    })
    var pass ="";
    var re_pass="";
    var pass = $("input[name='password']").change(
        function(){
             pass = $("input[name='password']").val();
            // console.log("🚀 ~ file: javascrip.js ~ line 19 ~ $ ~ pass", pass)
        }
    )
    
    // $("#submitChangeInfor").submit(function( event ) { 
    //     event.preventDefault();
    //   })
    $("#submit_modal_updateInfor").click(function() {
        $("#submitChangeInfor").submit();
        $('#exampleModal').modal('toggle');
      });
      $("#submit_modal_updateEvent").click(function() {
        $("#formUpdateEvent").submit();
        $('#exampleModal').modal('toggle');
      });
    
    $("input[name='re_password']").on('input', function(e) {
         re_pass = $("input[name='re_password']").val();
        if(pass != re_pass ){
            $("#error").text("mật khẩu nhập lại không khớp");
        }
        else{
            $("#error").text("");
        }
        
      });
      $( "#form_change_pass" ).submit(function( event ) {
        if(pass != re_pass ){   
        event.preventDefault();
      
        }
        else{
            alert("đổi mật khẩu thành công");
            // return;
        }

      });
    
  });