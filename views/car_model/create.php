<html>
    <head>
        <div class="col-lg-12">
            <h1>Create Car Model</h1>
        </div>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
        <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    <style type="text/css">
        .row{
            padding-bottom: 15px;
        }
    </style>

    </head>    
    <body>

    <?php 
        $manf = $this->manufacturers ?? [];
    ?>    

    <div class="container-fluid">                    
        <form id="model" method="post" class="form-horizontal" enctype="multipart/form-data">
            <div class="row">
                <div class="col">
                    <input type="text" name="name" id="name" class="form-control" placeholder="Model Name"/>
                </div>

                <div class="col">
                    <select name="manf" id="manf" class="form-control">
                        <option>Select</option>
                        <?php for($i=0;$i<count($manf);$i++){ ?>
                            <option value="<?php echo $manf[$i]; ?>"><?php echo $manf[$i]; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>   

            <div class="row">
                <div class="col">
                    <input type="text" name="color" id="color" class="form-control" placeholder="Color"/>
                </div>
                <div class="col">
                    <input type="text" name="year" id="year" class="form-control" placeholder="Manufacturing Year"/>
                </div>
            </div> 

            <div class="row">
                <div class="col">
                    <input type="text" name="reg_num" id="reg_num" class="form-control" placeholder="Registration Number"/>
                </div>
                <div class="col">
                    <input type="file" multiple name="files[]" id="file" class="form-control" placeholder="Pictures"/>
                </div>
            </div>  
            <div class="row">
                <div class="col">
                    <textarea name="note" id="note" class="form-control" placeholder="Note"></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <button>Submit</button>
                </div>
            </div>

        </form>
    </div>
    <script type="text/javascript">
       $("form#model").submit(function(e) {
            e.preventDefault();    
            
            var formData = new FormData(this);
            console.log(formData)
            $.ajax({
                url: "<?php echo URL; ?>CarModel/store",
                type: 'POST',
                data: formData,
                success: function(response) {
                    var resp = JSON.parse(response);
                    if(resp.flag){
                         $('#model')[0].reset();
                    }
                    alert(resp.msg);
                },
                cache: false,
                contentType: false,
                processData: false
            });
        });
    </script>    
</body>
</html>