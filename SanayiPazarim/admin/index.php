  <?php require "include/header.php";?>
    <!-- End Navbar -->
    <div class="wrapper">
       
        <div class="section section-components pb-0" id="section-components">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                       
                        <h2 class="mb-5">
                            <span>Ürünler listesi</span>
                        </h2>
                        <table class="table">
    <thead>
        <tr>
            
            <th>Ürün</th>
            <th>Kategori</th>
            <th>Başlangıç Tarihi</th>
            <th>Bitiş Tarihi</th>
            <th class="text-center">İşlemler</th>
        </tr>
    </thead>
    <tbody>
    <?php  $urunler=$db->query("SELECT * FROM products")->fetchAll(PDO::FETCH_OBJ);
							   foreach($urunler as $urunrow){?>
							   <?php 
							   $urun_id=$urunrow->id;
								$urun_adi=$urunrow->productName; 
                                $urun_resim=$urunrow->productImage; 
                                $kategori_id=$urunrow->categoryId; 
                                $baslangic_tarihi=$urunrow->offerCreateTime; 
                                $bitis_tarihi=$urunrow->offerFinishedTime; 
                                $kategoriler=$db->query("SELECT * FROM productcategories WHERE id=$kategori_id")->fetchAll(PDO::FETCH_OBJ);
                                foreach($kategoriler as $kategorirow){?> 
                                <?php $kategori_ad=$kategorirow->category; ?>
							   
        <tr>
           
            <td><?php echo $urun_adi; ?></td>
            <td><?php echo $kategori_ad; ?></td>
            <td><?php echo iconv('latin5','utf-8',strftime(' %d %B %Y  ',strtotime( $baslangic_tarihi)));?></td>
            <td><?php echo iconv('latin5','utf-8',strftime(' %d %B %Y  ',strtotime( $bitis_tarihi)));?></td>
            <td class="td-actions text-right">
            <a href="urunler-detay.php?detay=<?= $urun_id ?>">
              <button type="button" rel="tooltip" class="btn btn-info btn-icon btn-sm " data-original-title="" title="">
                Detay</a>
              </button>
              <a href="teklifler.php?detay=<?= $urun_id ?>">
              <button type="button" rel="tooltip" class="btn btn-success btn-icon btn-sm " data-original-title="" title="">
                Teklifler
              </button></a>
                        </td>
        </tr>
                               <?php }?><?php }?>
      
    </tbody>
</table>
                  
                    </div>
                </div>
            </div>
        </div>
       
       
               
               
              
            </div>
       
        <?php require "include/footer.php";?>