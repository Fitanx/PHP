<?php 

    session_start();
    //เช็คว่ายังไม่ login ให้ย้อนกลับไปหน้า login
    if(!isset($_SESSION['username'])){
        $_SESSION['msg'] = "กรุณาลงชื่อเข้าใช้งานก่อน";
        header('location: login.php');
    }
//เมื่อกดปุ่ม logout ให้ย้อนกลับไปหน้า login
    if(isset($_GET['logout'])){ 
        session_destroy();
        unset($_SESSION['username']);
        header('location: login.php'); //ย้อนกลับไปหน้า login
    } 
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>HOME Page</title>
        <style>
            *{
                box-sizing: border-box;
            }
            body{
                font-family: Kanit;
                background-color: #f1f1f1;
            }
            .header{
                background-color: #01315c;
                padding: 5px;
                text-align: center;
                color: white;
            }
            ul{
                list-style-type: none;
                margin: 0;
                padding: 0;
                position: sticky;
                overflow: hidden;
                background-color: #3d3d3d;
                top: 0;
            }
            li{
                float: right;
            }
            li a{
                display: block;
                padding: 14px 16px;
                text-align: center;
                text-decoration: none;
                color: white;
            }
            li a:hover{
                background-color: #95bbf2;
            }
        </style>

    </head>
    <body>
        <h1>Book Shop</h1>
        <div class="header">
            <h1 style="font-size: 80px;">Book Shop</h1>
            <P style="font-size: 50PX;">ร้านหนังสือสุขใจ</P> 
        </div>
        <ul>
            <li><a href="index.php?logout='1'">Logout</a></li> **ย้ายปุ่ม logout มาข้างบนใต้ header
        </ul>      
    <!--ข้อความแจ้งเตือน -->
        <?php if(isset($_SESSION['success'])):?>
            <h3>
            <?php 
                echo $_SESSION['success'];
                unset($_SESSION['success'])
            ?>
            </h3>
        <?php endif ?>
        <!-- logged in user information -->
        <?php if(isset($_SESSION['username'])):?>
            <p>Welcome<strong><?php echo $_SESSION['username']; ?></strong></p> <!--แสดงข้อความ Welcom+username -->
<table width="600" border="1" align="center" bordercolor="#666666">
  <tr>
    <td width="91" align="center" bgcolor="#CCCCCC"><strong>ภาพ</strong></td>
    <td width="200" align="center" bgcolor="#CCCCCC"><strong>ชื่อหนังสือ</strong></td>
    <td width="44" align="center" bgcolor="#CCCCCC"><strong>ราคา</strong></td>
    <td width="100" align="center" bgcolor="#CCCCCC"><strong>รายละเอียดสินค้า</strong></td>
  </tr>
  
  
  <?php
  //connect db
  include("databook.php");
  $sql = "select * from product order by p_id";  //เรียกข้อมูลมาแสดงทั้งหมด
  $result = mysqli_query($conn, $sql);
  while($row = mysqli_fetch_array($result))
  {
  	echo "<tr>";
	echo "<td align='center'><img src='img/" . $row["p_pic"] ." ' width='80'></td>";
	echo "<td align='left'>" . $row["p_name"] . "</td>";
    echo "<td align='center'>" .number_format($row["p_price"],2). "</td>";
    echo "<td align='center'><a href='product_detail.php?p_id=$row[p_id]'>คลิก</a></td>";
	echo "</tr>";
  }
  ?>
</table>     
            <p><center><a href="index.php?logout='1'" style="color:red;">Logout</a></center></p> 
        <?php endif ?>
    </body>
</html>



