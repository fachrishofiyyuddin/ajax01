<?php
require 'vendor/autoload.php'; // Sesuaikan dengan lokasi autoload PHPMailer Anda

// Gunakan namespace PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Memuat konfigurasi SMTP (opsional)
$mail = new PHPMailer(true);
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com'; // Ganti dengan server SMTP Anda
$mail->SMTPAuth = true;
$mail->Username = 'csovokasiundip@gmail.com';
$mail->Password = 'qddcwscwztsfbdis';
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;

// Buat pesan
$mail->setFrom('from@example.com', 'Your Name');
$mail->addAddress('fachriahmad210@gmail.com', 'Recipient Name');
$mail->Subject = 'Subject of the Email';
$mail->Body = 'This is the HTML message body <b>in bold!</b>';
$mail->AltBody = 'This is the plain text version of the email body';

// Lampiran (opsional)
// $mail->addAttachment('/path/to/file.pdf', 'Filename.pdf'); // Sesuaikan dengan lokasi dan nama file lampiran Anda

// Mengirim email
try {
    $mail->send();
    echo 'Email berhasil dikirim!';
} catch (Exception $e) {
    echo 'Gagal mengirim email: ', $mail->ErrorInfo;
}
