jQuery(document).ready(function(){
    
    jQuery(".save").click(function(){
  
      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
  
      var name = jQuery(".name").val();
      var des = jQuery(".des").val();
      var code = jQuery(".code").val();
      var status = jQuery(".status").val();
  
      $.ajax({
        url:"/addcategory",
        type:"POST",
        data:{
          "name":name,
          "des":des,
          "code":code,
          "status":status
        },
        success:function(response){
          if(response.status == "200"){
            alert("Data Saved");
            show();
          }
          else{
            alert("Data Not Saved");
          }
        }
      })
  
    });
    show();
    function show(){
      $.ajax({
        url:"/showcategory",
        type:"GET",
        success:function(response){
          if(response.status == "200"){
              var tdata="";
              var sl=1;
              $.each(response.data, function(key, value){
                tdata +='<tr>\
                  <td>'+sl+'</td>\
                  <td>'+value.name+'</td>\
                  <td>'+value.des+'</td>\
                  <td>'+value.code+'</td>\
                  <td>'+value.status+'</td>\
                </tr>';
                sl++;
              });
              jQuery(".tdata").html(tdata);
          }
        }
      }) 
    }
    })