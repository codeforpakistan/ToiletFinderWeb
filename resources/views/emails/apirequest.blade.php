<html>
<head>
    <title>Request For Public Toilet Finder Data Services</title>
</head>
<body style="font: 13px arial, helvetica, tahoma;">
    <div class="email-container" style="width: 650px; border: 1px solid #eee;">
        <div id="header" style="background-color: red; border-bottom: 4px solid #d32407; height: 45px; padding: 10px 15px;">
            <strong id="logo" style="color: white; font-size: 20px; text-shadow: 1px 1px 1px #8F8888; margin-top: 10px; display: inline-block">Public Toilet Finder</strong>
        </div>

        <h3>Someone has contacted you through the Public Toilet Finder</h3>
        <div>
            <p><strong>Subject: </strong>Request For Public Toilet Finder Data Services</p>
            <p><strong>Name: </strong> {{ $apirequest->name }}</p>
            <p><strong>Email: </strong> {{ $apirequest->email }}</p>
            <p><strong>Message:</strong></p>
            <p> {{ $apirequest->purpose }}</p>
        </div>

        <div id="footer" style="padding: 10px; text-align: center; margin-top: 10px;
                border-top: 1px solid #EEE; background: #FAFAFA;">
            Powered by
            <a href="http://www.kpitb.gov.pk/" style="text-decoration: none;">KPITB</a>
            
        </div>
    </div>
</body>
</html>
