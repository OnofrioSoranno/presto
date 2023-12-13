<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
    body{
        background-color: rgb(35, 46, 62);
        color: white;
    }
    .titolo{
        background-color: whitesmoke;
        color: black;
        padding: 5px;
        border-radius: 15px;
        margin: 10px;
        text-align: center
    }
    .container{
      display: flex;
      justify-content: space-between;   
      margin: 30px;
    }
    .dati{
        background-color: whitesmoke;
        color: black;
        padding: 15px;
        border-radius: 15px;  
        width: 500px;    
    }
    .immagine{
        padding: 15px;
        border-radius: 15px; 
    }
    .bottone{
        background-color: green;
        color: white;
        padding: 10px;
        border-radius: 15px;
        text-decoration: none;
        font-weight: bold;
        box-shadow: aliceblue;
    }
    .validazione{
        align-items: center;
        width: 100vh;
        text-align: center;
        margin: 20px;
    }

    </style>
</head>
<body>
    
    <div class="container titolo">
        <div class="row">
            <div class="col-12">
                <h1>Un utente ha richiesto di diventare revisore</h1>
                <h2>Di seguito troverai i suoi dati.</h2>
            </div>
        </div>
    </div>
    <div class="container ">
            <div class="col-6 dati">
                <h3>Nome:</h3>
                <p>{{$user->name}}</p>  
                <h3>Email:</h3> 
                <p>{{$user->email}}</p>             
            </div>
            <div class="immagine">
                <img src="https://cdn.iconscout.com/icon/free/png-256/free-audit-1817296-1538164.png" alt="">            
            </div>
    </div>
    
        
    
    <div class="validazione">
        <div>
            <div>
               <h3>Se vuoi renderlo revisore clicca qui:</h3>
               <a class="bottone" href="{{route('make.revisor', compact('user'))}}">Rendi revisore</a>  
            </div>
        </div>
    </div>
    
    
</body>
</html>