
  <?php require "include/header.php";?>
  <?php if(@$_GET["detay"]){?>
    <?php 
        $urundetay=$db->query("SELECT * FROM products WHERE id=".$_GET["detay"]);
        $detayrow=$urundetay->fetch(PDO::FETCH_OBJ);
        $urun_id=$detayrow->id;
        $urun_kategori_id=$detayrow->categoryId;
		$urun_adi=$detayrow->productName; 
        $urun_resim=$detayrow->productImage; 
        $urun_aciklama=$detayrow->productDescription; 
        $urun_alt_aciklama=$detayrow->productSubDescription;
        $baslangic_tarihi=$detayrow->offerCreateTime; 
        $bitis_tarihi=$detayrow->offerFinishedTime; 
        $kategori=$db->query("SELECT * FROM productcategories WHERE id= $urun_kategori_id");
        $kategorirow=$kategori->fetch(PDO::FETCH_OBJ);
        $kategori_adi=$kategorirow->category;

        
      
        ?>
  <div class="wrapper">
       
       <div class="section section-components pb-0" id="section-components">
           <div class="container">
               <div class="row justify-content-center">
                   <div class="col-lg-12">
                      
                      
                       <div class="row">
  <div class="col"><span><img src="<?php echo $urun_resim; ?>" class="rounded float-left" alt="..." style="height:30rem;"></span></div>
  <div class="col"><span> <h2>
                          <?php echo $urun_adi;?>
                       </h2>
                       <p>Kategori:<?php echo $kategori_adi;?></p>  
                      <h4>Özellikleri</h4>
                      <p><?php echo $urun_aciklama;?></p>   
                      <p class="text-dark">Başlangıç Tarihi:<?php echo iconv('latin5','utf-8',strftime(' %d %B %Y  ',strtotime( $baslangic_tarihi)));?></p>
                                <p class="text-dark">Bitiş Tarihi:<?php echo iconv('latin5','utf-8',strftime(' %d %B %Y  ',strtotime( $bitis_tarihi)));?></p>
                    </span></div>
 
</div>
<h4>İlan Detayı</h4>
<p><?php echo $urun_alt_aciklama;?></p>            
                   </div>
               </div>
           </div>
       </div>
      
      
              
              
             
           </div>
  <?php }?>
        <?php require "include/footer.php";?>