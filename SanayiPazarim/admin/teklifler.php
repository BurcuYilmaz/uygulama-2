
  <?php require "include/header.php";?>
  <?php if(@$_GET["detay"]){?>
    <?php 
        $urundetay=$db->query("SELECT * FROM products WHERE id=".$_GET["detay"]);
        $detayrow=$urundetay->fetch(PDO::FETCH_OBJ);
        $urun_id=$detayrow->id;
        $urun_kategori_id=$detayrow->categoryId;
		$urun_adi=$detayrow->productName; 
        ?>
    <div class="wrapper">
       
        <div class="section section-components pb-0" id="section-components">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                       
                        <h2>
                            <span><?php echo $urun_adi;?></span>
                        </h2>
                        <p>Teklif Listesi</p>
                        <table class="table">
    <thead>
        <tr>
            
            <th>Teklif Değeri</th>
            <th>Teklif Açıklaması</th>
            <th>Teklif Tarihi</th>
            <th class="text-center">İşlemler</th>
        </tr>
    </thead>
    <tbody>
    <?php


    $teklifler=$db->query("SELECT * FROM offers WHERE productId=$urun_id ORDER BY  CAST(offerValue as INT) DESC")->fetchAll(PDO::FETCH_OBJ);
							   foreach($teklifler as $teklifrow){?>
							   <?php 
							   $teklif_id=$teklifrow->id;
                                $aciklama=$teklifrow->offerHead; 
                                $deger=$teklifrow->offerValue;
                                $tarih=$teklifrow->offerCreateTime;?>
                                
        <tr>
           
            <td><?php echo $deger; ?></td>
            <td><?php echo substr($aciklama,0,18); ?>...</td>
            <td><?php echo iconv('latin5','utf-8',strftime(' %d %B %Y  ',strtotime( $tarih)));?></td>
           
            <td class="td-actions text-right">
            <a href="teklif-detay.php?detay=<?= $teklif_id ?>">
              <button type="button" rel="tooltip" class="btn btn-info btn-icon btn-sm " data-original-title="" title="">
                Detay</a>
              </button>
            
                        </td>
        </tr><?php }?>
      
    </tbody>
</table>
                  
                    </div>
                </div>
            </div>
        </div>
       
       
               
               
              
            </div>
                                <?php }?>
       
        <?php require "include/footer.php";?>