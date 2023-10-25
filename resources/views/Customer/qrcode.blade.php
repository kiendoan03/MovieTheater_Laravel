<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laravel Generate QR Code Examples</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"/> -->
    <link rel="stylesheet" href="/bootstrapLib/bootstrap.min.css">

</head>
<body>
    <div class="container mt-4">


        <div class="col-sm-5 mx-auto">
            <div class="card">

                <div class="card-header">
                    <h2>Netfnix QR Code</h2> 
                </div>
                <div class="card-body mx-auto">
                    {!! QrCode::size(350)->generate('RemoteStack') !!}
                </div>
            </div>
        </div>
</div>
        
    </div>
</body>
</html>