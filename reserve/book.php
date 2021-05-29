<!DOCTYPE html>
<html lang="en">
<?php include 'book_query.php'; 
if(isset($_SESSION['role']) and $_SESSION['role']=='owner'){
    header('Location: /futsa/adminPanel/adminAfterLogin.php');
}

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="reserve/book.css">
    <link rel="stylesheet" href="templates/index.css">
    <script>
    function display() {
        return confirm("Are u sure u want to book the game");
        header('location: afterlogin.php');
    }
    </script>
    <link rel="shortcut icon" type="image/png" href="./images/fav.png" />
    <title>Book</title>
</head>

<body>
    <header>
    <?php include($_SERVER['DOCUMENT_ROOT'].'/futsa/templates/header.php');  ?>
    </header>

    <section>
        <div class="first-section-user">
            <div class="user-name">
                <img src="images/admin.png" alt="A">
                <h1>Welcome <?php echo $_SESSION['name'] ?> to <?php foreach($namequery as $nq){ echo $nq['futsal_name']; } ?>
 </h1>
                <p>Please select the available time below to book for today.<span><h2 style="color:#f48c06"><?php echo(date("Y-m-d")) ?></h2></span> <br></p>
            </div>
        </div>

    </section>
    <section>
        <div class="booking-table"> 
            <!-- This is the place for title -->
            <div class="availabletime">
                <div class="booking-cards">
                <?php foreach($query as $q){  ?>
                    <div class="card">
                        <div class="time" align="center">
                            <h2><?php echo($q['book_time']) ?></h2>
                        </div>
                        <div align="center">
                            <form onsubmit="return display()" method="POST" action="/futsa/reserve/insert.php">
                                <input type="hidden" name="futsalid" value="<?php echo($futsal_id) ?>">
                                <input type="hidden" name="bookingTimeid" value="<?php echo($q['book_time_id']) ?>">
                                <?php if(in_array($q['book_time_id'], $myhashmap)){ ?>
                                    <button type="button" class="available2" disabled>Pending</button>
                                    <?php }elseif(in_array($q['book_time_id'], $bookedMap)){ ?>
                                    <button type="submit" class="booked" disabled>Booked</button>
                                    <?php }else{ ?>
                                        <button type="submit" name="book_submit" class="available">Available</button>
                                    <?php } ?>
                            </form>
                        </div>
                    </div>
                    <?php } ?>

                </div>
            </div>

    </section>
    <!-- <footer style="margin:auto">
        <p>FUTSA , &copy;2020</p>
    </footer> -->
</body>

</html>