<!DOCTYPE html>
<html>

<head>
    <title>New Contact Inquiry</title>
</head>

<body style="font-family: sans-serif; line-height: 1.6; color: #333;">
    <h2>New Inquiry received from your portfolio</h2>
    <p><strong>Name:</strong> {{ $data['name'] }}</p>
    <p><strong>Phone:</strong> {{ $data['phone'] }}</p>
    <p><strong>Email:</strong> {{ $data['email'] }}</p>
    <p><strong>Message:</strong></p>
    <p>{{ $data['message'] }}</p>
</body>

</html>