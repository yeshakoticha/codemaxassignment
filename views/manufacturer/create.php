
<html>
    <head>
        <div class="col-lg-12">
            <h1>Create Manufacturer</h1>
        </div>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
        <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    </head>    
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <form id="manufacturer" onsubmit="return false;" method="post">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" id="name"/>
                        </div>
                        <button onclick="submitForm();">Submit</button>
                    </form>
                </div>
            </div>    
        </div>
    <script type="text/javascript">
        function submitForm(){
            var data = $('#manufacturer').serialize();
            $.ajax({
                url: "<?php echo URL; ?>Manufacturer/store",
                data: data,
                method:'POST',
                success: function(response) {
                    var resp = JSON.parse(response);
                    if(resp.flag){
                        $('#manufacturer')[0].reset();
                    }
                    alert(resp.msg);
                },
                error: function() {
                    
                }
            });
        }
    </script>    


    </body>
</html>
    