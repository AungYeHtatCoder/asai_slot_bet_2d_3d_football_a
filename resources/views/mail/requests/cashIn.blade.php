{{-- <x-mail::message>
<h4 style="text-align: center;">{{ $mail['status'] }}</h4>
<div style="text-align: center;">
    Username: {{ $mail['name'] }} <br>
    Balance: {{ $mail['balance'] }} <br>

    Requested Phone: {{ $mail['phone'] }} <br>
    Requested Amount: {{ $mail['amount'] }} <br>
    Requested Payment Method: {{ $mail['payment_method'] }} <br>
</div>
Thanks,<br>
{{ config('app.name') }}
</x-mail::message> --}}

<!DOCTYPE html>
<html>
<head>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');
        body {
            font-family: 'Roboto', sans-serif;
            color: #333;
            background-color: #f4f4f4;
            line-height: 1.6;
        }
        .container {
            width: 100%;
            margin: auto;
            background: #fff;
            padding: 20px;
            text-align: center;
        }
        .header {
            background: #333;
            color: #fff;
            padding: 10px 0;
            margin-bottom: 20px;
        }
        .footer {
            color: #060606;
            padding: 10px 0;
            width: 100%;
        }
        table {
            width: 100%;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
            border-collapse: collapse;
            padding: 8px;
            text-align: left;
        }
        @media screen and (max-width: 600px) {
            .container {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h4>{{ config('app.name') }}</h4>
            <h4>{{ $mail['status'] }}</h4>
        </div>
        
        <p>Dear {{ $mail['name'] }},</p>
        <p>Your request status: <strong>{{ $mail['status'] }}</strong></p>

            <p>Username: <span style="color: goldenrod;">{{ $mail['name'] }}</span></p>
            <p>Balance: <span style="color: goldenrod;">{{ number_format($mail['balance']) }} MMK</span></p>

        <table>
            <tr>
                <th>ဖုန်းနံပါတ်</th>
                <th>ပမာဏ</th>
                <th>ငွေလွှဲနည်းလမ်း</th>
                <th>နောက်ဆုံးဂဏန်း၆လုံး</th>
                {{-- <th>လွှဲပြောင်းမှတ်တမ်း</th> --}}
            </tr>
            <tr>
                <td>
                    {{ $mail['phone'] }}
                </td>
                <td>
                    {{ number_format($mail['amount']) }} MMK
                </td>
                <td>
                    {{ $mail['payment_method'] }}
                </td>
                <td>
                    {{ $mail['last_6_num'] ?? "" }}
                </td>
                {{-- <td>
                    <img src="{{ $mail['receipt'] }}" width="100px" alt="">
                </td> --}}
            </tr>
        </table>

        <p style="margin-top: 30px;">Thank you for using our services!</p>


    </div>
    <div class="footer">
        <p>&copy; {{ date('Y') }} {{ config('app.name') }}</p>
    </div>
</body>
</html>
