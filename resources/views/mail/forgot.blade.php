<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - Madura Indah Wisata</title>
</head>
<body style="font-family: Arial, sans-serif; margin: 0; padding: 20px; background-color: #f4f4f4;">

    <div style="max-width: 600px; margin: 0 auto; background-color: #ffffff; padding: 20px; border-radius: 5px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">

        <h2 style="color: #333333;">Reset Password</h2>

        <p style="color: #666666;">Halo,</p>

        <p style="color: #666666;">Anda menerima email ini karena Anda atau seseorang mencoba me-reset password akun Anda.</p>

        <p style="color: #666666;">Untuk melanjutkan proses reset password, silakan klik link di bawah ini:</p>

        <a href="{{env('APP_URL'). '/reset-password' . '/' . $token}}" style="display: inline-block; padding: 10px 15px; background-color: #007bff; color: #ffffff; text-decoration: none; border-radius: 3px; margin-bottom: 20px;">Reset Password</a>

        <p style="color: #666666;">Jika Anda tidak meminta reset password, abaikan email ini.</p>

        <p style="color: #666666;">Terima kasih,<br>Madura Indah Wisata Official</p>

    </div>

</body>
</html>
