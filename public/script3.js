  $(function(){
    $("#search_SC").change(function(){
        if ($(this).val() == "หน้าร้าน") {   //  ถ้าค่าใน searchbox ยาวกว่า 3 
          
            
           $.post("search_forWH.php",{search_SC:$(this).val()},function($CodeList){   ///  ส่งค่าไปที่  search_forID.php แบบ post  ตัวแปร key เก็บค่า searchbox
             
                $('#resultUnit').html($CodeList);    // เอาค่าที่ส่งกลับมา แสดงที่ element ที่มี id = resultDiv
               document.getElementById('<option></option>').value = $CodeList;
               
             })  
         }else{
           
              return false;   // ถ้าค่าใน searchbox น้อยกว่า 3  ไม่ต้องทำไร

        }
   })
  });
  $(function(){
    $("#search_SC").change(function(){
        if ($(this).val() == "หลังร้าน") {   //  ถ้าค่าใน searchbox ยาวกว่า 3 
          
            
            $.post("search_forWH2.php",{search_SC:$(this).val()},function($CodeList){   ///  ส่งค่าไปที่  search_forID.php แบบ post  ตัวแปร key เก็บค่า searchbox
              
                 $('#resultUnit').html($CodeList);    // เอาค่าที่ส่งกลับมา แสดงที่ element ที่มี id = resultDiv
                document.getElementById('<option></option>').value = $CodeList;
                
              })  
              
          }else{
           
              return false;   // ถ้าค่าใน searchbox น้อยกว่า 3  ไม่ต้องทำไร

        }
   })
  });
