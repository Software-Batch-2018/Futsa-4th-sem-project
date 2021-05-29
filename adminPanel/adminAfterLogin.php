<! -- This is inlcudes/required databases and links -->
  <html>
   <head> 
   <?php 
   session_start();
   if(!isset($_SESSION['role']) or $_SESSION['role'] !='owner'){
    header('Location: /futsa/index.php');
  }
  include '../database/db.php';
   $owner = $_SESSION['name'];
   $sql_booking = "select booking_id,date, status, booking_id, futsal_name, book_time, username from futsal as f inner join booking as b on f.futsal_id = b.futsal_id inner join book_time as bt on b.book_time_id = bt.book_time_id inner join user as u on b.booker_id = u.id WHERE f.owner = '$owner' order by booking_id desc";
   $query = mysqli_query($conn, $sql_booking);
?>

      <link rel='stylesheet' type='text/css' href='admin.css' />
      <link rel="stylesheet" href="/futsa/reserve/book.css">

       <link rel='stylesheet' type='text/css' href='../src/css/ui.css' />
   </head>
   <body>
<header>
<?php include($_SERVER['DOCUMENT_ROOT'].'/futsa/templates/header.php');  ?>

</header>
   <section>
        <div class="first-section-user">
            <div class="user-name">
                <img src="/futsa/images/admin.png" alt="A">
                <h1>Welcome <?php echo $_SESSION['name'] ?></h1>
                <p>Please Approve or Delete the requests below. <br></p>
            </div>
        </div>
    </section>
   
       <!-- This will be Admin Panel  -->
     <section class="wrap-table">
       <table>
           <tr class="head-wrap">
             <th class ="table-head">Booker Name</th>
             <th class ="table-head">Booked Time</th>
             <th class ="table-head">Date</th>
             <th class ="table-head">Cancel Booking</th>
             <th class ="table-head">Confirm Booking</th>


           </tr>
           <?php foreach($query as $q){  ?>
              <?php if($q['status']=='booked' or $q['status']=='expired'){ ?>
                <?php echo"
                  <tr class='row-wrap'>
                    <td class ='table-row'> ".$q['username']." </td>
                    <td class ='table-row'> ".$q['book_time']."</td>
                    <td class ='table-row'> ".$q['date']."</td>
                    <td class ='table-row'> Booked/Expired </td>
                    </tr> "
                ?>

              <?php  }else{ ?>
                <?php echo"
             <tr class='row-wrap'>
               <td class ='table-row'> ".$q['username']." </td>
               <td class ='table-row'> ".$q['book_time']."</td>
               <td class ='table-row'> ".$q['date']."</td>
               <td class ='table-row'> <a class='booked' href='cancel.php?booking_id=$q[booking_id]'>Cancel</a> </td>
               <td class ='table-row'> <a class='available' href='confirm.php?booking_id=$q[booking_id]'>Confirm</a> </td>
               </tr> "
             ?>
              <?php } ?>
            <?php } ?>
         </table>
           </section>
   </body>
   
   </html>

