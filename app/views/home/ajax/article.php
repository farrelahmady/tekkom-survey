<div class="subjudul">
   <?php for ($i = 0; $i < count($data['subjudul']); $i++) : ?>
      <h2 data-name="<?= $data['subjudul'][$i]; ?>">
         <?php if ($i > 0) : ?>
            <span> / </span>
         <?php endif;
         echo strtoupper($data['subjudul'][$i]); ?>
      </h2>
   <?php endfor; ?>
</div>
<div class="main">
   <?php foreach ($data['article']['content'] as $content) : ?>
      <h3><?= $content['header']; ?></h3>
      <?php foreach ($content['paragraph'] as $para) : ?>
      <p>
         <?php if (is_array($para)) : ?>
            <ol>
               <?php foreach ($para as $list) :
                  $list = str_replace("\n", "<br>", $list); ?>
                  <li><?= $list; ?></li>
               <?php endforeach; ?>
            </ol>
         <?php else :
            $para = str_replace("\n", "<br>", $para); ?>
            <?= $para; ?>
         <?php endif; ?>
      </p>
      <?php endforeach; ?>
   <?php endforeach; ?>
</div>