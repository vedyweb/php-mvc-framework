<div class="container">
    <ol class="breadcrumb">
        <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
        <li><a href="#"> application</a></li>
        <li><a href="#">view</a></li>
        <li><a href="#">contract</a></li>
        <li class="active">search.php</li>
    </ol>
    <a class="btn btn-success" href="<?php echo URL; ?>ContractController/add">
        <em class="glyphicon glyphicon-plus-sign"></em>
    </a>
    <br><br>
    <form class="form-horizontal" action="<?php echo URL; ?>ContractController/search" method="POST">
        <div class="form-group">           
            <label class="control-label col-sm-1" for="package">Paket:</label>
            <div class="col-md-9">
                <input type="text" class="form-control" name="package" placeholder="Enter Package" value=""  />
            </div>       
            <div class="col-md-2">
                <button type="submit" class="btn btn-default" name="submit_add_data" value="Submit">
                    <span class="glyphicon" aria-hidden="true">Suchen</span>
                </button>           
            </div>
        </div>
    </form>          
    <br><br>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="table-th col-lg-1">ID</th>               
                <th class="table-th col-lg-1">Paket</th>             
                <th class="table-th col-lg-1">Leistung</th>        
                <th class="table-th col-lg-2">Preis</th>       
            </tr>
        </thead>
        <tbody>
            <?php
            if (isset($data) && !empty($data)) {
                foreach ($data as $datahtml) {
                    ?>
                    <tr>
                        <td class="table-td col-lg-2"><?php if (isset($datahtml->id)) echo htmlspecialchars($datahtml->id, ENT_QUOTES, 'UTF-8'); ?></td>                
                        <td class="table-td col-lg-2"><?php if (isset($datahtml->package)) echo htmlspecialchars($datahtml->package, ENT_QUOTES, 'UTF-8'); ?></td>                       
                        <td class="table-td col-lg-2"><?php if (isset($datahtml->service)) echo htmlspecialchars($datahtml->service, ENT_QUOTES, 'UTF-8'); ?></td>            
                        <td class="table-td col-lg-2"><?php if (isset($datahtml->price)) echo htmlspecialchars($datahtml->price, ENT_QUOTES, 'UTF-8'); ?></td>                       
                        <td class="table-td col-lg-2">
                            <div class="buttons pull-right">
                                <a class="btn btn-info" href="<?php echo URL . 'ContractController/search/' . htmlspecialchars($datahtml->id, ENT_QUOTES, 'UTF-8'); ?>">
                                    <em class="glyphicon glyphicon-info-sign"></em>
                                </a>
                                <a class="btn btn-warning" href="<?php echo URL . 'ContractController/edit/' . htmlspecialchars($datahtml->id, ENT_QUOTES, 'UTF-8'); ?>">
                                    <em class="glyphicon glyphicon-edit"></em>
                                </a>
                                <a class="btn btn-danger" href="<?php echo URL . 'ContractController/delete/' . htmlspecialchars($datahtml->id, ENT_QUOTES, 'UTF-8'); ?>">
                                    <em class="glyphicon glyphicon-trash"></em>
                                </a>
                            </div>
                        </td>
                    </tr>
                    <?php
                }
            }
            ?>
        </tbody>
    </table>
</div>        
</div><!-- /.container-->