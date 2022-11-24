


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
  jQuery(document).on("click","#save",function(){
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    var name = jQuery("#name").val();
    var des = jQuery("#des").val();
    var code = jQuery("#code").val();
    var status = jQuery("#status").val();

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
          jQuery("#addupdate").modal("hide")
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
              if(value.status==1)
              {
                var status ='<button class="active btn btn-warning btn-sm" value="'+value.id+'">Active</button>';
              }
              else{
                var status ='<button class="inactive btn btn-secondary btn-sm" value="'+value.id+'">Inactive</button>';
              }
              tdata +='<tr>\
                <td>'+sl+'</td>\
                <td>'+value.name+'</td>\
                <td>'+value.des+'</td>\
                <td>'+value.code+'</td>\
                <td>'+status+'</td>\
                <td><button class="delete btn btn-sm btn-danger" value="'+value.id+'">Delete</button>\
                <button class="edit btn btn-sm btn-info" value="'+value.id+'">Edit</button>\
                </td>\
              </tr>';
              sl++;
            });
            jQuery(".tdata").html(tdata);
        }
      }
    }) 
  }
  jQuery(document).on("click",".delete", function(){
    var id =jQuery(this).val();
    jQuery("#delete").modal("show");
    jQuery(".mdelete").val(id);
   });
   jQuery(document).on("click",".mdelete",function(){
    var id = jQuery(this).val();
        $.ajax({
        url:"/deletecategory/"+id,
        type:"GET",
        success:function(response){
          if(response.status =="404"){
            alert("Not Found this data");
          }
          else{
            jQuery("#delete").modal("hide");
            show();
          }
        }
      })
   })

   jQuery(document).on("click",".edit",function(){
      var id = jQuery(this).val();
      jQuery("#addupdate").modal("show")
      $.ajax({
        url:"/editcategory/"+id,
        type:"GET",
        success:function(response){
          if(response.status == "404"){
            alert("data Not Found");
          }
          else if(response.status == "200"){
            jQuery("#name").val(response.data.name);
            jQuery("#des").val(response.data.des);
            jQuery("#code").val(response.data.code);
            jQuery("#status").val(response.data.status);
            jQuery("#update").show();
            jQuery("#save").hide();
            jQuery("#update").val(id);
          }
        }      
      })
   })
   jQuery(document).on("click","#update",function(){
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    var id = jQuery(this).val();
    var name = jQuery("#name").val();
    var des = jQuery("#des").val();
    var code = jQuery("#code").val();
    var status = jQuery("#status").val();
    $.ajax({
      url:"/updatecategory/"+id,
      type:"POST",
      data:{
        "name":name,
        "des":des,
        "code":code,
        "status":status
      },
      success:function(response){
        if(response.status == "200"){
          alert("Data Updated");
          show();
          jQuery("#update").hide();
          jQuery("#save").show();
          jQuery("#addupdate").modal("hide")
        }
      }
    })
   });
   jQuery(document).on("click",".active",function(){
    var id = jQuery(this).val();
    $.ajax({
      url:"/activecategory/"+id,
      type:"GET",
      success:function(response){
        if(response.status == "200"){
          show();
          alert("Inactive Success");
        }
      }
    });
   });
   jQuery(document).on("click",".inactive",function(){
    var id = jQuery(this).val();
    $.ajax({
      url:"/inactivecategory/"+id,
      type:"GET",
      success:function(response){
        if(response.status == "200"){
          show();
          alert("Active Success");
        }
      }
    });
  });
});