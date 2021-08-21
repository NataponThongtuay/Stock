
  // ค้นหาสินค้า
  $(function(){
    $("#search_Code").keyup(function(){
      if($(this).val().length>10 || $(this).val().length>3)     //  ถ้าค่าใน searchbox ยาวกว่า 3 
          {

           $.post("search_forID.php",{search_Code:$(this).val()},function($CodeList){   ///  ส่งค่าไปที่  search_forID.php แบบ post  ตัวแปร key เก็บค่า searchbox
             
                $('#resultDiv').html($CodeList);    // เอาค่าที่ส่งกลับมา แสดงที่ element ที่มี id = resultDiv
               document.getElementById('resultDiv').value = $CodeList;
               
             })  
         }else{
           
              return false;   // ถ้าค่าใน searchbox น้อยกว่า 3  ไม่ต้องทำไร

        }
   })
  });
  $(function(){
    $("#search_Code").keyup(function(){
      if($(this).val().length>10 || $(this).val().length>3)     //  ถ้าค่าใน searchbox ยาวกว่า 3 
          {

           $.post("search_forUnit.php",{search_Code:$(this).val()},function($CodeList){   ///  ส่งค่าไปที่  search_forID.php แบบ post  ตัวแปร key เก็บค่า searchbox
                $('#resultUnit').html($CodeList);    // เอาค่าที่ส่งกลับมา แสดงที่ element ที่มี id = resultDiv
               document.getElementById('<option></option>').value = $CodeList;
               
             })  
         }else{
           
              return false;   // ถ้าค่าใน searchbox น้อยกว่า 3  ไม่ต้องทำไร

        }
   })
  });
  $(function(){
    $("#search_Code").keyup(function(){
      if($("#search_Code").val().length>10 || $("#search_Code").val().length>3)     //  ถ้าค่าใน searchbox ยาวกว่า 3 
          {
              
           $.post("search_forQty.php",
           {
             search_Code:$("#search_Code").val(),
             search_RO:$("#search_RO").val()
            },
               function($CodeList){   ///  ส่งค่าไปที่  search_forID.php แบบ post  ตัวแปร key เก็บค่า searchbox
                $('#resultQty').html($CodeList);    // เอาค่าที่ส่งกลับมา แสดงที่ element ที่มี id = resultDiv
               document.getElementById('resultQty').value = $CodeList;
               
             })  
             
         }else{
           
              return false;   // ถ้าค่าใน searchbox น้อยกว่า 3  ไม่ต้องทำไร

        }
   })
  });
    function myFunction() {
    var x = document.getElementById("show");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

function myConfirm() {
  confirm("ต้องการบันทึกการตรวจนับทั้งหมดหรือไม่?");
  window.location.href="Stock.php";
}


  $(".hBack").on("click", function(e){
    e.preventDefault();
    window.history.back();
});

// function NewJOB() {
//   confirm("คุณต้องการเริ่มงานใหม่ใช่หรือไม่?");
//   window.location.href="JOB_selection.php";
// }
// function ConJOB() {
//   confirm("คุณต้องการทำงานต่อจากเดิมใช่หรือไม่?");
//   window.location.href="Stock.php";
// }