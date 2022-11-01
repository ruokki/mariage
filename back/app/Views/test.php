<!doctype html>
<html>
    <head>

    </head>
    <body>
    <script
  src="https://code.jquery.com/jquery-3.6.1.js"
  integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
  crossorigin="anonymous"></script>
        <script>
            (jQuery)(function($){
                $.ajax({
                    url: "",
                    type: "POST",
                    data: {
                        cmd: "add",
                        invites: [
                            {
                                allergie: "les bananes",
                                nom: "Derodit", 
                                pmr: false, 
                                prenom: "Thibaut", 
                                regime: "omni",
                                size:  "adulte"
                            }
                        ]
                    }
                });
            });
        </script>
    </body>
</html>