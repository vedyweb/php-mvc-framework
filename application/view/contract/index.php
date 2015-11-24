<div class="container">
    <ol class="breadcrumb">
        <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
        <li><a href="#"> application</a></li>
        <li><a href="#">view</a></li>
        <li><a href="#">contact</a></li>
        <li class="active">index.php</li>
    </ol>
    <a class="btn btn-success" href="<?php echo URL; ?>ContractController/add">
        <em class="glyphicon glyphicon-plus-sign"></em>
    </a>
    <br><br>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="table-th col-lg-1">ID</th>    
                <th class="table-th col-lg-1">Paket</th>        
                <th class="table-th col-lg-2">Service</th>
                <th class="table-th col-lg-2">Preis</th>  
                <th class="table-th col-lg-2">KundenID</th>  
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $datahtml) { ?>
                <tr>
                    <!--
                    <td><?php // if (isset($datahtml->id)) echo htmlspecialchars($datahtml->id, ENT_QUOTES, 'UTF-8');  ?></td>
                    -->
                    <td class="table-td col-lg-2"><?php if (isset($datahtml->id)) echo htmlspecialchars($datahtml->id, ENT_QUOTES, 'UTF-8'); ?></td>                
                    <td class="table-td col-lg-2"><?php if (isset($datahtml->package)) echo htmlspecialchars($datahtml->package, ENT_QUOTES, 'UTF-8'); ?></td>                       
                    <td class="table-td col-lg-2"><?php if (isset($datahtml->service)) echo htmlspecialchars($datahtml->service, ENT_QUOTES, 'UTF-8'); ?></td>                       
                    <td class="table-td col-lg-2"><?php if (isset($datahtml->price)) echo htmlspecialchars($datahtml->price, ENT_QUOTES, 'UTF-8'); ?></td>            
                    <td class="table-td col-lg-2"><?php if (isset($datahtml->fk_customer)) echo htmlspecialchars($datahtml->fk_customer, ENT_QUOTES, 'UTF-8'); ?></td>                
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
            <?php } ?>
        </tbody>
    </table>
</div><!-- /.container-->