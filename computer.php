<html>
    <head>
        <style>
        .container {
            position: relative;
            text-align: center;
            color: white;
            height:60px;
            width:60px;
        }
        .centered {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: black;
          }
        </style>
    </head>
    <body>
        <main></main>
        <script>
        const main = document.querySelector('main');
        let htmlString = "";
        let color="green";
        if(color=="green"){
        htmlString +=`<button style="border:none;"><div class="container"><img src="greencomp.png" alt="Snow" style="width:100%;"><div class="centered">1</div></div></button>`;
        }
        else{
        htmlString +=`<button style="border:none;"><div class="container"><img src="redcomp.png" alt="Snow" style="width:100%;"><div class="centered">Centered</div></div></button>`;
        }
        color="red";
        if(color=="green"){
        htmlString +=`<button style="border:none;"><div class="container"><img src="greencomp.png" alt="Snow" style="width:100%;"><div class="centered">Centered</div></div></button>`;
        }
        else{
        htmlString +=`<button style="border:none;"><div class="container"><img src="redcomp.png" alt="Snow" style="width:100%;"><div class="centered">2</div></div></button>`;
        }
        main.innerHTML = htmlString;
        </script>
        </body>
</html>