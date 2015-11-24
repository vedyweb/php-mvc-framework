<div class="container">
    <ol class="breadcrumb">
        <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
        <li><a href="#"> application</a></li>
        <li><a href="#">view</a></li>
        <li><a href="#">contract</a></li>
        <li class="active">add.php</li>
    </ol>
    <form class="form-horizontal" action="<?php echo URL; ?>ContractController/add" method="POST">
        <div class="form-group">
            <label class="control-label col-sm-1" for="package">Package:</label>
            <div class="col-sm-11">
                <input type="text" class="form-control" name="package" placeholder="Enter Paket" value="" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-1" for="service">Leistung:</label>
            <div class="col-sm-11">          
                <input type="text" class="form-control" name="service" placeholder="Enter Leistung" value="" required />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-1" for="price">Preis:</label>
            <div class="col-sm-11">          
                <input type="text" class="form-control" name="price" placeholder="Enter Preis" value="" required />
            </div>
        </div>  

        <div class="form-group">
            <label class="control-label col-sm-1" for="fk_customer">Customer ID:</label>
            <div class="col-sm-11">          
                <!-- BEZIEHUNG MIT KLASSE Customer, wegen id auswahl ENDE -->  
                <select class="form-control" id="sel1" name="fk_customer">
                    <option value="">Bitte Kunde Auswählen</option>
                    <?php
                    foreach ($relationsship_fk_customer_id as $rs) {
                        if (isset($rs->id)) {
                            ?>                
                            <option value="<?php echo htmlspecialchars($rs->id, ENT_QUOTES, 'UTF-8'); ?>">
                                <?php echo htmlspecialchars($rs->id, ENT_QUOTES, 'UTF-8'); ?> - <?php echo htmlspecialchars($rs->firma, ENT_QUOTES, 'UTF-8'); ?>  
                            </option>
                            <?php
                            $_POST['fk_customer'] = $rs->id;
                        }
                    }
                    ?>                           
                </select>
                <!-- BEZIEHUNG MIT KLASSE Customer, wegen id auswahl ENDE -->     
            </div>
        </div>      
        <div class="form-group">        
            <div class="col-sm-11 pull-left">
                <button type="submit" class="btn btn-default" name="submit_add_data" value="Submit">
                    <span class="glyphicon glyphicon-floppy-saved" aria-hidden="true">Save</span>
                </button>           
            </div>
        </div>
    </form>
</div>