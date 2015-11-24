<div class="container">
    <ol class="breadcrumb">
        <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
        <li><a href="#"> application</a></li>
        <li><a href="#">view</a></li>
        <li><a href="#">customer</a></li>
        <li class="active">search.php</li>
    </ol>
    <a class="btn btn-success" href="<?php echo URL; ?>CustomerController/add">
        <em class="glyphicon glyphicon-plus-sign"></em>
    </a>
    <br><br>
    <form class="form-horizontal" action="<?php echo URL; ?>CustomerController/search" method="POST">
        <div class="form-group">           
            <label class="control-label col-sm-1" for="lastname">Lastname:</label>
            <div class="col-md-9">
                <input type="text" class="form-control" name="lastname" placeholder="Enter Lastname" value=""  />
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
                <th class="table-th col-lg-1">KundenID</th>               
                <th class="table-th col-lg-1">Firma</th>             
                <th class="table-th col-lg-1">Firstname</th>        
                <th class="table-th col-lg-2">Lastname</th>
                <th class="table-th col-lg-2">Status</th>  
                <th class="table-th col-lg-2">Kontakt</th>               
            </tr>
        </thead>
        <tbody>
            <?php
            if (isset($data) && !empty($data)) {
                foreach ($data as $datahtml) {
                    ?>
                    <tr>
                        <td class="table-td col-lg-2"><?php if (isset($datahtml->id)) echo htmlspecialchars($datahtml->id, ENT_QUOTES, 'UTF-8'); ?></td>                
                        <td class="table-td col-lg-2"><?php if (isset($datahtml->firma)) echo htmlspecialchars($datahtml->firma, ENT_QUOTES, 'UTF-8'); ?></td>                       
                        <td class="table-td col-lg-2"><?php if (isset($datahtml->firstname)) echo htmlspecialchars($datahtml->firstname, ENT_QUOTES, 'UTF-8'); ?></td>            
                        <td class="table-td col-lg-2"><?php if (isset($datahtml->lastname)) echo htmlspecialchars($datahtml->lastname, ENT_QUOTES, 'UTF-8'); ?></td>                       
                        <td class="table-td col-lg-2"><?php if (isset($datahtml->status)) echo htmlspecialchars($datahtml->status, ENT_QUOTES, 'UTF-8'); ?></td>   
                        <td class="table-td col-lg-2"><?php if (isset($datahtml->contact)) echo htmlspecialchars($datahtml->contact, ENT_QUOTES, 'UTF-8'); ?></td> 
                        <td class="table-td col-lg-2">
                            <div class="buttons pull-right">
                                <a class="btn btn-info" href="<?php echo URL . 'CustomerController/search/' . htmlspecialchars($datahtml->id, ENT_QUOTES, 'UTF-8'); ?>">
                                    <em class="glyphicon glyphicon-info-sign"></em>
                                </a>
                                <a class="btn btn-warning" href="<?php echo URL . 'CustomerController/edit/' . htmlspecialchars($datahtml->id, ENT_QUOTES, 'UTF-8'); ?>">
                                    <em class="glyphicon glyphicon-edit"></em>
                                </a>
                                <a class="btn btn-danger" href="<?php echo URL . 'CustomerController/delete/' . htmlspecialchars($datahtml->id, ENT_QUOTES, 'UTF-8'); ?>">
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