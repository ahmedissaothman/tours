<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .email-container {
            width: 100%;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 0 auto;
        }
        .email-header {
            background-color: #28a745;
            padding: 20px;
            color: #ffffff;
            text-align: center;
            border-radius: 8px 8px 0 0;
        }
        .email-header h1 {
            margin: 0;
        }
        .email-body {
            padding: 20px;
            color: #333333;
        }
        .email-body h2 {
            color: #28a745;
        }
        .email-body p {
            line-height: 1.6;
        }
        .email-footer {
            text-align: center;
            margin-top: 30px;
        }
        .btn {
            background-color: #28a745;
            color: #ffffff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
        }
        .btn:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>

    <div class="email-container">
        <div class="email-header">
            <h1>Booking Confirmed!</h1>
        </div>
        <div class="email-body">
            <h2>Dear {{ $booking->customer_name }},</h2>
            <p>We are thrilled to confirm your booking for an exciting adventure with us! Your booking details are as follows:</p>
            
            <ul>
                <li><strong>Booking Date:</strong> {{ $booking->booking_date ?? 'Date not available' }}</li>
                <li><strong>Number of Adults:</strong> {{ $booking->number_of_adult ?? 'Not specified' }}</li>
                <li><strong>Number of Children:</strong> {{ $booking->number_of_children ?? 'Not specified' }}</li>
                <li><strong>Email:</strong> {{ $booking->customer_email ?? 'Email not available' }}</li>
                <li><strong>Phone Number:</strong> {{ $booking->phone_number ?? 'Phone number not available' }}</li>
            </ul>
            
            <p>We can't wait to host you on your upcoming journey! Be prepared to explore the wonders of nature and create unforgettable memories. If you have any questions, feel free to contact us anytime.</p>
            
            <p>See you soon, and get ready for a fantastic adventure!</p>

            <p>Warm regards,<br>
            <strong>The Adventure Tours Team</strong></p>
        </div>
        <div class="email-footer">
            <a href="https://yourwebsite.com" class="btn">Visit Our Website</a>
        </div>
    </div>

</body>
</html>
