<?php
// Memuat autoload Composer
require 'vendor/autoload.php';

// Mengimpor kelas-kelas yang diperlukan dari Swift Mailer
use Swift_SmtpTransport;
use Swift_Mailer;
use Swift_Message;

// Konfigurasi SMTP
$transport = (new Swift_SmtpTransport('smtp.gmail.com', 587, 'tls'))
    ->setUsername('csovokasiundip@gmail.com') // Ganti dengan username SMTP Anda
    ->setPassword('qddcwscwztsfbdis'); // Ganti dengan password SMTP Anda

// Membuat instance Swift Mailer dengan transport SMTP
$mailer = new Swift_Mailer($transport);

// Membuat instance Swift Message
$message = (new Swift_Message('Subject of the Email'))
    ->setFrom(['sender@example.com' => 'Your Name']) // Ganti dengan alamat email pengirim
    ->setTo(['recipient@example.com' => 'Recipient Name']) // Ganti dengan alamat email penerima
    ->setBody('This is the HTML message body <b>in bold!</b>', 'text/html') // Isi pesan email dalam format HTML
    ->addPart('This is the plain text version of the email body', 'text/plain'); // Isi pesan email dalam format plain text

// Mengirim email
$result = $mailer->send($message);

// Menampilkan pesan sukses atau gagal
if ($result) {
    echo "Email berhasil dikirim.";
} else {
    echo "Gagal mengirim email.";
}
