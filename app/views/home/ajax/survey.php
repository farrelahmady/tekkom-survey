<div class="layer-1">
	<h1><?= $data['title']; ?></h1>
	<div class="layer-2">
      <?php if($data['page'] == 'survey'):?>
		<div class="btn-box">
         <?php foreach($data['survey'] as $btn): ?>
            <button class="surveyBtn" 
               <?php if( array_key_exists('children', $btn) ): ?>
                  data-nextpage='survey'
               <?php else: ?>
                  data-nextpage='suggest'
               <?php endif; ?>

               data-value="<?= $btn['title'] ?>"
            >
               <?= $btn['title']; ?>
            </button>
         <?php endforeach; ?>
      </div>
      <?php if( count($_SESSION['RESULT']) > 1 ): ?>
      <div class="btn-box">
         <button data-nextpage="back" class="nav btn">
            
            <!-- <i class="panah align-left">
               <i class="buntut"></i>
               <i class="kepala kiri"></i>
            </i> -->
         Back
         <i class="fa fa-arrow-left"></i>
         </button>
      </div>
      <?php endif; ?>
      <?php elseif ( $data['page'] == 'suggest' ) :?>
         <div class="btn-box">
            <textarea placeholder="Masukkan kritik dan saran Anda..."></textarea>
         </div>
         <div class="btn-box">
            <button data-nextpage="about" class="nav btn">
               next   
               <i class="fa fa-arrow-right"></i>
               <!-- <i class="panah align-right">
                  <i class="buntut"></i>
                  <i class="kepala kanan"></i>
               </i> -->
            </button>
         </div>
      <?php else: ?>
         <section id="profil">
            <?php foreach(DEVELOPER as $profil): ?>
				<div class="profil">
					<img src="<?= BASEURL ?>img/profil/<?= $profil['img']; ?>" alt="PROFIL" />
					<div class="biodata">
						<h5><?= $profil['name']; ?></h5>
						<small><?= $profil['jobdesk']; ?></small>
						<p>
							<i class="fab fa-instagram"></i>
							<a href="https://www.instagram.com/<?= $profil['instagram']; ?>/" class="text-white"><?= $profil['instagram']; ?></a>
						</p>
					</div>
				</div>
            <?php endforeach; ?>
			</section>
      <?php endif; ?>
	</div>
</div>
