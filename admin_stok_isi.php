<li>
        <a href="#" data-rel="popup" data-transition="pop">
        <img src="image/ojk.ico" alt="">
        <h2 class="listf"><?php echo $row['Jenis_Barang'].' [<span id="barpercen-txt">'.$row['Kode_Barang'].'<span>]'; ?></h2>
        <p><?php echo "Stok Awal $MAX ".$row['Keterangan']; ?></p>
        <p><?php echo 'Sisa <span id="barpercen-txt">'.$row['Stok_Barang']." ".$row['Keterangan']."</span>" ?></p>
        <div  id="progressbar" class="bar<?php echo "$i";?>"></div>
        <!--count subcategory-->  
        <?php
       
        ?>
        <label for="barpercen<?php echo $i; ?>" class="ui-hidden-accessible"></label>
        <input type="hidden" name="barpercen" id="barpercen<?php echo $i-1; ?>" value="<?php echo ceil($per); ?>">
                  
        <div id="barpercen-txt" class="ui-li-aside"><?php echo "$percentage"; ?></div>      
        </a>
      <!--Config setup-->   
        <a href="admin_editStok.php?<?php echo 
        "a=".$row['Kode_Barang']."&b=".$row['Jenis_Barang']."&c=".$row['Keterangan']."&d=".$row['Stok_Barang'];
         ?>" data-ajax="false" data-icon="Plus" data-theme="e">Tambah Stok</a>
    </li>