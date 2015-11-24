<div class="container">
    <ol class="breadcrumb">
        <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
        <li><a href="#"> application</a></li>
        <li><a href="#">view</a></li>
        <li><a href="#">contract</a></li>
        <li class="active">edit.php</li>
    </ol>
    <form class="form-horizontal" action="<?php echo URL; ?>ContractController/update" method="POST">             
        <div class="form-group">           
            <label class="control-label col-sm-1" for="package">Package:</label>
            <div class="col-sm-11">
                <input type="text" class="form-control" name="package" placeholder="Enter Package" value="<?php echo htmlspecialchars($data->package, ENT_QUOTES, 'UTF-8'); ?>" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-1" for="service">Service:</label>
            <div class="col-sm-11">          
                <input type="text" class="form-control" name="service" placeholder="Enter Service" value="<?php echo htmlspecialchars($data->service, ENT_QUOTES, 'UTF-8'); ?>" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-1" for="price">Price:</label>
            <div class="col-sm-11">          
                <input type="text" class="form-control" name="price" placeholder="Enter Price" value="<?php echo htmlspecialchars($data->price, ENT_QUOTES, 'UTF-8'); ?>" />
            </div>
        </div>          
        <div class="form-group">        
            <div class="col-sm-11 pull-left">
                <button type="submit" class="btn btn-default" name="submit_update_data" value="Update">
                    <span class="glyphicon glyphicon-floppy-save" aria-hidden="true">Update</span>
                </button>                
            </div>
        </div>
    </form>
</div>