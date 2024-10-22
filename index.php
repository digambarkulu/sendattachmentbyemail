<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sent Attachment By An Email</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="text-center m-3"><u>Sent File Through An Email</u></h1>

        <form action="sentattachment.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">To:</label>
                <input type="email" class="form-control" name="to" value="Enter Email ID">
            </div>
            <div class="form-group">
                <label for="">Subject:</label>
                <input type="text" name="subject" class="form-control" value="Enter Subject">
            </div>
            <div class="form-group">
                <label for="">Message:</label>
                <input type="text" name="message" class="form-control" value="write some message here">
            </div>
            <div class="form-group"> 
                <label for="">File:</label>
                <input type="file" name="file" class="form-control-file">
            </div>
            <input type="submit" name="filesend" class="btn btn-success" value="Send by email">
        </form>
   </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" ></script>
    
</body>
</html>