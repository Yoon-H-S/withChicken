<!DOCTYPE html>
<head>
<meta charset="utf-8">
<style>
h3 {
   padding-left: 5px;
   border-left: solid 5px #2E954E;
}
#close {
   margin:20px 0 0 80px;
   cursor:pointer;
}
button {
    width: 70px;
    height: 30px;
    border: 1px solid #d5d5d5;
    background-color: #fafafa;
    border-radius: 5px;
    color: #333333;
}
</style>
</head>
<body>
<h3>아이디 중복체크</h3>
<p>
<?php
   $id = $_GET["id"];

   if(!$id) 
   {
      echo("<li>아이디를 입력해 주세요.</li>");
   }
   else if (12 < strlen($id) || strlen($id) < 5)
   {
      echo("<li>6~12글자 이내로 작성하세요.</li>");
   }
   else
   {
      $con = mysqli_connect("localhost", "root", "", "shop","3307");

 
      $sql = "select * from members where id='$id'";
      $result = mysqli_query($con, $sql);

      $num_record = mysqli_num_rows($result);

      if ($num_record)
      {
         echo "<li>중복된 아이디입니다.</li>";
         echo "<li>다른 아이디를 사용해 주세요!</li>";
      }
      else
      {
         echo "<li>사용 가능한 아이디입니다.</li>";
         echo "<script>window.opener.id_ok();</script>";
      }
    
      mysqli_close($con);
   }
?>
</p>
<div id="close">
   <button type="button" onclick="javascript:self.close()">닫기</button>
</div>
</body>
</html>

