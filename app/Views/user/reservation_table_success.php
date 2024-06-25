<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservasi Berhasil</title>
    <style>
        .success-page {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
            text-align: center;
        }

        .success-icon {
            width: 100px;
            height: 100px;
            color: #28a745;
        }

        .success-message {
            font-size: 24px;
            margin-top: 20px;
            margin-bottom: 30px;
        }

        .return-link {
            font-size: 18px;
        }
    </style>
</head>

<body>
    <div class="success-page">
        <div class="success-icon">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#28a745" width="100px" height="100px">
                <path d="M0 0h24v24H0z" fill="none" />
                <path d="M12 0C5.37 0 0 5.37 0 12s5.37 12 12 12 12-5.37 12-12S18.63 0 12 0zm0 21.9c-5.47 0-9.9-4.43-9.9-9.9S6.53 2.1 12 2.1 21.9 6.53 21.9 12 17.47 21.9 12 21.9zM10.08 16.34L5.64 11.9l1.41-1.41 3.02 3.02L17.34 6.3l1.41 1.41-8.67 8.63z" />
            </svg>
        </div>
        <div class="success-message">
            Reservasi Berhasil Dilakukan
        </div>
        <div class="return-link">
            <a href="<?= base_url('/') ?>" class="btn btn-primary">Kembali ke Halaman Utama</a>
        </div>
    </div>
</body>

</html>