<!DOCTYPE html>
<html>
<head>
  <title>App Dashboard</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <style>
  body{
    background-color:#F5F7FA;   
    }
    .app-dashboard {
      margin-top: 20px;
    }

    .card-image {
     display: flex; /* Adjust image width as needed */
     background-color: #FFFFFF;
     color:#718EBF;
     margin-bottom: 20px;
     border-radius: 20px;
     box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
     align-items:center;
    transition: box-shadow 0.3s ease-in-out, transform 0.3s ease-in-out;
    }
    .card-image:hover{
        cursor:pointer;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
        transform: scale(1.02);
    }

    .img{
      width: 100px;
      height: 100px;
      padding:10px;
      object-fit:contain;
    }
    .card-title{
     padding:15px;
    }

  </style>
</head>
<body>
  <div class="container app-dashboard">
    <h2>Core Apps</h2>
    <div class="row mt-5">
      @foreach ($apps as $app)
        <div class="col-md-6 col-lg-4" onclick="redirectToApp('{{ $app->link }}')">
            <div class="card-image col-md-10">
                <div class="mx-2">
                    <img src="{{asset('img/' . $app->icon)}}" class="img" alt="Image">
                </div>
                <div class=card-title>
                    {{ $app->name }}
                </div>
            </div>
        </div>
      @endforeach
    </div>
  </div>
  <script>
    function redirectToApp(link) {
        if(link!=="/limstwo/admin"){
            
        const currentUrl = window.location.href;
    const newUrl = currentUrl + link;
    window.location.href = newUrl;
        }
        else{
            window.location.href=link;
        }
    }
</script>

</body>
</html>
