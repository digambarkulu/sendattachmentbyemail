<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $to = $_POST['to'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $from = "put your email id here";

    if (isset($_FILES['file']) && $_FILES['file']['error'] == 0) {

        $fileTmpPath = $_FILES['file']['tmp_name'];
        $fileName = $_FILES['file']['name'];
        $fileSize = $_FILES['file']['size'];
        $fileType = $_FILES['file']['type'];
        $fileNameCmps = explode(".",$fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        $fileData = file_get_contents($fileTmpPath);
        $encodedFile = chunk_split(base64_encode($fileData));

        $uid = md5(uniqid(time()));

        $header = "From: " . $from . "\r\n";
        $header .= "Reply-To: " .$from . "\r\n";
        $header .= "MIME-Version: 1.0\r\n";
        $header .= "Content-Type: multipart/mixed; boundary=\"" . $uid . "\"\r\n\r\n";
        
        $body = "--" . $uid . "\r\n";
        $body .= "Content-type:text/plain; charset=iso-8859-1\r\n";
        $body .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
        $body .= $message . "\r\n\r\n";
        $body .= "--" . $uid . "\r\n";
        $body .= "Content-Type: " . $fileType . "; name=\"" . $fileName . "\"\r\n";
        $body .= "Content-Transfer-Encoding: base64\r\n";
        $body .= "Content-Disposition: attachment; filename=\"" . $fileName . "\"\r\n\r\n";
        $body .= $encodedFile."\r\n\r\n";
        $body .= "--" . $uid . "--";

        if (mail($to,$subject,$body,$header)){
            echo "Mail sent successfully";
        } else {
            echo "Mail sending failed.";
        }
    } else {
        echo "Error: ". $_FILES['file']['error'];
    }

} else {

    echo "Invalid request";
}

?>