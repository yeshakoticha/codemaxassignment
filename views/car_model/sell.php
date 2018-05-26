<html>
    <head>
        <div class="col-lg-12">
            <h1>List Un-Sold Models</h1>
        </div>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous"> 

        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">

        <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <style type="text/css">
        .row{
            padding-bottom: 15px;
        }
    </style>

    </head>    
    <body>

        <table id="example" class="display dataTable" style="width: 100%;" role="grid" aria-describedby="example_info">
            <thead>
                <tr role="row">
                    <th>Sr. No.</th>
                    <th>Manufacturer</th>
                    <th>Model</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="data">
                <?php
                if(!empty($this->data)){
                    $count=1;
                    foreach ($this->data as $key) { ?>
                        <tr>
                            <td><?php echo $count; ?></td>
                            <td><?php echo $key['manf']; ?></td>
                            <td><?php echo $key['name']; ?></td>
                            <td><a href="#" onclick="sellCar(<?php echo $key['id']; ?>)">Sell</a></td>
                        </tr>                        
                    <?php 
                    $count++;
                    }
                }
                ?>

            </tbody>
        </table>

   
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable();
        });

        function sellCar(id){
            var data = $('#manufacturer').serialize();
            $.ajax({
                url: "<?php echo URL; ?>CarModel/sell/"+id,
                data: data,
                method:'POST',
                success: function(response) {
                    var resp = JSON.parse(response);
                    if(resp.flag){
                        window.location.reload();
                    }
                },
                error: function() {
                    
                }
            });
        }
    </script>    
</body>
</html>